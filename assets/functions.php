<?php
date_default_timezone_set('Asia/Dhaka');

function show_session_data($data) {
    if (isset($_SESSION[$data])) {
        echo $_SESSION[$data];
        unset($_SESSION[$data]);
    }
}

function url($x = '') {
    $directory = explode('/', dirname($_SERVER['PHP_SELF']));
    $url = $_SERVER['HTTP_HOST'] . '/' . $directory[1] . '/';
    $url = str_replace('//', '/', $url);
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
        $url = 'https://' . $url;
    } else {
        $url = 'http://' . $url;
    }
    return $url . $x;
}

function print_admin_role() {
    global $admin;
    if ($admin['role'] == 1) {
        return 'Moderator';
    } elseif ($admin['role'] == 2) {
        return 'Admin';
    } elseif ($admin['role'] == 3) {
        return 'Super Admin';
    } else {
        return 'User';
    }
}

function greetings() {
    $Hour = date('G');
    if ($Hour >= 5 && $Hour <= 11) {
        return "Good Morning";
    } elseif ($Hour >= 12 && $Hour <= 14) {
        return "Good Noon";
    } else if ($Hour >= 15 && $Hour <= 18) {
        return "Good Afternoon";
    } else if ($Hour >= 19 || $Hour <= 4) {
        return "Good Evening";
    }
}
