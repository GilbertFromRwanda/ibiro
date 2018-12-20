<div class="dash-menu" >
    @isset($number)
  <div class="showcase" id="show-case-menu" style="height:auto;overflow-y:auto;">
    <center>
    <img src="{!! asset('img/republick.png')!!}" id="represent"></img>

   <div class="o-intro">  {!! $number['officeName']!!}</div>
    </center>
 </div>
<div class="col-md-12" id="colmn">
   <a href="/officeboard/{{Crypt::encryptString($number['officeCode'])}}/Gahunda">
    <h5>Gahunda y'Ibiro</h5>
    <center><span class="fa fa-cogs"></span></center>
   </a>
  </div>
  <div class="col-md-12" id="colmn">
   <a href="/officeboard/{{Crypt::encryptString($number['officeCode'])}}/Amatangazo">
    <h5>Amatangazo</h5>
      <h5>{{$number['nAnnouncement']}}</h5>
   </a>
  </div>
  <div class="col-md-12" id="colmn">
<a href="/officeboard/{{Crypt::encryptString($number['officeCode'])}}/Abayobozi">
    <h5>Abayobozi Bataboneka</h5>
      <h5>{{$number['employee']}}</h5>
   </a>
  </div>
  <div class="col-md-12" id="colmn">
<a href="/officeboard/{{Crypt::encryptString($number['officeCode'])}}/Amanama">
    <h5>Inama zabaye</h5>
    <h5>{{$number['nMeeting']}}</h5>
   </a>
  </div>
  <div class="col-md-12" id="colmn">
     <a href="/officeboard/{{Crypt::encryptString($number['officeCode'])}}/suggestionbox">
    <h5>Agasanduku k'ibitekerezo</h5>
    <center>
      <i class="fa fa-th" aria-hidden="true"></i>
    </center>
   </a>
  </div>
  <div class="col-md-12" id="colmn">
    <a href="/officeboard/{{Crypt::encryptString($number['officeCode'])}}/Appointement">
    <h5>Gusaba Randevu</h5>
    <center>
      <img src="{!! asset('img/appoint.png')!!}" class="sugBox"></img>
    </center>
   </a>
  </div>
@endisset
</div>
