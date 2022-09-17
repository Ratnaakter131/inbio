<?php
require_once('../../assets/session.php');

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM footer_image WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    $old_footer_image = mysqli_fetch_assoc($query);

    $footer_image = $_FILES['footer_image'];
    if (empty($footer_image['name'])) {
        $_SESSION['error'] = "Please upload a image first.";
        header("Location: footer_image_edit.php");
    } else {
        $footer_image_name = $footer_image['name'];
        $after_explode = explode('.', $footer_image_name);
        $footer_image_extension = end($after_explode);
        $footer_image_allowed_extension = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($footer_image_extension, $footer_image_allowed_extension)) {
            $_SESSION['picture_error'] = "Please upload a valid Image.";
            die(header('location: footer_image_edit.php'));
        } else {
            if ($footer_image['size'] > 512000) {
                $_SESSION['picture_error'] = "Picture size too large.";
                die(header('location: footer_image_edit.php'));
            } else {
                $file_name = 'footer_image-' . $id . '.' . $footer_image_extension;
                $old_location = "../../assets/frontend/images/contact/" . $old_footer_image['image'];
                $new_location = "../../assets/frontend/images/contact/" . $file_name;
                unlink($old_location);
                move_uploaded_file($footer_image['tmp_name'], $new_location);
                $update_sql = "UPDATE footer_image SET image = '$file_name' WHERE id=$id";
                if (mysqli_query($conn, $update_sql)) {
                    $_SESSION['success'] = "Image updated successfully";
                    header("Location: footer_image_view.php");
                } else {
                    $_SESSION['error'] = mysqli_error($conn);
                    header("Location: footer_image_edit.php");
                }
            }
        }
    }
} else {
    $_SESSION['error'] = 'Please select a Image first.';
    header('location: footer_image_edit.php');
}
