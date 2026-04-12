<?php
session_start();

// This grabs errors from the session and then clears them so they don't stay forever
$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];

// This remembers which form was open (useful if you have both on one page)
$activeForm = $_SESSION['active_form'] ?? 'login';

// Clear the session data after saving them to variables
session_unset();

// Helper function to display the error message in Red
function showError($error) {
    return !empty($error) ? "<p class='error-message' style='color:red; font-size:0.8rem;'>$error</p>" : "";
}

// Helper function to keep a form 'active' or visible
function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNS - User Login</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>

    <div class="login-card <?php echo isActiveForm('login', $activeForm); ?>">
        <h1 class="main-title">USER LOGIN</h1>
        <?php echo showError($errors['login']); ?>

        <div class="tab-container">
            <button id="studentTab" class="tab-btn active" onclick="showForm('student')">Student</button>
            <button id="adminTab" class="tab-btn" onclick="showForm('admin')">Admin</button>
        </div>

        <div id="studentForm" class="form-container active">
            <form action="/student-login" method="POST">
                <div class="input-group">
                    <span class="icon">👤</span> <input type="text" name="username" placeholder="Student Username" required>
                </div>
                <div class="input-group">
                    <span class="icon">🔒</span>
                    <input type="password" name="password" placeholder="Student Password" required>
                </div>
                
                <div class="form-footer">
                    <a href="/forgot-password" class="footer-link">Forgot Password?</a>
                    <a href="index.php" class="footer-link">Register</a>
                </div>
                
                 <div class="button-wrapper">
                   <button type="submit" class="login-btn" name="loginForm">LOGIN</button>
               </div>
            </form>
        </div>

        <div id="adminForm" class="form-container">
            <form action="/admin-login" method="POST">
                <div class="input-group">
                    <span class="icon">👤</span>
                    <input type="text" name="username" placeholder="Admin Username" required>
                </div>
                <div class="input-group">
                    <span class="icon">🔒</span>
                    <input type="password" name="password" placeholder="Admin Password" required>
                </div>
                
                <div class="form-footer">
                    <a href="/forgot-password" class="footer-link">Forgot Password?</a>
                    <a href="index.php" class="footer-link">Register</a>
                    </div>
                
                <div class="button-wrapper">
                   <button type="submit" class="login-btn" name="loginForm">LOGIN</button>
               </div>
            </form>
        </div>

    </div>

    
        
</body>
</html>