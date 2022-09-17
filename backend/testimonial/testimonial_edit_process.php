<?php
require_once('../../assets/session.php');

if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $project_name = $_POST['project_name'];
    $company = $_POST['company'];
    $designation = $_POST['designation'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $rating = $_POST['rating'];
    $content = $_POST['content'];
    $id = $_POST['id'];
    $image = $_FILES['image'];

    $sql = "SELECT * FROM testimonials WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $testimonial = mysqli_fetch_assoc($query);

    if (empty($name)) {
        $name = $testimonial['name'];
    }
    if (empty($project_name)) {
        $project_name = $testimonial['project_name'];
    }
    if (empty($company)) {
        $company = $testimonial['company'];
    }
    if (empty($designation)) {
        $designation = $testimonial['designation'];
    }
    if (empty($start_date)) {
        $start_date = $testimonial['start_date'];
    }
    if (empty($end_date)) {
        $end_date = $testimonial['end_date'];
    }
    if (empty($rating)) {
        $rating = $testimonial['rating'];
    }
    if (empty($content)) {
        $content = $testimonial['content'];
    }
    if (empty($image['name'])) {
        $file_name = $testimonial['image'];
    } else {
        $image_name = $image['name'];
        $after_explode = explode('.', $image_name);
        $image_extension = end($after_explode);
        $allowed_extension = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($image_extension, $allowed_extension)) {
            $_SESSION['picture_error'] = "Please upload a valid image.";
            die(header('location: testimonial_add.php'));
        } else {
            if ($image['size'] > 1048576) {
                $_SESSION['picture_error'] = "Image size too large.";
                die(header('location: testimonial_add.php'));
            } else {
                $file_name = 'testimonial-' . $id . '.' . $image_extension;
                $old_location = "../../assets/frontend/images/testimonial/" . $testimonial['image'];
                $new_location = "../../assets/frontend/images/testimonial/" . $file_name;
                if (file_exists($old_location)) {
                    unlink($old_location);
                }
                move_uploaded_file($image['tmp_name'], $new_location);
            }
        }
    }
    $update_sql = "UPDATE testimonials SET name = '$name', project_name = '$project_name', company = '$company', designation = '$designation', start_date = '$start_date', end_date = '$end_date', rating = '$rating', content = '$content', image = '$file_name' WHERE id = $id";
    if (mysqli_query($conn, $update_sql)) {
        $_SESSION['success'] = "Testimonial updated successfully";
        header("Location: testimonial_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: testimonial_edit.php?id=$id");
    }
} else {
    $_SESSION['error'] = 'Please select a testimonial to edit.';
    header('location: testimonial_view.php');
}
