@extends('layouts.ibiro-layout')
@section('content')
<div class="display-content">
  <div class="menu-dash">
    <span class="glyphicon glyphicon-list"  title="menu" id="load-menu"></span>
  </div>
  @include('layouts/intro');
 <div class="container">

   <div class="row" id="rows">
     @isset($abadahari)
       <input class="ocode" type="hidden" value="{{$number['officeCode']}}"/>
      <div class="getupdate">
       @if(count($abadahari)>0)
     <h1 class="mainTitle"> Abakozi bataboneka ku biro<br> uyu munsi</h1>
  @else
        <div role="alert" class="alert alert-info text-center">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span><strong>Abakozi bose Urabasanga kubiro</strong>
      </span>  </div>

      @endif
   @foreach($abadahari as $emp)
     <div class="col-md-4" id="mainDisplay">
         <div class="leaderImg-display">
           <img src="/officeImages/{{ $emp->emp_image }}" alt="Ifoto Y Umukozi" class="img-responsive"
           style="height: 150px;width: 150px;margin-left:29%" />
         </div>
         <div class="leader-content">
            <h5 class="leader-name">{{ $emp->emp_names }}</h5>
            <h5>{{ $emp->emp_position }} </h5>
                   <h5>{{ $emp->emp_respo }} </h5>
            <h5>Azaboneka kuwa <b> {{ $emp->exce_to }}</b></h5>
            <h5>Yasigariweho na <b>{{ $emp->exce_replacer }}</b></h5>
         </div>
 </div>
@endforeach
</div>

@endisset
</div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{!! asset('js/realTime.js')!!}"></script>
@endsection
