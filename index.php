<?php
session_start();
require_once 'assets/db.php';
//banner image
$banner_image_sql = "SELECT * FROM banner_image WHERE status = 1";
$banner_image_query = mysqli_query($conn, $banner_image_sql);
$banner_image = mysqli_fetch_array($banner_image_query);
//banner contents
$banner_contents_sql = "SELECT * FROM banner_contents";
$banner_contents_query = mysqli_query($conn, $banner_contents_sql);
$banner_content = mysqli_fetch_array($banner_contents_query);
//social media
$social_medias_sql = "SELECT * FROM social_medias WHERE status = 1";
$social_medias_query = mysqli_query($conn, $social_medias_sql);
//site setting
$site_settings_sql = "SELECT * FROM site_setting";
$site_settings_query = mysqli_query($conn, $site_settings_sql);
$site_setting = mysqli_fetch_array($site_settings_query);
//service
$services_sql = "SELECT * FROM services WHERE status = 1";
$services_query = mysqli_query($conn, $services_sql);
//portfolio
$portfolios_sql = "SELECT * FROM portfolios WHERE status = 1 ORDER BY title ASC";
$portfolios_query = mysqli_query($conn, $portfolios_sql);
//educations
$educations_sql = "SELECT * FROM educations WHERE status = 1 ORDER BY start_year DESC";
$educations_query = mysqli_query($conn, $educations_sql);
//experiences
$experiences_sql = "SELECT * FROM experiences WHERE status = 1 ORDER BY start_year DESC";
$experiences_query = mysqli_query($conn, $experiences_sql);
//skills
$skills_sql_design = "SELECT * FROM skills WHERE status = 1 and type = 0 ORDER BY technology ASC";
$skills_query_design = mysqli_query($conn, $skills_sql_design);

