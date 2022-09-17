<?php
require_once("../../assets/session.php");

if (isset($_POST['edit'])) {
    $icon = $_POST['icon'];
    $link = $_POST['link'];
    $id = $_POST['id'];

    $sql = "SELECT * FROM social_medias WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $social_media = mysqli_fetch_assoc($query);

    if (empty($icon)) {
        $icon = $social_media['platform'];
    }
    if (empty($link)) {
        $link = $social_media['link'];
    }

    $sql = "UPDATE social_medias SET platform = '$icon', link = '$link' WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $_SESSION['success'] = 'Social Media updated successfully.';
    header('location: social_media_view.php');
} else {
    $_SESSION['error'] = 'Please select a social media to edit.';
    header('location: social_media_view.php');
}
