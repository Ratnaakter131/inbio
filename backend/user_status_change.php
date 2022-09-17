<?php
require_once('../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $check_sql = "SELECT * FROM users WHERE id='$id'";
    $query = mysqli_query($conn, $check_sql);
    $user = mysqli_fetch_assoc($query);

    if ($user['status'] == 0) {
        $sql = "UPDATE users SET status=1 WHERE id='$id'";
    } else {
        $sql = "UPDATE users SET status=0 WHERE id='$id'";
    }
    if (mysqli_query($conn, $sql)) {
        if ($user['status'] == 0) {
            $_SESSION['delete'] = "User Trushed Successfully";
        } else {
            $_SESSION['success'] = "User Restored Successfully";
        }
        header('location: users.php');
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header('location: users.php');
    }
} else {
    $_SESSION['error'] = "Your are now allowed to delete user.";
    header('location: users.php');
}
