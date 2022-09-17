<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM experiences WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['delete'] = "experience deleted successfully";
        header("Location: experience_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: experience_view.php");
    }
} else {
    $_SESSION['error'] = 'Please select a experience first.';
    header('location: experience_view.php');
}
