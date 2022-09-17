<!-- Start Add User Modal -->
<div id="add-user" class="modal fade">
    <div class="modal-dialog modal-lg w-50" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add New User</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-20">
                <form method="POST" action="user_register_process.php" enctype="multipart/form-data" class="w-100">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div><!-- form-group -->
                    <div class="row form-group">
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="col-md-6">
                            <input type="tel" class="form-control" name="contact" placeholder="Contact Number">
                        </div>
                    </div><!-- form-group -->
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="col-lg-6">
                            <input type="password" class="form-control" name="con_password" placeholder="Confirm Password">
                        </div>
                    </div><!-- form-group -->
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-control" name="role" id="role">
                                <option value="0">User</option>
                                <option value="1">Moderator</option>
                                <option value="2">Admin</option>
                                <option value="3">Super Admin</option>
                            </select>
                        </div>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input type="file" class="form-control-file mb-1" id="profile_pic" name="profile_pic">
                        <span class="text-muted tx-12">Allowed format: jpg, png & gif. Max Size 200kb.</span>
                    </div><!-- form-group -->
            </div><!-- modal-body -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-sm" name="register">Register</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->