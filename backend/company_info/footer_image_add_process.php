<?php
require_once('../../assets/session.php');

$check_sql = "SELECT * FROM footer_image";
$check_query = mysqli_query($conn, $check_sql);

if (isset($_POST['add'])) {
    if (mysqli_num_rows($check_query) == 1) {
        $_SESSION['error'] = "One Image already uploaded. You can edit this.";
        header("Location: footer_image_view.php");
    } else {
        $footer_image = $_FILES['footer_image'];
        if (empty($footer_image['name'])) {
            $_SESSION['error'] = "Please upload a Image first.";
            header("Location: footer_image_add.php");
        } else {
            $footer_image_name = $footer_image['name'];
            $after_explode = explode('.', $footer_image_name);
            $footer_image_extension = end($after_explode);
            $footer_image_allowed_extension = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($footer_image_extension, $footer_image_allowed_extension)) {
                $_SESSION['picture_error'] = "Please upload a valid Image.";
                die(header('location: footer_image_add.php'));
            } else {
                if ($footer_image['size'] > 512000) {
                    $_SESSION['picture_error'] = "Picture size too large.";
                    die(header('location: footer_image_add.php'));
                } else {
                    $sql = "INSERT INTO footer_image (image) VALUES ('$footer_image_name')";
                    mysqli_query($conn, $sql);
                    $id = mysqli_insert_id($conn);
                    $file_name = 'footer_image-' . $id . '.' . $footer_image_extension;
                    $location = "../../assets/frontend/images/contact/" . $file_name;
                    move_uploaded_file($footer_image['tmp_name'], $location);

                    $update_sql = "UPDATE footer_image SET image = '$file_name' WHERE id=$id";
                    if (mysqli_query($conn, $update_sql)) {
                        $_SESSION['success'] = "Image added successfully";
                        header("Location: footer_image_view.php");
                    } else {
                        $_SESSION['error'] = mysqli_error($conn);
                        header("Location: footer_image_add.php");
                    }
                }
            }
        }
    }
} else {
    $_SESSION['error'] = 'Please select a footer_image first.';
    header('location: footer_image_add.php');
}
