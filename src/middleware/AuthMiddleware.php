<?php

class AuthMiddleware
{
    private static $roleMap = [
        'admin' => 1,
        'vpaa' => 2,
        'di' => 3,
        'dean' => 4,
        'chair' => 5,
        'faculty' => 6
    ];

    public static function handle($requiredRole = null)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            error_log("AuthMiddleware: No user session, redirecting to /login");
            header('Location: /login');
            exit;
        }

        if ($requiredRole) {
            $requiredRoleId = is_numeric($requiredRole) ?
                (int)$requiredRole : (self::$roleMap[strtolower($requiredRole)] ?? null);

            if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] !== $requiredRoleId) {
                error_log("AuthMiddleware: Role mismatch, expected $requiredRoleId, got " . ($_SESSION['role_id'] ?? 'none'));
                http_response_code(403);
                include __DIR__ . '/../views/errors/403.php';
                exit;
            }
        }

        // Global lock check for Chair, Dean, Faculty
        $userRoleId = $_SESSION['role_id'] ?? null;
        if (in_array($userRoleId, [4, 5, 6])) { // Dean, Chair, Faculty
            require_once __DIR__ . '/../services/LockServices.php';
            $lockService = new LockService();
            if ($lockService->isSystemLocked()) {
                error_log("AuthMiddleware: Access denied due to system lock for role_id: $userRoleId");
                $rolePath = self::getRolePath($userRoleId);
                include __DIR__ . '/../views/' . $rolePath . '/locked.php';
                exit;
            }
        }

        error_log("AuthMiddleware: Access granted for role " . ($_SESSION['role_id'] ?? 'unknown'));
    }

    private static function getRolePath($roleId)
    {
        switch ($roleId) {
            case 4: return 'dean';
            case 5: return 'chair';
            case 6: return 'faculty';
            default: return 'errors';
        }
    }
}