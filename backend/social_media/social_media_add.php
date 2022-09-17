<?php
require_once('../../assets/session.php');
require_once('../includes/header.php');
require_once('../includes/sidebar.php');
require_once('../includes/navbar.php');
require_once('../includes/social_icons.php');
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Add Social Media</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Add Social Media</h5>
                    </div>
                    <div class="card-body">
                        <div class="icon-container">
                            <p>Click icon to select platform</p>
                            <?php foreach ($social_media_icons as $icon) : ?>
                                <i class="fab <?= $icon ?>"></i>
                            <?php endforeach ?>
                        </div>
                        <form action="social_media_add_process.php" method="POST">
                            <div class="row form-group">
                                <div class="col-lg-2">
                                    <label for="icon">Icon</label>
                                    <div class="icon">
                                        <input type="text" class="form-control" id="icon" name="icon" value="<?= show_session_data('icon') ?>" readonly>
                                        <i class="<?= show_session_data('icon1') ?>" id="icon-view"></i>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <label for="link">Link</label>
                                    <input type="url" class="form-control" id="link" name="link" value="<?= show_session_data('link') ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="add">Add Social Media</button>
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

<script>
    $(document).ready(function() {
        $('.icon-container i').click(function() {
            icon = $(this).attr('class');
            $('#icon').attr('value', icon);
            $('#icon-view').attr('class', icon);
        });
    });
</script>