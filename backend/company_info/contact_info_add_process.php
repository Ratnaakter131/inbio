<?php
require_once('../../assets/session.php');

if (isset($_POST['add'])) {
    $check_sql = "SELECT * FROM contacts_info";
    $check_query = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_query) == 0) {
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $_SESSION['address'] = $address;
        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = $email;

        if (empty($address) || empty($phone) || empty($email)) {
            $_SESSION['error'] = "All fields are required";
            header("Location: contact_info_add.php");
        } else {
            $sql = "INSERT INTO contacts_info (address, phone, email) VALUES ('$address', '$phone', '$email')";
            if (mysqli_query($conn, $sql)) {
                unset($_SESSION['address'], $_SESSION['phone'], $_SESSION['email']);
                $_SESSION['success'] = "Contact details added successfully";
                header("Location: contact_info_view.php");
            } else {
                $_SESSION['error'] = mysqli_error($conn);
                header("Location: contact_info_add.php");
            }
        }
    } else {
        $_SESSION['error'] = 'Contact details already exist. You can edit this.';
        header('location: contact_info_view.php');
    }
} else {
    $_SESSION['error'] = 'Please fill the form first.';
    header('location: contact_info_add.php');
}
