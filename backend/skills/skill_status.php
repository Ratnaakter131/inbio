<?php
require_once("../../assets/session.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $check_sql_design = "SELECT * FROM skills WHERE status=1 and type = 0";
    $check_query_design = mysqli_query($conn, $check_sql_design);

    $check_sql_development = "SELECT * FROM skills WHERE status=1 and type = 1";
    $check_query_development = mysqli_query($conn, $check_sql_development);

    $sql = "SELECT * FROM skills WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    $skill = mysqli_fetch_assoc($query);

    if ($skill['status'] == 0) {
        if (mysqli_num_rows($check_query_design) < 5 && $skill['type'] == 0) {
            $update_sql = "UPDATE skills SET status=1 WHERE id=$id";
        } elseif (mysqli_num_rows($check_query_development) < 5 && $skill['type'] == 1) {
            $update_sql = "UPDATE skills SET status=1 WHERE id=$id";
        } else {
            $_SESSION['error'] = 'Maximum activation limit reached.';
            die(header('location: skill_view.php'));
        }
        if (mysqli_query($conn, $update_sql)) {
            $_SESSION['success'] = 'Skill activated successfully.';
            header('location: skill_view.php');
        } else {
            $_SESSION['error'] = mysqli_error($conn);
            header("Location: skill_view.php");
        }
    } else {
        if (mysqli_num_rows($check_query_design) > 1 && $skill['type'] == 0) {
            $update_sql = "UPDATE skills SET status=0 WHERE id=$id";
        } elseif (mysqli_num_rows($check_query_development) > 1 && $skill['type'] == 1) {
            $update_sql = "UPDATE skills SET status=0 WHERE id=$id";
        } else {
            $_SESSION['error'] = 'Minimum one skill required.';
            die(header('location: skill_view.php'));
        }
        if (mysqli_query($conn, $update_sql)) {
            $_SESSION['success'] = 'Skill deactivated successfully';
            header('location: skill_view.php');
        } else {
            $_SESSION['error'] = mysqli_error($conn);
            header("Location: skill_view.php");
        }
    }
} else {
    $_SESSION['error'] = 'Select a skill first.';
    header('location: skill_view.php');
}
