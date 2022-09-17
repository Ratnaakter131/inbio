<?php
require_once("../assets/session.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $profile_pic = $_FILES['profile_pic'];

    $_SESSION['password'] = $password;

    $select_sql = "SELECT * FROM users WHERE id='$id'";
    $query = mysqli_query($conn, $select_sql);
    $user = mysqli_fetch_assoc($query);

    if (empty($name)) {
        $name = $user['name'];
    }
    if (empty($email)) {
        $email = $user['email'];
    }
    if (empty($contact)) {
        $contact = $user['contact'];
    }
    if (empty($role)) {
        $role = $user['role'];
    }

    if (empty($profile_pic['name'])) {
        $file_name = $user['profile_pic'];
    } else {
        $picture_name = $profile_pic['name'];
        $picture_name_explode = explode('.', $picture_name);
        $picture_extension = end($picture_name_explode);
        $picture_allowed_extension = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($picture_extension, $picture_allowed_extension)) {
            $_SESSION['picture_error'] = "Picture format not allowed.";
            die(header('location: user_update.php?id=' . $id));
        } else {
            if ($profile_pic['size'] > 204800) {
                $_SESSION['picture_error'] = "Picture size too large.";
                die(header('location: user_update.php?id=' . $id));
            } else {
                if ($user['profile_pic'] != 'default.jpg') {
                    $location = "../assets/dashboard/images/profile_pictures/" . $user['profile_pic'];
                    unlink($location);
                }
                $file_name = $id . '.' . $picture_extension;
                $new_location = "../assets/dashboard/images/profile_pictures/" . $file_name;
                move_uploaded_file($profile_pic['tmp_name'], $new_location);
            }
        }
    }

    if (empty($password)) {
        $sql = "UPDATE users SET name='$name', email='$email', contact='$contact', role='$role', profile_pic = '$file_name' WHERE id='$id'";
    } else {
        if (strlen($password) < 6) {
            $_SESSION['password_error'] = "Password must be at least 6 characters";
            die(header('location: user_update.php?id=' . $id));
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $_SESSION['password_error'] = "Password must include at least one number";
            die(header('location: user_update.php?id=' . $id));
        } elseif (!preg_match("#[A-Z]+#", $password)) {
            $_SESSION['password_error'] = "Password must include at least one capital letter";
            die(header('location: user_update.php?id=' . $id));
        } elseif (!preg_match("#[a-z]+#", $password)) {
            $_SESSION['password_error'] = "Password must include at least one small letter";
            die(header('location: user_update.php?id=' . $id));
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET name='$name', email='$email', contact='$contact', password='$password', role='$role', profile_pic = '$file_name' WHERE id='$id'";
        }
    }

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "User update Successful";
        header('location: users.php');
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header('location: users.php');
    }
} else {
    $_SESSION['error'] = "Please fill out the form";
    header('location: users.php');
}
