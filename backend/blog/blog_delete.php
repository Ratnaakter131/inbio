<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select_sql = "SELECT * FROM blogs WHERE id = $id";
    $select_query = mysqli_query($conn, $select_sql);
    $blog = mysqli_fetch_assoc($select_query);
    $location = "../../assets/frontend/images/blog/" . $blog['image'];
    if (file_exists($location)) {
        unlink($location);
    }
    $delete_sql = "DELETE FROM blogs WHERE id = $id";
    $delete_comment = "DELETE FROM comments WHERE blog_id = $id";
    if (mysqli_query($conn, $delete_sql) && mysqli_query($conn, $delete_comment)) {
        $_SESSION['delete'] = "Blog deleted successfully";
        header("Location: blog_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: blog_view.php");
    }
} else {
    $_SESSION['error'] = 'Please select a blog first.';
    header('location: blog_view.php');
}
