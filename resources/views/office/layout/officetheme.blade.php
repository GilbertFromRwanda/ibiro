<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta  name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Gahunda, Umuyobozi, amatangazo, Gushima ,Kunenga, ibiro, Uturere, imirenge" />
 <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


  <title>{{ config('app.name', 'Ibiro') }}</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
<link rel="stylesheet" href="{{asset('fonts/font-awesome.min.css')}}">
 <link rel="icon" type="image/PNG" href="{{asset('img/ibiro_logo.PNG')}}" />
 <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 bg-primary col-sm-3" >
                <div class="row">
                    <div class="col-md-10 col-sm-10">
                 <img class="img-circle img-responsive" src="{{asset('img/ibiro_logo.PNG')}}" style="width: 60%;margin-left: 20%">
                    </div>
                    <div class="col-md-12 hidden-xs col-sm-12 ">
                        <a href="#" style="color:white"><i class="fa fa-bars"></i> Bwira Abaturajye<span class="caret"></span></a>
                        <div class="list-group">
                            <a class="list-group-item" href="{{ url('office/office-announce')}}"><span>Amatangazo </span></a>
                            <a class="list-group-item" href="{{ url('office/office-agenda') }}"><span> Gahunda mu gutanga serivice</span></a>
                            <a class="list-group-item" href="{{ url('office/office-inama')}}"><span> Imyanzuro yinama</span></a>
         <a class="list-group-item" href="{{ url('office/empAbsence') }}"><span>Umukozi utaraboneka kubiro</span>
         </a>

                        </div>
                        <a href="#" style="color:white"><i class="fa fa-bars"></i> Reba Ibiri kuri board <span class="caret"></span></a>
                        <div class="list-group ">
                            <a class="list-group-item" href="#">
                            <a class="list-group-item" href="{{url('office/staff')}}"><span>Abakozi  bibiro</span></a>
                            <a class="list-group-item" href="{{url('office/comments')}}"><span>Gushima No kunenga byababagana</span></a>
                            <a class="list-group-item" href="{{url('office/viewamatangazo')}}"><span>Amatangazo</span></a>
                            <a class="list-group-item" href="{{url('office/viewofficeagenda')}}"><span>Gahunda yibiro mugutanga zervice</span></a>
                            <a class="list-group-item" href="{{ url('office/viewinama') }}"><span>Inama Zakozwe</span></a>
       <a class="list-group-item" href="{{ url('office/viewunavailable') }}"><span>Abakozi bataraboneka kubiro</span></a></div>


                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9" >
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                 <div class="navbar-header"><a class="navbar-brand navbar-link" href="#"> @yield('office_name')</a>
                                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                                </div>
                                <div class="collapse navbar-collapse" id="navcol-1">
                                    <ul class="nav navbar-nav navbar-right">
                                         <li role="presentation">
            <a href="/office/comments"
            data-toggle="popover" data-trigger="focus"
              class="office_inbox" >
             <i class="fa fa-inbox"></i>  Inbox <span class="badge">0</span></a></li>
                                        <li role="presentation">
                                        <a class="text-primary" href="#" id="openModo">Office Account</a></li>
                                        <li class="dropdown"><a class="dropdown-toggle hidden-md hidden-lg" data-toggle="dropdown" aria-expanded="false" href="#">Reba Ibiri kuri board<span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li role="presentation"> <a class="list-group-item" href="{{url('office/staff')}}"><span>Abakozi bose </span></a></li>
                                                <li role="presentation"> <a class="list-group-item" href="{{url('office/comments')}}"><span>Gushima No kunenga </span></a></li>
                                                <li role="presentation"> <a class="list-group-item" href="{{url('office/viewamatangazo')}}"><span>Amatangazo</span></a></li>
                                                   <li role="presentation">
                                    <a class="list-group-item" href="{{url('office/viewofficeagenda')}}"><span>Gahunda yibiro </span></a></li>
                                                    <li role="presentation">  <a class="list-group-item" href="{{ url('office/viewinama') }}"><span>Inama Zakozwe</span></a> </li>    <li role="presentation">
                                                        <a class="list-group-item" href="{{ url('office/viewunavailable') }}"><span>Abakozi batari kubiro</span></a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                        <a class="dropdown-toggle hidden-sm hidden-md hidden-lg" data-toggle="dropdown" aria-expanded="false" href="#">Bwira Abaturajye<span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li role="presentation"> <a class="list-group-item" href="{{ url('office/office-announce')}}"><span>Amatangazo </span></a></li>
                                                <li role="presentation"><a class="list-group-item" href="{{ url('office/office-agenda') }}"><span> Gahunda yo gutanga serivice</span></a></li>
                                                <li role="presentation"><a class="list-group-item" href="{{ url('office/office-inama')}}"><span> Imyanzuro yinama</span></a></li>
                                                <li role="presentation">
                       <a class="list-group-item" href="{{ url('office/viewinama') }}"><span>Inama Zakozwe</span></a></li>

 <li role="presentation"><a class="list-group-item" href="{{ url('office/empAbsence') }}"><span>Abakozi batari kubiro</span></a> </li>
