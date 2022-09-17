<?php
require_once('../../assets/session.php');

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $content = $_POST['content'];

    $_SESSION['title'] = $title;
    $_SESSION['category'] = $category;
    $_SESSION['content'] = $content;

    $image = $_FILES['image'];
    if (empty($title) || empty($category) || empty($content) || empty($image['name'])) {
        $_SESSION['error'] = "All fields are required";
        die(header("Location: blog_add.php"));
    } else {
        $image_name = $image['name'];
        $after_explode = explode('.', $image_name);
        $image_extension = end($after_explode);
        $allowed_extension = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($image_extension, $allowed_extension)) {
            $_SESSION['picture_error'] = "Please upload a valid image.";
            die(header('location: blog_add.php'));
        } else {
            if ($image['size'] > 1048576) {
                $_SESSION['picture_error'] = "Image size too large.";
                die(header('location: blog_add.php'));
            } else {
                $content = mysqli_real_escape_string($conn, $content);
                $time = date('Y-m-d H:i:s');
                $sql = "INSERT INTO blogs (title, category, content, image, time) VALUES ('$title', '$category', '$content', '$image_name','$time')";
                mysqli_query($conn, $sql);
                $id = mysqli_insert_id($conn);
                $file_name = 'blog-' . $id . '.' . $image_extension;
                $location = "../../assets/frontend/images/blog/" . $file_name;
                move_uploaded_file($image['tmp_name'], $location);

                $update_sql = "UPDATE blogs SET image = '$file_name' WHERE id=$id";
                if (mysqli_query($conn, $update_sql)) {
                    unset($_SESSION['title'], $_SESSION['category'], $_SESSION['content'], $_SESSION['picture_error']);
                    $_SESSION['success'] = "blog added successfully";
                    header("Location: blog_view.php");
                } else {
                    $_SESSION['error'] = mysqli_error($conn);
                    header("Location: blog_add.php");
                }
            }
        }
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: blog_add.php');
}
