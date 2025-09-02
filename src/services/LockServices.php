<?php
require_once __DIR__ . '/../config/Database.php';

class LockService
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->connect();
        if ($this->db === null) {
            error_log("Failed to connect to the database in LockService");
            die("Database connection failed. Please try again later.");
        }
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function isSystemLocked()
    {
        try {
            $stmt = $this->db->prepare("SELECT is_locked FROM system_locks ORDER BY lock_id DESC LIMIT 1");
            $stmt->execute();
            $result = $stmt->fetchColumn();
            return $result ? (bool)$result : false;
        } catch (PDOException $e) {
            error_log("isSystemLocked: Database error - " . $e->getMessage());
            return false;
        }
    }

    public function toggleSystemLock($lock)
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
            $params = [
                ':is_locked' => $lock ? 1 : 0,
                ':locked_by' => (int)$userId
            ];
            $stmt->execute($params);
            error_log("toggleSystemLock: System lock set to " . ($lock ? 'locked' : 'unlocked') . " by user_id: $userId");
        } catch (PDOException $e) {
            error_log("toggleSystemLock: Database error - " . $e->getMessage());
        }
    }

    public function getUnlockRequests()
    {
        try {
            $stmt = $this->db->prepare("
                SELECT r.request_id, u.first_name, u.last_name, r.created_at, r.message
                FROM unlock_requests r
                JOIN users u ON r.user_id = u.user_id
                WHERE r.status = 'pending'
            ");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("getUnlockRequests: Database error - " . $e->getMessage());
            return [];
        }
    }

    public function approveUnlockRequest($requestId)
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

    public function submitUnlockRequest($userId, $message)
    {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO unlock_requests (user_id, message, status, created_at)
                VALUES (:user_id, :message, 'pending', NOW())
            ");
            $stmt->execute([
                ':user_id' => $userId,
                ':message' => $message
            ]);
            error_log("submitUnlockRequest: Unlock request submitted by user_id: $userId with message: $message");
        } catch (PDOException $e) {
            error_log("submitUnlockRequest: Database error - " . $e->getMessage());
        }
    }
}