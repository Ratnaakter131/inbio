//give current link active class
$(document).ready(function () {
  // var url = window.location.href;
  // $(".navbar a").each(function () {
  //   if (this.href == url) {
  //     $(this).addClass("active");
  //   }
  // });

  $(".eye-btn i").click(function () {
    if ($("#password").attr("type") == "password") {
      $("#password").attr("type", "text");
      $(this).removeClass("fa-eye");
      $(this).addClass("fa-eye-slash");
    } else {
      $("#password").attr("type", "password");
      $(this).removeClass("fa-eye-slash");
      $(this).addClass("fa-eye");
    }
  });
});
