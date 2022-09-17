<?php
require_once('../../assets/session.php');

if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];

    if (empty($name) || empty($id)) {
        $_SESSION['error'] = "All fields are required";
        die(header("Location: blog_category.php"));
    } else {
        $sql = "UPDATE blog_categories SET name='$name' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "Blog Category updated successfully";
            header("Location: blog_category.php");
        } else {
            $_SESSION['error'] = mysqli_error($conn);
            header("Location: blog_category.php");
        }
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: blog_category.php');
}
