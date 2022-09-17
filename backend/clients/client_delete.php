<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM clients WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $image = mysqli_fetch_assoc($query);
    $delete_sql = "DELETE FROM clients WHERE id = $id";
    if (mysqli_query($conn, $delete_sql)) {
        $location = "../../assets/frontend/images/client/" . $image['image'];
        unlink($location);
        $_SESSION['delete'] = "Client deleted successfully";
        header("Location: client_view.php");
    } else {
        $_SESSION['error'] = mysqli_error($conn);
        header("Location: client_view.php");
    }
} else {
    $_SESSION['error'] = 'Please select a client first.';
    header('location: client_view.php');
}
