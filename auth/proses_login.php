<?php
session_start();
include '../config/db.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $_SESSION['login'] = true;
    header("Location: ../backend/dashboard.php");
} else {
    $_SESSION['error'] = "Username atau password salah!";
    header("Location: ../backend/login.php");
}