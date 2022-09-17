<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_sql = "DELETE FROM blog_categories WHERE id = $id";
    if (mysqli_query($conn, $delete_sql)) {
        $_SESSION['delete'] = "Blog Category deleted successfully";
        header("Location: blog_category.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: blog_category.php");
    }
} else {
    $_SESSION['error'] = 'Please select a blog category first.';
    header('location: blog_category.php');
}
