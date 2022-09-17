<!-- Start Header -->
<header class="rn-header haeder-default black-logo-version header--fixed header--sticky">
    <div class="header-wrapper rn-popup-mobile-menu m--0 row align-items-center">
        <!-- Start Header Left -->
        <div class="col-lg-2 col-6">
            <div class="header-left">
                <div class="logo">
                    <a href="<?= url() ?>">
                        <img style="max-height: 40px" src="assets/frontend/images/logo/<?= $site_setting['logo'] ?>" alt="logo">
                    </a>
                </div>
            </div>
        </div>
        <!-- End Header Left -->
        <!-- Start Header Center -->
        <div class="col-lg-10 col-6">
            <div class="header-center">
                <nav id="sideNav" class="mainmenu-nav navbar-example2 d-none d-xl-block">
                    <!-- Start Mainmanu Nav -->
                    <ul class="primary-menu nav nav-pills">
                        <li class="nav-item"><a class="nav-link smoth-animation active" href="#home">Home</a></li>
                        <li class="nav-item"><a class="nav-link smoth-animation" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link smoth-animation" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link smoth-animation" href="#resume">Resume</a></li>
                        <li class="nav-item"><a class="nav-link smoth-animation" href="#testimonial">Testimonial</a></li>
                        <li class="nav-item"><a class="nav-link smoth-animation" href="#clients">Clients</a></li>
                        <li class="nav-item"><a class="nav-link smoth-animation" href="#blog">blog</a></li>
                        <li class="nav-item"><a class="nav-link smoth-animation" href="#contacts">Contact</a></li>
                    </ul>
                    <!-- End Mainmanu Nav -->
                </nav>
                <!-- Start Header Right  -->
                <div class="header-right">
                    <div class="hamberger-menu d-block d-xl-none">
                        <i id="menuBtn" class="feather-menu humberger-menu"></i>
                    </div>
                    <div class="close-menu d-block">
                        <span class="closeTrigger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </span>
                    </div>
                </div>
                <!-- End Header Right  -->

            </div>
        </div>
        <!-- End Header Center -->
    </div>
</header>
<!-- End Header Area -->
<!-- Start Popup Mobile Menu  -->
<div class="popup-mobile-menu">
    <div class="inner">
        <div class="menu-top">
            <div class="menu-header">
                <a class="logo" href="index-2.html">
                    <img style="max-height: 35px;" src="assets/frontend/images/logo/<?= $site_setting['logo'] ?>" alt="Personal Portfolio">
                </a>
                <div class="close-button">
                    <button class="close-menu-activation close"><i data-feather="x"></i></button>
                </div>
            </div>
        </div>
        <div class="content">
            <ul class="primary-menu nav nav-pills">
                <li class="nav-item"><a class="nav-link smoth-animation active" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#features">Features</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#resume">Resume</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#clients">Clients</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#pricing">Pricing</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#blog">blog</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#contacts">Contact</a></li>
            </ul>
            <!-- social sharea area -->
            <div class="social-share-style-1 mt--40">
                <span class="title">find with me</span>
                <ul class="social-share d-flex liststyle">
                    <?php foreach ($social_medias_query as $social_media) : ?>
                        <li><a href="<?= $social_media['link'] ?>"><i class="<?= $social_media['platform'] ?>"></i></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- end -->
        </div>
    </div>
</div>
<!-- End Popup Mobile Menu  -->