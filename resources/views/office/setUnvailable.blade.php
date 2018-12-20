@extends('layouts.dashboardLayout')
@include('office.addexception');
@section('dashboard-content')
  <div class="dashboard-main">
   <div class="main-header">
    <h5>Umukozi utaraboneka Kubiro </h5>
  </div>
  <div class="container">
    <div class="row" id="others">
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

      <form method="post" action="{{ url('office/empstutas') }}" id="empexcefrm">
         {{ csrf_field() }}
      <div class="form-group" id="group">

          <span id="emptext" class="badge"></span>

        <input type="hidden" class="form-control empcode" name="empcode" value="{{$id}}"/>
        Amazina Y'umukozi:<b>{{$names}}</b>
        </div>
      <div class="form-group" id="group">
          <div class="col-md-6 col-sm-6">
          <label class="control-label">Ntaraboneka kuva</label>
            <input type="date" class="form-control" name="empfrom" value="" required/>
          </div>
           <div class="col-md-4 col-sm-4">
          <label class="control-label">Amasaha</label>
             <input type="time" class="form-control" name="empfrom_t" value=""  />
          </div>
      </div>
      <div class="form-group" id="group">

      <div class="col-md-6 col-sm-6">
           <label class="control-label">Kugeza</label>

             <input type="date" class="form-control" value="" name="empto" value="" required/>
          </div>
           <div class="col-md-4 col-sm-4">
          <label class="control-label">Amasaha </label>
             <input type="time" class="form-control" name="empto_t" value="" />
          </div>
      </div>
      <div class="form-group" id="group">
        <div class="col-md-6 col-sm-6">
        <label class="control-label">Impamvu</label>

        <input type="text" placeholder="Impamvu" class="form-control" value="" id="assista" name="impavu_txt" />
        </div>
          <div class="col-md-4 col-sm-4">
          <label class="control-label">Uramusigariraho</label>

          <input type="text" placeholder="who is employee will help the people" class="form-control" value="" id="assista" name="assista" />
  <br/>
    <input type="submit" class="btn btn-primary" value="Tangaza">
      </div>

    </div>
    <div class="form-group" id="group">
    @isset($client)
      @if(count($client)>0)
  <table class="table table-striped table-bordered table-condensed">
    <caption>Abaturage Basabye Randevu kumatalik Atandukanye</caption>
  <thead>
  <tr>
      <th>Amazina </th>
      <th>Tel</th>
      <th>Italiki ya Randevu </th>
  </tr>
  </thead>
  <tbody id="emptb">
     @foreach( $client as $cl)
      <tr>
      <td>
        {{$cl->client_name}}
      </td>
      <td>
        {{$cl->client_tel}}
      </td>
      <td>
        {{$cl->appointement_date}}
      </td>
      </tr>
  @endforeach

  </tbody>
  </table>
  @else
    <h2 class="help-block text-info">Nta muturage wasabye Randevu</h2>
  @endif
  @endisset
</div>
  </form>

  </div>
</div>
</div>

  @endsection
