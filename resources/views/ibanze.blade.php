
@extends('layouts.ibiro-layout')
@section('content')
<div class="main-content" id="home-page">
  <div class="container">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="title">Ibiro</h1>
    <form class="" action="{{route('moreresult')}}" method="post" autocomplete="off">
         {{ csrf_field() }}
        <input type="text" name="mainsearch" value="" class="form-control" id="input-search" maxlength="50" placeholder="Shakisha izina ry'Akarere cyangwa ry'Umurenge">
        <span class="fa fa-search" id="search"></span>
        <div class="example">
          <p>Urugero rw'Akarere: Muhanga,Nyarugenge,Gasabo.....</p>
          <p>Urugero rw'Umurenge:Rusororo, Gitega, Nyamabuye ..</p>

        <center>
          <input type="submit" name="submit" value="Shakisha" class="sign">
        </center>

      </form>
        <div style="margin-top: 7%;width: 111%">
    <img src="{{url('officeImages/ibirobk.png') }} " style="width: 98%;
    height: 230px;
    margin-top: -4%;">

          </div>
      <div class="search-highlight" id="getname">
      <div class="col-highlight">
        <h5 class="result">Frst Search</h5>
        <span class="glyphicon glyphicon-eye-open" id="icon"></span>
      </div>
      <div class="col-highlight">
        <h5 class="result">Second Search</h5>
        <span class="glyphicon glyphicon-eye-open" id="icon"></span>
      </div>
      </div>
    </div>

        </div>
  </div>
</div>
<!--!-->
<div class="sub-homepage" id="first">
  <div class="container">
    <div class="row">
      <div class="main-title">
         <h1>Ntampamvu zo kongera <br> gusiragira kubiro <br>ushaka umuyobozi</h1>
         <center>
         <p class="sub-homHigh">Mbere yo kujya kubiro Banza Umenyeneza ko umuyobozi ushinzwe service ushaka ahari</p>
          <p class="sub-homHigh">Ushobora Gusaba Randevu Uyumyobozi Ushinzwe Serivice Ushaka</hr>
            Ukamenyeshwa Mugihe Randevu Ihuye N'Imbogamizi.
          </p>
         <img src="{!! asset('img/service.png')!!}" class="support">
       </center>
      </div>
    </div>
  </div>
</div>
<div class="sub-homepage"  id="second">
  <div class="container">
    <div class="row">
      <div class="main-title">
         <h1>Gahunda Y'Ibiro</h1>
         <center>
         <p class="sub-homHigh">Mbere yo kujya kubiro Banza umenyeneza  niba Serivice ushaka  yacyirwa kuruwo munsi</p>
         <img src="{!! asset('img/computer.png')!!}" class="support">
       </center>
      </div>
    </div>
  </div>
</div>
<div class="sub-homepage"  id="third">
  <div class="container">
    <div class="row">
      <div class="main-title">
         <h1>Menya Ibyavugiwe mu nama</h1>
         <center>
         <p class="sub-homHigh">ushobora kumenya Ibyavugiwe mu nama wifashishije uru rubuga.</p>
         <img src="{!! asset('img/eye.png')!!}" class="support">
       </center>
      </div>
    </div>
  </div>
</div>
<!--!-->
<div class="sub-homepage"  id="fourth">
  <div class="container">
    <div class="row">
      <div class="main-title">
         <h1>Tanga Ibitekerezo byawe</h1>
         <center>
         <p class="sub-homHigh">Gira icyo uvuga ku bitangenda Neza cyangwa Ibigenda Neza.</p>
         <img src="{!! asset('img/eye.png')!!}" class="support">
       </center>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="{!! asset('js/jquery.min.js')!!}"></script>
<script type="text/javascript" src="{!! asset('js/parallax.js')!!}"></script>
@endsection
@section('script')
<script type="text/javascript" src="{!! asset('js/highlight.js')!!}"></script>
<script type="text/javascript" src="{!! asset('js/clickevent.js')!!}"></script>

@endsection
