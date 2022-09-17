<?php
require_once("../../assets/session.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $check_sql = "SELECT * FROM testimonials WHERE status=1";
    $check_query = mysqli_query($conn, $check_sql);

    $sql = "SELECT * FROM testimonials WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    $client = mysqli_fetch_assoc($query);

    if ($client['status'] == 0) {
        if (mysqli_num_rows($check_query) < 4) {
            $update_sql = "UPDATE testimonials SET status=1 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Testimonial activated successfully.';
                header('location: testimonial_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: testimonial_view.php");
            }
        } else {
            $_SESSION['error'] = 'Maximum activation limit reached.';
            header('location: testimonial_view.php');
        }
    } else {
        if (mysqli_num_rows($check_query) > 1) {
            $update_sql = "UPDATE testimonials SET status=0 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Testimonial deactivated successfully.';
                header('location: testimonial_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: testimonial_view.php");
            }
        } else {
            $_SESSION['error'] = 'Minimum one testimonial required.';
            header('location: testimonial_view.php');
        }
    }
} else {
    $_SESSION['error'] = 'Select a testimonial first.';
    header('location: testimonial_view.php');
}
