@extends('layouts.ibiro-layout')

@section('content')
  <div class="main-content" id="after">
    <div class="container">
      <div class="col-md-6 col-md-offset-3">
        <h1 class="title">Ibiro</h1>
        <form class="" action="{{route('secondinput')}}" method="post">
                  {{ csrf_field() }}
          <input type="text" name="secondinput" value="@isset($offices){{$inputed}}@endisset" class="form-control" id="input-search" maxlength="50" placeholder="Shakisha izina ry'Akarere cyangwa ry'Umurenge" autocomplete="off">
          <span class="fa fa-search" id="search"></span>
          <center>
            <input type="submit" name="submit" value="Shakisha" class="sign">
          </center>
        </form>
      </div>
    </div>
  </div>
  <!--!-->
  <div class="all-result">
    <div class="container">
      <div class="row" id="rows">
        <div class="each-result">

        @isset($offices)

          @if(count($offices['sector'])==0 && count($offices['district'])==0)
            <center>
          <h3 style="color:#ccc">Ntazina Ry'Ibiro ribonetse<br/> kanda <a href="{{route('districts')}}">Akarere</a> cyangwa <a href="{{route('sectors')}}">umurenge </a>uhitemo ibiro ushaka</h3>
        </center>
          @endif
        @foreach($offices['sector'] as $office )
<div class="col-md-4 col-sm-4">
  <ul class="list-group">
   <li class="list-group-item" id="list-group-item">
     <div class="listing">
       <a href="/officeboard/sector/{{Crypt::encryptString($office->sector_code)}}">Umurenge Wa
        <u> {{ $office->sector_name}}</u>
      </a>
    <h5 class="help-block">Ubarizwa Mu karere Ka <u>{{ $office->district_name}}</u></h5>
  </div>
    <div class="right-ico">
    <span class="glyphicon glyphicon-eye-close" id="ico-eyes"></span>
    </div>
   </li>
 </ul>
</div>

        @endforeach
          @foreach($offices['district'] as $office )
<div class="col-md-4 col-sm-4">
  <ul class="list-group">
   <li class="list-group-item" id="list-group-item">
     <div class="listing">
       <a href="/officeboard/district/{{Crypt::encryptString($office->district_code) }}">

     Akarere ka {{ $office->district_name}}

     </a>
  </div>
    <div class="right-ico" id="forDistrict">
    <span class="glyphicon glyphicon-eye-close" id="ico-eyes1"></span>
    </div>
   </li>
 </ul>

</div>
        @endforeach
      @endisset
  @isset($district)
  @foreach($district as $office )
<div class="col-md-4 col-sm-4">
  <ul class="list-group">
   <li class="list-group-item" id="list-group-item">
     <div class="listing">
       <a href="/officeboard/district/{{Crypt::encryptString($office->district_code) }}">

       Akarere ka {{ $office->district_name}}

       </a>
  </div>
    <div class="right-ico" id="forDistrict">
    <span class="glyphicon glyphicon-eye-close" id="ico-eyes1"></span>
    </div>
   </li>
  </ul>


</div>
  @endforeach
@endisset

@isset($sector)
@foreach($sector as $office )
<div class="col-md-4 col-sm-4">
  <ul class="list-group">
   <li class="list-group-item" id="list-group-item">
     <div class="listing">
       <a href="/officeboard/sector/{{Crypt::encryptString($office->sector_code)}}">Umurenge Wa

           <u> {{ $office->sector_name}}</u>
          </a>
    <h5 class="help-block">Ubarizwa Mukarere Ka <u>{{ $office->district_name}}</u></h5>
  </div>
    <div class="right-ico">
    <span class="glyphicon glyphicon-eye-close" id="ico-eyes"></span>
    </div>
   </li>
 </ul>
</div>
@endforeach
@endisset
      </div>
  </div>
</div>
</div>
<script type="text/javascript">
var reply_click = function()
{
var txt=document.getElementById('input-search').value;
window.location="/Gushakisha/"+txt
}
document.getElementById('search').onclick = reply_click;

</script>
@endsection
