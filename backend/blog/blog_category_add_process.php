<?php
require_once('../../assets/session.php');

if (isset($_POST['add'])) {
    $name = $_POST['name'];

    if (empty($name)) {
        $_SESSION['error'] = "All fields are required";
        die(header("Location: blog_category.php"));
    } else {
        $sql = "INSERT INTO blog_categories (name) VALUES ('$name')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "Blog Category added successfully";
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
