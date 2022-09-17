<?php
require_once('../../assets/session.php');

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $check_sql = "SELECT * FROM contacts_info WHERE id=$id";
    $check_query = mysqli_query($conn, $check_sql);
    $contact_info = mysqli_fetch_assoc($check_query);

    if (empty($address)) {
        $address = $contact_info['address'];
    }
    if (empty($phone)) {
        $phone = $contact_info['phone'];
    }
    if (empty($email)) {
        $email = $contact_info['email'];
    }

    $sql = "UPDATE contacts_info SET address='$address',phone='$phone',email='$email' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Contact details updated successfully";
        header("Location: contact_info_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: contact_info_edit.php");
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: contact_info_view.php');
}
