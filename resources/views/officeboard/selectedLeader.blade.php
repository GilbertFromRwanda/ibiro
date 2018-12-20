
@extends('layouts.ibiro-layout')
@section('content')
<div class="main-content" id="main">
<div class="container">
<div class="panel panel-default">
    <div class="panel-heading">
      <div class="row">
        <div class="col-md-4 col-sm-8">
        @isset($emp)
           <img src="/officeImages/{{ $emp->emp_image }}" class="img-rounded img-responsive" style="width:100px"/>
               <div style="margin-left:100px;margin-top:-20px">
               <h4>Amazina: {{ $emp->emp_names }}</h4>
               <h4>Umwanya: {{ $emp->emp_position }}</h4>

               <h4>Inshingano: {{ $emp->emp_respo }}</h4></div>
     <input type="hidden" value="{{$emp->emp_id}}" name="emp_code" class="getido">
              @endisset
            </div>

            <div class="col-md-8 col-sm-8">
             @isset($schedule)
               @if(count($schedule)>0)
                <p> Uko Twacyira Abatugana:<br></p>
                @foreach ($schedule as $sc)

                  {!! $sc->gahunda !!}

                @endforeach

               @else
                    <marquee direction="scroll">
            <h3 class="text-warning">Ntagahunda yuburyo Service Zitangwa Irashyirwaho</h3>
                    </marquee>

               @endif
             @endisset
            </div>
              </div>
              </div>
              </div>
              <div class="panel-body">
        <form class="bootstrap-form-with-validation">
            <p class="text-center">Vuga Igihe Ushakira Uyu Muyobozi</p>
            <div class="form-group">
               <div class="col-md-3">
                 <label for="client_names" class="control-label">Amazina </label>
                 <input type="text" name="client_name" required placeholder="Amazina Yawe" class="form-control input-sm" id="client_name" maxlength="50"/>
               </div>
               <div class="col-md-3">
                 <label for="tel" class="control-label">Tel </label>
                 <input type="number" name="client_tel" required placeholder="telephone waye " class="form-control input-sm" id="client_tel" max="10"/>
               </div>
               <div class="col-md-3">
                 <label for="client_date" class="control-label">Italiki Umushakiraho</label>
                 <input type="date" class="form-control input-sm" id="client_date" required />

               </div>
           <div class="col-md-3">

  <button class="btn btn-primary active btn-sm pull-left btnsetappmt" type="button" style="margin-top:20px">Emeza</button>
  <center> <span class="randevu_re text-info"></span></center>
            </div>
          </div>
             <div class="form-group">

            <br>
          </br>
          <br>
        </br>
        <div role="alert" class="alert alert-info text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
                <ul>

                    <li><p>Icyitonderwa Uzuza neza  ibisabwa Kugirango<br> Nihagira impinduka ziba uzazimenyeshwe</p></li>
                </ul>
            </div>
          <a href="#" id="backtoMenu" style="margin-left:100px"><i class="fa fa-backward" aria-hidden="true"></i>  Gusubira Aho Uvuye</a>
        </div>
        </form>
    </div>
</div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{!! asset('js/askAppointement.js')!!}"></script>
@endsection
