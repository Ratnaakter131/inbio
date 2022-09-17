<?php
require_once("../../assets/session.php");
$sql = "SELECT * FROM banner_image";
$query = mysqli_query($conn, $sql);
require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">View Banner Image</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">View Banner Image</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="bg-info">
                                <tr>
                                    <th class="text-center">Serial</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $key => $image) : ?>
                                    <tr>
                                        <td><?= ++$key ?></td>
                                        <td><img style="max-width: 100px;" src="../../assets/frontend/images/banner/<?= $image['image'] ?>" alt="banner image"></td>
                                        <td>
                                            <label class="switch"><input type="checkbox" class="status" data-id="<?= $image['id'] ?>" <?= ($image['status'] == 1) ? 'checked disabled' : '' ?>><span class="slider round"></span></label>
                                        </td>
                                        <td>
                                            <?php if ($image['status'] == 0 && $admin['role'] >= 2) : ?>
                                                <button class=" btn btn-danger btn-sm delete" data-id="<?= $image['id'] ?>">Delete</button>
                                            <?php else : ?>
                                                <span>- - -</span>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                <?php if (mysqli_num_rows($query) == 0) : ?>
                                    <tr>
                                        <td class="text-center" colspan="7">No data found</td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                        <a href="banner_image_add.php" class="btn btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New Image</a>
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
            text: "This image will be deleted permanently.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr('data-id');
                document.location.href = 'banner_image_delete.php?id=' + id;
            }
        })
    });

    $('.status').click(function() {
        let id = $(this).attr('data-id');
        document.location.href = 'banner_image_active.php?id=' + id;
    })
</script>