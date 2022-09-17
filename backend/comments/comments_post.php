<?php
session_start();
require_once('../../assets/db.php');
require_once('../../assets/functions.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $website = mysqli_real_escape_string($conn, $_POST['website']);
    $blog_id = mysqli_real_escape_string($conn, $_POST['blog_id']);

    if (empty($name) || empty($email) || empty($comment) || empty($blog_id)) {
        echo json_encode(['status' => 'error', 'message' => 'Please fill all the fields']);
        die();
    } else {
        $domain = parse_url($website);
        $website = $domain['scheme'] . '://' . $domain['host'];
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO comments (name, email, website, comment, date, blog_id) VALUES ('$name', '$email', '$website', '$comment', '$date','$blog_id')";
        if (mysqli_query($conn, $sql)) {
            echo json_encode(['status' => 'success', 'message' => 'Thanks. Your comment is under review.']);
            die();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Something went wrong. Please try again later.']);
            die();
        }
    }
}
