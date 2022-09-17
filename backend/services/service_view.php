<?php
require_once("../../assets/session.php");
$sql = "SELECT * FROM services";
$query = mysqli_query($conn, $sql);
require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">View Services</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">View Services</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered align-middle">
                            <thead class="bg-info">
                                <tr>
                                    <th width="5%" class="text-center">Serial</th>
                                    <th width="10%" class="text-center">Icon</th>
                                    <th width="15%" class="text-center">Title</th>
                                    <th class="text-center">Description</th>
                                    <th width="15%" class="text-center">Status</th>
                                    <?php if ($admin['role'] >= 2) : ?>
                                        <th width="15%" class="text-center">Action</th>
                                    <?php endif ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $key => $service) : ?>
                                    <tr>
                                        <td class="text-center"><?= ++$key ?></td>
                                        <td class="text-center"><i class="icon-view <?= $service['icon'] ?>"></i></td>
                                        <td class="text-center"><?= $service['title'] ?></td>
                                        <td><?= substr($service['description'], 0, 60) . '...' ?></td>
                                        <td class="text-center"><a href="service_status.php?id=<?= $service['id'] ?>" class="btn btn-sm  <?= ($service['status'] == 1) ? 'btn-success' : 'btn-secondary' ?>"><?= ($service['status'] == 1) ? 'Activated' : 'Deactivated' ?></a></td>
                                        <?php if ($admin['role'] >= 2) : ?>
                                            <td class="text-center">
                                                <a href="service_edit.php?id=<?= $service['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                                <?php if ($service['status'] == 0) : ?>
                                                    <button class=" btn btn-danger btn-sm delete" data-id="<?= $service['id'] ?>">Delete</button>
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
                        <a href="service_add.php" class="btn btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New Service</a>
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
            text: "This service will be deleted permanently.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr('data-id');
                document.location.href = 'service_delete.php?id=' + id;
            }
        })
    });
</script>