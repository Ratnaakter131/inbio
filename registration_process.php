<?php
session_start();
require_once('./assets/db.php');

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $con_password = $_POST['con_password'];
    $profile_pic = $_FILES['profile_pic'];

    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['contact'] = $contact;
    $_SESSION['password'] = $password;
    $_SESSION['con_password'] = $con_password;

    if (empty($name)) {
        $_SESSION['name_error'] = "Name is required";
        header('location: registration.php');
    }

    //email validation
    $email_sql = "SELECT * FROM users WHERE email='$email'";
    $email_query = mysqli_query($conn, $email_sql);


    if (empty($email)) {
        $_SESSION['email_error'] = "Email is required";
        header('location: registration.php');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email_error'] = "Invalid email format";
        header('location: registration.php');
    } elseif (mysqli_num_rows($email_query) > 0) {
        $_SESSION['email_error'] = "Email already taken.";
        header('location: registration.php');
    }

    if (empty($contact)) {
        $_SESSION['contact_error'] = "Contact is required";
        header('location: registration.php');
    }

    if (empty($password)) {
        $_SESSION['password_error'] = "Password is required";
        header('location: registration.php');
    } elseif ($password != $con_password) {
        $_SESSION['password_error'] = "Password does not match";
        header('location: registration.php');
    } elseif (strlen($password) < 6) {
        $_SESSION['password_error'] = "Password must be at least 6 characters";
        header('location: registration.php');
    } elseif (!preg_match("#[0-9]+#", $password)) {
        $_SESSION['password_error'] = "Password must include at least one number";
        header('location: registration.php');
    } elseif (!preg_match("#[A-Z]+#", $password)) {
        $_SESSION['password_error'] = "Password must include at least one capital letter";
        header('location: registration.php');
    } elseif (!preg_match("#[a-z]+#", $password)) {
        $_SESSION['password_error'] = "Password must include at least one small letter";
        header('location: registration.php');
    } elseif (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL) && mysqli_num_rows($email_query) <= 0 && !empty($contact) && !empty($password)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, contact, password) VALUES ('$name', '$email', '$contact', '$password')";

        //profile picture upload
        if (empty($profile_pic['name'])) {
            $query = mysqli_query($conn, $sql);
        } else {
            $picture_name = $profile_pic['name'];
            $picture_name_explode = explode('.', $picture_name);
            $picture_extension = end($picture_name_explode);
            $picture_allowed_extension = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($picture_extension, $picture_allowed_extension)) {
                $_SESSION['picture_error'] = "Picture format not allowed.";
                die(header('location: registration.php'));
            } else {
                if ($profile_pic['size'] > 204800) {
                    $_SESSION['picture_error'] = "Picture size too large.";
                    die(header('location: registration.php'));
                } else {
                    $query = mysqli_query($conn, $sql);
                    $id = mysqli_insert_id($conn);
                    $file_name = $id . '.' . $picture_extension;
                    $location = "assets/dashboard/images/profile_pictures/" . $file_name;
                    move_uploaded_file($profile_pic['tmp_name'], $location);

                    $update_sql = "UPDATE users SET profile_pic = '$file_name' WHERE id=$id";
                    $update_query = mysqli_query($conn, $update_sql);
                }
            }
        }
        if ($query || $update_query) {
            $_SESSION['success'] = "Registration Successful";
            unset($_SESSION['name'], $_SESSION['email'], $_SESSION['contact'], $_SESSION['password'], $_SESSION['con_password']);
            if (isset($_SESSION['admin'])) {
                header('location: backend/users.php');
            } else {
                header('location: login.php');
            }
        } else {
            $_SESSION['error'] = mysqli_error($conn);
            header('location: registration.php');
        }
    }
} else {
    $_SESSION['error'] = "Please fill out the form";
    header('location: registration.php');
}
