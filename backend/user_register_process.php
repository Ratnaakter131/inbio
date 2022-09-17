<?php
session_start();
require_once('../assets/db.php');

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $con_password = $_POST['con_password'];
    $role = $_POST['role'];
    $profile_pic = $_FILES['profile_pic'];

    //email validation
    $email_sql = "SELECT * FROM users WHERE email='$email'";
    $email_query = mysqli_query($conn, $email_sql);


    if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL) && mysqli_num_rows($email_query) == 0 && !empty($contact) && !empty($password)) {
        $_SESSION['email_error'] = "Email already taken.";
        header('location: registration.php');
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, contact, password, role) VALUES ('$name', '$email', '$contact', '$password', '$role')";
    } else {
        $_SESSION['error'] = 'Registration failed. Input all data.';
        die(header('location: users.php'));
    }

    //profile picture upload
    if (empty($profile_pic['name'])) {
        $query = mysqli_query($conn, $sql);
    } else {
        $picture_name = $profile_pic['name'];
        $picture_name_explode = explode('.', $picture_name);
        $picture_extension = end($picture_name_explode);
        $picture_allowed_extension = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($picture_extension, $picture_allowed_extension) && $profile_pic['size'] < 1048576) {
            $query = mysqli_query($conn, $sql);
            $id = mysqli_insert_id($conn);
            $file_name = $id . '.' . $picture_extension;
            $location = "../assets/dashboard/images/profile_pictures/" . $file_name;
            move_uploaded_file($profile_pic['tmp_name'], $location);

            $update_sql = "UPDATE users SET profile_pic = '$file_name' WHERE id=$id";
            $update_query = mysqli_query($conn, $update_sql);
        } else {
            $_SESSION['error'] = 'Registration failed. Image is not valid.';
            header('location: users.php');
        }
    }
    if ($query || $update_query) {
        $_SESSION['success'] = "User added Successful";
        header('location: users.php');
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header('location: users.php');
    }
} else {
    $_SESSION['error'] = "Please fill out the form";
    header('location: users.php');
}
