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
        <span class="breadcrumb-item active">Add Testimonial</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Add Testimonial</h5>
                    </div>
                    <div class="card-body">
                        <form action="testimonial_add_process.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="name">Client Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= show_session_data('name') ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="project_name">Project Name</label>
                                    <input type="text" class="form-control" id="project_name" name="project_name" value="<?= show_session_data('project_name') ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-8">
                                    <label for="company">Company Name</label>
                                    <input type="text" class="form-control" id="company" name="company" value="<?= show_session_data('company') ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="designation">Client Designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation" value="<?= show_session_data('designation') ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="start_date">Start Date</label>
                                    <input type="text" class="form-control" id="start_date" name="start_date" value="<?= show_session_data('start_date') ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="end_date">End Date</label>
                                    <input type="text" class="form-control" id="end_date" name="end_date" value="<?= show_session_data('end_date') ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="rating">Rating</label>
                                    <input type="number" class="form-control" id="rating" name="rating" value="<?= show_session_data('rating') ?>" min="1" max="5">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content">Testimonial Content</label>
                                <textarea class="form-control" id="content" name="content"><?= show_session_data('content') ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Client Image</label>
                                <img class="profile_pic d-block mb-2" id="img_preview" src="../../assets/dashboard/images/profile_pictures/default.jpg">
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" onchange="document.getElementById('img_preview').src = window.URL.createObjectURL(this.files[0])">
                                <span class="tx-12">Logo size must be under 500kb. Allowed format: jpg, jpeg, png & gif</span>
                                <p class="text-danger tx-12"><?= show_session_data('picture_error') ?></p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="add">Add Testimonial</button>
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