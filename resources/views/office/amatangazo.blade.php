@extends('layouts.dashboardLayout')
@section('dashboard-content')
<div class="dashboard-main">
 <div class="main-header">
  <h5>Itangazo rishya</h5>
  </div>
  <form class="form" action="index.html" method="post" enctype="multipart/form-data">
   <div class="form-group" id="group">
     <label for="">Umutwe</label>
     <input type="text" name="" value="" class="form-control">
   </div>
   <div class="form-group" id="group">
     <label for="">Uploading Itangazo</label>
     <input type="file" name="itangazo" value="" class="form-control">
   </div>
   <div class="form-group" id="group">
     <label for="">Itangazo rizarangira?</label>
     <input type="date" name="date" value="" class="form-control">
   </div>
   <div class="form-group" id="group">
     <input type="submit" name="save" value="Submit" class="btn btn-primary">
   </div>
 </form>
</div>
@endsection
