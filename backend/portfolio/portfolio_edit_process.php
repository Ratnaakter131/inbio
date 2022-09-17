<?php
require_once('../../assets/session.php');

if (isset($_POST['edit'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $desp = $_POST['desp'];
    $link = $_POST['link'];
    $id = $_POST['id'];
    $image = $_FILES['image'];

    $sql = "SELECT * FROM portfolios WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $portfolio = mysqli_fetch_assoc($query);

    if (empty($title)) {
        $title = $portfolio['title'];
    }
    if (empty($category)) {
        $category = $portfolio['category'];
    }
    if (empty($desp)) {
        $desp = $portfolio['desp'];
    }
    if (empty($link)) {
        $link = $portfolio['link'];
    } elseif (!filter_var($link, FILTER_VALIDATE_URL)) {
        $_SESSION['error'] = "Please enter a valid URL";
        die(header("Location: portfolio_edit.php?id=$id"));
    }
    if (empty($image['name'])) {
        $file_name = $portfolio['image'];
    } else {
        $image_name = $image['name'];
        $after_explode = explode('.', $image_name);
        $image_extension = end($after_explode);
        $allowed_extension = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($image_extension, $allowed_extension)) {
            $_SESSION['picture_error'] = "Please upload a valid image.";
            die(header('location: portfolio_edit.php?id=' . $id));
        } else {
            if ($image['size'] > 1048576) {
                $_SESSION['picture_error'] = "Image size too large.";
                die(header('location: portfolio_edit.php?id=' . $id));
            } else {
                $file_name = 'portfolio-' . $id . '.' . $image_extension;
                $old_location = "../../assets/frontend/images/portfolio/" . $portfolio['image'];
                $new_location = "../../assets/frontend/images/portfolio/" . $file_name;
                if (file_exists($old_location)) {
                    unlink($old_location);
                }
                move_uploaded_file($image['tmp_name'], $new_location);
            }
        }
    }

    $update_sql = "UPDATE portfolios SET title = '$title', category = '$category', desp = '$desp', link = '$link', image = '$file_name' WHERE id = $id";
    if (mysqli_query($conn, $update_sql)) {
        $_SESSION['success'] = "Portfolio updated successfully";
        header("Location: portfolio_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: portfolio_edit.php?id=$id");
    }
} else {
    $_SESSION['error'] = 'Please selete a portfolio to edit.';
    header('location: portfolio_view.php');
}
