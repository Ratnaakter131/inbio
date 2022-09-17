<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select_sql = "SELECT * FROM portfolios WHERE id = $id";
    $select_query = mysqli_query($conn, $select_sql);
    $portfolio = mysqli_fetch_assoc($select_query);
    $location = "../../assets/frontend/images/portfolio/" . $portfolio['image'];
    if (file_exists($location)) {
        unlink($location);
    }
    $delete_sql = "DELETE FROM portfolios WHERE id = $id";
    if (mysqli_query($conn, $delete_sql)) {
        $_SESSION['delete'] = "Portfolio deleted successfully";
        header("Location: portfolio_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: portfolio_view.php");
    }
} else {
    $_SESSION['error'] = 'Please select a Portfolio first.';
    header('location: portfolio_view.php');
}
