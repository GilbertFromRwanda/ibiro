
@extends('layouts.dashboardLayout')
@section('dashboard-content')
  <div class="dashboard-main">
   <div class="main-header">
    <h5>Kwandika Umukozi Mushya</h5>
    </div>
  <form method="post"  action="/office/office-newemp" enctype="multipart/form-data">
    {{ csrf_field() }}
                            <div class="form-group">

                                    <label class="control-label" for="lfn">Amazina</label>
                                    <input class="form-control" type="text" name="empname"  placeholder="Eg:Ndayambaje Gilbert" maxlength="30" autofocus="">
                                </div>
                              <div class="form-group">
                                <label class="control-label" for="ltel">TEL</label>
                                    <input class="form-control" type="tel" name="emp_tel" required="" placeholder="Eg:0788354762" maxlength="10" minlength="10" autocomplete="off">
                                </div>
                                 <div class="form-group">
                                    <label class="control-label" for="lemail">Email </label>
                                    <input class="form-control" type="email" name="emp_email" required="" placeholder="Eg:example@gmail.com" maxlength="40" autocomplete="off">

                            </div>
                            <div class="form-group">

                                    <label class="control-label" for="lpos"> Umwanya Afite(position)</label>
                                    <input class="form-control" type="text" name="emppos"  placeholder="Eg:Mayor"  autocomplete="off" required="">
                                </div>
                                   <div class="form-group">
                                    <label class="control-label" for="lphoto">Ifoto</label>
                                    <input type="file" accept="image/*" name="empphoto" class="form-control">
                                </div>

                            <div class="form-group">

                                    <label class="control-label"> Inshingano</label>
                                    <input type="text" class="form-control" name="emprespo" required="" placeholder="Eg:Imiberho myiza yabaturajye" maxlength="200" required="" style="padding: 1px 0 0 4px" />
                                  <br/>
                                <input type="submit" name="submit" value="Bika" class="btn btn-primary pull-right">

                                </div>
                            </div>
                        @endsection
