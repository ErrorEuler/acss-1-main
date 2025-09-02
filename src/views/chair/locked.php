<?php
// PHP session start would typically be at the top of your file
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Locked</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --accent: #f59e0b;
            --accent-dark: #d97706;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f0f4ff 0%, #e6e6ff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        
        .locked-container {
            max-width: 500px;
            width: 100%;
            margin: 2rem auto;
            padding: 2.5rem;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 
                0 10px 25px -5px rgba(79, 70, 229, 0.1),
                0 8px 10px -6px rgba(79, 70, 229, 0.1),
                inset 0 0 0 1px rgba(255, 255, 255, 0.5);
            text-align: center;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
            animation: containerFadeIn 0.8s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }
        
        .locked-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(79, 70, 229, 0.03), transparent);
            animation: shimmer 8s infinite linear;
            z-index: 0;
            pointer-events: none;
        }
        
        .lock-icon-wrapper {
            position: relative;
            width: 100px;
            height: 100px;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .lock-icon {
            font-size: 3.5rem;
            color: var(--primary);
            z-index: 2;
            position: relative;
            animation: lockPulse 2s infinite ease-in-out;
        }
        
        .lock-icon-circle {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: rgba(79, 70, 229, 0.1);
            z-index: 1;
            animation: circlePulse 2s infinite ease-in-out;
        }
        
        h1 {
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1rem;
            position: relative;
            font-size: 1.875rem;
        }
        
        p {
            color: #6b7280;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        
        textarea {
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 1rem;
            width: 100%;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }
        
        textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }
        
        button {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.3), 0 2px 4px -1px rgba(79, 70, 229, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.4), 0 4px 6px -2px rgba(79, 70, 229, 0.1);
        }
        
        button:hover::before {
            left: 100%;
        }
        
        button:active {
            transform: translateY(0);
        }
        
        .request-sent {
            display: none;
            color: var(--primary);
            font-weight: 500;
            margin-top: 1rem;
            animation: fadeIn 0.5s ease-out;
        }
        
        /* Animations */
        @keyframes containerFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes lockPulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }
        
        @keyframes circlePulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.2);
                opacity: 0.7;
            }
        }
        
        @keyframes shimmer {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Responsive adjustments */
        @media (max-width: 640px) {
            .locked-container {
                padding: 1.5rem;
                margin: 1rem;
            }
            
            .lock-icon-wrapper {
                width: 80px;
                height: 80px;
            }
            
            .lock-icon {
                font-size: 2.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="locked-container">
        <div class="lock-icon-wrapper">
            <div class="lock-icon-circle"></div>
            <i class="fas fa-lock lock-icon"></i>
        </div>
        
        <h1 class="text-2xl font-bold">System Locked</h1>
        <p class="text-gray-600">The system is currently locked by the D.I. Please request access to continue.</p>
        
        <form id="unlockForm" action="/chair/request_unlock" method="POST" class="mb-6">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? ''); ?>">
            <textarea name="message" placeholder="Optional message (e.g., reason for request)" class="w-full p-2 border border-gray-300 rounded mb-4" rows="3"></textarea>
            <button type="submit" class="px-6 py-3 rounded-lg font-semibold transition-colors">
                <i class="fas fa-unlock mr-2"></i> Request Access
            </button>
        </form>
        
        <div id="requestSent" class="request-sent">
            <i class="fas fa-check-circle mr-2"></i> Your request has been sent!
        </div>
    </div>

    <script>
        document.getElementById('unlockForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // In a real application, you would submit the form to the server
            // For demonstration, we'll just show the success message
            
            const button = this.querySelector('button');
            const originalText = button.innerHTML;
            
            // Show loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Processing...';
            button.disabled = true;
            
            // Simulate request delay
            setTimeout(() => {
                // Show success message
                document.getElementById('requestSent').style.display = 'block';
                
                // Reset button
                button.innerHTML = originalText;
                button.disabled = false;
                
                // Optional: Hide the form
                // this.style.display = 'none';
            }, 1500);
        });
    </script>
</body>
</html>