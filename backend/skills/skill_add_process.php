<?php
require_once('../../assets/session.php');

if (isset($_POST['add'])) {
    $technology = $_POST['technology'];
    $type = $_POST['type'];
    $percentage = $_POST['percentage'];

    $_SESSION['technology'] = $technology;
    $_SESSION['type'] = $type;
    $_SESSION['percentage'] = $percentage;

    if (empty($technology) || empty($percentage)) {
        $_SESSION['error'] = "All fields are required";
        header("Location: skill_add.php");
    } else {
        $sql = "INSERT INTO skills (technology, type, percentage) VALUES ('$technology', '$type', '$percentage')";
        if (mysqli_query($conn, $sql)) {
            unset($_SESSION['technology'], $_SESSION['type'], $_SESSION['percentage']);
            $_SESSION['success'] = "Skill added successfully";
            header("Location: skill_view.php");
        } else {
            $_SESSION['error'] = mysqli_error($conn);
            header("Location: skill_add.php");
        }
    }
} else {
    $_SESSION['error'] = 'Fill the form first.';
    header('location: skill_add.php');
}
