<?php
require_once("../../assets/session.php");
$id = $_GET['id'];
$sql = "SELECT * FROM comments WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
$comment = mysqli_fetch_assoc($query);

require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Comment</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Comment</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <span class="tx-medium">Name:</span> <?= $comment['name'] ?>
                            </div>
                            <div class="col-md-3">
                                <span class="tx-medium">Email:</span> <?= $comment['email'] ?>
                            </div>
                            <div class="col-md-4">
                                <span class="tx-medium">Website:</span> <?= !empty($comment['website']) ? $comment['website'] : 'N/A' ?>
                            </div>
                            <div class="col-md-2">
                                <span class="tx-medium">Date:</span> <?= date('d F Y', strtotime($comment['date'])) ?>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <p class="m-0 tx-medium">Comment:</p><?= $comment['comment'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="<?= url() ?>backend/comments/comments.php" class="btn btn-sm btn-primary"><i class="fas fa-undo"></i> Go Back</a>
                                    <a href="comments_status.php?id=<?= $comment['id'] ?>" class="btn btn-sm  <?= ($comment['status'] == 1) ? 'btn-success' : 'btn-warning' ?>"><i class="far fa-question-circle"></i> <?= ($comment['status'] == 1) ? 'Approved' : 'Pending' ?></a>
                                    <button type="button" class="btn btn-sm btn-danger delete" data-id="<?= $comment['id'] ?>"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        </div>
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