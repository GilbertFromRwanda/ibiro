
  $(document).ready(function(){
 $(".o-intro").children().css({"color": "black"});
var interval = 3000;
(function schedule() {
 setTimeout(function do_it() {
 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var data=$(".ocode").val();
if(data!='')
{  //get update from server
$.ajax({
type:'post',
url:'/getUpdateToemployee',
data:{data:data},
dataTy:'json',
success:function(data)
{
if(data.length==0)
{
$(".getupdate").html('<h1 class="mainTitle"> Abakozi bose Urabasanga kubiro</h1><');
}
else {
  $(".getupdate").html(' ').append(' <h1 class="mainTitle"> Abakozi bataboneka ku biro<br> uyu munsi</h1>');
  $.each(data,function(i,v){
    var image=v.emp_image;
    var names=v.emp_names;
    var tel=v.emp_tel;
    var  pos=v.emp_position;
    var   respo=v.emp_respo;
    var expire=v.exce_to;
    var replacer=v.exce_replacer;
  $(".getupdate").append('<div class="col-md-4" id="mainDisplay"><div class="leaderImg-display"><img src="/officeImages/'+image+'" alt="Ifoto Y Umukozi" + class="img-responsive" style="height: 150px;width: 150px;margin-left:29%" /></div>'+
          ' <div class="leader-content"><h5 class="leader-name"> '+ names+'</h5>'+
          ''+
            '<h5>'+ pos+' </h5>'+
         '<h5>'+respo+'</h5>'+
      '<h5>Azaboneka kuwa <b>'+expire+'</b></h5>'+
          '<h5>Yasigariweho na<b> '+replacer+'</b></h5>'+
          '</div></div>');

  })
}

  }
    });
  }
 schedule();
 }, interval);
}());
  });
