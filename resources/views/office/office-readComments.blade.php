@extends('layouts.dashboardLayout')
@section('dashboard-content')
  <div class="dashboard-main">
    <div class="main-header">
     <h5>Ibiri mugasandugu Kibitekerezo</h5>
     </div>
     <!--!-->
     <div class="container">
       <div class="row" id="others">
     <div class="col-md-6">
      @isset($vcomments)
        Yanditswe Kuwa:{{ $vcomments['created_at'] }}
        <br/>
    Umutwe: @if($vcomments['comment_type']==1) {{'Gushima' }}@endif
      @if($vcomments['comment_type']==0) {{'Kunenga' }}@endif <br>
   {{$vcomments['details']}}
   @endisset
</div>
     <div class="col-md-6" style="height:450px ;overflow-y:auto">
       @isset($othercomments)
	<span class="text-center">Izindi <span class="badge">{{ $leftcomment }}</span></span>
	<div class="others">
        @foreach($othercomments as $ama)
        <div class="col-md-6 col-sm-6">
        @if($ama->viewed==1)
            <i class="fa fa-check" style="background-color: orange"></i>  <a href="/office/read/{{ $ama->id }}">
             Umutwe: @if($ama->comment_type==1) {{'Gushima' }}@endif  @if($ama->comment_type==0) {{'Kunenga' }}@endif <br>
       <span class="help-block">   kuwa {{ $ama->created_at }}</span> </a>
           <br/>
         &nbsp; &nbsp;{{ str_limit($ama->details,50)}}

            @endif
              @if($ama->viewed==0)
         <a href="/office/read/{{ $ama->id }}">
             Umutwe: @if($ama->comment_type==1) {{'Gushima' }}@endif  @if($ama->comment_type==0) {{'Kunenga' }}@endif <br>
       <p class="help-block">   kuwa {{ $ama->created_at }}</p></a>
           <br/>
         &nbsp; &nbsp;{{ str_limit($ama->details,10)}}

            @endif
           </div>
          @endforeach
       </div>
      </div>
@endisset

            </div>
  </div>
</div>
</div>
@endsection
