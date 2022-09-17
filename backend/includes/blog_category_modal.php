<!-- Start Add blog Category Modal -->
<div id="add-blog-category" class="modal fade">
    <div class="modal-dialog modal-md w-50" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Blog Category</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-20">
                <form method="POST" action="blog_category_add_process.php" class="w-100">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" id="name" class="form-control" name="name" placeholder="Category Name">
                    </div><!-- form-group -->
            </div><!-- modal-body -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-sm" name="add">ADD</button>
            </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- Start Edit blog Category Modal -->
<div id="edit-blog-category" class="modal fade">
    <div class="modal-dialog modal-md w-50" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Blog Category</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-20">
                <form method="POST" action="blog_category_edit_process.php" class="w-100">
                    <input type="hidden" id="cat_id" name="id">
                    <div class="form-group">
                        <label for="cat_name">Category Name</label>
                        <input type="text" id="cat_name" class="form-control" name="name" placeholder="Category Name">
                    </div><!-- form-group -->
            </div><!-- modal-body -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-sm" name="edit">Edit</button>
            </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->