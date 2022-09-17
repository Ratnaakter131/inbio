<?php
require_once("../../assets/session.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $check_sql = "SELECT * FROM clients WHERE status=1";
    $check_query = mysqli_query($conn, $check_sql);

    $sql = "SELECT * FROM clients WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    $client = mysqli_fetch_assoc($query);

    if ($client['status'] == 0) {
        if (mysqli_num_rows($check_query) < 12) {
            $update_sql = "UPDATE clients SET status=1 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Client activated successfully.';
                header('location: client_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: client_view.php");
            }
        } else {
            $_SESSION['error'] = 'Maximum activation limit reached.';
            header('location: client_view.php');
        }
    } else {
        if (mysqli_num_rows($check_query) > 4) {
            $update_sql = "UPDATE clients SET status=0 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Client deactivated successfully.';
                header('location: client_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: client_view.php");
            }
        } else {
            $_SESSION['error'] = 'Minimum one client required.';
            header('location: client_view.php');
        }
    }
} else {
    $_SESSION['error'] = 'Select a client first.';
    header('location: client_view.php');
}
