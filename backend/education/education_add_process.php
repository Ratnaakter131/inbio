<?php
require_once('../../assets/session.php');

if (isset($_POST['add'])) {
    $course = $_POST['course'];
    $institute = $_POST['institute'];
    $start_year = $_POST['start_year'];
    $end_year = $_POST['end_year'];
    $description = $_POST['description'];

    $_SESSION['course'] = $course;
    $_SESSION['institute'] = $institute;
    $_SESSION['start_year'] = $start_year;
    $_SESSION['end_year'] = $end_year;
    $_SESSION['description'] = $description;

    if (empty($course) || empty($institute) || empty($start_year) || empty($description)) {
        $_SESSION['error'] = "All fields are required";
        header("Location: education_add.php");
    } else {
        if (empty($end_year)) {
            $end_year = "Present";
        }
        $sql = "INSERT INTO educations (course, institute, start_year, end_year, description) VALUES ('$course', '$institute', '$start_year', '$end_year', '$description')";
        if (mysqli_query($conn, $sql)) {
            unset($_SESSION['course'], $_SESSION['institute'], $_SESSION['start_year'], $_SESSION['end_year'], $_SESSION['description']);
            $_SESSION['success'] = "Education added successfully";
            header("Location: education_add.php");
        } else {
            $_SESSION['error'] = mysqli_error($conn);
            header("Location: education_add.php");
        }
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: education_add.php');
}
