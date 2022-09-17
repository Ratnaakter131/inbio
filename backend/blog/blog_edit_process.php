<?php
require_once('../../assets/session.php');

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM blogs WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $blog = mysqli_fetch_assoc($query);

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    if (empty($title)) {
        $title = $blog['title'];
    }
    if (empty($content)) {
        $content = $blog['content'];
    }
    if (empty($category)) {
        $category = $blog['category'];
    }

    $image = $_FILES['image'];
    if (empty($image['name'])) {
        $file_name = $blog['image'];
    } else {
        $image_name = $image['name'];
        $after_explode = explode('.', $image_name);
        $image_extension = end($after_explode);
        $allowed_extension = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($image_extension, $allowed_extension)) {
            $_SESSION['picture_error'] = "Please upload a valid image.";
            die(header('location: blog_edit.php?id=' . $id));
        } else {
            if ($image['size'] > 1048576) {
                $_SESSION['picture_error'] = "Image size too large.";
                die(header('location: blog_edit.php?id=' . $id));
            } else {
                $file_name = 'blog-' . $id . '.' . $image_extension;
                $old_location = "../../assets/frontend/images/blog/" . $blog['image'];
                $new_location = "../../assets/frontend/images/blog/" . $file_name;
                if (file_exists($old_location)) {
                    unlink($old_location);
                }
                move_uploaded_file($image['tmp_name'], $new_location);
            }
        }
    }
    $update_sql = "UPDATE blogs SET title = '$title', content = '$content', category = '$category', image = '$file_name' WHERE id = $id";
    if (mysqli_query($conn, $update_sql)) {
        $_SESSION['success'] = "Blog Updated successfully";
        header("Location: blog_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: blog_edit.php?id=$id");
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: blog_view.php');
}
