<div role="dialog" tabindex="-1" class="modal fade " id="modochange" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">
                  <div class="logo">
                    <img src="{!! asset('img/republick.png')!!}" alt="" class="logo-img">
                  </div>
               <small style="color: orange"> Change Entry password(Hindura Ijambo banga)</small></h4>
                </div>
                  <form method="post" id="frmchangeprofile">

                      <div class="modal-body">
                     <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h3 class="panel-title bg-warning report"></h3></div>
                                <div class="panel-body bg-warning">
                                    <div><span class="reporte"></span></div>
                                        <div class="form-group">

                                            <label class="control-label text-info">Old Password(Ijambo rishaje)</label>
                                            <span id="emptext" class="badge"></span>
                                            <input type="password" class="form-control"  value="" name="oldpswd" id="oldpswd" />

                                          </div>
                                        <div class="form-group">
                                           <label class="control-label text-info">New Password(Ijambo banga rishya)</label>
                                            <input type="password" class="form-control" value="" name="newpswd"  id="newpswd" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label text-info">Confirm Password(Subiramo ijambo banga)</label>
                                            <input type="password" class="form-control" value="" name="confirmpswd" id="cfrmpswd" />

                                        </div>

                                </div>
                            </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal">close(Funga)</button>
                <button class="btn btn-success" type="button" id="btnchangepswd">Change(Hindura)</button>
            </div>

                                    </form>
        </div>
    </div>
</div>
