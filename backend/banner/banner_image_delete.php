<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM banner_image WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $image = mysqli_fetch_assoc($query);
    $delete_sql = "DELETE FROM banner_image WHERE id = $id";
    if (mysqli_query($conn, $delete_sql)) {
        $location = "../../assets/frontend/images/banner/" . $image['image'];
        unlink($location);
        $_SESSION['delete'] = "Banner Image deleted successfully";
        header("Location: banner_image_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: banner_image_view.php");
    }
} else {
    $_SESSION['error'] = 'Please select a content first.';
    header('location: banner_image_view.php');
}
