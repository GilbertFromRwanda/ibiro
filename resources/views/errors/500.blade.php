@extends('layouts.ibiro-layout')
@section('content')
<div class="main-content" id="home-page">
<div class="container">
<div class="col-md-6 col-md-offset-3">
	<div class="row">
		<div class="col-md-6" style="margin-left: 20%">
<!-- <img class="img-circle img-responsive" src="{{asset('img/ibiro_logo.PNG')}}">-->
 <div role="alert" class="alert alert-danger text-center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span><strong>Ibyo Musabye Ntabwo bibonetse</strong> Mwongere Mugerageze</span><br>
  <a href="#" id="back">Kanda Hano usubire aho uvuye</a>
  </div>
    </div>

</div>
</div>
<script>
var reply_click = function()
{
 //var txt=document.getElementById('back').value;
  window.history.back();
}

document.getElementById('back').onclick = reply_click;

</script>
@endsection
