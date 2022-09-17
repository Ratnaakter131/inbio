<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM skills WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $skill = mysqli_fetch_assoc($query);
} else {
    $_SESSION['error'] = 'Plsearch a skill to edit.';
    die(header('Location: skill_view.php'));
}
require_once('../includes/header.php');
require_once('../includes/sidebar.php');
require_once('../includes/navbar.php');
function selected($data) {
    global $skill;
    if ($skill['type'] == $data) {
        return 'selected';
    }
}
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Edit Skill</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Edit Skill</h5>
                    </div>
                    <div class="card-body">
                        <form action="skill_edit_process.php" method="POST">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="row form-group">
                                <div class="col-lg-7">
                                    <label for="technology">Technology</label>
                                    <input type="text" class="form-control" id="technology" name="technology" value="<?= $skill['technology'] ?>">
                                </div>
                                <div class="col-lg-2">
                                    <label for="percentage">Percentage</label>
                                    <input type="number" class="form-control" id="percentage" name="percentage" value="<?= $skill['percentage'] ?>">
                                </div>
                                <div class="col-lg-3">
                                    <label for="type">Skill Type</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="0" <?= selected('0') ?>>Design Tool</option>
                                        <option value="1" <?= selected('1') ?>>Technology</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="edit">Edit Skill</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php require_once('../includes/footer.php') ?>