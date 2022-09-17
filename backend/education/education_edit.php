<?php
require_once('../../assets/session.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM educations WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $education = mysqli_fetch_assoc($query);
} else {
    $_SESSION['error'] = 'Please select a education to edit.';
    die(header('location: education_view.php'));
}
require_once('../includes/header.php');
require_once('../includes/sidebar.php');
require_once('../includes/navbar.php');
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Edit Education</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Edit Education</h5>
                    </div>
                    <div class="card-body">
                        <form action="education_edit_process.php" method="POST">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="course">Course Name</label>
                                    <input type="text" class="form-control" id="course" name="course" value="<?= $education['course'] ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="start_year">Starting Year</label>
                                    <input type="text" class="form-control" id="start_year" name="start_year" value="<?= $education['start_year'] ?>" autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label for="end_year">Ending Year</label>
                                    <input type="text" class="form-control" id="end_year" name="end_year" value="<?= $education['end_year'] ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="institute">Institute Name</label>
                                <input type="text" class="form-control" id="institute" name="institute" value="<?= $education['institute'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4"><?= $education['description'] ?></textarea>
                                <span class="tx-12 text-muted">Limit: 170 Characters</span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="edit">Edit Education</button>
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
<script>
    $(function() {
        $("#start_year").datepicker({
            yearRange: "c-100:c",
            changeMonth: false,
            changeYear: true,
            showButtonPanel: true,
            closeText: 'Select',
            currentText: 'This year',
            onClose: function(dateText, inst) {
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).val($.datepicker.formatDate('yy', new Date(year, 1, 1)));
            }
        }).focus(function() {
            $(".ui-datepicker-month").hide();
            $(".ui-datepicker-calendar").hide();
            $(".ui-datepicker-current").hide();
            $(".ui-datepicker-prev").hide();
            $(".ui-datepicker-next").hide();
            $("#ui-datepicker-div").position({
                my: "left top",
                at: "left bottom",
                of: $(this)
            });
        }).attr("readonly", false);

        $("#end_year").datepicker({
            yearRange: "c-100:c",
            changeMonth: false,
            changeYear: true,
            showButtonPanel: true,
            closeText: 'Select',
            currentText: 'This year',
            onClose: function(dateText, inst) {
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).val($.datepicker.formatDate('yy', new Date(year, 1, 1)));
            }
        }).focus(function() {
            $(".ui-datepicker-month").hide();
            $(".ui-datepicker-calendar").hide();
            $(".ui-datepicker-current").hide();
            $(".ui-datepicker-prev").hide();
            $(".ui-datepicker-next").hide();
            $("#ui-datepicker-div").position({
                my: "left top",
                at: "left bottom",
                of: $(this)
            });
        }).attr("readonly", false);
    });
</script>