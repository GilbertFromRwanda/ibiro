@extends('layouts.dashboardLayout')
@section('dashboard-content')
  <div class="dashboard-main">
   <div class="main-header">
    <h5>Amatangazo</h5>
    </div>
     <div class="panel panel-default" style="height:500px;overflow-y: auto;">
                    <div class="panel-heading">
                        <h1 class="panel-title">Amatangazo Ari Kuri board <small><a class="btn btn-primary btn-sm pull-right" role="button" href="{{ url('/office/office-announce') }}">Itangazo Rishya</a></small></h1></div>
                    <div class="panel-body">


@isset($report)
<div role="alert" class="alert alert-success text-center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span><strong><u>{{ $report }} </u> <span class="badge">@isset($angahe){{ $angahe }}@endisset</span></strong><br> Urwanda Rubereye Abanyarwanda</span></div>

@endisset

 @isset($announce)

 <ol style="margin-left:4%">
@foreach($announce as $ita)
<li><div>
<a class="btn btn-default" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" role="button" href="#{{ $ita->id }}">{{ $ita->ita_title }}<br>
<small class="help-block"> Ryatanzwe Kuwa {{ $ita->created_at }}</small>
</a>
    <div class="collapse" id="{{ $ita->id }}">
      <p>{!! $ita->ita_body !!}</p>
   <p><div role="group" class="btn-group  pull-right">
    <a class="btn btn-success" role="button" href="/office/office-announce/{{ $ita->id}}">Edit</a>
<a class="btn btn-danger" role="button" href="/office/deleteannounce/{{ $ita->id}}">Delete</a>

</div></p>
    </div>
</div>
</li>
@endforeach
</ol>
@endisset
</div>
</div>
</div>
@endsection
