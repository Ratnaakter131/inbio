<?php
require_once("../../assets/session.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $check_sql = "SELECT * FROM educations WHERE status=1";
    $check_query = mysqli_query($conn, $check_sql);

    $sql = "SELECT * FROM educations WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    $education = mysqli_fetch_assoc($query);

    if ($education['status'] == 0) {
        if (mysqli_num_rows($check_query) < 3) {
            $update_sql = "UPDATE educations SET status=1 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'education activated successfully.';
                header('location: education_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: education_view.php");
            }
        } else {
            $_SESSION['error'] = 'Maximum activation limit reached.';
            header('location: education_view.php');
        }
    } else {
        if (mysqli_num_rows($check_query) > 1) {
            $update_sql = "UPDATE educations SET status=0 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Education deactivated successfully.';
                header('location: education_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: education_view.php");
            }
        } else {
            $_SESSION['error'] = 'Minimum one education required.';
            header('location: education_view.php');
        }
    }
} else {
    $_SESSION['error'] = 'Select a education first.';
    header('location: education_view.php');
}
