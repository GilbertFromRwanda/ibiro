@extends('layouts.dashboardLayout')

@section('dashboard-content')
<div class="dashboard-main">
 <div class="main-header">
<h5>Umukozi Mushya</h5>
 </div>
 <form class="form" action="index.html" method="post" enctype="multipart/form-data">
   <div class="form-group" id="group">
     <label for="">Amazina</label>
     <input type="text" name="" value="" class="form-control">
   </div>
   <div class="form-group" id="group">
     <label for="">Email</label>
     <input type="text" name="" value="" class="form-control">
   </div>
   <div class="form-group" id="group">
     <label for="">Telephone</label>
     <input type="text" name="" value="" class="form-control">
   </div>
   <div class="form-group" id="group">
     <label for="">Umwanya Afite(Position)</label>
     <input type="text" name="" value="" class="form-control">
   </div>
   <div class="form-group" id="group">
     <label for="">Inshingano</label>
     <input type="text" name="" value="" class="form-control">
   </div>
   <div class="form-group" id="group">
     <label for="">Ifoto Ye</label>
     <input type="file" name="itangazo" value="" class="form-control">
   </div>
   <div class="form-group" id="group">
     <input type="submit" name="save" value="Submit" class="btn btn-primary">
   </div>
 </form>
</div>
@endsection
