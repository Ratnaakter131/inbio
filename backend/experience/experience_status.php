<?php
require_once("../../assets/session.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $check_sql = "SELECT * FROM experiences WHERE status=1";
    $check_query = mysqli_query($conn, $check_sql);

    $sql = "SELECT * FROM experiences WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    $experience = mysqli_fetch_assoc($query);

    if ($experience['status'] == 0) {
        if (mysqli_num_rows($check_query) < 3) {
            $update_sql = "UPDATE experiences SET status=1 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Experience activated successfully.';
                header('location: experience_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: experience_view.php");
            }
        } else {
            $_SESSION['error'] = 'Maximum activation limit reached.';
            header('location: experience_view.php');
        }
    } else {
        if (mysqli_num_rows($check_query) > 1) {
            $update_sql = "UPDATE experiences SET status=0 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Experience deactivated successfully.';
                header('location: experience_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: experience_view.php");
            }
        } else {
            $_SESSION['error'] = 'Minimum one experience required.';
            header('location: experience_view.php');
        }
    }
} else {
    $_SESSION['error'] = 'Select a experience first.';
    header('location: experience_view.php');
}
