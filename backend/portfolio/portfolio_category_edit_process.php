<?php
require_once('../../assets/session.php');

if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];

    if (empty($name) || empty($id)) {
        $_SESSION['error'] = "All fields are required";
        die(header("Location: portfolio_category.php"));
    } else {
        $sql = "UPDATE portfolio_categories SET name='$name' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "Portfolio Category updated successfully";
            header("Location: portfolio_category.php");
        } else {
            $_SESSION['error'] = mysqli_error($conn);
            header("Location: portfolio_category.php");
        }
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: portfolio_category.php');
}
