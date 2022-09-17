<?php
require_once('../../assets/session.php');

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $tagline = $_POST['tagline'];

    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    $_SESSION['tagline'] = $tagline;

    $check_sql = "SELECT * FROM site_setting WHERE id = $id";
    $check_query = mysqli_query($conn, $check_sql);
    $setting = mysqli_fetch_assoc($check_query);

    if (empty($name)) {
        $name = $setting['name'];
    }
    if (empty($tagline)) {
        $tagline = $setting['tagline'];
    }

    $update_sql = "UPDATE site_setting SET name = '$name', tagline = '$tagline' WHERE id=$id";
    if (mysqli_query($conn, $update_sql)) {
        unset($_SESSION['name'], $_SESSION['tagline'], $_SESSION['id']);
        $_SESSION['success'] = "Setting updated successfully";
        header("Location: site_setting.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: site_setting_edit.php");
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: site_setting_edit.php');
}
