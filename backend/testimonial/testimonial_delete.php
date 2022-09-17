<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM testimonials WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $image = mysqli_fetch_assoc($query);
    $delete_sql = "DELETE FROM testimonials WHERE id = $id";
    if (mysqli_query($conn, $delete_sql)) {
        $location = "../../assets/frontend/images/testimonial/" . $image['image'];
        unlink($location);
        $_SESSION['delete'] = "Testimonial deleted successfully";
        header("Location: testimonial_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: testimonial_view.php");
    }
} else {
    $_SESSION['error'] = 'Please select a Testimonial first.';
    header('location: testimonial_view.php');
}
