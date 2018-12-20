
@extends('layouts.dashboardLayout')
@section('dashboard-content')
  <!--edit employe information -->

  <div role="dialog" tabindex="-1" class="modal fade editmodal" id="modoeditemp" data-backdrop="false">
      <div class="modal-dialog" role="document">
          <form method="post" action="/office/editLeaderInfo" enctype="multipart/form-data" id="frmeditinfo">
             {{ csrf_field() }}
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <div class="logo">
                    <img src="{!! asset('img/republick.png')!!}" alt="" class="logo-img">
                  </div>
                  <h4 class="modal-title">Guhindura amakuru ku mukozi</h4></div>

                               <div class="modal-body">

                              <div class="form-group">

                                      <label class="control-label" for="lfn">Amazina</label>
                                      <input type="hidden" name="empid" value="" id="empid" />
                                      <input class="form-control" type="text" name="empname"  placeholder="Eg: Ndayambaje Gilbert" maxlength="30" autofocus="" id="empname">
                              </div>
                              <div class="form-group">

                                      <label class="control-label" for="ltel">TEL</label>
                                      <input class="form-control" type="tel" name="emp_tel" required="" placeholder="Eg:0788354762" maxlength="10" minlength="10" autocomplete="off" id="emp_tel">
         </div>
      <div class="form-group">

                                      <label class="control-label" for="lemail">Email </label>
                                      <input class="form-control" type="email" name="emp_email" required="" placeholder="example@gmail.com" maxlength="40" autocomplete="off" id="emp_email">

                              </div>
                              <div class="form-group">

                                      <label class="control-label" for="lpos"> Umwanya Afite(position)</label>
                                      <input class="form-control" type="text" name="emppos"  placeholder="Eg:Mayor"  autocomplete="off" required="" id="emppos">


                              </div>
                              <div class="form-group">

                                      <label class="control-label"> Inshingano</label>
                                      <textarea class="form-control" name="emprespo" required="" placeholder="Eg: Imiberho myiza yabaturajye" maxlength="200" required="" id="emprespo"></textarea>

                              </div>
                      </div>

              <div class="modal-footer">
                  <button class="btn btn-default btn-sm" type="button" data-dismiss="modal">Funga</button>
                 <button class="btn btn-primary active  btn-sm pull-right" type="submit">Hindura</button>
              </div>

            </form>
          </div>
      </div>
    </div>
  <!-- end of employee modal-->
  <div class="dashboard-main">
   <div class="main-header">
    <h5>Staff</h5>
    <h5 class="pull-right" style="margin-top:-2%"><a href="/office/EmployeeRegistration">Umukozi Mushya</a></h5>
    @isset($msg)
      <h6 class="text-success text-center">
      {{$msg}}
    </h6>
    @endisset
    </div>
               @if ($errors->any())
              <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
             <ul>
                <span>Umukozi siyanditswe kubera:</span>
                @if($errors->has('empphoto'))
                <li>Ifoto Ifite kibazo</li>
                @endif
                @if($errors->has('empname'))
                <li>Amazina Arakenewe</li>
                @endif
                @if($errors->has('emprespo'))
                <li>Inshingano zumukozi Zirakenewe</li>
                @endif
                @if($errors->has('emprespo'))
                <li>Inshingano zumukozi Zirakenewe</li>
                @endif
                @if($errors->has('emppos'))
                <li>Umwanya wumukozi urakenewe</li>
                @endif
        </ul>
    </div>
@endif
          @isset($data)
        <div class="main-table table-responsive">
        <table class="table">
        <thead>
            <tr>
                <th>Ifoto </th>
                <th>Amazina </th>
                <th>Email </th>
                <th>TEL </th>
                <th>Umwanya </th>
                <th>Inshingano </th>
                <th>Ibikorwa</th>
            </tr>
        </thead>
        <tbody>
              @foreach($data as $emp)
            <tr>
          <td><img src="/officeImages/{{ $emp->emp_image }}"
             alt="Ifoto Y Umukozi" class=" img-responsive" id="emp-image">
          </td>
                <td>{{ $emp->emp_names }}</td>
                <td>{{ $emp->emp_email }}</td>
                <td>{{ $emp->emp_tel }}</td>
                <td>{{ $emp->emp_position }}</td>
                <td>{{ $emp->emp_respo }}</td>
                <td>

                    <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="fa fa-cog"><span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" id="dropDown">
                    <li value="{{ $emp->emp_id }}" class="btnaEditemp"><a href="#">Hindura</a></li>
                    <li value="{{ $emp->emp_id }}" class="btnremove"><a href="#">Siba</a></li>
                    </ul>
                    </div>
                </td>
            </tr>
          @endforeach
            <tr></tr>
        </tbody>
        <!--<caption>Abakozi b&#39;ibiro
            <button class="btn btn-success active pull-right addEmployee" type="button" onclick="window.location.href='{{route('newEmp')}}'">Umukozi Mushya</button>
        </caption>!-->
    </table>
</div>

<!-- end of employee modal-->
  @endisset
</div>
@endsection

@section('script')
<script>
$("document").ready(function(){
  $(".btnaEditemp").click(function(){

  $("#modoeditemp").modal("show");
  var empcode=$(this).val();
  $(this).html('<span class="fa fa-spin">wait...</span>').attr('disabled','disabled');

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  url='/office/getleaderinfo';
  if(empcode!='')
  {
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
    $('.btnaEditemp[value="'+empcode+'"]').html("<span>Edit</span>").removeAttr("disabled");
  }
  });
}
  });

  //remove employee from office board
  $('.btnremove').click(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var c=confirm("ushaka gukura umukozi mubakozi bakorera kubiro?");
    if(c==true)
    {
      var id=$(this).val();
         // $(this).parent().parent().parent().hide();
       $(this).html('<span class="fa fa-spin">wait...</span>').attr('disabled','disabled');
      url='/office/removeleader';
      $.ajax({
      type:'post',
      url:url,
      data:{id:id},
      dataTy:'json',
      success:function(data)
      {
       $('li[value="'+id+'"]').parent().parent().parent().parent().hide();

      $('.stutas').text(data);

        //console.log(data);
      }
      });
    }
    else {
        $('.stutas').text("umukozi ntabwo avuye kuri liste");
    }


});


});
</script>
@endsection
