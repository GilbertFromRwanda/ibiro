$(window).scroll(function(){
  parallax();
});
function parallax(){
 var scrolling=$(window).scrollTop();
 $("#first").css('background-position','center'+scrolling+'px');
}
