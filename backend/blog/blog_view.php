<?php
require_once("../../assets/session.php");
$sql = "SELECT * FROM blogs ORDER BY id DESC";
$query = mysqli_query($conn, $sql);
require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">View Blogs</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">View Blogs</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="bg-info">
                                <tr>
                                    <th class="text-center">Serial</th>
                                    <th class="text-center">Image</th>
                                    <th width="15%" class="text-center">Title</th>
                                    <th width="12%" class="text-center">Category</th>
                                    <th class="text-center">Content</th>
                                    <th width="10%" class="text-center">Publish On</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $key => $blog) : ?>
                                    <tr>
                                        <td><?= ++$key ?></td>
                                        <td><img style="max-height: 50px;" src="../../assets/frontend/images/blog/<?= $blog['image'] ?>" alt="testimonial image"></td>
                                        <td><?= $blog['title'] ?></td>
                                        <td><?= $blog['category'] ?></td>
                                        <td class="text-left"><?= substr($blog['content'], 0, 60) . '...' ?></td>
                                        <td><?= date("h:i A | d M y", strtotime($blog['time'])) ?></td>
                                        <td><a href="blog_status.php?id=<?= $blog['id'] ?>" class="btn btn-sm  <?= ($blog['status'] == 1) ? 'btn-success' : 'btn-secondary' ?>"><?= ($blog['status'] == 1) ? 'Activated' : 'Deactivated' ?></a></td>
                                        <td>
                                            <a href="blog_edit.php?id=<?= $blog['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <?php if ($admin['role'] >= 2 && $blog['status'] == 0) : ?>
                                                <button class="my-1 btn btn-danger btn-sm delete" data-id="<?= $blog['id'] ?>">Delete</button>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                <?php if (mysqli_num_rows($query) == 0) : ?>
                                    <tr>
                                        <td class="text-center" colspan="9">No data found</td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                        <a href="blog_add.php" class="btn btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New Blog</a>
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
            text: "This blog will be deleted permanently.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr('data-id');
                document.location.href = 'blog_delete.php?id=' + id;
            }
        })
    });
</script>