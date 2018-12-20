@extends('layouts.dashboardLayout')
@section('dashboard-content')
  <div class="dashboard-main">
   <div class="main-header">
    <h5>Abaturage Basabye Randevu</h5>
    </div>
    <div class="table-responsive">
          @isset($report)

            <h5>{{$report}} </h5>

          @endisset
          @isset($client)
            <a href="#" id="btnnotify">Kanda Hano</a>
            <input id="url" type="hidden" class="form-control" value="{{'notification'}}{{'/'}}{{$id}}{{'/'}}{{$to_date}}{{'/'}}{{$from_date}}">
    <table class="table table-striped table-bordered table-condensed">
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
@endisset
  </div>
  </div>

  <script type="text/javascript">
  var reply_click = function()
  {
    window.location.href=document.getElementById('url').value;
  //alert("am working");
//  window.history.back();
  }
  document.getElementById('btnnotify').onclick = reply_click;
/*  window.onload = function() {
         history.back();
     }
     */
  </script>
  @endsection
