<?php
session_start();
require_once('assets/functions.php');
require_once('assets/db.php');
if (isset($_SESSION['admin'])) {
    header('location:backend/dashboard.php');
}

require_once('backend/includes/header.php');
?>



<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse"><?= $setting['name'] ?></div>
        <div class="tx-center mg-b-60">Login to access dashboard</div>

        <form action="login_process.php" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Email" name="email" value="<?= show_session_data('email') ?>" required>
                <p class="text-danger"><?= show_session_data('email_error') ?></p>
            </div><!-- form-group -->
            <div class="form-group">
                <div class="eye-btn">
                    <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password" value="<?= show_session_data('password') ?>" required>
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
                <p class="text-danger"><?= show_session_data('password_error') ?></p>
                <a href="#" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
            </div><!-- form-group -->
            <button type="submit" class="btn btn-info btn-block">Login</button>
        </form>
        <div class="mg-t-60 tx-center">Not yet a member? <a href="registration.php" class="tx-info">Register Now</a></div>
    </div><!-- login-wrapper -->
</div><!-- d-flex -->
<?php require_once("backend/includes/footer.php"); ?>