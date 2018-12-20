
@extends('layouts.dashboardLayout')
@section('dashboard-content')
  <div class="dashboard-main">
   <div class="main-header">
    <h5>Inama</h5>
    </div>
     <div class="panel panel-default" style="height:500px;;overflow-y: auto;">
                    <div class="panel-heading">
                        <h1 class="panel-title">Inama Zakozwe <span class="badge">
                          @isset($report) {{ $report }}
                        @endisset</span></h1></div>
                    <div class="panel-body" style="height:500px;overflow-y: auto;">


@isset($report)
@endisset
 @isset($inamas)
@foreach($inamas as $inama)
  <div class="col-md-6">
    <strong>
<a href="#">{{ $inama->inama_title }}
</a>
</strong>
  <p>{!! str_limit($inama->inama_body,100,('...')) !!}</p>
  <small class="help-block"> Yatanzwe Kuwa {{ $inama->inama_pubdate }}</small>
   </div>
@endforeach
@endisset
</div>
</div>
</div>
@endsection
