@extends('layouts.dashboardLayout')
@section('dashboard-content')
  <div class="dashboard-main">
   <div class="main-header">
    <h5>Abakozi bari kuri board yibiro </h5>
    </div>
                                     @isset($report)
                                      <div role="alert" class="alert alert-info text-center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span><strong>Ibyo Mushaka bya</strong>
                                  {{ $report }}</span>  </div>
                              @endisset
                              <span style="color: orange" class="stutas"></span>


        <div class="table-responsive">
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th>Ifoto </th>
                <th>Names </th>
                <th>Umuyobozi Aho Ari?</th>
                <th>Hindura </th>
            </tr>
        </thead>
        <tbody id="emptb">
           @isset($data)
           @if(count($data['abadahari'])>0)
           @foreach($data['abadahari'] as $emp)
            <tr id="{{ $emp->emp_id }}">
                <td>
           <img src="/officeImages/{{ $emp->emp_image }}" alt="Ifoto Y Umukozi" class="img-circle img-responsive" style="height: 50px;width: 50px" /></td>
                <td>{{ $emp->emp_names }}</td>
          <td> <span> Ntari Kubiro</span></td>
            <td>

       <button class="btn btn-success arahari" type="button" value="{{ $emp->emp_id }}" id="arahari">Arahari</button>
      </td>
            </tr>
             @endforeach
             @endif
             @if(count($data['abahari'])>0)
             @foreach($data['abahari'] as $emp)
              <tr id="{{ $emp->emp_id }}">
                  <td>
             <img src="/officeImages/{{ $emp->emp_image }}" alt="Ifoto Y Umukozi" class="img-circle img-responsive" style="height: 50px;width: 50px" /></td>
                  <td>{{ $emp->emp_names }}</td>
            <td> <span> Ari Kubiro</span></td>
              <td>
             <a class="btn btn-warning ntahari" type="button"  href="/office/setUnvailable/{{ $emp->emp_id}}"> Ntahari </a>

        </td>
              </tr>
               @endforeach
               @endif
               @if(count($data['abahari'])==0 && count($data['abadahari'])==0)
               <p class="text-info"><a href="/office/staff">Ntamukozi uri kuri board !!!<br>
kanda hano ubashyireho
               </a></p>
               @endif
             @endisset
        </tbody>
        <caption>Abakozi bose</caption>
    </table>
</div>

</div>

@endsection

@section('script')
<script type="text/javascript">
//to change if leader is available or not
$('button').click(function(){
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
</script>


@endsection
