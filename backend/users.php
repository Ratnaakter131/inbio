<?php
require_once("../assets/session.php");
$sql = "SELECT * FROM users WHERE status=0";
$query = mysqli_query($conn, $sql);
require_once("includes/header.php");
require_once("includes/sidebar.php");
require_once("includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Users</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Users List (<?= mysqli_num_rows($query) ?>)</h5>
                    </div>
                    <div class="card-body">
                        <?php if ($admin['role'] >= 1) : ?>
                            <table class="table table-bordered align-middle">
                                <thead class="bg-info">
                                    <tr>
                                        <th class="text-center">Serial</th>
                                        <th class="text-center">Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact No</th>
                                        <th class="text-center">Role</th>
                                        <?php if ($admin['role'] >= 2) : ?>
                                            <th class="text-center">Action</th>
                                        <?php endif ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    function print_user_role() {
                                        global $user;
                                        if ($user['role'] == 1) {
                                            return 'Moderator';
                                        } elseif ($user['role'] == 2) {
                                            return 'Admin';
                                        } elseif ($user['role'] == 3) {
                                            return 'Super Admin';
                                        } else {
                                            return 'User';
                                        }
                                    }

                                    foreach ($query as $key => $user) : ?>
                                        <tr>
                                            <td class="text-center"><?= ++$key ?></td>
                                            <td class="text-center"><img class="profile_photo" src="<?= url() ?>assets/dashboard/images/profile_pictures/<?= $user['profile_pic'] ?>" alt="User Photo"></td>
                                            <td><?= $user['name'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td><?= $user['contact'] ?></td>
                                            <td class="text-center"><?= print_user_role() ?></td>
                                            <?php if ($admin['role'] >= 2) : ?>
                                                <td class="text-center">
                                                    <?php if (($admin['role'] == 2 && $user['role'] != 3) || $admin['role'] == 3) : ?>
                                                        <a href="user_update.php?id=<?= $user['id'] ?>" class="btn btn-info btn-sm">Edit</a>
                                                    <?php endif ?>
                                                    <?php if ($admin['role'] == 3 && $admin['id'] != $user['id']) : ?>
                                                        <button class="btn btn-danger btn-sm trash" data-id="<?= $user['id'] ?>">Delete</button>
                                                    <?php endif ?>
                                                </td>
                                            <?php endif ?>
                                        </tr>
                                    <?php endforeach ?>
                                    <?php if (mysqli_num_rows($query) == 0) : ?>
                                        <tr>
                                            <td class="text-center" colspan="7">No user found</td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <div class="alert alert-danger">
                                <h3>Oppsssss.....</h3>
                                <p>You have no privilege to view this page.</p>
                            </div>
                        <?php endif ?>
                        <?php if ($admin['role'] >= 2) : ?>
                            <a href="trash_users.php" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i> Trashed Users</a>
                            <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#add-user"><i class="fa fa-user-plus"></i> Add New</button>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php require_once("includes/user_add_modal.php"); ?>
<?php require_once("includes/footer.php"); ?>

<script>
    $('.trash').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "This user will be deleted and moved to trash.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr('data-id');
                document.location.href = 'user_status_change.php?id=' + id;
            }
        })
    });
</script>