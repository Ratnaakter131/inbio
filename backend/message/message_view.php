<?php
require_once("../../assets/session.php");
$id = $_GET['id'];
$sql = "SELECT * FROM messages WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
$message = mysqli_fetch_assoc($query);

if ($message['read_status'] == 0) {
    $sql = "UPDATE messages SET read_status = 1 WHERE id = '$id'";
    mysqli_query($conn, $sql);
}

require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Message</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Message</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <span class="tx-medium">Name:</span> <?= $message['name'] ?>
                            </div>
                            <div class="col-md-4">
                                <span class="tx-medium">Phone:</span> <?= $message['phone'] ?>
                            </div>
                            <div class="col-md-4">
                                <span class="tx-medium">Email:</span> <?= $message['email'] ?>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <span class="tx-medium">Subject:</span> <?= $message['subject'] ?>
                            </div>
                            <div class="col-md-4">
                                <span class="tx-medium">Sent At:</span> <?= date('h:i:s A | d F Y', strtotime($message['time'])) ?>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <p class="m-0 tx-medium">Message:</p><?= $message['message'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="<?= url() ?>backend/message/messages.php" class="btn btn-sm btn-primary"><i class="fas fa-undo"></i> Go Back</a>
                                    <button type="button" class="btn btn-sm btn-danger delete" data-id="<?= $message['id'] ?>"><i class="fas fa-trash"></i> Delete</button>
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
            text: "This message will be deleted permanently.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr('data-id');
                document.location.href = 'message_delete.php?id=' + id;
            }
        })
    });
</script>