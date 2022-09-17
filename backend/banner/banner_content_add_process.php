<?php
require_once('../../assets/session.php');

if (isset($_POST['add'])) {
    $check_sql = "SELECT * FROM banner_contents";
    $check_query = mysqli_query($conn, $check_sql);
    if (mysqli_num_rows($check_query) > 0) {
        $_SESSION['error'] = "Banner content already exists. You can edit it from the list.";
        die(header("location: banner_content_view.php"));
    }

    $sub_heading = $_POST['sub_heading'];
    $name = $_POST['name'];
    $title_1 = $_POST['title_1'];
    $title_2 = $_POST['title_2'];
    $title_3 = $_POST['title_3'];
    $description = $_POST['description'];

    $_SESSION['sub_heading'] = $sub_heading;
    $_SESSION['name'] = $name;
    $_SESSION['title_1'] = $title_1;
    $_SESSION['title_2'] = $title_2;
    $_SESSION['title_3'] = $title_3;
    $_SESSION['description'] = $description;

    if (empty($sub_heading) || empty($name) || empty($title_1) || empty($title_2) || empty($title_3) || empty($description)) {
        $_SESSION['error'] = "All fields are required";
        header("Location: banner_content_add.php");
    } else {
        $sub_heading = mysqli_real_escape_string($conn, $sub_heading);
        $name = mysqli_real_escape_string($conn, $name);
        $title_1 = mysqli_real_escape_string($conn, $title_1);
        $title_2 = mysqli_real_escape_string($conn, $title_2);
        $title_3 = mysqli_real_escape_string($conn, $title_3);
        $description = mysqli_real_escape_string($conn, $description);
        $sql = "INSERT INTO banner_contents (sub_heading, name, title_1, title_2, title_3, description) VALUES ('$sub_heading', '$name', '$title_1', '$title_2', '$title_3', '$description')";
        if (mysqli_query($conn, $sql)) {
            unset($_SESSION['sub_heading'], $_SESSION['name'], $_SESSION['title_1'], $_SESSION['title_2'], $_SESSION['title_3'], $_SESSION['description']);
            $_SESSION['success'] = "Content added successfully";
            header("Location: banner_content_view.php");
        } else {
            $_SESSION['error'] = mysqli_error($conn);
            header("Location: banner_content_add.php");
        }
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: banner_content_add.php');
}
