<?php
require_once("../../assets/session.php");
$sql = "SELECT * FROM site_setting";
$query = mysqli_query($conn, $sql);
require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Site Setting</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Site Setting</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="bg-info">
                                <tr>
                                    <th class="text-center">Site Name</th>
                                    <th class="text-center">Site Tagline</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $key => $setting) : ?>
                                    <tr>
                                        <td><?= $setting['name'] ?></td>
                                        <td><?= $setting['tagline'] ?></td>
                                        <td>
                                            <?php if ($admin['role'] >= 2) : ?>
                                                <a href="site_setting_edit.php" class=" btn btn-primary btn-sm" data-id="<?= $portfolio['id'] ?>">Edit</a>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="site_setting_image_process.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="image">Site Logo</label>
                                        <p class="bg-secondary w-50 p-3">
                                            <img style="max-height: 50px;" class="img-fluid" id="logo_preview" src="<?= url() ?>assets/frontend/images/logo/<?= $setting['logo'] ?>">
                                        </p>
                                        <input type="file" class="form-control-file" id="image" name="logo" accept="image/png" onchange="document.getElementById('logo_preview').src = window.URL.createObjectURL(this.files[0])">
                                        <span class="tx-12">Logo size must be under 100kb. Allowed format: png only</span>
                                        <p class="text-danger tx-12"><?= show_session_data('logo_error') ?></p>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-sm" name="update_logo">Update Logo</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form action="site_setting_image_process.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="image">Site Icon</label>
                                        <p class="p-3">
                                            <img style="max-width: 50px;" class="img-fluid" id="icon_preview" src="<?= url() ?>assets/frontend/images/logo/<?= $setting['icon'] ?>">
                                        </p>
                                        <input type="file" class="form-control-file" id="image" name="icon" accept="image/png" onchange="document.getElementById('icon_preview').src = window.URL.createObjectURL(this.files[0])">
                                        <span class="tx-12">Icon size must be under 100kb. Allowed format: png only</span>
                                        <p class="text-danger tx-12"><?= show_session_data('icon_error') ?></p>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-sm" name="update_icon">Update Icon</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php require_once("../includes/footer.php"); ?>