</ul>
                                        </li>






                                         @auth('office')
                                        <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">

                                    Logout<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                             <a href="{{ route('logoutO')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">


                                    @yield('office_name');

                                </a>


                                    <form id="logout-form" action="{{ route('logoutO') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                                        @endauth
                                    </ul>

                                </div>
                            </div>
                        </nav>
                    </div>


                    <div class="col-md-12 col-sm-12">

                        <span class="stutas" style="margin-left: 20%;color:orange"></span>
                        @yield('content')
                        @yield('office-content')

                    </div>
                </div>
            </div>
        </div>
    </div>

     @include('office.office-changeprofile');

     <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

      @yield('script')

        <script >

    $(document).ready(function(){

//view comments in range


$("#wrapper").hide();

setInterval(function(){

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//get unread messa
///$(".office_inbox").find('span').text("....");
var data="1";
$.ajax({
type:'post',
url:'/office/inbox',
data:{data:data},
dataTy:'json',
success:function(data)
{
$(".office_inbox").find('span').text(data);
}
});
},5000);


///edit empinfo

$('#empinfo .btn-success').click(function(){
//$(this).html('<span class="fa fa-spin">wait...</span>');
$("#modoeditemp").modal("show");
var empcode=$(this).val();
$(this).html('<span class="fa fa-spin">wait...</span>').attr('disabled','disabled');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

url='/office/getleaderinfo';
$.ajax({
type:'post',
url:url,
data:{id:empcode},
dataTy:'json',
success:function(data)
{

  $("#modoeditemp").find('#emppos').val(data.emp_position);

  $("#modoeditemp").find('#emp_email').val(data.emp_email);

  $("#modoeditemp").find('#emprespo').text(data.emp_respo);

  $("#modoeditemp").find('#emp_tel').val(data.emp_tel);

  $("#modoeditemp").find('#empname').val(data.emp_names);
  $("#modoeditemp").find('#empid').val(data.emp_id);

  $('button[value="'+empcode+'"]').html("<span>Edit</span>").removeAttr("disabled");

}
});
})

   $('#openModo').click(function(){

$("#modochange").modal('show');
   });
    $("#btn-clear").click(function(){
        $('input[type="text"]').val('');

    });
$("#btnaskdate").click(function(){
$("#ita-expiredate").attr('class','form-group');
});



//to change if leader is available or not
$('button').click(function(){
 var btn= '<button class="btn btn-warning" type="button" value="" id="Ntahari" data-toggle="modal" data-target="#modoemp">Ntahari</button>';
var  idtxt=$(this).attr('id');
 var id=$(this).val();
 if(idtxt=='arahari')
  {

    $(this).attr('disabled','disabled');
  $('.stutas').text("Guhindura...");
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
url='/office/empthere';
$.ajax({
type:'post',
url:url,
data:{id:id},
dataTy:'json',
success:function(data)
{

  $(this).removeAttr('disabled');
$('.stutas').text(data)
$('.stutas').fadeOut(4000);
$("#"+id).find('span').text('Ari kubiro');
$("#"+id).find('button').parent().append(btn).find('button').first().remove();

//$('form').trigger('reset');

}
});
}
});

$('button .saveemp').click(function(){
});

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
console.log(data);
$('form').trigger('reset');
}
});
}
else
{
 $('.panel .report').text("Try agian(ijambo banga ntabwo bisa)");
}
});


$('#frminama').on('submit',function(e){
// e.preventDefault();
});



</script>
</body>

</html>
