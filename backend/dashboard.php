<?php
require_once('../assets/session.php');
require_once('includes/header.php');
require_once('includes/sidebar.php');
require_once('includes/navbar.php');
//users
$user_sql = "SELECT * FROM users WHERE status = 0";
$user_query = mysqli_query($conn, $user_sql);
//skills
$skill_sql = "SELECT * FROM skills";
$skill_query = mysqli_query($conn, $skill_sql);
//services
$service_sql = "SELECT * FROM services";
$service_query = mysqli_query($conn, $service_sql);
//portfolio
$portfolio_sql = "SELECT * FROM portfolios";
$portfolio_query = mysqli_query($conn, $portfolio_sql);
//counter
$comment_sql_d = "SELECT * FROM comments";
$comment_query_d = mysqli_query($conn, $comment_sql_d);
//testimonials
$testimonial_sql = "SELECT * FROM testimonials";
$testimonial_query = mysqli_query($conn, $testimonial_sql);
//clients
$client_sql = "SELECT * FROM clients";
$client_query = mysqli_query($conn, $client_sql);
//message
$message_sql_d = "SELECT * FROM messages";
$message_query_d = mysqli_query($conn, $message_sql_d);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h4 class="tx-normal"><?= greetings() ?> <span class="tx-bold"><?= $admin['name'] ?></span>. <span class="tx-18">Here is a overview of your website.</span></h4>
        </div><!-- sl-page-title -->
        <div class="row mb-3">
            <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 pd-sm-25">
                    <div class="d-flex align-items-center">
                        <span class="tx-gray-500 mr-3"><i class="fas fa-users tx-40"></i></span>
                        <div class="mg-l-15">
                            <p class="tx-uppercase tx-11 tx-spacing-1 tx-medium tx-gray-600 mg-b-8">Total Users</p>
                            <h3 class="tx-bold tx-lato mg-b-0"><?= mysqli_num_rows($user_query) ?></h3>
                        </div>
                    </div>
                </div><!-- card -->
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 pd-sm-25">
                    <div class="d-flex align-items-center">
                        <span class="tx-gray-500 mr-3"><i class="far fa-lightbulb tx-40"></i></span>
                        <div class="mg-l-15">
                            <p class="tx-uppercase tx-11 tx-spacing-1 tx-medium tx-gray-600 mg-b-8">Total Skills</p>
                            <h3 class="tx-bold tx-lato mg-b-0"><?= mysqli_num_rows($skill_query) ?></h3>
                        </div>
                    </div>
                </div><!-- card -->
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 pd-sm-25">
                    <div class="d-flex align-items-center">
                        <span class="tx-gray-500 mr-3"><i class="fas fa-business-time tx-40"></i></span>
                        <div class="mg-l-15">
                            <p class="tx-uppercase tx-11 tx-spacing-1 tx-medium tx-gray-600 mg-b-8">Total Services</p>
                            <h3 class="tx-bold tx-lato mg-b-0"><?= mysqli_num_rows($service_query) ?></h3>
                        </div>
                    </div>
                </div><!-- card -->
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 pd-sm-25">
                    <div class="d-flex align-items-center">
                        <span class="tx-gray-500 mr-3"><i class="fas fa-project-diagram tx-40"></i></span>
                        <div class="mg-l-15">
                            <p class="tx-uppercase tx-11 tx-spacing-1 tx-medium tx-gray-600 mg-b-8">Total Portfolio</p>
                            <h3 class="tx-bold tx-lato mg-b-0"><?= mysqli_num_rows($portfolio_query) ?></h3>
                        </div>
                    </div>
                </div><!-- card -->
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 pd-sm-25">
                    <div class="d-flex align-items-center">
                        <span class="tx-gray-500 mr-3"><i class="far fa-comment-alt tx-40"></i></span>
                        <div class="mg-l-15">
                            <p class="tx-uppercase tx-11 tx-spacing-1 tx-medium tx-gray-600 mg-b-8">Total Comments</p>
                            <h3 class="tx-bold tx-lato mg-b-0"><?= mysqli_num_rows($comment_query_d) ?></h3>
                        </div>
                    </div>
                </div><!-- card -->
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 pd-sm-25">
                    <div class="d-flex align-items-center">
                        <span class="tx-gray-500 mr-3"><i class="fas fa-mug-hot tx-40"></i></span>
                        <div class="mg-l-15">
                            <p class="tx-uppercase tx-11 tx-spacing-1 tx-medium tx-gray-600 mg-b-8">Total Testimonial</p>
                            <h3 class="tx-bold tx-lato mg-b-0"><?= mysqli_num_rows($testimonial_query) ?></h3>
                        </div>
                    </div>
                </div><!-- card -->
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 pd-sm-25">
                    <div class="d-flex align-items-center">
                        <span class="tx-gray-500 mr-3"><i class="fas fa-user-tie tx-40"></i></span>
                        <div class="mg-l-15">
                            <p class="tx-uppercase tx-11 tx-spacing-1 tx-medium tx-gray-600 mg-b-8">Total Client</p>
                            <h3 class="tx-bold tx-lato mg-b-0"><?= mysqli_num_rows($client_query) ?></h3>
                        </div>
                    </div>
                </div><!-- card -->
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 pd-sm-25">
                    <div class="d-flex align-items-center">
                        <span class="tx-gray-500 mr-3"><i class="far fa-comment tx-40"></i></span>
                        <div class="mg-l-15">
                            <p class="tx-uppercase tx-11 tx-spacing-1 tx-medium tx-gray-600 mg-b-8">Total Message</p>
                            <h3 class="tx-bold tx-lato mg-b-0"><?= mysqli_num_rows($message_query_d) ?></h3>
                        </div>
                    </div>
                </div><!-- card -->
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php require_once('includes/footer.php') ?>