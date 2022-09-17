<?php
require_once('../../assets/session.php');

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $sub_heading = $_POST['sub_heading'];
    $name = $_POST['name'];
    $title_1 = $_POST['title_1'];
    $title_2 = $_POST['title_2'];
    $title_3 = $_POST['title_3'];
    $description = $_POST['description'];

    $check_sql = "SELECT * FROM banner_contents WHERE id = '$id'";
    $check_query = mysqli_query($conn, $check_sql);
    $banner_content = mysqli_fetch_assoc($check_query);
    if (empty($sub_heading)) {
        $sub_heading = $banner_content['sub_heading'];
    }
    if (empty($name)) {
        $name = $banner_content['name'];
    }
    if (empty($title_1)) {
        $title_1 = $banner_content['title_1'];
    }
    if (empty($title_2)) {
        $title_2 = $banner_content['title_2'];
    }
    if (empty($title_3)) {
        $title_3 = $banner_content['title_3'];
    }
    if (empty($description)) {
        $description = $banner_content['description'];
    }

    $sub_heading = mysqli_real_escape_string($conn, $sub_heading);
    $name = mysqli_real_escape_string($conn, $name);
    $title_1 = mysqli_real_escape_string($conn, $title_1);
    $title_2 = mysqli_real_escape_string($conn, $title_2);
    $title_3 = mysqli_real_escape_string($conn, $title_3);
    $description = mysqli_real_escape_string($conn, $description);

    $sql = "UPDATE banner_contents SET sub_heading = '$sub_heading', name = '$name', title_1 = '$title_1', title_2 = '$title_2', title_3 = '$title_3', description = '$description' WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Content updated successfully";
        header("Location: banner_content_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: banner_content_edit.php");
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: banner_content_view.php');
}
