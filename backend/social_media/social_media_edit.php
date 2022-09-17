<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM social_medias WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $social_media = mysqli_fetch_assoc($query);
} else {
    $_SESSION['error'] = 'Please select a social media to edit.';
    die(header('location: social_media_view.php'));
}
require_once('../includes/header.php');
require_once('../includes/sidebar.php');
require_once('../includes/navbar.php');
require_once('../includes/social_icons.php');
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Edit Social Media</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Edit Social Media</h5>
                    </div>
                    <div class="card-body">
                        <div class="icon-container">
                            <p>Click icon to select platform</p>
                            <?php foreach ($social_media_icons as $icon) : ?>
                                <i class="fab <?= $icon ?>"></i>
                            <?php endforeach ?>
                        </div>
                        <form action="social_media_edit_process.php" method="POST">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="row form-group">
                                <div class="col-lg-2">
                                    <label for="icon">Icon</label>
                                    <div class="icon">
                                        <input type="text" class="form-control" id="icon" name="icon" value="<?= $social_media['platform'] ?>" readonly>
                                        <i class="<?= $social_media['platform'] ?>" id="icon-view"></i>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <label for="link">Link</label>
                                    <input type="url" class="form-control" id="link" name="link" value="<?= $social_media['link'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="edit">Edit Social Media</button>
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