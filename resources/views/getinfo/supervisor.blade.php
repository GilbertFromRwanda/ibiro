@extends('getinfo.layout.supervisor_L')
@section('content')
<div class="main-content" id="after" style="background-color: #e7ece6bf;">
<div class="container">
<div class="col-md-6 col-md-offset-3">
<h1 class="title">Ibiro</h1>
<form  action="{{url('/getinfo/getoffices')}}" method="post" autocomplete="off" id="supervisor_logout">
{{ csrf_field() }}
<input type="text" name="txtgetcode" value="@isset($q){{ $q }} @endisset"  class="form-control" id="input-search" maxlength="50" placeholder="Shakisha izina ry'Akarere cyangwa ry'Umurenge">
<span class="fa fa-search" id="search"></span>
<div class="example">
<p>Urugero rw'Akarere: Muhanga,Nyarugenge,Gasabo.....</p>
<p>Urugero rw'Umurenge:Rusororo, Gitega, Nyamabuye ..</p>
</div>
<center>
<input type="submit" name="submit" value="Shakisha" class="sign">
</center>
</form>
</div>
</div>
</div>

<div class="all-result" >
  <div class="container">
    <div class="row" id="rows">
      <div class="each-result">

        @isset($sector)
          @if(count($sector)==0 && count($district)==0)
            <center>
          <h3 style="color:#ccc">Ntazina Ry Ibiro ribonetse </h3>
        </center>
               @endif
        @foreach($sector as $sec)
          <div class="col-md-4 col-sm-4">
            <ul class="list-group">
             <li class="list-group-item" id="list-group-item">
               <div class="listing">

        <a href="#">
         Code:{{ $sec->sector_code }}<br/>
          Umurenge Wa
                  <u> {{ $sec->sector_name}}</u>
                 </a>
              <h5 class="help-block">Ubarizwa Mu karere Ka <u>{{ $sec->district_name}}</u></h5>
            </div>
              <div class="right-ico">
              <span class="glyphicon glyphicon-eye-close" id="ico-eyes"></span>
              </div>
             </li>
           </ul>
          </div>

        @endforeach
        @endisset

        @isset($sectors)
          @foreach($sectors as $sec)
            <div class="col-md-4 col-sm-4">
              <ul class="list-group">
               <li class="list-group-item" id="list-group-item">
                 <div class="listing">

          <a href="#">
           Code:{{ $sec->sector_code }}<br/>
            Umurenge Wa
                    <u> {{ $sec->sector_name}}</u>
                   </a>
                <h5 class="help-block">Ubarizwa Mu karere Ka <u>{{ $sec->district_name}}</u></h5>
              </div>
                <div class="right-ico">
                <span class="glyphicon glyphicon-eye-close" id="ico-eyes"></span>
                </div>
               </li>
             </ul>
            </div>
@endforeach
        @endisset
        @isset($district)
        @foreach($district as $dis)
          <div class="col-md-4 col-sm-4">
            <ul class="list-group">
             <li class="list-group-item" id="list-group-item">
               <div class="listing">

          <a href="/getinfo/office/{{$dis->district_code }}">
                code:{{$dis->district_code}}<br/>
               Akarere ka {{ $dis->district_name}}

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
      </div>
  </div>
</div>
</div>
@endsection
