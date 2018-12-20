@extends('layouts.dashboardLayout')
@section('dashboard-content')
  <div class="dashboard-main">
   <div class="main-header">
    <h5>Ibiri mugasandugu Kibitekerezo</h5>
    </div>


         	     <div class="panel panel-primary" style="overflow-y:auto;">
                    <div class="panel-heading">
                    <h1 class="panel-title text-center"> Ibiri mugasandugu Kibitekerezo </h1>
                  </div>
                    <div class="panel-body">
                      <div class="row">
                <div class="col-md-12 col-sm-12">
            <form  class="form-inline"  id="frminterval" action="/office/read/intervalComments" method="post">
                {{ csrf_field() }}
                    @if ($errors->any())

<div role="alert" class="alert alert-danger text-center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
        <ul>
            @if($errors->has('txtfromdate'))

            <li>{{ 'Washyizemo italiki nabi' }}</li>
            @endif
            @if($errors->has('txttodate'))

            <li>{{ 'Aho Ushaka kugera hafite ikibazo ungera uhitemo itariki' }}</li>
            @endif


        </ul>
    </div>
@endif
            <div class="form-group">

                <label class="control-label">Reba Kuva </label>
                <input type="date" class="form-control input-sm" name="txtfromdate"/>
                <label class="control-label">Kugeza</label>
                <input type="date" class="form-control input-sm" name="txttodate"/>
                 <input type="submit"  class="btn btn-sm btn-default" id="" value="Reba">


            </div>

        </form>

                       </div>
                <div class="col-md-6 col-sm-6">

                <h4><u>Gushima</u>&nbsp;<span  class="badge">{{ $amashimwe }}</span></h4>

        @isset($gushima)
        @foreach($gushima as $ama)
            <ul class="list-group">
          <li class="list-group-item">
         <a href="/office/read/{{ $ama->id }}">
              @if($ama->viewed==0)
           <span class="fa fa-envelope-o"></span>
             @endif
         Ishimwe ryo kuwa {{ $ama->created_at }}</a>
           <br/>
          {{ str_limit($ama->details,50)}}
            <br>
          </li>
            </ul>
            @endforeach

          @endisset
             @isset($amashimwed)
               <ul class="list-group">
           @foreach($amashimwed as $ama)
             <li class="list-group-item">
         <a href="/office/read/{{ $ama->id }}">
             @if($ama->viewed==0)
           <span class="fa fa-envelope-o"></span>
             @endif
         Ishimwe ryo kuwa {{ $ama->created_at }}</a>
           <br/>
          {{ str_limit($ama->details,50)}}
            <br>
          </li>
            @endforeach
          </ul>
           <div> {{ $amashimwed->links() }}</div>
          @endisset
     </div>
               <div class="col-md-6 col-sm-6">
               <h4><u>Kunenga</u> &nbsp;<span class="badge">{{ $abanenga }}</span></h4>
                  @isset($kunenga)
                    <ul class="list-group">
       @foreach($kunenga as $kune)
         <li  class="list-group-item">
         <a href="/office/read/{{ $kune->id }}">
              @if($ama->viewed==0)
           <span class="fa fa-envelope-o"></span>
             @endif
          Kunenga: {{ $kune->created_at }}</a>
         <br/>
          {{ str_limit($kune->details,50)}}
         <br>
       </li>
            @endforeach
          </ul>
               @endisset
             @isset($kunengad)
              <ul class="list-group">
        @foreach($kunengad as $kune)
          <li class="list-group-item">
         <a href="/office/read/{{ $kune->id }}">
             @if($ama->viewed==0)
           <span class="fa fa-envelope-o"></span>
             @endif
         Kunenga: {{ $kune->created_at }}</a>
         <br/>
          {{ str_limit($kune->details,50)}}
    <br>
          </li>
            @endforeach
          </ul>
            <br/>
            <div>{{ $kunengad->links() }}</div>
          @endisset
        </div>
        <hr>

     <div class="col-md-6 col-sm-6" style="border-top: 1px solid green">
      <div class="row">
    <p class="help-block">Abishimira service Itangirwa kumirenge</p>
@isset($commentcode)
@foreach($commentcode as $key => $value)
<div class="col-md-3 col-sm-3">
<a href="/office/sectorcomments/{{ Crypt::encryptString($value )}}">
  @foreach($officename as $key1 => $value)
@if($key1==$key)
{{ $value }}
@endif
@endforeach
</a>
<br/>
@foreach($commentama as $key2 => $value)
@if($key2==$key)
<p>Abishimira service batanga ni <span class="badge" style="background-color: orange">{{ $value }}</span></p>
@endif
@endforeach
<br>
</div>
@endforeach
   @endisset
    </div>
      </div>

       <div class="col-md-6 col-sm-6" style="border-top: 1px solid green">
        <div class="row">
  <p class="help-block">Abanenga serivice Itangirwa kumirenge</p>

 @isset($commentcode)
@foreach($commentcode as $key => $value)
<div class="col-sm-3 col-md-3">
<a href="/office/sectorcomments/{{ Crypt::encryptString($value )}}">
  @foreach($officename as $key1 => $value)
@if($key1==$key)
{{ $value }}
@endif
@endforeach
</a>
<br>
@foreach($commentkune as $key2 => $value)
@if($key2==$key)
<p>Abanenze service batanga ni <span class="badge" style="background-color: orange">{{ $value }}</span></p>
@endif
@endforeach
</div>
@endforeach
   @endisset
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
