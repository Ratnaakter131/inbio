<?php
require_once("../../assets/session.php");

if (isset($_POST['edit'])) {
    $icon = $_POST['icon'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $id = $_POST['id'];

    $sql = "SELECT * FROM services WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $service = mysqli_fetch_assoc($query);

    if (empty($icon)) {
        $icon = $service['icon'];
    }
    if (empty($title)) {
        $title = $service['title'];
    }
    if (empty($description)) {
        $description = $service['description'];
    }

    $sql = "UPDATE services SET icon = '$icon', title = '$title', description = '$description' WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $_SESSION['success'] = 'Service updated successfully.';
    header('location: service_view.php');
} else {
    $_SESSION['error'] = 'Please select a service to edit.';
    header('location: service_view.php');
}
