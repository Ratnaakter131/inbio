<?php
require_once('../../assets/session.php');

if (isset($_POST['edit'])) {
    $company = $_POST['company'];
    $designation = $_POST['designation'];
    $start_year = $_POST['start_year'];
    $end_year = $_POST['end_year'];
    $description = $_POST['description'];
    $id = $_POST['id'];

    $sql = "SELECT * FROM experiences WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $experience = mysqli_fetch_assoc($query);

    if (empty($company)) {
        $company = $experience['company'];
    }
    if (empty($designation)) {
        $designation = $experience['designation'];
    }
    if (empty($start_year)) {
        $start_year = $experience['start_year'];
    }
    if (empty($end_year)) {
        $end_year = "Present";
    }
    if (empty($description)) {
        $description = $experience['description'];
    }

    $sql = "UPDATE experiences SET company = '$company', designation = '$designation', start_year = '$start_year', end_year = '$end_year', description = '$description' WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Experience updated successfully";
        header("Location: experience_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: experience_edit.php?id=$id");
    }
} else {
    $_SESSION['error'] = 'Please select a experience to edit.';
    header('location: experience_edit.php');
}
