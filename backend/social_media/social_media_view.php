<?php
require_once("../../assets/session.php");
$sql = "SELECT * FROM social_medias";
$query = mysqli_query($conn, $sql);
require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">View Social Media</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">View Social Media</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered align-middle">
                            <thead class="bg-info">
                                <tr>
                                    <th width="5%" class="text-center">Serial</th>
                                    <th width="12%" class="text-center">platform</th>
                                    <th class="text-center">Link</th>
                                    <th width="15%" class="text-center">Status</th>
                                    <?php if ($admin['role'] >= 2) : ?>
                                        <th width="15%" class="text-center">Action</th>
                                    <?php endif ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $key => $social_media) : ?>
                                    <tr>
                                        <td class="text-center"><?= ++$key ?></td>
                                        <td class="text-center"><i class="icon-view <?= $social_media['platform'] ?>"></i></td>
                                        <td><?= $social_media['link'] ?></td>
                                        <td class="text-center"><a href="social_media_status.php?id=<?= $social_media['id'] ?>" class="btn btn-sm  <?= ($social_media['status'] == 1) ? 'btn-success' : 'btn-secondary' ?>"><?= ($social_media['status'] == 1) ? 'Activated' : 'Deactivated' ?></a></td>
                                        <?php if ($admin['role'] >= 2) : ?>
                                            <td class="text-center">
                                                <a href="social_media_edit.php?id=<?= $social_media['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                                <?php if ($social_media['status'] == 0) : ?>
                                                    <button class=" btn btn-danger btn-sm delete" data-id="<?= $social_media['id'] ?>">Delete</button>
                                                <?php endif ?>
                                            </td>
                                        <?php endif ?>
                                    </tr>
                                <?php endforeach ?>
                                <?php if (mysqli_num_rows($query) == 0) : ?>
                                    <tr>
                                        <td class="text-center" colspan="7">No data found</td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                        <a href="social_media_add.php" class="btn btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New Content</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php require_once("../includes/footer.php"); ?>

<script>
    $('.delete').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "This social media will be deleted permanently.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr('data-id');
                document.location.href = 'social_media_delete.php?id=' + id;
            }
        })
    });
</script>