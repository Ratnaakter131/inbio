<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM services WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $service = mysqli_fetch_assoc($query);
} else {
    $_SESSION['error'] = 'Please select a service to edit.';
    die(header('Location: service_view.php'));
}
require_once('../includes/header.php');
require_once('../includes/sidebar.php');
require_once('../includes/navbar.php');
require_once('../includes/icons.php');
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Edit Service</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Edit Service</h5>
                    </div>
                    <div class="card-body">
                        <div class="icon-container">
                            <p>Click on icon to select</p>
                            <?php foreach ($icons as $icon) : ?>
                                <i class="<?= $icon ?>"></i>
                            <?php endforeach ?>
                        </div>
                        <form action="service_edit_process.php" method="POST">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="row form-group">
                                <div class="col-lg-2">
                                    <label for="icon">Icon</label>
                                    <div class="icon">
                                        <input type="text" class="form-control" id="icon" name="icon" value="<?= $service['icon'] ?>" readonly>
                                        <i class="<?= $service['icon'] ?>" id="icon-view"></i>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?= $service['title'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description"><?= $service['description'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="edit">Edit Service</button>
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