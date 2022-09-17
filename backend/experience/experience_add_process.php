<?php
require_once('../../assets/session.php');

if (isset($_POST['add'])) {

    $company = $_POST['company'];
    $designation = $_POST['designation'];
    $start_year = $_POST['start_year'];
    $end_year = $_POST['end_year'];
    $description = $_POST['description'];

    $_SESSION['company'] = $company;
    $_SESSION['designation'] = $designation;
    $_SESSION['start_year'] = $start_year;
    $_SESSION['end_year'] = $end_year;
    $_SESSION['description'] = $description;

    if (empty($company) || empty($designation) || empty($start_year) || empty($description)) {
        $_SESSION['error'] = "All fields are required";
        header("Location: experience_add.php");
    } else {
        if (empty($end_year)) {
            $end_year = "Present";
        }
        $sql = "INSERT INTO experiences (company, designation, start_year, end_year, description) VALUES ('$company', '$designation', '$start_year', '$end_year', '$description')";
        if (mysqli_query($conn, $sql)) {
            unset($_SESSION['company'], $_SESSION['designation'], $_SESSION['start_year'], $_SESSION['end_year'], $_SESSION['description']);
            $_SESSION['success'] = "Experience added successfully";
            header("Location: experience_add.php");
        } else {
            $_SESSION['error'] = mysqli_error($conn);
            header("Location: experience_add.php");
        }
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: experience_add.php');
}
