<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM social_medias WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['delete'] = "Social Media deleted successfully";
        header("Location: social_media_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: social_media_view.php");
    }
} else {
    $_SESSION['error'] = 'Please select a content first.';
    header('location: social_media_view.php');
}
