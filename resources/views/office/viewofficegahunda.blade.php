@extends('layouts.dashboardLayout')
@section('dashboard-content')
  <div class="dashboard-main">
   <div class="main-header">
    <h5>Gahunda y'ibiro</h5>
    </div>
     <div class="panel panel-default" style="height:500px;overflow-y:auto; margin-left:1%">
                    <div class="panel-heading">
                        <h1 class="panel-title">Gahunda Yibiro mugutanga service <small></small></h1></div>
                    <div class="panel-body" style="margin-left:4%">

 @isset($data);
@foreach($data as $gahunda)
  <div class="col-md-3" style="border:2px solid #ccc;padding:1px;margin:0">
  <p>Uko <b>{{$gahunda->emp_names}}</b>
    Atanga Serivce kubamugana</p>
{!! $gahunda->gahunda !!}
<a class="btn btn-primary btn-sm " role="button" href="/office/office-agenda/{{ $gahunda->id }}">Hindura gahunda</a>
</div>
@endforeach

@endisset
</div>
</div>
</div>
@endsection
