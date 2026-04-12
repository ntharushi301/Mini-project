<?php

session_start();
require_once 'config.php';

if (isset($_POST['registrationForm'])) {
   // Inside your Registration logic
   $name = $_POST['fullname']; // Make sure this matches your HTML input name
   $email = $_POST['email'];
   $pass = $_POST['password'];  
   $role = $_POST['role'];
   $year = ($role == 'Student') ? $_POST['year'] : NULL; // Only students have years

   $sql = "INSERT INTO users (name, email, password, role, year) 
        VALUES ('$name', '$email', '$pass', '$role', '$year')";

   if ($conn->query($sql) === TRUE) {
       header("Location: index.php?success=AccountCreated");
   } else {
       echo "Error: " . $conn->error;
   }
}
if (isset($_POST['loginForm'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $form_type = $_POST['login_type']; // 'student' or 'admin'

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if ($password == $user['password']) {
            // Check if the role matches the form type
            // Note: strtolower() helps compare 'Admin' vs 'admin'
            if (strtolower($user['role']) == $form_type) {
                $_SESSION['user'] = $user['name'];
                $_SESSION['role'] = $user['role'];
                
                // Redirect based on role
                if ($user['role'] == 'Admin') {
                    header("Location: admin_dashboard.php");
                } else {
                    header("Location: student_dashboard.php");
                }
            } else {
                echo "Access Denied: You are not registered as an $form_type.";
            }
        } else {
            echo "Invalid Password.";
        }
    } else {
        echo "User not found.";
    }
}
?>