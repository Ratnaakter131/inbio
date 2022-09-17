<?php
require_once("../../assets/session.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $check_sql = "SELECT * FROM portfolios WHERE status=1";
    $check_query = mysqli_query($conn, $check_sql);

    $sql = "SELECT * FROM portfolios WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    $client = mysqli_fetch_assoc($query);

    if ($client['status'] == 0) {
        if (mysqli_num_rows($check_query) < 6) {
            $update_sql = "UPDATE portfolios SET status=1 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Portfolio activated successfully.';
                header('location: portfolio_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: portfolio_view.php");
            }
        } else {
            $_SESSION['error'] = 'Maximum activation limit reached.';
            header('location: portfolio_view.php');
        }
    } else {
        if (mysqli_num_rows($check_query) > 1) {
            $update_sql = "UPDATE portfolios SET status=0 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Portfolio deactivated successfully.';
                header('location: portfolio_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: portfolio_view.php");
            }
        } else {
            $_SESSION['error'] = 'Minimum one Portfolio required.';
            header('location: portfolio_view.php');
        }
    }
} else {
    $_SESSION['error'] = 'Select a Portfolio first.';
    header('location: portfolio_view.php');
}
