<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_sql = "DELETE FROM portfolio_categories WHERE id = $id";
    if (mysqli_query($conn, $delete_sql)) {
        $_SESSION['delete'] = "Portfolio Category deleted successfully";
        header("Location: portfolio_category.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: portfolio_category.php");
    }
} else {
    $_SESSION['error'] = 'Please select a Portfolio Category first.';
    header('location: portfolio_category.php');
}
