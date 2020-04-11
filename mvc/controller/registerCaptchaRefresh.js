function refreshCaptcha() {
  $('#refreshCaptcha').addClass("rotate-center");
  $('#captchaStyle').attr("src", "mvc/controller/captchaGenerator.php");
  setTimeout(function(){
    $('#refreshCaptcha').removeClass("rotate-center");
}, 700);
}
