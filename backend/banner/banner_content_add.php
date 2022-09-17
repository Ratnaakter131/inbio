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
        <span class="breadcrumb-item active">Add Banner Content</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Add Banner Content</h5>
                    </div>
                    <div class="card-body">
                        <form action="banner_content_add_process.php" method="POST">
                            <div class="form-group">
                                <label for="sub_heading">Sub Heading</label>
                                <input type="text" class="form-control" id="sub_heading" name="sub_heading" value="<?= show_session_data('sub_heading') ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= show_session_data('name') ?>">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="title_1">Title One</label>
                                    <input type="text" class="form-control" id="title_1" name="title_1" value="<?= show_session_data('title_1') ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="title_2">Title Two</label>
                                    <input type="text" class="form-control" id="title_2" name="title_2" value="<?= show_session_data('title_2') ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="title_3">Title Three</label>
                                    <input type="text" class="form-control" id="title_3" name="title_3" value="<?= show_session_data('title_3') ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description"><?= show_session_data('description') ?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="add">Add Content</button>
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