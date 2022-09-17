<?php
require_once("../../assets/session.php");
$sql = "SELECT * FROM portfolios";
$query = mysqli_query($conn, $sql);
require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">View Portfolios</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">View Portfolios</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="bg-info">
                                <tr>
                                    <th class="text-center">Serial</th>
                                    <th class="text-center">Image</th>
                                    <th width="15%" class="text-center">Title</th>
                                    <th width="12%" class="text-center">Category</th>
                                    <th class="text-center">Description</th>
                                    <th width="10%" class="text-center">Link</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $key => $portfolio) : ?>
                                    <tr>
                                        <td><?= ++$key ?></td>
                                        <td><img style="max-height: 50px;" src="../../assets/frontend/images/portfolio/<?= $portfolio['image'] ?>" alt="testimonial image"></td>
                                        <td><?= $portfolio['title'] ?></td>
                                        <td><?= $portfolio['category'] ?></td>
                                        <td class="text-left"><?= substr($portfolio['desp'], 0, 60) . '...' ?></td>
                                        <td><a href="<?= $portfolio['link'] ?>" class="btn btn-sm btn-secondary">Link</a></td>
                                        <td><a href="portfolio_status.php?id=<?= $portfolio['id'] ?>" class="btn btn-sm  <?= ($portfolio['status'] == 1) ? 'btn-success' : 'btn-secondary' ?>"><?= ($portfolio['status'] == 1) ? 'Activated' : 'Deactivated' ?></a></td>
                                        <td>
                                            <a href="portfolio_edit.php?id=<?= $portfolio['id'] ?>" class="btn btn-sm btn-primary mb-1">Edit</a>
                                            <?php if ($admin['role'] >= 2 && $portfolio['status'] == 0) : ?>
                                                <button class=" btn btn-danger btn-sm delete" data-id="<?= $portfolio['id'] ?>">Delete</button>
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
                        <a href="portfolio_add.php" class="btn btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New Portfolio</a>
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
            text: "This Portfolio will be deleted permanently.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr('data-id');
                document.location.href = 'portfolio_delete.php?id=' + id;
            }
        })
    });
</script>