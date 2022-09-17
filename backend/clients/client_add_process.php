<?php
require_once('../../assets/session.php');

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $image = $_FILES['image'];
    if (empty($image['name']) || empty($name)) {
        $_SESSION['error'] = "All fields are required.";
        die(header("Location: client_add.php"));
    } else {
        $image_name = $image['name'];
        $after_explode = explode('.', $image_name);
        $image_extension = end($after_explode);
        $allowed_extension = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($image_extension, $allowed_extension)) {
            $_SESSION['picture_error'] = "Please upload a valid image.";
            die(header('location: client_add.php'));
        } else {
            if ($image['size'] > 1048576) {
                $_SESSION['picture_error'] = "Image size too large.";
                die(header('location: client_add.php'));
            } else {
                $sql = "INSERT INTO clients (name) VALUES ('$name')";
                mysqli_query($conn, $sql);
                $id = mysqli_insert_id($conn);
                $file_name = 'client-' . $id . '.' . $image_extension;
                $location = "../../assets/frontend/images/client/" . $file_name;
                move_uploaded_file($image['tmp_name'], $location);

                $update_sql = "UPDATE clients SET image = '$file_name' WHERE id=$id";
                $update_query = mysqli_query($conn, $update_sql);
                if (mysqli_query($conn, $update_sql)) {
                    $_SESSION['success'] = "Client added successfully";
                    header("Location: client_view.php");
                } else {
                    $_SESSION['error'] = mysqli_error($conn);
                    header("Location: client_add.php");
                }
            }
        }
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: client_add.php');
}
