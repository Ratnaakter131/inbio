<?php
require_once("../assets/session.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=$id and status=0";
    $query = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($query);
    if (mysqli_num_rows($query) == 0) {
        $_SESSION['error'] = "Please select a valid user first";
        header('location: users.php');
    }
} else {
    $_SESSION['error'] = "Please select a user first";
    header('location: users.php');
}

require_once("includes/header.php");
require_once('includes/sidebar.php');
require_once('includes/navbar.php');
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">User Update</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">User Update</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="user_update_process.php" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-5">
                                    <label for="contact" class="form-label">Contact No</label>
                                    <input type="tel" class="form-control" id="contact" name="contact" value="<?= $user['contact'] ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value="<?= show_session_data('password') ?>">
                                    <p class="text-danger"><?= show_session_data('password_error') ?></p>
                                </div>
                                <?php if ($user['id'] != $admin['id']) : ?>
                                    <div class="col-md-3">
                                        <label for="role" class="form-label">Role</label>
                                        <?php
                                        function role_select($x) {
                                            global $user;
                                            if ($user['role'] == $x) {
                                                return 'selected';
                                            }
                                        }
                                        ?>
                                        <select class="form-control" name="role" id="role">
                                            <option value="0" <?= role_select(0) ?>>User</option>
                                            <option value="1" <?= role_select(1) ?>>Moderator</option>
                                            <option value="2" <?= role_select(2) ?>>Admin</option>
                                            <option value="3" <?= role_select(3) ?>>Super Admin</option>
                                        </select>
                                    </div>
                                <?php endif ?>
                            </div>
                            <div class="mb-3">
                                <div class="mb-2">
                                    <img class="profile_pic" src="<?= url() ?>assets/dashboard/images/profile_pictures/<?= $user['profile_pic'] ?>" id="picture" alt="User Photo">
                                </div>
                                <label for="profile_pic" class="form-label">Profile Picture <small>(Optional)</small></label>
                                <input type="file" class="form-control" id="profile_pic" name="profile_pic" oninput="picture.src=window.URL.createObjectURL(this.files[0])" accept="image/*">
                                <span class="text-muted"><small>Allowed format: jpg, png & gif. Max Size 200kb.</small></span>
                                <p class="text-danger"><?= show_session_data('picture_error') ?></p>
                            </div>
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <button type=" submit" class="btn btn-primary" name="update">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php require_once("includes/footer.php"); ?>