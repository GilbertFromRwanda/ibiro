$("#load-menu").on("click",function(){
  $(".dash-menu").animate({
  width:'toggle'},200).delay(600);
});
$("#colmn a").on("click",function(){
 $(".dash-menu").toggle();
});
