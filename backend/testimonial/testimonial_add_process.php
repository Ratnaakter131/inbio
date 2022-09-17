<?php
require_once('../../assets/session.php');

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $project_name = $_POST['project_name'];
    $company = $_POST['company'];
    $designation = $_POST['designation'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $rating = $_POST['rating'];
    $content = $_POST['content'];

    $_SESSION['name'] = $name;
    $_SESSION['project_name'] = $project_name;
    $_SESSION['company'] = $company;
    $_SESSION['designation'] = $designation;
    $_SESSION['start_date'] = $start_date;
    $_SESSION['end_date'] = $end_date;
    $_SESSION['rating'] = $rating;
    $_SESSION['content'] = $content;

    $image = $_FILES['image'];
    if (empty($name) || empty($project_name) || empty($company) || empty($designation) || empty($rating) || empty($content)) {
        $_SESSION['error'] = "All fields are required";
        die(header("Location: testimonial_add.php"));
    } else {
        if (empty($start_date)) {
            $start_date = '';
        }
        if (empty($end_date)) {
            $end_date = '';
        }
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
                $sql = "INSERT INTO testimonials (name, project_name, company, designation, start_date, end_date, rating, content, image) VALUES ('$name', '$project_name', '$company', '$designation', '$start_date', '$end_date', '$rating', '$content', '$image_name')";
                mysqli_query($conn, $sql);
                $id = mysqli_insert_id($conn);
                $file_name = 'testimonial-' . $id . '.' . $image_extension;
                $location = "../../assets/frontend/images/testimonial/" . $file_name;
                move_uploaded_file($image['tmp_name'], $location);

                $update_sql = "UPDATE testimonials SET image = '$file_name' WHERE id=$id";
                if (mysqli_query($conn, $update_sql)) {
                    unset($_SESSION['name'], $_SESSION['project_name'], $_SESSION['company'], $_SESSION['designation'], $_SESSION['start_date'], $_SESSION['end_date'], $_SESSION['rating'], $_SESSION['content']);
                    $_SESSION['success'] = "Testimonial added successfully";
                    header("Location: testimonial_view.php");
                } else {
                    $_SESSION['error'] = mysqli_error($conn);
                    header("Location: testimonial_add.php");
                }
            }
        }
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: testimonial_add.php');
}
