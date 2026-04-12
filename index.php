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
    <title>UNS - Create Your Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="registration-container">
        <div class="left-panel">
            <div class="branding-content">
                <p class="welcome-text">WELCOME TO</p>
                <h1 class="main-title">UNIVERSITY<br>NOTICE SYSTEM</h1>
                <div class="logo-circle">
                    <span class="logo-text">UNS</span>
                </div>
                <p class="caption-text">"Never miss a beat. The official pulse of our <br> campus community."</p>
            </div>
        </div>

        <div class="right-panel">
            <div class="form-wrapper <?php echo isActiveForm('register', $activeForm); ?>">
                <h2 class="form-heading">Create Your Account</h2>
                <?php echo showError($errors['register']); ?>
                
                <form id="registrationForm" action="http://127.0.0.1:8000/register" method="POST">
                    <div class="input-group">
                        <label>Full Name</label>
                        <input type="text" name="fullname" placeholder="Enter your name" required>
                    </div>

                    <div class="input-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="example@stu.cmb.ac.lk" required>
                    </div>

                    <div class="input-group">
                        <label>Password</label>
                        <div class="password-box">
                            <input type="password" id="pass1" placeholder="x x x x x x x x" required>
                            <span class="toggle-icon" onclick="toggleVisibility('pass1')">👁️</span>
                        </div>
                    </div>

                
                    <div class="input-group">
                        <label>Re-Enter Password</label>
                        <div class="password-box">
                            <input type="password" id="pass2" placeholder="x x x x x x x x" required>
                            <span class="toggle-icon" onclick="toggleVisibility('pass2')">👁️</span>
                        </div>
                        <span id="passwordError" class="error-text"></span>
                    </div>


                    <div class="form-row">
                        <div class="input-group">
                            <label>Role</label>
                            <select id="roleSelect" name="role" required>
                                <option value="" disabled selected>Select Role</option>
                                <option value="student">Student</option>
                                <option value="batch_rep">Batch Rep</option>
                                <option value="lecturer">Lecturer</option>
                                <option value="instructor">Instructor</option>
                            </select>
                        </div>

                        <div class="input-group hidden" id="yearGroup">
                            <label>Year</label>
                            <select id="yearId" name="year_id">
                                <option value="" disabled selected>Select Year</option>
                                <option value="1">1st Year</option>
                                <option value="2">2nd Year</option>
                                <option value="3">3rd Year</option>
                                <option value="4">4th Year</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="submit-btn">SIGN UP</button>
                    <p class="login-redirect">
                         Already have an account? <a href="index2.php">Login here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

   
</body>
</html>