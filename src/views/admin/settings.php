<?php
$pageTitle = "Admin Settings";
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary:rgb(184, 92, 12);
            --primary-dark:rgb(228, 171, 37);
            --accent: #f59e0b;
            --accent-dark: #d97706;
            --success: #10b981;
            --error: #ef4444;
            --info: #3b82f6;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            min-height: 100vh;
        }
        
        .settings-container {
            animation: fadeIn 0.6s ease-out forwards;
            opacity: 0;
        }
        
        .settings-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 
                0 10px 25px -5px rgba(0, 0, 0, 0.1),
                0 8px 10px -6px rgba(0, 0, 0, 0.1),
                inset 0 0 0 1px rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
            overflow: hidden;
        }
        
        .settings-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 1.5rem 2rem;
            position: relative;
        }
        
        .settings-header::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 0;
            width: 100%;
            height: 40px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            clip-path: polygon(0 0, 100% 0, 100% 20%, 0 100%);
            z-index: 0;
        }
        
        .profile-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            border: 3px solid rgba(255, 255, 255, 0.3);
            animation: pulse 2s infinite ease-in-out;
        }
        
        .form-section {
            padding: 2rem;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .form-section:last-child {
            border-bottom: none;
        }
        
        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .input-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #374151;
            transition: all 0.3s ease;
        }
        
        .input-field {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 12px;
            transition: all 0.3s ease;
            background: #f9fafb;
            font-size: 0.95rem;
        }
        
        .input-field:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
            background: white;
            transform: translateY(-2px);
        }
        
        .input-field:hover {
            border-color: #9ca3af;
        }
        
        select.input-field {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1rem;
        }
        
        .file-input {
            position: relative;
            overflow: hidden;
        }
        
        .file-input input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        
        .file-input-label {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            background: #f9fafb;
            border: 1px dashed #d1d5db;
            border-radius: 12px;
            color: #6b7280;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .file-input-label:hover {
            border-color: var(--primary);
            color: var(--primary);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.3), 0 2px 4px -1px rgba(79, 70, 229, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.4), 0 4px 6px -2px rgba(79, 70, 229, 0.1);
        }
        
        .btn-primary:hover::before {
            left: 100%;
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .alert {
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            animation: slideIn 0.5s ease-out forwards;
        }
        
        .alert-success {
            background-color: #ecfdf5;
            color: #065f46;
            border-left: 4px solid var(--success);
        }
        
        .alert-error {
            background-color: #fef2f2;
            color: #991b1b;
            border-left: 4px solid var(--error);
        }
        
        .alert-icon {
            margin-right: 0.75rem;
            font-size: 1.25rem;
        }
        
        .current-picture {
            display: inline-flex;
            align-items: center;
            margin-top: 0.5rem;
            padding: 0.5rem 1rem;
            background: #f3f4f6;
            border-radius: 8px;
            color: #4b5563;
            transition: all 0.3s ease;
        }
        
        .current-picture:hover {
            background: #e5e7eb;
            color: #374151;
        }
        
        /* Policy Reminder Styles */
        .policy-reminder {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border-left: 4px solid var(--info);
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 2rem;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.1), 0 2px 4px -1px rgba(59, 130, 246, 0.06);
        }
        
        .policy-reminder:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.2), 0 4px 6px -2px rgba(59, 130, 246, 0.1);
        }
        
        .policy-reminder.collapsed {
            max-height: 70px;
        }
        
        .policy-reminder.expanded {
            max-height: 500px;
        }
        
        .reminder-header {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        
        .reminder-icon {
            background: var(--info);
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
            flex-shrink: 0;
            animation: bounce 2s infinite;
        }
        
        .reminder-title {
            font-weight: 600;
            color:rgb(117, 97, 24);
            margin: 0;
        }
        
        .reminder-content {
            color: #374151;
            line-height: 1.6;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.4s ease;
        }
        
        .policy-reminder.expanded .reminder-content {
            opacity: 1;
            transform: translateY(0);
        }
        
        .reminder-toggle {
            position: absolute;
            top: 1rem;
            right: 1rem;
            color: #93c5fd;
            transition: all 0.3s ease;
        }
        
        .policy-reminder:hover .reminder-toggle {
            color: var(--info);
        }
        
        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 0 0 10px rgba(255, 255, 255, 0);
            }
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-5px);
            }
            60% {
                transform: translateY(-3px);
            }
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .settings-header {
                padding: 1.5rem 1rem;
            }
            
            .form-section {
                padding: 1.5rem 1rem;
            }
            
            .grid-cols-2 {
                grid-template-columns: 1fr;
            }
            
            .policy-reminder.collapsed {
                max-height: 90px;
            }
        }
    </style>
