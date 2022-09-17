<?php
require_once('../../assets/session.php');

if (isset($_POST['edit'])) {
    $technology = $_POST['technology'];
    $type = $_POST['type'];
    $percentage = $_POST['percentage'];
    $id = $_POST['id'];

    $sql = "SELECT * FROM skills WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $skill = mysqli_fetch_assoc($query);

    if (empty($technology)) {
        $technology = $skill['technology'];
    }
    if (empty($percentage)) {
        $percentage = $skill['percentage'];
    }

    $sql = "UPDATE skills SET technology = '$technology', type = '$type', percentage = '$percentage' WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Skill updated successfully";
        header("Location: skill_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: skill_edit.php?id=$id");
    }
} else {
    $_SESSION['error'] = 'Please select a skill to edit.';
    header('location: skill_view.php');
}
