<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "user_db";

$conn = new mysqli($host, $user, $password, $database);

if ($conn -> connect_errno) {
    die("Connection failed: " . $conn -> connect_errno);

}

?>