@extends('layouts.ibiro-layout')
@section('content')
<div class="main-content" id="main">
  <div class="menu-dash">
    <span class="glyphicon glyphicon-list"  title="menu" id="load-menu"></span>
  </div>
    @include('layouts/intro')
  <div class="container">

    @isset($data)
      @if($data->count())
        <div class="row">

  <center>   <div class="o-intro">  {!! $number['officeName']!!}
       <p >Hitamo Umukozi Ushaka Kwaka Randevu
       </p>

     </div>
     </center>
      </div>
  <div class="main-table table-responsive">
  <table class="table">
  <thead>
      <tr>
          <th>Ifoto </th>
          <th>Amazina </th>
          <th>Email </th>
          <th>TEL </th>
          <th>Umwanya </th>
          <th>Inshingano </th>
          <th>Hitamo</th>
      </tr>
  </thead>
  <tbody>
        @foreach($data as $emp)
      <tr>
    <td><img src="/officeImages/{{ $emp->emp_image }}"
       alt="Ifoto Y Umukozi" class=" img-responsive" style="width:45px"/>
    </td>
          <td>{{ $emp->emp_names }}</td>
          <td>{{ $emp->emp_email }}</td>
          <td>{{ $emp->emp_tel }}</td>
          <td>{{ $emp->emp_position }}</td>
          <td>{{ $emp->emp_respo }}</td>
          <td>
            <span class="has-success"><label class="radio-inline " ><input type="radio" name="leader_id" class="choosen_radio" value="{{ $emp->emp_id }}"/>Randevu</label></span>

          </td>
      </tr>
    @endforeach
      <tr></tr>
  </tbody>

</table>
<div class="col-md-12">
<button class="btn btn-info active btn-sm pull-right" type="submit" id="btnaskappoint1">Emeza</button>
</div>
</div>
@else
  <div class="row">
<h1 class="text-info">Ntabwo ibiro uhisemo byari byakoresha iyi service</h1>
<br>
</br>
<a href="#" id="backtoMenu" style="margin-left:100px"><i class="fa fa-backward" aria-hidden="true"></i>  Gusubira Aho Uvuye</a>
</div>
@endif
@endisset

  </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{!! asset('js/askAppointement.js')!!}"></script>

@endsection
