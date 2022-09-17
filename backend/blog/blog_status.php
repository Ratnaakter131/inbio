<?php
require_once("../../assets/session.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $check_sql = "SELECT * FROM blogs WHERE status=1";
    $check_query = mysqli_query($conn, $check_sql);

    $sql = "SELECT * FROM blogs WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    $blog = mysqli_fetch_assoc($query);

    if ($blog['status'] == 0) {
        if (mysqli_num_rows($check_query) < 4) {
            $update_sql = "UPDATE blogs SET status=1 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Blog activated successfully.';
                header('location: blog_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: blog_view.php");
            }
        } else {
            $_SESSION['error'] = 'Maximum activation limit reached.';
            header('location: blog_view.php');
        }
    } else {
        if (mysqli_num_rows($check_query) > 1) {
            $update_sql = "UPDATE blogs SET status=0 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Blog deactivated successfully.';
                header('location: blog_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: blog_view.php");
            }
        } else {
            $_SESSION['error'] = 'Minimum one blog required.';
            header('location: blog_view.php');
        }
    }
} else {
    $_SESSION['error'] = 'Select a blog first.';
    header('location: blog_view.php');
}
