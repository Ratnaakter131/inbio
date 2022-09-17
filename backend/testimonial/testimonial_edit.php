<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM testimonials WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $testimonial = mysqli_fetch_assoc($query);
} else {
    $_SESSION['error'] = 'Please select a testimonial to edit.';
    die(header('location: testimonial_view.php'));
}
require_once('../includes/header.php');
require_once('../includes/sidebar.php');
require_once('../includes/navbar.php');
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Edit Testimonial</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Edit Testimonial</h5>
                    </div>
                    <div class="card-body">
                        <form action="testimonial_edit_process.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="name">Client Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $testimonial['name'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="project_name">Project Name</label>
                                    <input type="text" class="form-control" id="project_name" name="project_name" value="<?= $testimonial['project_name'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <label for="company">Company Name</label>
                                    <input type="text" class="form-control" id="company" name="company" value="<?= $testimonial['company'] ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="designation">Client Designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation" value="<?= $testimonial['designation'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="start_date">Start Date</label>
                                    <input type="text" class="form-control" id="start_date" name="start_date" value="<?= $testimonial['start_date'] ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="end_date">End Date</label>
                                    <input type="text" class="form-control" id="end_date" name="end_date" value="<?= $testimonial['end_date'] ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="rating">Rating</label>
                                    <input type="number" class="form-control" id="rating" name="rating" value="<?= $testimonial['rating'] ?>" min="1" max="5">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content">Testimonial Content</label>
                                <textarea class="form-control" id="content" name="content" rows="4"><?= $testimonial['content'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Client Image</label>
                                <img class="profile_pic d-block mb-2" id="img_preview" src="../../assets/frontend/images/testimonial/<?= $testimonial['image'] ?>">
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" onchange="document.getElementById('img_preview').src = window.URL.createObjectURL(this.files[0])">
                                <span class="tx-12">Logo size must be under 500kb. Allowed format: jpg, jpeg, png & gif</span>
                                <p class="text-danger tx-12"><?= show_session_data('picture_error') ?></p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="edit">Edit Testimonial</button>
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
        $('#start_date').datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true
        });
        $('#end_date').datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true
        });
    });
</script>