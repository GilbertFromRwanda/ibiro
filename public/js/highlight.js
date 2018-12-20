$(document).ready(function(){

  var input;
  $("#input-search").keyup(function(){
 input=$(this).val();
 if(input=='')
 {
   $(".search-highlight").hide();
 }
 else {
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
  type:'post',
  url:'/highlight',
  data:{data:input},
  dataTy:'json',
  success:function(data)
  {
$(".search-highlight").show().html('')
    $.each(data.district,function(i,v){
$(".search-highlight").append("<a href='/Gushakisha/"+v.district_name+"'><div class='col-highlight' style='padding-left: 10px;  padding-right: 10px;padding-top: 5px;padding-bottom: 5px;cursor: pointer;'>  <h5 class='result'>"+v.district_name+"</h5></a>");
    });
    $.each(data.sector,function(i,v){
$(".search-highlight").append("<a href='/Gushakisha/"+v.sector_name+"'><div class='col-highlight'  id='resultonclick' style='padding-left: 10px;  padding-right: 10px;padding-top: 5px;padding-bottom: 5px;cursor: pointer;'>  <h5 class='result'>"+v.sector_name+"</h5></a>");

    });
    if(data.district==0 && data.sector==0)
    {
    $(".search-highlight").append("<div class='col-highlight' style='padding-left: 10px;  padding-right: 10px;padding-top: 5px;padding-bottom: 5px;cursor: pointer;'>  <h5 class='result' >Ntazina Ry'Ibiro ribonetse </h5>");
    }
  }
    });
 }
  });
});
