<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM portfolios WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $portfolio = mysqli_fetch_assoc($query);

    $select_sql = "SELECT * FROM portfolio_categories";
    $select_query = mysqli_query($conn, $select_sql);
} else {
    $_SESSION['error'] = 'Please select a portfolio to edit.';
    die(header('Location: portfolio_view.php'));
}

function selected($data) {
    global $portfolio;
    if ($portfolio['category'] == $data) {
        return 'selected';
    }
}

require_once('../includes/header.php');
require_once('../includes/sidebar.php');
require_once('../includes/navbar.php');
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Edit Portfolio</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Edit Portfolio</h5>
                    </div>
                    <div class="card-body">
                        <form action="portfolio_edit_process.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="row form-group">
                                <div class="col-lg-8">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?= $portfolio['title'] ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="category">Category</label>
                                    <select class="form-control" name="category" id="category">
                                        <?php foreach ($select_query as $category) : ?>
                                            <option value="<?= $category['name'] ?>" <?= selected($category['name']) ?>><?= $category['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="url" class="form-control" id="link" name="link" value="<?= $portfolio['link'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="desp">Description</label>
                                <textarea maxlength="350" rows="4" class="form-control" id="desp" name="desp"><?= $portfolio['desp'] ?></textarea>
                                <span class="tx-12">Max Input: 350 characters</span>
                            </div>
                            <div class="form-group">
                                <label for="image">Featured Image</label>
                                <img width="200" class="d-block mb-2" id="img_preview" src="../../assets/frontend/images/portfolio/<?= $portfolio['image'] ?>">
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" onchange="document.getElementById('img_preview').src = window.URL.createObjectURL(this.files[0])">
                                <span class="tx-12">Image size must be under 500kb. Allowed format: jpg, jpeg, png & gif</span>
                                <p class="text-danger tx-12"><?= show_session_data('picture_error') ?></p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="edit">Edit Portfolio</button>
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