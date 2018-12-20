$(document).ready(function(){
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//get unread message
$(".office_inbox").find('.badge').text("...");
var data="1";
$.ajax({
type:'post',
url:'/office/inbox',
data:{data:data},
dataTy:'json',
success:function(data)
{
$(".office_inbox").find('.badge').text(data);
}
});
$(".list-1").on("click",function(){
  $(this).find($(".sub-menu")).toggle();
});
$(".list-1").mouseleave(function(){
  $(this).find($(".sub-menu")).hide();
})

$("#konti").on('click',function(){
$("#modochange").modal('show');
});

//change office profile

$("#btnchangepswd").click(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//var data=$('#frmchangeprofile').serialize();
var oldpswd=$('#frmchangeprofile #oldpswd').val();
var newpswd=$('#frmchangeprofile #newpswd').val();
var cfrmpswd=$('#frmchangeprofile #cfrmpswd').val();

if(newpswd!='' && cfrmpswd!='')
{
url='/office/changeprofile';
$.ajax({
type:'post',
url:url,
data:{oldpswd:oldpswd,newpswd:newpswd,cfrmpswd:cfrmpswd},
dataTy:'json',
beforeSend:function(){
  $('.panel .report').text("Changing...");
},
success:function(data)
{
 $('.panel .report').html(data);
//console.log(data);
$('form').trigger('reset');
}
});
}
else
{
 $('.panel .report').text("Try agian(ijambo banga ntabwo bisa)");
}
});



})
