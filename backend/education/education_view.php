<?php
require_once("../../assets/session.php");
$sql = "SELECT * FROM educations";
$query = mysqli_query($conn, $sql);
require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">View Educations</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">View Educations</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered align-middle">
                            <thead class="bg-info">
                                <tr>
                                    <th width="5%" class="text-center">Serial</th>
                                    <th width="8%" class="text-center">Course</th>
                                    <th width="23%" class="text-center">Institute Name</th>
                                    <th width="8%" class="text-center">Starting</th>
                                    <th width="8%" class="text-center">Ending</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $key => $education) : ?>
                                    <tr>
                                        <td class="text-center"><?= ++$key ?></td>
                                        <td class="text-center"><?= $education['course'] ?></td>
                                        <td class="text-center"><?= $education['institute'] ?></td>
                                        <td class="text-center"><?= $education['start_year'] ?></td>
                                        <td class="text-center"><?= $education['end_year'] ?></td>
                                        <td><?= substr($education['description'], 0, 80) . '...' ?></td>
                                        <td class="text-center"><a href="education_status.php?id=<?= $education['id'] ?>" class="btn btn-sm  <?= ($education['status'] == 1) ? 'btn-success' : 'btn-secondary' ?>"><?= ($education['status'] == 1) ? 'Activated' : 'Deactivated' ?></a></td>
                                        <?php if ($admin['role'] >= 2) : ?>
                                            <td class="text-center">
                                                <a href="education_edit.php?id=<?= $education['id'] ?>" class="mb-1 btn btn-sm btn-primary">Edit</a>
                                                <?php if ($education['status'] == 0) : ?>
                                                    <button class=" btn btn-danger btn-sm delete" data-id="<?= $education['id'] ?>">Delete</button>
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
                        <a href="education_add.php" class="btn btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New Education</a>
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
            text: "This education will be deleted permanently.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr('data-id');
                document.location.href = 'education_delete.php?id=' + id;
            }
        })
    });
</script>