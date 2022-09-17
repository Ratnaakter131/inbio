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
        <span class="breadcrumb-item active">Add Blog</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Add Blog</h5>
                    </div>
                    <div class="card-body">
                        <form action="blog_add_process.php" method="POST" enctype="multipart/form-data">
                            <div class="row form-group">
                                <div class="col-lg-8">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?= show_session_data('title') ?>">
                                </div>
                                <div class="col-lg-4">
                                    <label for="category">Category</label>
                                    <select class="form-control" name="category" id="category">
                                        <option value="" disabled <?= !isset($_SESSION['category']) ? "selected" : "" ?>>- Select -</option>
                                        <?php

                                        function selected($data) {
                                            if (isset($_SESSION['category']) && $_SESSION['category'] == $data) {
                                                echo 'selected';
                                                unset($_SESSION['category']);
                                            }
                                        }

                                        $select_sql = "SELECT * FROM blog_categories";
                                        $select_query = mysqli_query($conn, $select_sql);
                                        foreach ($select_query as $category) :
                                        ?>
                                            <option value="<?= $category['name'] ?>" <?= selected($category['name']) ?>><?= $category['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea rows="6" class="form-control" id="content" name="content"><?= show_session_data('content') ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Featured Image</label>
                                <img width="200" class="d-block mb-2" id="img_preview" src="">
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" onchange="document.getElementById('img_preview').src = window.URL.createObjectURL(this.files[0])">
                                <span class="tx-12">Image size must be under 500kb. Allowed format: jpg, jpeg, png & gif</span>
                                <p class="text-danger tx-12"><?= show_session_data('picture_error') ?></p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="add">Add Blog</button>
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
<style>
    .ck-editor__editable:not(.ck-editor__nested-editable) {
        min-height: 200px;
    }
</style>
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>