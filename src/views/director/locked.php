<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Locked - Director Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
        }
        .locked-container {
            max-width: 500px;
            margin: 2rem auto;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .lock-icon {
            font-size: 4rem;
            color: #ef4444;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="locked-container">
        <i class="fas fa-lock lock-icon"></i>
        <h1 class="text-2xl font-bold text-gray-900 mb-4">System Locked</h1>
        <p class="text-gray-600 mb-6">The scheduling system is currently locked. As Director, you can unlock it to allow access for Chairs, Deans, and Faculty.</p>
        <form method="POST" class="mb-6">
            <input type="hidden" name="action" value="toggle_lock">
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                <i class="fas fa-unlock mr-2"></i> Unlock System
            </button>
        </form>
        <p class="text-sm text-gray-500">Pending unlock requests will be visible after unlocking.</p>
    </div>
</body>
</html>