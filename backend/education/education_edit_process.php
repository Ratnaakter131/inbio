<?php
require_once('../../assets/session.php');

if (isset($_POST['edit'])) {
    $course = $_POST['course'];
    $institute = $_POST['institute'];
    $start_year = $_POST['start_year'];
    $end_year = $_POST['end_year'];
    $description = $_POST['description'];
    $id = $_POST['id'];

    $sql = "SELECT * FROM educations WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $education = mysqli_fetch_assoc($query);

    if (empty($course)) {
        $course = $education['course'];
    }
    if (empty($institute)) {
        $institute = $education['institute'];
    }
    if (empty($start_year)) {
        $start_year = $education['start_year'];
    }
    if (empty($end_year)) {
        $end_year = "Present";
    }
    if (empty($description)) {
        $description = $education['description'];
    }

    $sql = "UPDATE educations SET course = '$course', institute = '$institute', start_year = '$start_year', end_year = '$end_year', description = '$description' WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Education updated successfully";
        header("Location: education_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: education_edit.php?id=$id");
    }
} else {
    $_SESSION['error'] = 'Please select a education to edit.';
    header('location: education_view.php');
}
