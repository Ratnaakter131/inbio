<?php
session_start();
require_once(__DIR__ . "/functions.php");
require_once(__DIR__ . "/db.php");
if (!isset($_SESSION['admin'])) {
    $_SESSION['error'] = "Your now authorized.";
    header('location:' . url() . 'login.php');
    die();
} else {
    $id = $_SESSION['admin'];
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);
    $admin = mysqli_fetch_assoc($query);
}
