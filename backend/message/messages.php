<?php
require_once("../../assets/session.php");
$sql = "SELECT * FROM messages ORDER BY id DESC";
$query = mysqli_query($conn, $sql);
require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Messages</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Messages</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover mg-b-0">
                            <tbody>
                                <?php foreach ($query as $message) : ?>
                                    <tr>
                                        <td width="4%" class="valign-middle text-right">
                                            <i class="far fa-comment"></i>
                                        </td>
                                        <td class="valign-middle">
                                            <a href="message_view.php?id=<?= $message['id'] ?>">
                                                <p class="mg-b-0">
                                                    <span class="<?= ($message['read_status'] == 0) ? 'tx-bold tx-gray-800' : 'tx-medium tx-gray-600' ?>"><?= $message['name'] ?></span>
                                                </p>
                                            </a>
                                        </td>
                                        <td class="valign-middle">
                                            <a href="message_view.php?id=<?= $message['id'] ?>">
                                                <p class="mg-b-0">
                                                    <span class="<?= ($message['read_status'] == 0) ? 'tx-bold tx-gray-800' : 'tx-medium tx-gray-600' ?>"><?= $message['subject'] ?></span>
                                                    <span class="tx-12 <?= ($message['read_status'] == 0) ? 'tx-gray-700' : 'tx-gray-600' ?>"><?= substr($message['message'], 0, 60) . '...' ?></span>
                                                </p>
                                            </a>
                                        </td>
                                        <td class="valign-middle"><?= date('h:i:s A | d F Y', strtotime($message['time'])) ?></td>
                                        <td class="valign-middle"><button type="button" class="btn btn-sm btn-danger rounded-circle delete" data-id="<?= $message['id'] ?>"><i class="fas fa-trash"></i></button></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php if (mysqli_num_rows($query) == 0) : ?>
                                    <tr>
                                        <td class="text-center" colspan="7">No message found</td>
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