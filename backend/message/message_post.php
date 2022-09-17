<?php
session_start();
require_once('../../assets/db.php');
require_once('../../assets/functions.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if (empty($name) || empty($phone) || empty($email) || empty($subject) || empty($message)) {
        $response = ['status' => 'error', 'message' => 'All fields are required',];
        echo json_encode($response);
        die();
    } else {
        $message = mysqli_real_escape_string($conn, $message);
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO messages (name, phone, email, subject, message, time) VALUES ('$name', '$phone', '$email', '$subject', '$message', '$date')";
        if (mysqli_query($conn, $sql)) {
            $response = ['status' => 'success', 'message' => 'Message Sent Successfully',];
        } else {
            $response = ['status' => 'error', 'message' => 'Message Not Sent',];
        }
        echo json_encode($response);
        die();
    }
}
