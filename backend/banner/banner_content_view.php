<?php
require_once("../../assets/session.php");
$sql = "SELECT * FROM banner_contents";
$query = mysqli_query($conn, $sql);
require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">View Banner Content</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">View Banner Content</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="bg-info">
                                <tr>
                                    <th width="12%" class="text-center">Sub Heading</th>
                                    <th width="12%" class="text-center">Name</th>
                                    <th width="15%" class="text-center">Title One</th>
                                    <th width="15%" class="text-center">Title Two</th>
                                    <th width="15%" class="text-center">Title Three</th>
                                    <th class="text-center">Description</th>
                                    <th width="8%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $key => $content) : ?>
                                    <tr>
                                        <td><?= $content['sub_heading'] ?></td>
                                        <td><?= $content['name'] ?></td>
                                        <td><?= $content['title_1'] ?></td>
                                        <td><?= $content['title_2'] ?></td>
                                        <td><?= $content['title_3'] ?></td>
                                        <td class="text-left"><?= substr($content['description'], 0, 60) . '...' ?></td>
                                        <td class="text-center">
                                            <?php if ($admin['role'] >= 2) : ?>
                                                <a href="banner_content_edit.php?id=<?= $content['id'] ?>" class=" btn btn-primary btn-sm">Edit</a>
                                            <?php else : ?>
                                                <span>- - -</span>
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
                        <?php if (mysqli_num_rows($query) == 0) : ?>
                            <a href="banner_content_add.php" class="btn btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New Content</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php require_once("../includes/footer.php"); ?>