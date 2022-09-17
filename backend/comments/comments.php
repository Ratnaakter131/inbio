<?php
require_once("../../assets/session.php");
$sql = "SELECT * FROM comments ORDER BY id DESC";
$query = mysqli_query($conn, $sql);
require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Comments</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Comments</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover mg-b-0 valign-middle">
                            <thead class="bg-info">
                                <tr>
                                    <th width="5%" class="text-center">Serial</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Website</th>
                                    <th class="text-center">Comment</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Date</th>
                                    <?php if ($admin['role'] >= 2) : ?>
                                        <th class="text-center">Action</th>
                                    <?php endif ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $key => $comment) : ?>
                                    <tr>
                                        <td class="text-center"><?= ++$key ?></td>
                                        <td class="text-center"><a href="comments_view.php?id=<?= $comment['id'] ?>">
                                                <p class="mg-b-0"><span class="tx-gray-700"><?= $comment['name'] ?></span></p>
                                            </a></td>
                                        <td class="text-center"><a href="comments_view.php?id=<?= $comment['id'] ?>">
                                                <p class="mg-b-0"><span class="tx-gray-700"><?= $comment['email'] ?></span></p>
                                            </a></td>
                                        <td class="text-center"><?= !empty($comment['website']) ? $comment['website'] : 'N/A' ?></td>
                                        <td class="text-center"><?= substr($comment['comment'], 0, 60) . '...' ?></td>
                                        <td class="text-center"><a href="comments_status.php?id=<?= $comment['id'] ?>" class="btn btn-sm  <?= ($comment['status'] == 1) ? 'btn-success' : 'btn-warning' ?>"><?= ($comment['status'] == 1) ? 'Approved' : 'Pending' ?></a></td>
                                        <td class="text-center"><?= date('d M y', strtotime($comment['date'])) ?></td>
                                        <?php if ($admin['role'] >= 2) : ?>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-danger delete" data-id="<?= $comment['id'] ?>">Delete</button>
                                            </td>
                                        <?php endif ?>
                                    </tr>
                                <?php endforeach; ?>
                                <?php if (mysqli_num_rows($query) == 0) : ?>
                                    <tr>
                                        <td class="text-center" colspan="7">No comment found</td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
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
            text: "This comment will be deleted permanently.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr('data-id');
                document.location.href = 'comments_delete.php?id=' + id;
            }
        })
    });
</script>