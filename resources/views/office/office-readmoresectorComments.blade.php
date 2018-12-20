@extends('layouts.dashboardLayout')
@section('dashboard-content')
  <div class="dashboard-main">
   <div class="main-header">
    <h5>Ibiri mugasandugu Kibitekerezo</h5>
    </div>
<div class="col-md-12 col-sm-12">
<div class="row">
	<div>

	@isset($sname)
  @if($who!="sector")
<h3 class="text-primary text-center">{{ "Umurenge Wa ".$sname }}</h3>
@endif
			@endisset
			</div>
		<hr>
	<div class="col-md-8 col-sm-8">

		@isset($scomments)
		<u>
        <h4 class="text-success">Umutwe: @if($scomments->comment_type==1) {{'Gushima' }}@endif  @if($scomments->comment_type==0) {{'Kunenga' }}@endif</h4></u>
        <p>Kuwa {{ $scomments->created_at }}</p>
        <div>
         {{ $scomments->details}}
        </div>

     @endisset
	</div>
<div class="col-md-4 col-sm-4">

	@isset($othercomments)
	<p>Izindi</p>
   @foreach($othercomments as $comm)
        @if($comm->viewed==1)
          <i class="fa fa-check" style="background-color: orange"></i>
        @endif
        <a href="/office/read/details/{{ $comm->id }}">
          Umutwe: @if($comm->comment_type==1) {{'Gushima' }}@endif  @if($comm->comment_type==0) {{'Kunenga' }}@endif
         kuwa {{ $comm->created_at }}</a>
           <br/>
          {{ str_limit($comm->details,10)}}
            <br>
    @endforeach
@endisset
</div>
</div>
</div>
@endsection
