<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $check_sql = "SELECT * FROM banner_contents WHERE id = '$id'";
    $check_query = mysqli_query($conn, $check_sql);
    if (mysqli_num_rows($check_query) > 0) {
        $banner_content = mysqli_fetch_assoc($check_query);
    } else {
        $_SESSION['error'] = "Content does not exist";
        die(header("location: banner_content_view.php"));
    }
} else {
    $_SESSION['error'] = "Something went wrong. Please try again.";
    die(header("location: banner_content_view.php"));
}

require_once('../includes/header.php');
require_once('../includes/sidebar.php');
require_once('../includes/navbar.php');
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Edit Banner Content</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Edit Banner Content</h5>
                    </div>
                    <div class="card-body">
                        <form action="banner_content_edit_process.php" method="POST">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="form-group">
                                <label for="sub_heading">Sub Heading</label>
                                <input type="text" class="form-control" id="sub_heading" name="sub_heading" value="<?= $banner_content['sub_heading'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= $banner_content['name'] ?>">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="title_1">Title One</label>
                                    <input type="text" class="form-control" id="title_1" name="title_1" value="<?= $banner_content['title_1'] ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="title_2">Title Two</label>
                                    <input type="text" class="form-control" id="title_2" name="title_2" value="<?= $banner_content['title_2'] ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="title_3">Title Three</label>
                                    <input type="text" class="form-control" id="title_3" name="title_3" value="<?= $banner_content['title_3'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description"><?= $banner_content['description'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="edit">Edit Content</button>
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