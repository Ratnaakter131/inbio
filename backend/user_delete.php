<?php
require_once('../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user_sql = "SELECT * FROM users WHERE id='$id'";
    $user_query = mysqli_query($conn, $user_sql);
    $user = mysqli_fetch_assoc($user_query);
    if ($user['profile_pic'] != 'default.jpg') {
        $location = "../assets/dashboard/images/profile_pictures/" . $user['profile_pic'];
        unlink($location);
    }
    $sql = "DELETE FROM users WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['delete'] = "User permanently deleted Successfully";
        header('location: trash_users.php');
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header('location: trash_users.php');
    }
} else {
    $_SESSION['error'] = "Your are now allowed to delete user.";
    header('location: users.php');
}
