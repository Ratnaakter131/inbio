<?php
require_once('../../assets/session.php');

if (isset($_POST['add'])) {
    $image = $_FILES['image'];
    if (empty($image['name'])) {
        $_SESSION['error'] = "Please upload a image";
        header("Location: banner_image_add.php");
    } else {
        $image_name = $image['name'];
        $after_explode = explode('.', $image_name);
        $image_extension = end($after_explode);
        $image_allowed_extension = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($image_extension, $image_allowed_extension)) {
            $_SESSION['picture_error'] = "Please upload a valid picture.";
            die(header('location: banner_image_add.php'));
        } else {
            if ($image['size'] > 1048576) {
                $_SESSION['picture_error'] = "Picture size too large.";
                die(header('location: banner_image_add.php'));
            } else {
                $sql = "INSERT INTO banner_image (image) VALUES ('$image_name')";
                mysqli_query($conn, $sql);
                $id = mysqli_insert_id($conn);
                $file_name = 'banner-img-' . $id . '.' . $image_extension;
                $location = "../../assets/frontend/images/banner/" . $file_name;
                move_uploaded_file($image['tmp_name'], $location);

                $update_sql = "UPDATE banner_image SET image = '$file_name' WHERE id=$id";
                $update_query = mysqli_query($conn, $update_sql);
                if (mysqli_query($conn, $update_sql)) {
                    $_SESSION['success'] = "Content Image added successfully";
                    header("Location: banner_image_view.php");
                } else {
                    $_SESSION['error'] = mysqli_error($conn);
                    header("Location: banner_image_add.php");
                }
            }
        }
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: banner_image_add.php');
}
