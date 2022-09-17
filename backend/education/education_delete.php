<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM educations WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['delete'] = "Education deleted successfully";
        header("Location: education_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: education_view.php");
    }
} else {
    $_SESSION['error'] = 'Please select a education first.';
    header('location: education_view.php');
}
