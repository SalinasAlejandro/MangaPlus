$(document).ready(function () {
  $(".img-animate").hover(
    function () {
      $(this).animate({
        "margin-top": "-10px",
      });
    },
    function () {
      $(this).animate({
        "margin-top": "10px",
      });
    }
  );
  $(".Updates-module_socials_2DpDY a:first-child").hover(
    function () {
      $(this).text("");
      $(this).toggleClass("changed");
    },
    function () {
      $(this).text("Discord");
      $(this).toggleClass("changed");
    }
  );
  $(".Updates-module_socials_2DpDY a:last-child").hover(
    function () {
      $(this).text("");
      $(this).toggleClass("changed");
    },
    function () {
      $(this).text("Facebook");
      $(this).toggleClass("changed");
    }
  );
});
