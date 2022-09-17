<?php
require_once("../../assets/session.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $check_sql = "SELECT * FROM services WHERE status=1";
    $check_query = mysqli_query($conn, $check_sql);

    $sql = "SELECT * FROM services WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    $service = mysqli_fetch_assoc($query);

    if ($service['status'] == 0) {
        if (mysqli_num_rows($check_query) < 6) {
            $update_sql = "UPDATE services SET status=1 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Service activated successfully.';
                header('location: service_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: service_view.php");
            }
        } else {
            $_SESSION['error'] = 'Maximum activation limit reached.';
            header('location: service_view.php');
        }
    } else {
        if (mysqli_num_rows($check_query) > 3) {
            $update_sql = "UPDATE services SET status=0 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Service deactivated successfully.';
                header('location: service_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: service_view.php");
            }
        } else {
            $_SESSION['error'] = 'Minimum three Service required.';
            header('location: service_view.php');
        }
    }
} else {
    $_SESSION['error'] = 'Select a Service first.';
    header('location: service_view.php');
}
