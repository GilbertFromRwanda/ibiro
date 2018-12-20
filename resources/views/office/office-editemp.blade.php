<div role="dialog" tabindex="-1" class="modal fade " id="modoeditemp" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Guhindura amakuru ku mukozi</h4></div>
                  <form method="post" action="/office/editLeaderInfo" enctype="multipart/form-data" id="frmeditinfo"> 
             <div class="panel-body">
             
                   
                             {{ csrf_field() }}

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="control-label" for="lfn">Amazina</label>
                                    <input type="hidden" name="empid" value="" id="empid" />
                                    <input class="form-control" type="text" name="empname"  placeholder="Ndayambaje Gilbert" maxlength="30" autofocus="" id="empname">
                                </div>
                              
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="control-label" for="ltel">TEL</label>
                                    <input class="form-control" type="tel" name="emp_tel" required="" placeholder="0788354762" maxlength="10" minlength="10" autocomplete="off" id="emp_tel">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="lemail">Email </label>
                                    <input class="form-control" type="email" name="emp_email" required="" placeholder="example@gmail.com" maxlength="40" autocomplete="off" id="emp_email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="control-label" for="lpos"> Umwanya Afite(position)</label>
                                    <input class="form-control" type="text" name="emppos"  placeholder="Mayor"  autocomplete="off" required="" id="emppos">
                                </div>
                               
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="control-label"> Inshingano</label>
                                    <textarea class="form-control" name="emprespo" required="" placeholder="Imiberho myiza yabaturajye" maxlength="200" required="" id="emprespo"></textarea>
                                </div>
                            </div>
                            <hr>
                            
                       
                    </div>

            <div class="modal-footer">
                <button class="btn btn-default btn-sm" type="button" data-dismiss="modal">Funga</button>
               <button class="btn btn-primary active  btn-sm pull-right" type="submit">Hindura</button>
            </div>

                                    </form>
        </div>
    </div>
</div>