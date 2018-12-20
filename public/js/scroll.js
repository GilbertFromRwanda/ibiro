$(window).scroll(function(){
  if ($(document).scrollTop()>50) {
    $("header").css({
      "position":"relative",
      "box-shadow":"0px 0px 0px 2px solid #ddd"
    });
    $(".dash-menu").css({
      "position":"fixed"
    });
    //
  }else {
    $("header").css({
      "position":"relative",
      "border-bottom":"none"
    });
    $(".dash-menu").css({
      "position":"absolute"
    });
  }
});

/***/
$("#humber").on("click",function(){
  $(".mobile-header").css({"margin-top":"0px"});
  $(".mobile-header").animate({width:'toggle'},200).delay(200);
});