</head>
<body class="min-h-screen bg-gray-100">
    <!-- Main Content -->
    <div class="max-w-5xl mx-auto py-8 px-4 settings-container">
        <!-- Success/Error Messages -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle alert-icon"></i>
                <p><?php echo htmlspecialchars($_SESSION['success']);
                    unset($_SESSION['success']); ?></p>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error" role="alert">
                <i class="fas fa-exclamation-circle alert-icon"></i>
                <p><?php echo htmlspecialchars($_SESSION['error']);
                    unset($_SESSION['error']); ?></p>
            </div>
        <?php endif; ?>

        <div class="settings-card">
            <!-- Header with gradient background -->
            <div class="settings-header text-center">
                <div class="profile-icon mx-auto">
                    <i class="fas fa-user-cog text-3xl"></i>
                </div>
                <h1 class="text-2xl font-bold">Admin Profile Settings</h1>
                <p class="text-indigo-100 mt-2">Manage your account details and preferences</p>
            </div>

            <!-- Profile Update Form -->
            <div class="form-section">
                <!-- Policy Reminder -->
                <div class="policy-reminder collapsed" id="policyReminder">
                    <div class="reminder-header">
                        <div class="reminder-icon">
                            <i class="fas fa-info"></i>
                        </div>
                        <h3 class="reminder-title">Important Account Policy Reminder</h3>
                        <span class="reminder-toggle">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </div>
                    <div class="reminder-content">
                        <p class="mb-3">Our system operates on a <strong>single account policy</strong> to ensure optimal performance and prevent data overload. Each user maintains only one account to preserve system integrity and efficiency.</p>
                        <p class="mb-3">Your privacy and security are our top priorities. We employ robust encryption and security measures to protect your personal information. All data is securely stored and accessible only to authorized personnel.</p>
                        <p>Please keep your login credentials secure and update your password regularly. If you need assistance, contact our support team.</p>
                    </div>
                </div>

                <form action="/admin/update-profile" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="input-group">
                            <label for="first_name" class="input-label">First Name</label>
                            <input type="text" name="first_name" id="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required class="input-field">
                        </div>
                        <div class="input-group">
                            <label for="middle_name" class="input-label">Middle Name</label>
                            <input type="text" name="middle_name" id="middle_name" value="<?php echo htmlspecialchars($user['middle_name']); ?>" class="input-field">
                        </div>
                        <div class="input-group">
                            <label for="last_name" class="input-label">Last Name</label>
                            <input type="text" name="last_name" id="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required class="input-field">
                        </div>
                        <div class="input-group">
                            <label for="suffix" class="input-label">Suffix</label>
                            <input type="text" name="suffix" id="suffix" value="<?php echo htmlspecialchars($user['suffix']); ?>" class="input-field">
                        </div>
                        <div class="input-group">
                            <label for="email" class="input-label">Email</label>
                            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required class="input-field">
                        </div>
                        <div class="input-group">
                            <label for="phone" class="input-label">Phone</label>
                            <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" class="input-field">
                        </div>
                        <div class="input-group">
                            <label for="college_id" class="input-label">College</label>
                            <select name="college_id" id="college_id" class="input-field">
                                <option value="">Select College</option>
                                <?php foreach ($colleges as $college): ?>
                                    <option value="<?php echo $college['college_id']; ?>" <?php echo $college['college_id'] == $user['college_id'] ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($college['college_name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="department_id" class="input-label">Department</label>
                            <select name="department_id" id="department_id" class="input-field">
                                <option value="">Select Department</option>
                                <?php foreach ($departments as $department): ?>
                                    <option value="<?php echo $department['department_id']; ?>" <?php echo $department['department_id'] == $user['department_id'] ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($department['department_name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group col-span-1 md:col-span-2">
                            <label class="input-label">Profile Picture</label>
                            <div class="file-input">
                                <label class="file-input-label">
                                    <i class="fas fa-upload mr-2"></i>
                                    <span>Choose profile picture</span>
                                </label>
                                <input type="file" name="profile_picture" id="profile_picture" accept="image/*">
                            </div>
                            <?php if ($user['profile_picture']): ?>
                                <a href="/<?php echo htmlspecialchars($user['profile_picture']); ?>" target="_blank" class="current-picture">
                                    <i class="fas fa-image mr-2"></i> View current picture
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-save mr-2"></i> Update Profile
                        </button>
                    </div>
                </form>
            </div>

            <!-- Password Update Form -->
            <div class="form-section">
                <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                    <i class="fas fa-lock mr-3 text-indigo-500"></i> Change Password
                </h2>
                <form action="/admin/update-password" method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="input-group">
                            <label for="current_password" class="input-label">Current Password</label>
                            <input type="password" name="current_password" id="current_password" required class="input-field">
                        </div>
                        <div class="input-group">
                            <label for="new_password" class="input-label">New Password</label>
                            <input type="password" name="new_password" id="new_password" required class="input-field">
                        </div>
                        <div class="input-group">
                            <label for="confirm_password" class="input-label">Confirm New Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" required class="input-field">
                        </div>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-key mr-2"></i> Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Add animation to form elements when page loads
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.input-field');
            inputs.forEach((input, index) => {
                input.style.animationDelay = `${index * 0.05}s`;
                input.classList.add('animate-fade-in');
            });
            
            // Policy reminder functionality
            const policyReminder = document.getElementById('policyReminder');
            const toggleIcon = policyReminder.querySelector('.reminder-toggle i');
            
            policyReminder.addEventListener('click', function() {
                if (this.classList.contains('collapsed')) {
                    this.classList.remove('collapsed');
                    this.classList.add('expanded');
                    toggleIcon.classList.remove('fa-chevron-down');
                    toggleIcon.classList.add('fa-chevron-up');
                } else {
                    this.classList.remove('expanded');
                    this.classList.add('collapsed');
                    toggleIcon.classList.remove('fa-chevron-up');
                    toggleIcon.classList.add('fa-chevron-down');
                }
            });
        });
        
        // Enhance file input to show selected file name
        const fileInputs = document.querySelectorAll('input[type="file"]');
        fileInputs.forEach(input => {
            input.addEventListener('change', function(e) {
                const fileName = e.target.files[0]?.name || 'Choose file';
                const label = this.previousElementSibling.querySelector('span');
                if (label) {
                    label.textContent = fileName;
                }
            });
        });
    </script>
</body>
</html>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/layout.php';
?>