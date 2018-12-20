@extends('layouts.ibiro-layout')
@section('content')
<div class="main-content" id="main">
  <div class="menu-dash">
    <span class="glyphicon glyphicon-list"  title="menu" id="load-menu"></span>
  </div>
  @include('layouts/intro')
  <div class="container">
      <div class="row" id="rows">
      <h5 style="margin-left: 30%;color: orange ;border-color: black;" class="stutas text-info"></h5>
      <div class="col-md-6 col-md-offset-3">
        <div class="boxing">
        <div class="boxing-header">
          <h5 class="boxing-title">Tanga Igitekerezo</h5>
          <h5><a href="#" class="laws">Amategeko Agenga Agasanduku kibitekerezo</a></h5>
        </div>
        <form class="form" id="formIgitekerezo">
         <div class="form-group" id="idea">
           <label for="igikorwa">Hitamo igikorwa</label>
           <div class="radios">
             <input type="radio" name="msgtype" value="1"  checked> <span class="line">Gushima?</span>
             <input type="radio" name="msgtype" value="0" id="msgtype2" /> <span class="line">Kunenga?</span>
           </div>
            <textarea class="form-control rounded-0" id="texting-area" rows="3" placeholder="andika Igitekerezo cyawe." name="txtservice"></textarea>
<input type="hidden" name="ocode" value="{{Crypt::encryptString($number['officeCode'])}}">
        </div>
         <div class="form-group">
           <input type="button" name="save" value="Ohereza Igitekerezo" class="saveBtn" id="btnsendservice">
         </div>
        </form>
       </div>
      </div>

</div>
</div>
<!-- modal of laws of suggestion box-->
<div role="dialog" tabindex="-1" class="modal fade" id="modolaws" data-backdrop="false">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Amategeko Agenga Agasanduku kibitekerezo</h4></div>
            <div class="modal-body">
                <p>Ntabwo Gusebanya Byemewe</p>
                <p>Ntajyenga bitekerezo yemewe</p>
                    <p>Amagambo Y'urukozasoni ntabwo yemewe</p>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{!! asset('js/comment.js')!!}"></script>
@endsection
