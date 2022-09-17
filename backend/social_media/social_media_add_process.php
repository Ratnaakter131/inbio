<?php
require_once("../../assets/session.php");

if (isset($_POST['add'])) {
    $icon = $_POST['icon'];
    $link = $_POST['link'];
    $_SESSION['icon'] = $icon;
    $_SESSION['icon1'] = $icon;
    $_SESSION['link'] = $link;

    if (empty($icon) || empty($link)) {
        $_SESSION['error'] = 'Both fields are required.';
        header('location: social_media_add.php');
    } else {
        $sql = "INSERT INTO social_medias(platform,	link) VALUES('$icon','$link')";
        $query = mysqli_query($conn, $sql);
        unset($_SESSION['icon'], $_SESSION['icon1'], $_SESSION['link']);
        $_SESSION['success'] = 'Social Media added successfully.';
        header('location: social_media_view.php');
    }
} else {
    $_SESSION['error'] = 'Fill the form first.';
    header('location: social_media_add.php');
}
