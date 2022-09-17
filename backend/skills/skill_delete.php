<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM skills WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['delete'] = "Skill deleted successfully";
        header("Location: skill_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: skill_view.php");
    }
} else {
    $_SESSION['error'] = 'Please select a skill first.';
    header('location: skill_view.php');
}
