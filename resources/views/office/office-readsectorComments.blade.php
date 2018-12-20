@extends('layouts.dashboardLayout')
@section('dashboard-content')
  <div class="dashboard-main">
   <div class="main-header">
    <h5>Ibiri mugasandugu Kibitekerezo</h5>
    </div>
    <div class="col-md-12 col-sm-12">
 <div class="panel panel-primary">
    <div class="panel-heading">

    	@isset($sname)<h2 class="panel-title">Umurenge wa {{ $sname }}</h2>@endisset

      <span>Ibiri mugasandugu Kibitekerezo</span>
    </div>
    <div class="panel-body">
        <div class="row">
        	<div class="col-md-12">


            @if ($errors->any())

<div role="alert" class="alert alert-danger text-center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
        <ul>
            @if($errors->has('txtfromdate'))

            <li>{{ 'Aho Ushaka gutangirira hafite ikibazo Ungera uhitemo itariki' }}</li>
            @endif
            @if($errors->has('txttodate'))

            <li>{{ 'Aho Ushaka kugera hafite ikibazo ungera uhitemo itariki' }}</li>
            @endif


        </ul>
    </div>
@endif

        		  <form  class="form-inline"  id="frminterval" action="/office/read/wantedcomments" method="post">
                {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label">Reba Kuva </label>
                <input type="date" class="form-control input-sm" name="txtfromdate"/>
                <label class="control-label">Kugeza</label>
                <input type="date" class="form-control input-sm" name="txttodate"/>
                <input type="submit"  class="btn btn-sm btn-default" id="" value="Reba">
                <span class="statas fa fa-spin">....</span>
            </div>
          <input type="hidden" name="rfromdistrict" value="@isset($sname){{ $sname }}@endisset" id="txtcid">
        </form>
        	</div>
        	<hr>
            <div class="col-md-6 col-sm-6">
                @isset($gushima)
                 <h2><u>Gushima</u> <span class="badge">{{$amashimwe}}</span></h2>
                 <input type="hidden" name="cid" value="@isset($sname){{ $sname }}@endisset" id="txtcid">
                  @if(count($gushima)>0)
                 @foreach($gushima as $ama)

         <a href="/office/read/details/{{ $ama->id }}">

         Ishimwe ryo kuwa {{ $ama->created_at }}</a>
           <br/>
          {{ str_limit($ama->details,50)}}
            <br>
            @endforeach
                @endif
                @endisset
                   @php
           if (!isset($type)) {
             echo "<div>". $gushima->links() ."</div>";
           }
            @endphp
                <div></div>
            </div>
            <div class="col-md-6 col-sm-6">
               <h2><u>Kunenga</u> <span class="badge">{{$abanenga}}</span></h2>

                 @isset($kunenga)
               @if(count($kunenga)>0)
      @foreach($kunenga as $ama)
        <li class="list-group-item">

         <a href="/office/read/details/{{ $ama->id }}">

          kuwa {{ $ama->created_at }}</a>
           <br/>
          {{ str_limit($ama->details,50)}}
            <br>
          </li>
            @endforeach
          </ul>
           @endif
                @endisset
            </div>
            @php
           if (!isset($type))
           {
             echo "<div>". $kunenga->links() ."</div>";
           }
            @endphp
        </div>
    </div>
</div>
</div>

@endsection
