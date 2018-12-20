$(document).ready(function(){
  var txt='';
  $('button').attr('disbled','disbled');
$('.choosen_radio').on('click',function(){
txt=$(this).val();
});
$('button').on('click',function(){
  if(txt!='')
  {
  //$('#modoseteDate').modal('show');
  window.location="/officeboard/umuyobozi/Appointement/"+txt;
  }
});
var reply_click = function()
{
 //var txt=document.getElementById('back').value;
  window.history.back();
}
document.getElementById('backtoMenu').onclick = reply_click;
$(".btnsetappmt").on('click',function(){

  var empId=$(".getido").val();
  var client_tel=$("#client_tel").val().trim();
  var client_name=$("#client_name").val()
  var client_date=$("#client_date").val();
  $(this).attr('disbled','disbled');
  if(client_name.length>0 && client_tel.length>0 && client_date.length>0)
  {
    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });
    url='/officeboard/umuyobozi/setAppointment';
    $.ajax({
    type:'POST',
    url:url,
    data:{empId:empId,client_tel:client_tel,client_date:client_date,client_name:client_name},
    dataTy:'json',
    success:function(data)
    {
      //console.log(data);
      //consol.log(data);
    $('.randevu_re').text(data)

      $('form').trigger('reset');  
    $('.btnsetappmt').removeAttr('disbled');
    }
    });
  }
  else {
  $('.randevu_re').text("Ibyo wanditse  Birimo Amakosa").css("color","red");
  }
})
})
