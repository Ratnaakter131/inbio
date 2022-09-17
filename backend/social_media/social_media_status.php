<?php
require_once("../../assets/session.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $check_sql = "SELECT * FROM social_medias WHERE status=1";
    $check_query = mysqli_query($conn, $check_sql);

    $sql = "SELECT * FROM social_medias WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    $social_media = mysqli_fetch_assoc($query);

    if ($social_media['status'] == 0) {
        if (mysqli_num_rows($check_query) < 4) {
            $update_sql = "UPDATE social_medias SET status=1 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Social media activated successfully.';
                header('location: social_media_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: social_media_view.php");
            }
        } else {
            $_SESSION['error'] = 'Maximum activation limit reached.';
            header('location: social_media_view.php');
        }
    } else {
        if (mysqli_num_rows($check_query) > 1) {
            $update_sql = "UPDATE social_medias SET status=0 WHERE id=$id";
            if (mysqli_query($conn, $update_sql)) {
                $_SESSION['success'] = 'Social media deactivated successfully.';
                header('location: social_media_view.php');
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: social_media_view.php");
            }
        } else {
            $_SESSION['error'] = 'Minimum one social media required.';
            header('location: social_media_view.php');
        }
    }
} else {
    $_SESSION['error'] = 'Select a social media platform first.';
    header('location: social_media_view.php');
}
