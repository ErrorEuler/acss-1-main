<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../services/AuthService.php';
require_once __DIR__ . '/../controllers/ApiController.php';
require_once __DIR__ . '/../services/LockServices.php';

class DirectorController
{
    public $db;
    private $userModel;
    public $api;
    public $authService;

    public function __construct()
    {
        error_log("DirectorController instantiated");
        $this->db = (new Database())->connect();
        if ($this->db === null) {
            error_log("Failed to connect to the database in DirectorController");
            die("Database connection failed. Please try again later.");
        }
        $this->userModel = new UserModel();
        $this->api = new ApiController();
        $this->authService = new AuthService($this->db);
        $this->restrictToDi();
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function restrictToDi()
    {
        error_log("restrictToDi: Checking session - user_id: " . ($_SESSION['user_id'] ?? 'none') . ", role_id: " . ($_SESSION['role_id'] ?? 'none'));
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['role_id']) || $_SESSION['role_id'] != 3) {
            error_log("restrictToDi: Redirecting to login due to unauthorized access");
            header('Location: /login?error=Unauthorized access');
            exit;
        }
    }

    private function getUserData()
    {
        try {
            $stmt = $this->db->prepare("
                SELECT u.*, f.employment_type, f.academic_rank
                FROM users u
                LEFT JOIN faculty f ON u.user_id = f.user_id
                WHERE u.user_id = :user_id
            ");
            $stmt->execute([':user_id' => $_SESSION['user_id']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                $specStmt = $this->db->prepare("
                    SELECT s.specialization_id, c.course_name
                    FROM specializations s
                    JOIN courses c ON s.course_id = c.course_id
                    WHERE s.faculty_id = :faculty_id AND s.is_primary_specialization = 1
                    LIMIT 1
                ");
                $specStmt->execute([':faculty_id' => $_SESSION['user_id']]);
                $specialization = $specStmt->fetch(PDO::FETCH_ASSOC);
                $user['course_specialization'] = $specialization ? $specialization['course_name'] : null;
                $user['specialization_id'] = $specialization ? $specialization['specialization_id'] : null;
                error_log("getUserData: Successfully fetched user data for user_id: " . $_SESSION['user_id']);
                return $user;
            } else {
                error_log("getUserData: No user found for user_id: " . $_SESSION['user_id']);
                return null;
            }
        } catch (PDOException $e) {
            error_log("getUserData: Database error - " . $e->getMessage());
            return null;
        }
    }

    public function getUnlockRequestsJson()
{
    $lockService = new LockService();
    $requests = $this->getUnlockRequests();
    header('Content-Type: application/json');
    echo json_encode($requests);
    exit;
}

private function getUnlockRequests()
    {
        $lockService = new LockService();
        return $lockService->getUnlockRequests();
    }

public function dashboard()
    {
        try {
            $userData = $this->getUserData();
            if (!$userData) {
                error_log("dashboard: Failed to load user data for user_id: " . ($_SESSION['user_id'] ?? 'unknown'));
                header('Location: /login?error=User data not found');
                exit;
            }

            $departmentId = $this->getDepartmentId($userData['user_id']);
            if ($departmentId === null) {
                error_log("dashboard: No department found for user_id: " . $userData['user_id']);
                header('Location: /login?error=Department not assigned');
                exit;
            }

            $semester = $this->getCurrentSemester();
            $pendingCount = $this->getPendingApprovalsCount($departmentId);
            $deadline = $this->getScheduleDeadline($departmentId);
            $facultyId = $this->getFacultyId($userData['user_id']);
            $schedules = $facultyId ? $this->getSchedules($facultyId) : [];

            $lockService = new LockService();
            $isLocked = $lockService->isSystemLocked();

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
                if ($_POST['action'] === 'toggle_lock') {
                    $lockService->toggleSystemLock(!$isLocked);
                    header('Location: /director/dashboard');
                    exit;
                } elseif ($_POST['action'] === 'approve_request') {
                    $requestId = $_POST['request_id'] ?? null;
                    if ($requestId) {
                        $lockService->approveUnlockRequest($requestId);
                    }
                    header('Location: /director/dashboard');
                    exit;
                }
            }

            $unlockRequests = $lockService->getUnlockRequests();

            $data = [
                'user' => $userData,
                'pending_approvals' => $pendingCount,
                'deadline' => $deadline ? date('Y-m-d H:i:s', strtotime($deadline)) : null,
                'semester' => $semester,
                'schedules' => $schedules,
                'title' => 'Director Dashboard',
                'current_time' => date('h:i A T', time()),
                'has_db_error' => $departmentId === null || $pendingCount === null || $deadline === null || empty($schedules),
                'is_locked' => $isLocked,
                'unlock_requests' => $unlockRequests
            ];

            error_log("dashboard: View loaded for user_id: " . $_SESSION['user_id']);
            require_once __DIR__ . '/../views/director/dashboard.php';
            exit;
        } catch (PDOException $e) {
            error_log("dashboard: Database error - " . $e->getMessage());
            http_response_code(500);
            echo "Server error";
        } catch (Exception $e) {
            error_log("dashboard: General error - " . $e->getMessage());
            http_response_code(500);
            echo "Server error";
        }
    }

    private function toggleSystemLock($lock)
    {
        try {
            $userId = $_SESSION['user_id'] ?? null;
            if ($userId === null || !is_numeric($userId)) {
                error_log("toggleSystemLock: Invalid or missing user_id: " . ($userId ?? 'null'));
                return;
            }
    
            $stmt = $this->db->prepare("
                INSERT INTO system_locks (is_locked, locked_by)
                VALUES (:is_locked, :locked_by)
                ON DUPLICATE KEY UPDATE is_locked = VALUES(is_locked), locked_at = NOW(), unlocked_at = NULL
            ");
            error_log("toggleSystemLock: Prepared query - " . $stmt->queryString);
            $params = [
                ':is_locked' => $lock ? 1 : 0,
                ':locked_by' => (int)$userId
            ];
            error_log("toggleSystemLock: Parameters - " . print_r($params, true));
            $stmt->execute($params);
            error_log("toggleSystemLock: System lock set to " . ($lock ? 'locked' : 'unlocked') . " by user_id: $userId");
        } catch (PDOException $e) {
            error_log("toggleSystemLock: Database error - " . $e->getMessage());
        }
    }

    public function isSystemLocked() // Changed from private to public
    {
        try {
            $stmt = $this->db->prepare("
                SELECT is_locked FROM system_locks ORDER BY lock_id DESC LIMIT 1
            ");
            $stmt->execute();
            $result = $stmt->fetchColumn();
            return $result ? (bool)$result : false;
        } catch (PDOException $e) {
            error_log("isSystemLocked: Database error - " . $e->getMessage());
            return false;
        }
    }



    private function approveUnlockRequest($requestId)
    {
        try {
            $this->db->beginTransaction();
            $stmt = $this->db->prepare("UPDATE unlock_requests SET status = 'approved' WHERE request_id = :request_id");
            $stmt->execute([':request_id' => $requestId]);
            $this->toggleSystemLock(false); // Unlock system
            $this->db->commit();
            error_log("approveUnlockRequest: Approved request $requestId");
        } catch (PDOException $e) {
            $this->db->rollBack();
            error_log("approveUnlockRequest: Database error - " . $e->getMessage());
        }
    }

    private function getDepartmentId($userId)
    {
        try {
            $stmt = $this->db->prepare("
                SELECT department_id 
                FROM department_instructors 
                WHERE user_id = :user_id AND is_current = 1
            ");
            $stmt->execute([':user_id' => $userId]);
            $department = $stmt->fetch(PDO::FETCH_ASSOC);
            return $department ? $department['department_id'] : null;
        } catch (PDOException $e) {
            error_log("getDepartmentId: " . $e->getMessage());
            return null;
        }
    }

    private function getCurrentSemester()
    {
        try {
            $semesterData = $this->api->getCurrentSemester();
            return is_array($semesterData) && isset($semesterData['semester_id'], $semesterData['semester_name'], $semesterData['academic_year'])
                ? $semesterData
                : null;
        } catch (Exception $e) {
            error_log("getCurrentSemester: " . $e->getMessage());
            return null;
        }
    }

    private function getPendingApprovalsCount($departmentId)
    {
        try {
            $stmt = $this->db->prepare("
                SELECT COUNT(*) as pending_count
                FROM curriculum_approvals ca
                JOIN curricula c ON ca.curriculum_id = c.curriculum_id
                WHERE c.department_id = :department_id AND ca.status = 'pending'
            ");
            $stmt->execute([':department_id' => $departmentId]);
            return $stmt->fetchColumn() ?: 0;
        } catch (PDOException $e) {
            error_log("getPendingApprovalsCount: " . $e->getMessage());
            return 0;
        }
    }

    private function getScheduleDeadline($departmentId)
    {
        try {
            $stmt = $this->db->prepare("
                SELECT deadline 
                FROM schedule_deadlines 
                WHERE department_id = :department_id 
                ORDER BY deadline DESC LIMIT 1
            ");
            $stmt->execute([':department_id' => $departmentId]);
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            error_log("getScheduleDeadline: " . $e->getMessage());
            return null;
        }
    }

    private function getFacultyId($userId)
    {
        try {
            $stmt = $this->db->prepare("SELECT faculty_id FROM faculty WHERE user_id = :user_id");
            $stmt->execute([':user_id' => $userId]);
            $faculty = $stmt->fetch(PDO::FETCH_ASSOC);
            return $faculty ? $faculty['faculty_id'] : null;
        } catch (PDOException $e) {
            error_log("getFacultyId: " . $e->getMessage());
            return null;
        }
    }

    private function getSchedules($facultyId)
    {
        try {
            $stmt = $this->db->prepare("
                SELECT s.*, c.course_code, c.course_name, r.room_name, se.semester_name, se.academic_year
                FROM schedules s
                JOIN courses c ON s.course_id = c.course_id
                LEFT JOIN classrooms r ON s.room_id = r.room_id
                JOIN semesters se ON s.semester_id = se.semester_id
                WHERE s.faculty_id = :faculty_id AND se.is_current = 1
                ORDER BY s.day_of_week, s.start_time
            ");
            $stmt->execute([':faculty_id' => $facultyId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("getSchedules: " . $e->getMessage());
            return [];
        }
    }

    public function setScheduleDeadline()
    {
        try {
            $userData = $this->getUserData();
            if (!$userData) {
                error_log("setScheduleDeadline: Failed to load user data for user_id: " . $_SESSION['user_id']);
                header('Location: /login?error=User data not found');
                exit;
            }

            $stmt = $this->db->prepare("
                SELECT department_id FROM department_instructors 
                WHERE user_id = :user_id AND is_current = 1
            ");
            $stmt->execute([':user_id' => $_SESSION['user_id']]);
            $department = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$department) {
                error_log("setScheduleDeadline: No department found for user_id: " . $_SESSION['user_id']);
                header('Location: /login?error=Department not assigned');
                exit;
            }
            $departmentId = $department['department_id'];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $deadline = trim($_POST['deadline'] ?? '');
                if (!$deadline) {
                    error_log("setScheduleDeadline: Invalid deadline format");
                    $_SESSION['error'] = 'Please provide a valid deadline date and time.';
                    header('Location: /director/schedule-deadline');
                    exit;
                }

                $deadlineDate = DateTime::createFromFormat('Y-m-d H:i', $deadline);
                if (!$deadlineDate || $deadlineDate < new DateTime()) {
                    error_log("setScheduleDeadline: Deadline is invalid or in the past");
                    $_SESSION['error'] = 'Deadline must be a future date and time.';
                    header('Location: /director/schedule-deadline');
                    exit;
                }

                $stmt = $this->db->prepare("
                    INSERT INTO schedule_deadlines (department_id, deadline, created_at)
                    VALUES (:department_id, :deadline, NOW())
                    ON DUPLICATE KEY UPDATE deadline = :deadline, created_at = NOW()
                ");
                $stmt->execute([
                    ':department_id' => $departmentId,
                    ':deadline' => $deadlineDate->format('Y-m-d H:i:s')
                ]);

                error_log("setScheduleDeadline: Set deadline for department_id: $departmentId to " . $deadlineDate->format('Y-m-d H:i:s'));
                $_SESSION['success'] = 'Schedule deadline set successfully.';
                header('Location: /director/dashboard');
                exit;
            }

            $deadlineStmt = $this->db->prepare("
                SELECT deadline FROM schedule_deadlines 
                WHERE department_id = :department_id 
                ORDER BY deadline DESC LIMIT 1
            ");
            $deadlineStmt->execute([':department_id' => $departmentId]);
            $currentDeadline = $deadlineStmt->fetchColumn();

            $data = [
                'user' => $userData,
                'title' => 'Set Schedule Deadline',
                'current_deadline' => $currentDeadline ? date('Y-m-d H:i:s', strtotime($currentDeadline)) : null
            ];

            require_once __DIR__ . '/../views/director/schedule_deadline.php';
        } catch (PDOException $e) {
            error_log("setScheduleDeadline: Database error - " . $e->getMessage());
            header('Location: /error?message=Database error');
            exit;
        }
    }

    public function monitor()
    {
        try {
            $userData = $this->getUserData();
            if (!$userData) {
                error_log("monitor: Failed to load user data for user_id: " . $_SESSION['user_id']);
                header('Location: /login?error=User data not found');
                exit;
            }

            $stmt = $this->db->prepare("
                SELECT department_id FROM department_instructors 
                WHERE user_id = :user_id AND is_current = 1
            ");
            $stmt->execute([':user_id' => $_SESSION['user_id']]);
            $department = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$department) {
                error_log("monitor: No department found for user_id: " . $_SESSION['user_id']);
                header('Location: /login?error=Department not assigned');
                exit;
            }
            $departmentId = $department['department_id'];

            $activityStmt = $this->db->prepare("
                SELECT al.log_id, al.action_type, al.action_description, al.created_at, u.first_name, u.last_name
                FROM activity_logs al
                JOIN users u ON al.user_id = u.user_id
                WHERE al.department_id = :department_id
                ORDER BY al.created_at DESC
            ");
            $activityStmt->execute([':department_id' => $departmentId]);
            $activities = $activityStmt->fetchAll(PDO::FETCH_ASSOC);

            $data = [
                'user' => $userData,
                'activities' => $activities,
                'title' => 'Activity Monitor'
            ];

            require_once __DIR__ . '/../views/director/monitor.php';
        } catch (PDOException $e) {
            error_log("monitor: Database error - " . $e->getMessage());
            header('Location: /error?message=Database error');
            exit;
        }
    }

    public function profile()
    {
        try {
            if (!$this->authService->isLoggedIn()) {
                $_SESSION['flash'] = ['type' => 'error', 'message' => 'Please log in to view your profile'];
                header('Location: /login');
                exit;
            }

            $userId = $_SESSION['user_id'];
            $csrfToken = $this->authService->generateCsrfToken();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                error_log("profile: Received POST data - " . print_r($_POST, true));
                if (!$this->authService->verifyCsrfToken($_POST['csrf_token'] ?? '')) {
                    $_SESSION['flash'] = ['type' => 'error', 'message' => 'Invalid CSRF token'];
                    header('Location: /director/profile');
                    exit;
                }

                $data = [
                    'email' => trim($_POST['email'] ?? ''),
                    'phone' => trim($_POST['phone'] ?? ''),
                    'first_name' => trim($_POST['first_name'] ?? ''),
                    'middle_name' => trim($_POST['middle_name'] ?? ''),
                    'last_name' => trim($_POST['last_name'] ?? ''),
                    'suffix' => trim($_POST['suffix'] ?? ''),
                    'title' => trim($_POST['title'] ?? ''),
                    'academic_rank' => trim($_POST['academic_rank'] ?? ''),
                    'employment_type' => trim($_POST['employment_type'] ?? ''),
                    'classification' => trim($_POST['classification'] ?? ''),
                    'expertise_level' => trim($_POST['expertise_level'] ?? 'Intermediate'),
                ];

                $errors = [];
                if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors[] = 'Valid email is required.';
                }
                if (empty($data['first_name'])) $errors[] = 'First name is required.';
                if (empty($data['last_name'])) $errors[] = 'Last name is required.';
                if (!empty($data['phone']) && !preg_match('/^\d{10,12}$/', $data['phone'])) {
                    $errors[] = 'Phone number must be 10-12 digits.';
                }

                $profilePicture = null;
                if (!empty($_FILES['profile_picture']['name'])) {
                    $profilePicture = $this->handleProfilePictureUpload($userId);
                    if (is_string($profilePicture) && strpos($profilePicture, 'Error') === 0) {
                        $errors[] = $profilePicture;
                    } else {
                        $data['profile_picture'] = $profilePicture;
                    }
                }

                if (empty($errors)) {
                    $this->db->beginTransaction();

                    try {
                        $setClause = [];
                        $params = [':user_id' => $userId];
                        $validFields = ['email', 'phone', 'first_name', 'middle_name', 'last_name', 'suffix', 'title'];
                        foreach ($validFields as $field) {
                            if (isset($data[$field]) && $data[$field] !== '' && $data[$field] !== null) {
                                $setClause[] = "`$field` = :$field";
                                $params[":$field"] = $data[$field];
                            }
                        }

                        if (isset($data['profile_picture'])) {
                            $setClause[] = "`profile_picture` = :profile_picture";
                            $params[':profile_picture'] = $data['profile_picture'];
                        }

                        if (!empty($setClause)) {
                            $userStmt = $this->db->prepare("UPDATE users SET " . implode(', ', $setClause) . ", updated_at = NOW() WHERE user_id = :user_id");
                            error_log("profile: Users query - " . $userStmt->queryString . ", Params: " . print_r($params, true));
                            $userStmt->execute($params);
                        }

                        $facultyStmt = $this->db->prepare("SELECT faculty_id FROM faculty WHERE user_id = :user_id");
                        $facultyStmt->execute([':user_id' => $userId]);
                        $facultyId = $facultyStmt->fetchColumn();

                        if ($facultyId) {
                            $facultyParams = [':faculty_id' => $facultyId];
                            $facultySetClause = [];
                            $facultyFields = ['academic_rank', 'employment_type', 'classification'];
                            foreach ($facultyFields as $field) {
                                if (isset($data[$field]) && $data[$field] !== '' && $data[$field] !== null) {
                                    $facultySetClause[] = "$field = :$field";
                                    $facultyParams[":$field"] = $data[$field];
                                }
                            }

                            if (!empty($facultySetClause)) {
                                $updateFacultyStmt = $this->db->prepare("UPDATE faculty SET " . implode(', ', $facultySetClause) . ", updated_at = NOW() WHERE faculty_id = :faculty_id");
                                error_log("profile: Faculty query - " . $updateFacultyStmt->queryString . ", Params: " . print_r($facultyParams, true));
                                $updateFacultyStmt->execute($facultyParams);
                            }
                        }

                        $courseSpecialization = trim($_POST['course_specialization'] ?? '');
                        if ($courseSpecialization) {
                            $courseStmt = $this->db->prepare("SELECT course_id FROM courses WHERE course_name = :course_name");
                            $courseStmt->execute([':course_name' => $courseSpecialization]);
                            $courseId = $courseStmt->fetchColumn();

                            if ($courseId) {
                                $specCheckStmt = $this->db->prepare("
                                    SELECT specialization_id FROM specializations 
                                    WHERE faculty_id = :faculty_id AND course_id = :course_id
                                ");
                                $specCheckStmt->execute([':faculty_id' => $facultyId, ':course_id' => $courseId]);
                                $specializationId = $specCheckStmt->fetchColumn();

                                if ($specializationId) {
                                    $updateSpecStmt = $this->db->prepare("
                                        UPDATE specializations 
                                        SET expertise_level = :expertise_level, is_primary_specialization = 1
                                        WHERE specialization_id = :specialization_id
                                    ");
                                    $updateSpecStmt->execute([':expertise_level' => $data['expertise_level'], ':specialization_id' => $specializationId]);
                                } else {
                                    $insertSpecStmt = $this->db->prepare("
                                        INSERT INTO specializations (faculty_id, course_id, expertise_level, is_primary_specialization)
                                        VALUES (:faculty_id, :course_id, :expertise_level, 1)
                                    ");
                                    $insertSpecStmt->execute([':faculty_id' => $facultyId, ':course_id' => $courseId, ':expertise_level' => $data['expertise_level']]);
                                }

                                $resetStmt = $this->db->prepare("
                                    UPDATE specializations 
                                    SET is_primary_specialization = 0 
                                    WHERE faculty_id = :faculty_id AND specialization_id != LAST_INSERT_ID()
                                ");
                                $resetStmt->execute([':faculty_id' => $facultyId]);
                            }
                        }

                        $this->db->commit();

                        $_SESSION['first_name'] = $data['first_name'];
                        $_SESSION['email'] = $data['email'];
                        if (isset($data['profile_picture'])) {
                            $_SESSION['profile_picture'] = $data['profile_picture'];
                        }
                        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Profile updated successfully'];
                    } catch (PDOException $e) {
                        $this->db->rollBack();
                        error_log("profile: Database error - " . $e->getMessage());
                        $errors[] = 'Database error occurred. Please try again.';
                    }
                }

                if (!empty($errors)) {
                    $_SESSION['flash'] = ['type' => 'error', 'message' => implode('<br>', $errors)];
                }
                header('Location: /director/profile');
                exit;
            }

            $stmt = $this->db->prepare("
                SELECT u.*, d.department_name, c.college_name, r.role_name,
                       f.academic_rank, f.employment_type, f.classification,
                       (SELECT COUNT(*) FROM faculty f2 JOIN users fu ON f2.user_id = fu.user_id WHERE fu.department_id = u.department_id) as facultyCount,
                       (SELECT COUNT(*) FROM courses c2 WHERE c2.department_id = u.department_id AND c2.is_active = 1) as coursesCount,
                       (SELECT COUNT(*) FROM faculty_requests fr WHERE fr.department_id = u.department_id AND fr.status = 'pending') as pendingApplicantsCount,
                       (SELECT semester_name FROM semesters WHERE is_current = 1) as currentSemester,
                       (SELECT created_at FROM auth_logs WHERE user_id = u.user_id AND action = 'login_success' ORDER BY created_at DESC LIMIT 1) as lastLogin
                FROM users u
                LEFT JOIN departments d ON u.department_id = d.department_id
                LEFT JOIN colleges c ON u.college_id = c.college_id
                LEFT JOIN roles r ON u.role_id = r.role_id
                LEFT JOIN faculty f ON u.user_id = f.user_id
                WHERE u.user_id = :user_id
            ");
            $stmt->execute([':user_id' => $userId]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                throw new Exception('User not found.');
            }

            $specStmt = $this->db->prepare("
                SELECT s.*, c.course_name 
                FROM specializations s
                JOIN courses c ON s.course_id = c.course_id
                WHERE s.faculty_id = (SELECT faculty_id FROM faculty WHERE user_id = :user_id)
                ORDER BY c.course_name
            ");
            $specStmt->execute([':user_id' => $userId]);
            $specializations = $specStmt->fetchAll(PDO::FETCH_ASSOC);

            $facultyCount = $user['facultyCount'] ?? 0;
            $coursesCount = $user['coursesCount'] ?? 0;
            $pendingApplicantsCount = $user['pendingApplicantsCount'] ?? 0;
            $currentSemester = $user['currentSemester'] ?? '2nd';
            $lastLogin = $user['lastLogin'] ?? 'N/A';

            require_once __DIR__ . '/../views/director/profile.php';
        } catch (Exception $e) {
            if (isset($this->db) && $this->db->inTransaction()) {
                $this->db->rollBack();
            }
            error_log("profile: Error - " . $e->getMessage());
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Failed to load or update profile. Please try again.'];
            header('Location: /director/profile');
            exit;
        }
    }

    private function handleProfilePictureUpload($userId)
    {
        if (!isset($_FILES['profile_picture']) || $_FILES['profile_picture']['error'] == UPLOAD_ERR_NO_FILE) {
            error_log("profile: No file uploaded for user_id: $userId");
            return null;
        }

        $file = $_FILES['profile_picture'];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $maxSize = 2 * 1024 * 1024;

        if (!in_array($file['type'], $allowedTypes)) {
            error_log("profile: Invalid file type for user_id: $userId - " . $file['type']);
            return "Error: Only JPEG, PNG, and GIF files are allowed.";
        }

        if ($file['size'] > $maxSize) {
            error_log("profile: File size exceeds limit for user_id: $userId - " . $file['size']);
            return "Error: File size exceeds 2MB limit.";
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = "profile_{$userId}_" . time() . ".{$ext}";
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/profile_pictures/';
        $uploadPath = $uploadDir . $filename;

        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true)) {
                error_log("profile: Failed to create upload directory: $uploadDir");
                return "Error: Failed to create upload directory.";
            }
        }

        $stmt = $this->db->prepare("SELECT profile_picture FROM users WHERE user_id = :user_id");
        $stmt->execute([':user_id' => $userId]);
        $currentPicture = $stmt->fetchColumn();
        if ($currentPicture && file_exists($_SERVER['DOCUMENT_ROOT'] . $currentPicture)) {
            if (!unlink($_SERVER['DOCUMENT_ROOT'] . $currentPicture)) {
                error_log("profile: Failed to delete existing profile picture: $currentPicture");
            }
        }

        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            error_log("profile: Successfully uploaded file to $uploadPath for user_id: $userId");
            return "/uploads/profile_pictures/{$filename}";
        } else {
            error_log("profile: Failed to move uploaded file for user_id: $userId to $uploadPath - Check permissions or disk space");
            return "Error: Failed to upload file.";
        }
    }
}