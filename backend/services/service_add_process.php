<?php
require_once("../../assets/session.php");

if (isset($_POST['add'])) {
    $icon = $_POST['icon'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $_SESSION['icon'] = $icon;
    $_SESSION['icon1'] = $icon;
    $_SESSION['title'] = $title;
    $_SESSION['description'] = $description;

    if (empty($icon) || empty($title) || empty($description)) {
        $_SESSION['error'] = 'All fields are required.';
        header('location: service_add.php');
    } else {
        $sql = "INSERT INTO services (icon,	title,description) VALUES('$icon','$title','$description')";
        $query = mysqli_query($conn, $sql);
        unset($_SESSION['icon'], $_SESSION['icon1'], $_SESSION['title'], $_SESSION['description']);
        $_SESSION['success'] = 'Service added successfully.';
        header('location: service_view.php');
    }
} else {
    $_SESSION['error'] = 'Fill the form first.';
    header('location: service_add.php');
}
