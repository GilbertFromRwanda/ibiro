@extends('layouts.ibiro-layout')
@section('content')
<div class="main-content"  id="main">
  @isset($number)
     <input class="ocode" type="hidden" value="{{$number['officeCode']}}"/>
  <div class="container">
  <div class="showcase">
    <center>
    <img src="{!! asset('img/republick.png')!!}" id="represent"></img>
  {!! $number['officeName']!!}
    </center>
 </div>
  <div class="col-md-3 holdupdate" id="colmn">
   <a href="/officeboard/{{Crypt::encryptString($number['officeCode'])}}/Gahunda" class="dash-color">
    <h5>Gahunda y'Ibiro</h5>
    <center><span class="fa fa-cogs"></span></center>
   </a>
  </div>
  <div class="col-md-3 holdupdate" id="colmn">
   <a href="/officeboard/{{Crypt::encryptString($number['officeCode'])}}/Amatangazo" class="dash-color">
    <h5>Amatangazo</h5>
    <h5 id="newannounce">{{$number['nAnnouncement']}}</h5>
   </a>
  </div>
  <div class="col-md-3 holdupdate" id="colmn">
   <a href="/officeboard/{{Crypt::encryptString($number['officeCode'])}}/Abayobozi" class="dash-color">
    <h5>Abayobozi Bataboneka</h5>
    <h5 id="newabsence">{{$number['employee']}}</h5>
   </a>
  </div>
  <div class="col-md-3">
   <a href="/officeboard/{{Crypt::encryptString($number['officeCode'])}}/Amanama" class="dash-color">
    <h5>Inama zabaye</h5>
    <h5 id="newinama">{{$number['nMeeting']}}</h5>
   </a>
  </div>
  </div>
@endisset
<div class="col-md-12 col-sm-12" style="margin-top:3%">
  <div class="row">
    <div class="col-md-6 col-sm-6 text-center" id="colmn">
  <a href="/officeboard/{{Crypt::encryptString($number['officeCode'])}}/suggestionbox" class="dash-color">
<h5><p  class="suggestionLink text-primary">Agasanduku kibitekerezo</p></h5>
<img src="{!! asset('img/ico.png')!!}" class="sugBox"></img>
</a>
</div>
<div class="col-md-6 col-sm-6 text-center" id="colmn">
<a href="/officeboard/{{Crypt::encryptString($number['officeCode'])}}/Appointement" class="dash-color">
<h5><p  class="suggestionLink text-primary"> Gusaba Randevu</p></h5>
<img src="{!! asset('img/appoint.png')!!}" class="sugBox"></img>
</a>
</div>
</div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{!! asset('js/updateNumber.js')!!}"></script>
@endsection
