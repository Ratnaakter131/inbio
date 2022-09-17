<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM messages WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['delete'] = "Message deleted successfully";
        header("Location: messages.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: messages.php");
    }
} else {
    $_SESSION['error'] = 'Please select a messages first.';
    header('location: messages.php');
}
