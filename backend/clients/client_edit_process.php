<?php
require_once('../../assets/session.php');

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_FILES['image'];

    $sql = "SELECT * FROM clients WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $client = mysqli_fetch_assoc($query);

    if (empty($name)) {
        $name = $client['name'];
    }
    if (empty($image['name'])) {
        $file_name = $client['image'];
    } else {
        $image_name = $image['name'];
        $after_explode = explode('.', $image_name);
        $image_extension = end($after_explode);
        $allowed_extension = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($image_extension, $allowed_extension)) {
            $_SESSION['picture_error'] = "Please upload a valid image.";
            die(header('location: client_edit.php?id=' . $id));
        } else {
            if ($image['size'] > 1048576) {
                $_SESSION['picture_error'] = "Image size too large.";
                die(header('location: client_edit.php?id=' . $id));
            } else {
                $file_name = 'client-' . $id . '.' . $image_extension;
                $old_location = "../../assets/frontend/images/client/" . $client['image'];
                $new_location = "../../assets/frontend/images/client/" . $file_name;
                if (file_exists($old_location)) {
                    unlink($old_location);
                }
                move_uploaded_file($image['tmp_name'], $new_location);
            }
        }
    }

    $update_sql = "UPDATE clients SET name = '$name', image = '$file_name' WHERE id = $id";
    $update_query = mysqli_query($conn, $update_sql);
    if (mysqli_query($conn, $update_sql)) {
        $_SESSION['success'] = "Client updated successfully";
        header("Location: client_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: client_edit.php?id=$id");
    }
} else {
    $_SESSION['error'] = 'Please select a client to edit.';
    header('location: client_view.php');
}
