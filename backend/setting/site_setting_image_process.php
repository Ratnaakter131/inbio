<?php
require_once('../../assets/session.php');

$check_sql = "SELECT * FROM site_setting";
$check_query = mysqli_query($conn, $check_sql);
$setting = mysqli_fetch_assoc($check_query);

if (isset($_POST['update_logo'])) {
    $image = $_FILES['logo'];
    if (empty($image['name'])) {
        $_SESSION['error'] = "Please upload a logo";
        die(header("Location: site_setting.php"));
    } else {
        $image_name = $image['name'];
        $after_explode = explode('.', $image_name);
        $image_extension = end($after_explode);
        if ($image_extension != 'png') {
            $_SESSION['picture_error'] = "Please upload a png logo.";
            die(header('location: site_setting.php'));
        } else {
            if ($image['size'] > 102400) {
                $_SESSION['picture_error'] = "Logo size too large.";
                die(header('location: site_setting.php'));
            } else {
                $file_name = 'site-logo' . '.' . $image_extension;
                $location = "../../assets/frontend/images/logo/" . $file_name;
                if ($setting['logo'] != 'default-logo.png') {
                    unlink($location);
                }
                move_uploaded_file($image['tmp_name'], $location);

                $update_sql = "UPDATE site_setting SET logo = '$file_name'";
                if (mysqli_query($conn, $update_sql)) {
                    $_SESSION['success'] = "Logo updated successfully";
                    header("Location: site_setting.php");
                } else {
                    $_SESSION['error'] = mysqli_error($conn);
                    header("Location: site_setting.php");
                }
            }
        }
    }
} elseif (isset($_POST['update_icon'])) {
    $image = $_FILES['icon'];
    if (empty($image['name'])) {
        $_SESSION['error'] = "Please upload a icon";
        die(header("Location: site_setting.php"));
    } else {
        $image_name = $image['name'];
        $after_explode = explode('.', $image_name);
        $image_extension = end($after_explode);
        if ($image_extension != 'png') {
            $_SESSION['picture_error'] = "Please upload a png icon.";
            die(header('location: site_setting.php'));
        } else {
            if ($image['size'] > 102400) {
                $_SESSION['picture_error'] = "Icon size too large.";
                die(header('location: site_setting.php'));
            } else {
                $file_name = 'site-icon' . '.' . $image_extension;
                $location = "../../assets/frontend/images/logo/" . $file_name;
                if ($setting['icon'] != 'default-icon.png') {
                    unlink($location);
                }
                move_uploaded_file($image['tmp_name'], $location);

                $update_sql = "UPDATE site_setting SET icon = '$file_name'";
                if (mysqli_query($conn, $update_sql)) {
                    $_SESSION['success'] = "Icon updated successfully";
                    header("Location: site_setting.php");
                } else {
                    $_SESSION['error'] = mysqli_error($conn);
                    header("Location: site_setting.php");
                }
            }
        }
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: site_setting.php');
}
