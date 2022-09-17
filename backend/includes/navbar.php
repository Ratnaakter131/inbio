<!-- ########## START: HEAD PANEL ########## -->
<div class="sl-header">
    <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
        <nav class="nav">
            <div class="dropdown">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <div class="admin-name">
                        <span class="logged-name"><?= $admin['name']; ?><span class="admin-role"><?= print_admin_role(); ?></span></span>
                        <img src="<?= url() ?>assets/dashboard/images/profile_pictures/<?= $admin['profile_pic'] ?>" class="wd-32 rounded-circle" alt="">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href="<?= url() ?>backend/user_update.php?id=<?= $admin['id'] ?>"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                        <li><a href="<?= url() ?>logout.php"><i class="icon ion-power"></i> Logout</a></li>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
            <a id="btnRightMenu" href="" class="pos-relative">
                <i class="ion-ios-chatboxes-outline tx-28"></i>
                <!-- start: if statement -->
                <?php if (mysqli_num_rows($message_query) > 0) : ?>
                    <span class="square-8 bg-danger"></span>
                <?php endif; ?>
                <!-- end: if statement -->
            </a>
        </div><!-- navicon-right -->
    </div><!-- sl-header-right -->
</div><!-- sl-header -->
<!-- ########## END: HEAD PANEL ########## -->

<!-- ########## START: RIGHT PANEL ########## -->
<div class="sl-sideright">
    <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#messages">Unread Messages (<?= mysqli_num_rows($message_query) ?>)</a>
        </li>
    </ul><!-- sidebar-tabs -->

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
            <div class="media-list">
                <!-- loop starts here -->
                <?php foreach ($message_query as $message_n) : ?>
                    <a href="<?= url() ?>backend/message/message_view.php?id=<?= $message_n['id'] ?>" class="media-list-link">
                        <div class="media">
                            <div class="media-body">
                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13"><?= $message_n['name'] ?></p>
                                <span class="d-block tx-11 tx-gray-500"><?= date('h:i:s A | d F Y', strtotime($message_n['time'])) ?></span>
                                <p class="tx-13 mg-t-10 mg-b-0"><?= substr($message_n['message'], 0, 60) . '...' ?></p>
                            </div>
                        </div><!-- media -->
                    </a>
                <?php endforeach; ?>
                <!-- loop ends here -->
            </div><!-- media-list -->
            <div class="pd-15">
                <?php if (mysqli_num_rows($message_query) > 0) : ?>
                    <a href="<?= url() ?>backend/message/messages.php" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View All Messages</a>
                <?php else : ?>
                    <div class="text-center">
                        <span class="tx-12">No Unread Message Found</span>
                    </div>
                <?php endif; ?>
            </div>
        </div><!-- #messages -->
    </div><!-- tab-content -->
</div><!-- sl-sideright -->
<!-- ########## END: RIGHT PANEL ########## --->