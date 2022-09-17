<?php
require_once("../../assets/session.php");
$sql = "SELECT * FROM testimonials";
$query = mysqli_query($conn, $sql);
require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">View Testimonials</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">View Testimonials</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="bg-info">
                                <tr>
                                    <th class="text-center">Serial</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Client Name</th>
                                    <th class="text-center">Company Name</th>
                                    <th class="text-center">Designation</th>
                                    <th class="text-center">Project</th>
                                    <th class="text-center">Start</th>
                                    <th class="text-center">End</th>
                                    <th class="text-center">Rating</th>
                                    <th class="text-center">Content</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $key => $testimonial) : ?>
                                    <tr>
                                        <td><?= ++$key ?></td>
                                        <td><img style="max-height: 50px;" src="../../assets/frontend/images/testimonial/<?= $testimonial['image'] ?>" alt="testimonial image"></td>
                                        <td><?= $testimonial['name'] ?></td>
                                        <td><?= $testimonial['company'] ?></td>
                                        <td><?= $testimonial['designation'] ?></td>
                                        <td><?= $testimonial['project_name'] ?></td>
                                        <td><?= !empty($testimonial['start_date']) ? date("d M Y", strtotime($testimonial['start_date'])) : 'N/A' ?></td>
                                        <td><?= !empty($testimonial['end_date']) ? date("d M Y", strtotime($testimonial['end_date'])) : 'N/A' ?></td>
                                        <td><?= $testimonial['rating'] ?></td>
                                        <td class="text-left"><?= substr($testimonial['content'], 0, 50) . '...' ?></td>
                                        <td><a href="testimonial_status.php?id=<?= $testimonial['id'] ?>" class="btn btn-sm  <?= ($testimonial['status'] == 1) ? 'btn-success' : 'btn-secondary' ?>"><?= ($testimonial['status'] == 1) ? 'Activated' : 'Deactivated' ?></a></td>
                                        <td>
                                            <a href="testimonial_edit.php?id=<?= $testimonial['id'] ?>" class="mb-1 btn btn-sm btn-primary">Edit</a>
                                            <?php if ($admin['role'] >= 2 && $testimonial['status'] == 0) : ?>
                                                <button class=" btn btn-danger btn-sm delete" data-id="<?= $testimonial['id'] ?>">Delete</button>
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
                        <a href="testimonial_add.php" class="btn btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New Testimonial</a>
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
            text: "This testimonial will be deleted permanently.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr('data-id');
                document.location.href = 'testimonial_delete.php?id=' + id;
            }
        })
    });
</script>