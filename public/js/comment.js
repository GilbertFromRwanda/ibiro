$(document).ready(function(){
  $(".o-intro").children().css({"color": "black"});
$('#btnsendservice').attr('disabled','disabled');

$('textarea').keyup(function(){
if($(this).val()!='')
{
    $('#btnsendservice').removeAttr('disabled');
}
else
{
$('#btnsendservice').attr('disabled','disabled');
}
});

$('#btnsendservice').click(function(){

var data=$('textarea').val();

if(data!='')
{

var code=$('input[type="hidden"]').val();

  var  msgtype=$('input[name="msgtype"]:checked').val();

$('.stutas').text("Tegereza...");
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"] ').attr('content')
    }
});
url='/officeboard/storecommentonservice';
$.ajax({
type:'POST',
url:url,
data:{data:data,msgtype:msgtype,code:code},
dataTy:'json',
success:function(data)
{
$('textarea').val(" ");
$('.stutas').text(data)
$('form').trigger('reset');
}
});
}
});
$(".laws").click(function(){
$('.modal').modal('show');

});
});
