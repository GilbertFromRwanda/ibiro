
@extends('layouts.dashboardLayout')
@section('dashboard-content')
  <div class="dashboard-main">
   <div class="main-header">
    <h5>Abakozi</h5>
    </div>
@include('office.addexception')


     <div class="panel panel-default">
                    <div class="panel-heading">
                      <h1 class="panel-title">Abakozi bataraboneka kubiro <span class="badge">
                        @isset($report)
                        {{ $report }}
                        @endisset</span></h1></div>
 <div class="panel-body" style="height:500px;overflow-y: auto;">

 @isset($report)
                    @if(empty($report))
                        <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         Abakozi bose baraboneka kubiro
                   </div>
                   @endif
                        @endisset
<span style="color: orange" class="stutas"></span>
@isset($unvhour)


      <div class="table-responsive">
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th>Ifoto </th>
                <th>Amazina</th>
                <th>Hindura </th>
            </tr>
        </thead>
        <tbody id="emptb">
          @if(count($unvhour)>0)
          @foreach($unvhour as $emp)
            <tr id="{{ $emp->emp_id }}">
                <td>
           <img src="/officeImages/{{ $emp->emp_image }}" alt="Ifoto Y Umukozi" class="img-circle img-responsive" style="height: 50px;width: 50px" /></td>
                <td>{{ $emp->emp_names }}</td>  <td>

       <button class="btn btn-success" type="button" value="{{ $emp->emp_id }}" id="arahari">Arahari</button>
       </td>
            </tr>
             @endforeach
             @endif
@if(count($unvdate)>0)

@foreach($unvdate as $emp)
            <tr id="{{ $emp->emp_id }}">
                <td>
           <img src="/officeImages/{{ $emp->emp_image }}" alt="Ifoto Y Umukozi" class="img-circle img-responsive" style="height: 50px;width: 50px" /></td>
                <td>{{ $emp->emp_names }}</td>  <td>

       <button class="btn btn-success arahari" type="button" value="{{ $emp->emp_id }}" id="arahari">Arahari</button>
        </td>
            </tr>
             @endforeach

@endif




        </tbody>
        <caption>Abakozi batarakorera kubiro</caption>
    </table>
</div>
@endisset
</div>
</div>
</div>
@endsection
@section('script')
<script>
$(document).ready(function(){

$('.arahari').on('click',function(){
  var id=$(this).val();
 var btn= '<a class="btn btn-warning ntahari" type="button" id="Ntahari" href="/office/setUnvailable/'+id+'"">Ntahari</a>';
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
if(id!='')
{
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
}
});

});
</script>
@endsection
