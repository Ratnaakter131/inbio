<?php
session_start();
require_once('assets/functions.php');
require_once('assets/db.php');
require_once("backend/includes/header.php");
?>

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

    <div class="login-wrapper wd-300 wd-xs-650 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse"><?= $setting['name'] ?></div>
        <div class="tx-center mg-b-30">Fill the form to register a new user.</div>

        <form method="POST" action="registration_process.php" enctype="multipart/form-data">
            <div class="">
                <input type="text" class="form-control" name="name" placeholder="Name" value="<?= show_session_data('name') ?>">
                <p class="text-danger tx-12"><?= show_session_data('name_error') ?></p>
            </div><!-- form-group -->
            <div class="">
                <div class="row">
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?= show_session_data('email') ?>">
                        <p class="text-danger tx-12"><?= show_session_data('email_error') ?></p>
                    </div>
                    <div class="col-md-6">
                        <input type="tel" class="form-control" name="contact" placeholder="Contact Number" value="<?= show_session_data('contact') ?>">
                        <p class="text-danger tx-12"><?= show_session_data('contact_error') ?></p>
                    </div>
                </div>
            </div><!-- form-group -->
            <div class="">
                <div class="row">
                    <div class="col-lg-6">
                        <input type="password" class="form-control" name="password" placeholder="Password" value="<?= show_session_data('password') ?>">
                        <p class="text-danger tx-12"><?= show_session_data('password_error') ?></p>
                    </div>
                    <div class="col-lg-6">
                        <input type="password" class="form-control" name="con_password" placeholder="Confirm Password" value="<?= show_session_data('con_password') ?>">
                    </div>
                </div>
            </div><!-- form-group -->
            <div class="">
                <input type="file" class="form-control-file mb-1" id="profile_pic" name="profile_pic">
                <span class="text-muted tx-12">Allowed format: jpg, png & gif. Max Size 200kb.</span>
                <p class="text-danger tx-12"><?= show_session_data('picture_error') ?></p>
            </div><!-- form-group -->
            <div class=" tx-12">By clicking the Register button below, you agreed to our privacy policy and terms of use of our website.</div>
            <button type="submit" class="btn btn-info btn-block" name="register">Register</button>
        </form>

        <div class="mg-t-40 tx-center">Already have an account? <a href="login.php" class="tx-info">Login</a></div>
    </div><!-- login-wrapper -->
</div><!-- d-flex -->
<?php require_once("backend/includes/footer.php"); ?>