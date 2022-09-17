<?php
require_once('../../assets/session.php');
require_once('../includes/header.php');
require_once('../includes/sidebar.php');
require_once('../includes/navbar.php');
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Add Site Setting</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Add Site Setting</h5>
                    </div>
                    <div class="card-body">
                        <form action="site_setting_add_process.php" method="POST" enctype="multipart/form-data">
                            <div class="row form-group">
                                <div class="col-lg-4">
                                    <label for="name">Site Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= show_session_data('name') ?>">
                                </div>
                                <div class="col-lg-8">
                                    <label for="tagline">Site Tagline</label>
                                    <input type="text" class="form-control" id="tagline" name="tagline" value="<?= show_session_data('tagline') ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Site Icon</label>
                                <img width="40" class="d-block mb-2" id="img_preview" src="">
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/png" onchange="document.getElementById('img_preview').src = window.URL.createObjectURL(this.files[0])">
                                <span class="tx-12">Icon size must be under 100kb. Allowed format: png only</span>
                                <p class="text-danger tx-12"><?= show_session_data('picture_error') ?></p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="add">Add Setting</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php require_once('../includes/footer.php') ?>