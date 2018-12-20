$(document).ready(function(){
var interval = 4000;
(function schedule() {
setTimeout(function do_it() {
$.ajaxSetup({
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

//get update from server
var data=$(".ocode").val();
if(data!='')
{
$.ajax({
type:'post',
url:'/getUpdateTonumber',
data:{data:data},
dataTy:'json',
success:function(data)
{

$(".holdupdate").find("#newinama").text(data.inama);

$(".holdupdate").find("#newannounce").text(data.itangazo);

$(".holdupdate").find("#newabsence").text(data.absence);
  }
  });
}
schedule();
}, interval);
}());
});