$skills_sql_development = "SELECT * FROM skills WHERE status = 1 and type = 1 ORDER BY technology ASC";
$skills_query_development = mysqli_query($conn, $skills_sql_development);
//testimonials
$testimonials_sql = "SELECT * FROM testimonials WHERE status = 1 ORDER BY end_date DESC";
$testimonials_query = mysqli_query($conn, $testimonials_sql);
//clients
$clients_sql = "SELECT * FROM clients WHERE status = 1 ORDER BY name ASC";
$clients_query = mysqli_query($conn, $clients_sql);
//blog
$blogs_sql = "SELECT * FROM blogs WHERE status = 1 ORDER BY time DESC";
$blogs_query = mysqli_query($conn, $blogs_sql);
//contacts_info
$contacts_info_sql = "SELECT * FROM contacts_info";
$contacts_info_query = mysqli_query($conn, $contacts_info_sql);
$contact_info = mysqli_fetch_array($contacts_info_query);
//footer_image
$footer_image_sql = "SELECT * FROM footer_image";
$footer_image_query = mysqli_query($conn, $footer_image_sql);
$footer_image = mysqli_fetch_array($footer_image_query);
require_once('assets/functions.php');
require_once 'includes/header.php';
?>
<main class="main-page-wrapper">

    <!-- Start Slider Area -->
    <div id="home" class="rn-slider-area">
        <div class="slide slider-style-1">
            <div class="container">
                <div class="row row--30 align-items-center">
                    <div class="order-2 order-lg-1 col-lg-7 mt_md--50 mt_sm--50 mt_lg--30">
                        <div class="content">
                            <div class="inner">
                                <span class="subtitle"><?= $banner_content['sub_heading'] ?></span>
                                <h1 class="title">I’m <span><?= $banner_content['name'] ?></span><br>
                                    <span class="header-caption" id="page-top">
                                        <!-- type headline start-->
                                        <span class="cd-headline clip is-full-width">
                                            <span>a </span>
                                            <!-- ROTATING TEXT -->
                                            <span class="cd-words-wrapper">
                                                <b class="is-visible"><?= $banner_content['title_1'] ?></b>
                                                <b class="is-hidden"><?= $banner_content['title_2'] ?></b>
                                                <b class="is-hidden"><?= $banner_content['title_3'] ?></b>
                                            </span>
                                        </span>
                                        <!-- type headline end -->
                                    </span>
                                </h1>

                                <div>
                                    <p class="description"><?= $banner_content['description'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-12">
                                    <div class="social-share-inner-left">
                                        <span class="title">find with me</span>
                                        <ul class="social-share d-flex liststyle">
                                            <?php foreach ($social_medias_query as $social_media) : ?>
                                                <li><a href="<?= $social_media['link'] ?>"><i class="<?= $social_media['platform'] ?>"></i></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="order-1 order-lg-2 col-lg-5">
                        <div class="thumbnail">
                            <div class="inner">
                                <img src="assets/frontend/images/banner/<?= $banner_image['image'] ?>" alt="Personal Portfolio Images">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->

    <!-- Start Service Area -->
    <div class="rn-service-area rn-section-gap section-separator" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-left" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true">
                        <span class="subtitle">Services</span>
                        <h2 class="title">What I Do</h2>
                    </div>
                </div>
            </div>
            <div class="row row--25 mt_md--10 mt_sm--10">
                <?php foreach ($services_query as $service) : ?>
                    <!-- Start Single Service -->
                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-service">
                            <div class="inner">
                                <div class="icon">
                                    <!-- <i data-feather="menu"></i> -->
                                    <i class="<?= $service['icon'] ?>"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title"><?= $service['title'] ?></h4>
                                    <p class="description"><?= $service['description'] ?></p>
                                    <a class="read-more-button" href="javascript:;"><i class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End SIngle Service -->
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- End Service Area  -->

    <!-- Start Portfolio Area -->
    <div class="rn-portfolio-area rn-section-gap section-separator" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <span class="subtitle">Visit my portfolio and keep your feedback</span>
                        <h2 class="title">My Portfolio</h2>
                    </div>
                </div>
            </div>

            <div class="row row--25 mt--10 mt_md--10 mt_sm--10">
                <?php foreach ($portfolios_query as $portfolio) : ?>
                    <!-- Start Single Portfolio -->
                    <div data-aos="fade-up" data-aos-delay="100" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-portfolio" data-toggle="modal" data-target="#portfolio-<?= $portfolio['id'] ?>">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="javascript:void(0)">
                                        <img src="assets/frontend/images/portfolio/<?= $portfolio['image'] ?>" alt="Personal Portfolio Images">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="category-info">
                                        <div class="category-list">
                                            <a href="javascript:void(0)"><?= $portfolio['category'] ?></a>
                                        </div>
                                    </div>
                                    <h4 class="title"><a href="javascript:void(0)"><?= $portfolio['title'] ?> <i class="feather-arrow-up-right"></i></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Portfolio -->
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- End portfolio Area -->

    <!-- Start Resume Area -->
    <div class="rn-resume-area rn-section-gap section-separator" id="resume">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <span class="subtitle">5+ Years of Experience</span>
                        <h2 class="title">My Resume</h2>
                    </div>
                </div>
            </div>
            <div class="row mt--45">
                <div class="col-lg-12">
                    <ul class="rn-nav-list nav nav-tabs" id="myTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="skills-tab" data-toggle="tab" href="#skills" role="tab" aria-controls="skills" aria-selected="false">Skills</a>
                        </li>
                    </ul>
                    <!-- Start Tab Content Wrapper  -->
                    <div class="rn-nav-content tab-content" id="myTabContents">
                        <!-- Start Single Tab  -->
                        <div class="tab-pane show active fade single-tab-area" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="personal-experience-inner mt--40">
                                <div class="row">
                                    <!-- Start Skill List Area  -->
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <div class="content">
                                            <h4 class="maintitle">Education</h4>
                                            <div class="experience-list">
                                                <?php foreach ($educations_query as $education) : ?>
                                                    <!-- Start Single List  -->
                                                    <div class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4><?= $education['course'] ?></h4>
                                                                    <span><?= $education['institute'] ?> (<?= $education['start_year'] ?> - <?= $education['end_year'] ?>)</span>
                                                                </div>
                                                            </div>
                                                            <p class="description"><?= $education['description'] ?></p>
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Skill List Area  -->

                                    <!-- Start Skill List Area 2nd  -->
                                    <div class="col-lg-6 col-md-12 col-12 mt_md--60 mt_sm--60">
                                        <div class="content">
                                            <h4 class="maintitle">Job Experience</h4>
                                            <div class="experience-list">
                                                <?php foreach ($experiences_query as $experience) : ?>
                                                    <!-- Start Single List  -->
                                                    <div class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4><?= $experience['designation'] ?></h4>
                                                                    <span><?= $experience['company'] ?> (<?= $experience['start_year'] ?> - <?= $experience['end_year'] ?>)</span>
                                                                </div>
                                                            </div>
                                                            <p class="description"><?= $experience['description'] ?></p>
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Skill List Area  -->
                                </div>
                            </div>
                        </div>
                        <!-- End Single Tab  -->

                        <!-- Start Single Tab  -->
                        <div class="tab-pane fade " id="skills" role="tabpanel" aria-labelledby="skills-tab">
                            <div class="personal-experience-inner mt--40">
                                <div class="row row--40">

                                    <!-- Start Single Progressbar  -->
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="progress-wrapper">
                                            <div class="content">
                                                <span class="subtitle">Features</span>
                                                <h4 class="maintitle">Design Skills</h4>
                                                <?php foreach ($skills_query_design as $skill_design) : ?>
                                                    <!-- Start Single Progress Charts -->
                                                    <div class="progress-charts">
                                                        <h6 class="heading heading-h6"><?= $skill_design['technology'] ?></h6>
                                                        <div class="progress">
                                                            <div class="progress-bar wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: <?= $skill_design['percentage'] ?>%" aria-valuenow="<?= $skill_design['percentage'] ?>" aria-valuemin="0" aria-valuemax="100"><span class="percent-label"><?= $skill_design['percentage'] ?>%</span></div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Progress Charts -->
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Progressbar  -->

                                    <!-- Start Single Progressbar  -->
                                    <div class="col-lg-6 col-md-6 col-12 mt_sm--60">
                                        <div class="progress-wrapper">
                                            <div class="content">
                                                <span class="subtitle">Features</span>
                                                <h4 class="maintitle">Development Skills</h4>
                                                <?php foreach ($skills_query_development as $skill_development) : ?>
                                                    <!-- Start Single Progress Charts -->
                                                    <div class="progress-charts">
                                                        <h6 class="heading heading-h6"><?= $skill_development['technology'] ?></h6>
                                                        <div class="progress">
                                                            <div class="progress-bar wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: <?= $skill_development['percentage'] ?>%" aria-valuenow="<?= $skill_development['percentage'] ?>" aria-valuemin="0" aria-valuemax="100"><span class="percent-label"><?= $skill_development['percentage'] ?>%</span></div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Progress Charts -->
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Progressbar  -->

                                </div>
                            </div>
                        </div>
                        <!-- End Single Tab  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Resume Area -->
    <!-- Start Testimonia Area  -->
    <div class="rn-testimonial-area rn-section-gap section-separator" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <span class="subtitle">What Clients Say</span>
                        <h2 class="title">Testimonial</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-activation testimonial-pb mb--30">
                        <?php foreach ($testimonials_query as $testimonial) : ?>
                            <!-- Start Single testiminail -->
                            <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="assets/frontend/images/testimonial/<?= $testimonial['image'] ?>" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <h3 class="title"><?= $testimonial['name'] ?></h3>
                                            <span class="designation"><?= $testimonial['designation'] ?> of</span> <span class="subtitle"><?= $testimonial['company'] ?></span>
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title"><?= $testimonial['project_name'] ?></h3>
                                                <span class="date">Start: <?= !empty($testimonial['start_date']) ? date("d M Y", strtotime($testimonial['start_date'])) : 'N/A' ?> | End: <?= !empty($testimonial['end_date']) ? date("d M Y", strtotime($testimonial['end_date'])) : 'N/A' ?></span>
                                            </div>
                                            <div class="rating">
                                                <?php for ($i = 1; $i <= $testimonial['rating']; $i++) : ?>
                                                    <i class="fas fa-star"></i>
                                                <?php endfor ?>
                                                <?php
                                                $x = 5 - $testimonial['rating'];
                                                for ($i = 1; $i <= $x; $i++) : ?>
                                                    <i class="far fa-star"></i>
                                                <?php endfor ?>
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription"><?= $testimonial['content'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <!--End Single testiminail -->
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonia Area  -->
    <!-- Start Client Area -->
    <div class="rn-client-area rn-section-gap section-separator" id="clients">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span class="subtitle">Popular Clients</span>
                        <h2 class="title">Awesome Clients</h2>
                    </div>
                </div>
            </div>

            <div class="row row--25 mt--50 mt_md--40 mt_sm--40">

                <div class="col-lg-12">
                    <div class="tab-area">
                        <div class="d-flex align-items-start">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <div class="client-card">
                                        <?php foreach ($clients_query as $client) : ?>
                                            <!-- Start Single Brand  -->
                                            <div class="main-content">
                                                <div class="inner text-center">
                                                    <div class="thumbnail">
                                                        <img src="assets/frontend/images/client/<?= $client['image'] ?>" alt="Client-image">
                                                    </div>
                                                    <div class="seperator"></div>
                                                    <div class="client-name"><span><?= $client['name'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Brand  -->
                                        <?php endforeach ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End client section -->
    <!-- Start News Area -->
    <div class="rn-blog-area rn-section-gap section-separator" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true" class="section-title text-center">
                        <span class="subtitle">Visit my blog and keep your feedback</span>
                        <h2 class="title">My Blog</h2>
                    </div>
                    <?php if (mysqli_num_rows($blogs_query) == 0) : ?>
                        <div class="text-center pt-5" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true">
                            <span>No Blog found.</span>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <div class="row row--25 mt--30 mt_md--10 mt_sm--10">
                <?php foreach ($blogs_query as $blog) : ?>
                    <!-- Start Single blog -->
                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="400" data-aos-once="true" class="col-lg-6 col-xl-4 mt--30 col-md-6 col-sm-12 col-12 mt--30">
                        <div class="rn-blog" data-toggle="modal" data-target="#blog-<?= $blog['id'] ?>">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="javascript:void(0)">
                                        <img src="assets/frontend/images/blog/<?= $blog['image'] ?>" alt="Blog Images">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="category-info">
                                        <div class="category-list">
                                            <a href="javascript:void(0)"><?= $blog['category'] ?></a>
                                        </div>
                                        <div class="meta">
                                            <span><i class="feather-clock"></i> <?= date("h:i A | d M y", strtotime($blog['time'])) ?></span>
                                        </div>
                                    </div>
                                    <h4 class="title"><a href="javascript:void(0)"><?= $blog['title'] ?> <i class="feather-arrow-up-right"></i></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single blog -->
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- ENd Mews Area -->
    <!-- Start Contact section -->
    <div class="rn-contact-area rn-section-gap section-separator" id="contacts">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <span class="subtitle">Contact</span>
                        <h2 class="title">Contact With Me</h2>
                    </div>
                </div>
            </div>
            <div class="row mt--50 mt_md--40 mt_sm--40 mt-contact-sm">
                <div class="col-lg-5">
                    <div class="contact-about-area">
                        <div class="thumbnail">
                            <img src="assets/frontend/images/contact/<?= $footer_image['image'] ?>" alt="contact-img">
                        </div>
                        <div class="title-area">
                            <h4 class="title">Get In Touch</h4>
                        </div>
                        <div class="description">
                            <span class="phone">Phone: <a href="tel:<?= $contact_info['phone'] ?>"><?= $contact_info['phone'] ?></a></span>
                            <span class="mail">Email: <a href="mailto:<?= $contact_info['email'] ?>"><?= $contact_info['email'] ?></a></span>
                            <span class="phone">Address: <?= $contact_info['address'] ?></span>
                        </div>
                        <div class="social-area">
                            <div class="name">FIND WITH ME</div>
                            <div class="social-icone">
                                <?php foreach ($social_medias_query as $social_media) : ?>
                                    <a href="<?= $social_media['link'] ?>"><i class="<?= $social_media['platform'] ?>"></i></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-aos-delay="600" class="col-lg-7 contact-input">
                    <div class="contact-form-wrapper">
                        <div class="introduce">

                            <form class="rnt-contact-form rwt-dynamic-form row" id="contact-form">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Your Name</label>
                                        <input class="form-control form-control-lg" name="name" id="name" type="text">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input class="form-control" name="phone" id="phone" type="text">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control form-control-sm" id="email" name="email" type="email">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="subject">subject</label>
                                        <input class="form-control form-control-sm" id="subject" name="subject" type="text">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="message">Your Message</label>
                                        <textarea name="message" id="message" cols="30" rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <button name="submit" type="submit" id="submit" class="rn-btn">
                                        <span>SEND MESSAGE</span>
                                        <i data-feather="arrow-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contuct section -->

    <!-- Modal Portfolio Body area Start -->
    <?php foreach ($portfolios_query as $portfolio) : ?>
        <div class="modal fade" id="portfolio-<?= $portfolio['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i data-feather="x"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row align-items-center">

                            <div class="col-lg-6">
                                <div class="portfolio-popup-thumbnail">
                                    <div class="image">
                                        <img class="w-100" src="assets/frontend/images/portfolio/<?= $portfolio['image'] ?>" alt="slide">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="text-content">
                                    <h3>
                                        <span><?= $portfolio['category'] ?></span> <?= $portfolio['title'] ?>
                                    </h3>
                                    <p class="mb--30"><?= $portfolio['desp'] ?></p>
                                    <div class="button-group mt--20">
                                        <a href="<?= $portfolio['link'] ?>" target="_blank" class="rn-btn">
                                            <span>VIEW PROJECT</span>
                                            <i data-feather="chevron-right"></i>
                                        </a>
                                    </div>

                                </div>
                                <!-- End of .text-content -->
                            </div>
                        </div>
                        <!-- End of .row Body-->
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- End Modal Portfolio area -->
    <!-- Modal Blog Body area Start -->
    <?php foreach ($blogs_query as $blog) : ?>
        <?php
        $comment_sql = "SELECT * FROM comments WHERE blog_id = $blog[id] and status = 1 ORDER BY id DESC";
        $comment_query = mysqli_query($conn, $comment_sql);
        ?>
        <div class="modal fade" id="blog-<?= $blog['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-news" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i data-feather="x"></i></span>
                        </button>
                    </div>

                    <!-- End of .modal-header -->

                    <div class="modal-body">
                        <img src="assets/frontend/images/blog/<?= $blog['image'] ?>" alt="blog image" class="img-fluid modal-feat-img">
                        <div class="news-details">
                            <span class="date"><i class="feather-clock"></i> <?= date("h:i A | d M Y", strtotime($blog['time'])) ?> <i class="ml-4 feather-message-square"></i> <?= mysqli_num_rows($comment_query) ?> Comment<?= mysqli_num_rows($comment_query) > 1 ? 's' : '' ?></span>
                            <h2 class="title"><?= $blog['title'] ?></h2>
                            <?= $blog['content'] ?>
                        </div>

                        <!-- Comment Section Area Start -->
                        <div class="comment-inner">
                            <h3 class="title mb--40 mt--50">Leave a Reply</h3>
                            <form class="comment-form">
                                <input type="hidden" value="<?= $blog['id'] ?>" name="blog_id">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <div class="rnform-group"><input type="text" placeholder="Name" name="name">
                                        </div>
                                        <div class="rnform-group"><input type="email" placeholder="Email" name="email">
                                        </div>
                                        <div class="rnform-group"><input type="url" placeholder="Website (Optional)" name="website">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <div class="rnform-group">
                                            <textarea placeholder="Comment" name="comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="rn-btn w-auto">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Comment Section End -->
                        <div class="comments">
                            <h4>Comments</h4>
                            <?php foreach ($comment_query as $comment) : ?>
                                <!-- Single Comment -->
                                <div class="single-comment">
                                    <div class="my-3 d-flex justify-content-between">
                                        <div class="user">
                                            <a href="<?= $comment['website'] ?>"><span><?= $comment['name'] ?></span></a> Says:
                                        </div>
                                        <div class="date">Date: <?= date("d F Y", strtotime($comment['date'])) ?></div>
                                    </div>
                                    <p class="text"><?= $comment['comment'] ?></p>
                                </div>
                                <!-- End Single Comment -->
                            <?php endforeach ?>
                            <?= mysqli_num_rows($comment_query) == 0 ? 'No Comments Found' : '' ?>
                        </div>
                    </div>
                    <!-- End of .modal-body -->
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- End Modal Blog area -->
    <!-- Back to  top Start -->
    <div class="backto-top">
        <div>
            <i data-feather="arrow-up"></i>
        </div>
    </div>
    <!-- Back to top end -->

</main>
<?php require_once 'includes/footer.php'; ?>