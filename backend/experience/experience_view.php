<?php
require_once("../../assets/session.php");
$sql = "SELECT * FROM experiences";
$query = mysqli_query($conn, $sql);
require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">View Experiences</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">View Experiences</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered align-middle">
                            <thead class="bg-info">
                                <tr>
                                    <th width="5%" class="text-center">Serial</th>
                                    <th width="15%" class="text-center">Company</th>
                                    <th width="18%" class="text-center">Designation</th>
                                    <th width="8%" class="text-center">Starting</th>
                                    <th width="8%" class="text-center">Ending</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $key => $experience) : ?>
                                    <tr>
                                        <td class="text-center"><?= ++$key ?></td>
                                        <td class="text-center"><?= $experience['company'] ?></td>
                                        <td class="text-center"><?= $experience['designation'] ?></td>
                                        <td class="text-center"><?= $experience['start_year'] ?></td>
                                        <td class="text-center"><?= $experience['end_year'] ?></td>
                                        <td><?= substr($experience['description'], 0, 60) . '...' ?></td>
                                        <td class="text-center"><a href="experience_status.php?id=<?= $experience['id'] ?>" class="btn btn-sm  <?= ($experience['status'] == 1) ? 'btn-success' : 'btn-secondary' ?>"><?= ($experience['status'] == 1) ? 'Activated' : 'Deactivated' ?></a></td>
                                        <td class="text-center">
                                            <a href="experience_edit.php?id=<?= $experience['id'] ?>" class="mb-1 btn btn-sm btn-primary">Edit</a>
                                            <?php if ($admin['role'] >= 2 && $experience['status'] == 0) : ?>
                                                <button class=" btn btn-danger btn-sm delete" data-id="<?= $experience['id'] ?>">Delete</button>
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
                        <a href="experience_add.php" class="btn btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New Experience</a>
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
            text: "This experience will be deleted permanently.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr('data-id');
                document.location.href = 'experience_delete.php?id=' + id;
            }
        })
    });
</script>