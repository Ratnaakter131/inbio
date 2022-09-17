<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM comments WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['delete'] = "Comment deleted successfully";
        header("Location: comments.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: comments.php");
    }
} else {
    $_SESSION['error'] = 'Please select a comment first.';
    header('location: comments.php');
}
