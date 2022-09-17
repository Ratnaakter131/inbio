<?php
require_once('../../assets/session.php');
require_once('../includes/header.php');
require_once('../includes/sidebar.php');
require_once('../includes/navbar.php');
$check_sql = "SELECT * FROM site_setting";
$check_query = mysqli_query($conn, $check_sql);
$setting = mysqli_fetch_assoc($check_query);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Edit Site Setting</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Edit Site Setting</h5>
                    </div>
                    <div class="card-body">
                        <form action="site_setting_edit_process.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= (isset($_SESSION['id'])) ? show_session_data('id') : $setting['id'] ?>">
                            <div class="row form-group">
                                <div class="col-lg-4">
                                    <label for="name">Site Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= (isset($_SESSION['name'])) ? show_session_data('name') : $setting['name'] ?>">
                                </div>
                                <div class="col-lg-8">
                                    <label for="tagline">Site Tagline</label>
                                    <input type="text" class="form-control" id="tagline" name="tagline" value="<?= (isset($_SESSION['tagline'])) ? show_session_data('tagline') : $setting['tagline'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="edit">Edit Setting</button>
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