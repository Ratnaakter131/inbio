<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM services WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['delete'] = "Service deleted successfully";
        header("Location: service_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: service_view.php");
    }
} else {
    $_SESSION['error'] = 'Please select a content first.';
    header('location: service_view.php');
}
