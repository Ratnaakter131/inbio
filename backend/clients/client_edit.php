<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM clients WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $client = mysqli_fetch_assoc($query);
} else {
    $_SESSION['error'] = "Please select a client to edit.";
    die(header('location: client_view.php'));
}
require_once('../includes/header.php');
require_once('../includes/sidebar.php');
require_once('../includes/navbar.php');
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Edit Client</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Edit Client</h5>
                    </div>
                    <div class="card-body">
                        <form action="client_edit_process.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="form-group">
                                <label for="name">Client Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Client Name" value="<?= $client['name'] ?>">
                            </div>
                            <img width="200px" class="bg-secondary p-3" id="img_preview" src="../../assets/frontend/images/client/<?= $client['image'] ?>">
                            <div class="form-group">
                                <label for="image">Client Logo</label>
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/png" onchange="document.getElementById('img_preview').src = window.URL.createObjectURL(this.files[0])">
                                <span class="tx-12">Logo size must be under 500kb. Allowed format: jpg, jpeg, png & gif</span>
                                <p class="text-danger tx-12"><?= show_session_data('picture_error') ?></p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="edit">Edit Client</button>
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