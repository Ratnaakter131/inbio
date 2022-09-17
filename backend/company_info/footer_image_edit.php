<?php
require_once('../../assets/session.php');
if (!isset($_GET['id'])) {
    $_SESSION['error'] = "Please select a footer_image.";
    die(header("Location: footer_image_view.php"));
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM footer_image WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    $footer_image = mysqli_fetch_assoc($query);
}

require_once('../includes/header.php');
require_once('../includes/sidebar.php');
require_once('../includes/navbar.php');
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Edit Footer Image</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Edit Footer Image</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <img id="img_preview" style="max-width: 200px;" src="../../assets/frontend/images/contact/<?= $footer_image['image'] ?>" alt="footer_image">
                        </div>
                        <form action="footer_image_edit_process.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="form-group">
                                <label for="footer_image">Footer Image</label>
                                <input type="file" class="form-control-file" id="footer_image" name="footer_image" accept="image/*" onchange="document.getElementById('img_preview').src = window.URL.createObjectURL(this.files[0])">
                                <span class="tx-12">Maximum Size: 500kb. Allowed format jpg, png & gif only</span>
                                <p class="text-danger tx-12"><?= show_session_data('picture_error') ?></p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="edit">Edit Image</button>
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