<?php
require_once("../../assets/session.php");
$sql = "SELECT * FROM blog_categories";
$query = mysqli_query($conn, $sql);
require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">View Blog Categories</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">View Blog Categories</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="bg-info">
                                <tr>
                                    <th class="text-center w-25">Serial</th>
                                    <th class="text-center">Category Name</th>
                                    <th class="text-center w-25">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $key => $category) : ?>
                                    <tr>
                                        <td><?= ++$key ?></td>
                                        <td><?= $category['name'] ?></td>
                                        <td>
                                            <?php if ($admin['role'] >= 2) : ?>
                                                <button class="btn btn-primary btn-sm edit" type="button" data-id="<?= $category['id'] ?>" data-toggle="modal" data-target="#edit-blog-category">Edit</button>
                                                <button class=" btn btn-danger btn-sm delete" data-id="<?= $category['id'] ?>">Delete</button>
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
                        <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#add-blog-category"><i class="fas fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php
require_once("../includes/blog_category_modal.php");
require_once("../includes/footer.php");
?>

<script>
    $('.edit').click(function() {
        $tr = $(this).closest('tr');
        let data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        let id = $(this).attr('data-id');
        $("#cat_name").val(data[1]);
        $("#cat_id").val(id);
    });

    $('.delete').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "This category will be deleted permanently.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr('data-id');
                document.location.href = 'blog_category_delete.php?id=' + id;
            }
        })
    });
</script>