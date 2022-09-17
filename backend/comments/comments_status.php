<?php
require_once("../../assets/session.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM comments WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    $counter = mysqli_fetch_assoc($query);

    if ($counter['status'] == 0) {
        $update_sql = "UPDATE comments SET status=1 WHERE id=$id";
        if (mysqli_query($conn, $update_sql)) {
            $_SESSION['success'] = 'Comment Approved successfully.';
            header('location: comments.php');
        } else {
            $_SESSION['error'] = mysqli_error($conn);
            header("Location: comments.php");
        }
    } else {
        $update_sql = "UPDATE comments SET status=0 WHERE id=$id";
        if (mysqli_query($conn, $update_sql)) {
            $_SESSION['success'] = 'Comment Unapproved successfully.';
            header('location: comments.php');
        } else {
            $_SESSION['error'] = mysqli_error($conn);
            header("Location: comments.php");
        }
    }
} else {
    $_SESSION['error'] = 'Select a comment first.';
    header('location: comments.php');
}
