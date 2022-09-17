<!-- Start Footer Area -->
<div class="rn-footer-area rn-section-gap section-separator">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-area text-center">

                    <div class="logo">
                        <a href="<?= url() ?>">
                            <img style="max-width: 130px;" src="assets/frontend/images/logo/<?= $site_setting['logo'] ?>" alt="logo">
                        </a>
                    </div>

                    <p class="description mt--30"><?= $site_setting['name'] ?> © <?= date('Y') ?> | All Rights Reserved</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Footer Area -->

<!-- JS ============================================ -->
<script src="assets/frontend/js/vendor/jquery.js"></script>
<script src="assets/frontend/js/vendor/modernizer.min.js"></script>
<script src="assets/frontend/js/vendor/feather.min.js"></script>
<script src="assets/frontend/js/vendor/slick.min.js"></script>
<script src="assets/frontend/js/vendor/bootstrap.js"></script>
<script src="assets/frontend/js/vendor/text-type.js"></script>
<script src="assets/frontend/js/vendor/wow.js"></script>
<script src="assets/frontend/js/vendor/aos.js"></script>
<script src="assets/frontend/js/vendor/particles.js"></script>
<script src="assets/dashboard/lib/sweetalert/sweetalert.min.js"></script>

<!-- main JS -->
<script src="assets/frontend/js/main.js"></script>
<script>
    $(document).ready(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        //blogs
        $(".comment-form").on("submit", function(e) {
            e.preventDefault();
            var dataString = $(this).serialize();

            //data validation
            var name = $(this).find("input[name=name]").val();
            var email = $(this).find("input[name=email]").val();
            var comment = $(this).find("textarea[name=comment]").val();

            if (name == '' || email == '' || comment == '') {
                $(".modal").css("z-index", 1000);
                Toast.fire({
                    icon: 'error',
                    title: "All fields are required"
                });
                setTimeout(function() {
                    $(".modal").css("z-index", 2000)
                }, 3000);
            } else {
                $(this).find(".messasge").html("");
                $.ajax({
                    type: "POST",
                    url: "backend/comments/comments_post.php",
                    data: dataString,
                    success: function(data) {
                        var response = JSON.parse(data);
                        if (response.status == 'success') {
                            $(".modal").css("z-index", 1000);
                            Toast.fire({
                                icon: 'success',
                                title: response.message
                            });
                            setTimeout(function() {
                                $(".modal").css("z-index", 2000)
                            }, 3000);
                            $(".comment-form").each(function() {
                                this.reset();
                            });
                        } else {
                            $(".modal").css("z-index", 1000);
                            Toast.fire({
                                icon: 'error',
                                title: response.message
                            });
                            setTimeout(function() {
                                $(".modal").css("z-index", 2000)
                            }, 3000);
                        }
                    }
                });
            }
        });

        //message
        $("#contact-form").on("submit", function(e) {
            e.preventDefault();
            var dataString = $(this).serialize();

            //data validation
            var name = $("input[name=name]").val();
            var email = $("input[name=email]").val();
            var phone = $("input[name=phone]").val();
            var subject = $("input[name=subject]").val();
            var message = $("textarea[name=message]").val();

            if (name == '' || email == '' || phone == '' || subject == '' || message == '') {
                Toast.fire({
                    icon: 'error',
                    title: "All fields are required"
                })
            } else {
                $.ajax({
                    type: "POST",
                    url: "backend/message/message_post.php",
                    data: dataString,
                    success: function(data) {
                        var response = JSON.parse(data);
                        if (response.status == 'success') {
                            Toast.fire({
                                icon: 'success',
                                title: response.message
                            })
                            $("#contact-form").each(function() {
                                this.reset();
                            });
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: response.message
                            })
                        }
                    }
                });
            }
        });
    });
</script>
</body>

</html>