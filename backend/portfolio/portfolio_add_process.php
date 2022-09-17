<?php
require_once('../../assets/session.php');

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $desp = $_POST['desp'];
    $link = $_POST['link'];

    $_SESSION['title'] = $title;
    $_SESSION['category'] = $category;
    $_SESSION['desp'] = $desp;
    $_SESSION['link'] = $link;

    $image = $_FILES['image'];
    if (empty($title) || empty($category) || empty($desp) || empty($image['name']) || empty($link)) {
        $_SESSION['error'] = "All fields are required";
        die(header("Location: portfolio_add.php"));
    } elseif (!filter_var($link, FILTER_VALIDATE_URL)) {
        $_SESSION['error'] = "Please enter a valid URL";
        die(header("Location: portfolio_add.php"));
    } else {
        $image_name = $image['name'];
        $after_explode = explode('.', $image_name);
        $image_extension = end($after_explode);
        $allowed_extension = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($image_extension, $allowed_extension)) {
            $_SESSION['picture_error'] = "Please upload a valid image.";
            die(header('location: portfolio_add.php'));
        } else {
            if ($image['size'] > 1048576) {
                $_SESSION['picture_error'] = "Image size too large.";
                die(header('location: portfolio_add.php'));
            } else {
                $sql = "INSERT INTO portfolios (title,category,desp,link) VALUES ('$title','$category','$desp','$link')";
                mysqli_query($conn, $sql);
                $id = mysqli_insert_id($conn);
                $file_name = 'portfolio-' . $id . '.' . $image_extension;
                $location = "../../assets/frontend/images/portfolio/" . $file_name;
                move_uploaded_file($image['tmp_name'], $location);

                $update_sql = "UPDATE portfolios SET image = '$file_name' WHERE id=$id";
                if (mysqli_query($conn, $update_sql)) {
                    unset($_SESSION['title'], $_SESSION['category'], $_SESSION['desp'], $_SESSION['link']);
                    $_SESSION['success'] = "Portfolio added successfully";
                    header("Location: portfolio_view.php");
                } else {
                    $_SESSION['error'] = mysqli_error($conn);
                    header("Location: portfolio_add.php");
                }
            }
        }
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: portfolio_add.php');
}
