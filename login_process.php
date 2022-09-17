<?php
session_start();
require_once('assets/db.php');
$email = $_POST['email'];
$password = $_POST['password'];

$_SESSION['email'] = $email;
$_SESSION['password'] = $password;

if (empty($email)) {
    $_SESSION['email_error'] = "Please enter email.";
    header('location:login.php');
} else {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) > 0) {
        if (password_verify($password, $user['password'])) {
            unset($_SESSION['email'], $_SESSION['password']);
            $_SESSION['admin'] = $user['id'];
            $_SESSION['success'] = 'Login Successfull';
            header('location:backend/dashboard.php');
        } else {
            $_SESSION['password_error'] = "Password doesn't match.";
            header('location:login.php');
        }
    } else {
        $_SESSION['email_error'] = "Email not found on our records.";
        header('location:login.php');
    }
}
