<div role="dialog" tabindex="-1" class="modal fade " id="modoemp" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Bwira Ababagana Igihe Umuyobozi adahari</h4></div>
                  <form method="post" action="{{ url('office/empstutas') }}" id="empexcefrm">
                     {{ csrf_field() }}
            <div class="modal-body">
                     <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title bg-warning report"></h3></div>
                                <div class="panel-body">

                                        <div class="form-group">
                                            <label class="control-label">Code yumukozi</label>
                                            <span id="emptext" class="badge"></span>

                                          <input type="text" class="form-control empcode" name="empcode" value=""/>
                                          </div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-sm-8">
                                            <label class="control-label">Ntaraboneka kuva</label>
                                              <input type="date" class="form-control" name="empfrom" value="@php echo date('Y-m-d');@endphp"/>
                                            </div>
                                             <div class="col-md-4 col-sm-4">
                                            <label class="control-label">Amasaha</label>
                                               <input type="time" class="form-control" name="empfrom_t" value="@php echo date('i:s');@endphp"  />
                                            </div>


                                        </div>
                                        <div class="form-group">

                                        <div class="col-md-8 col-sm-8">
                                             <label class="control-label">Kugeza</label>

                                               <input type="date" class="form-control" value="" name="empto" value=""/>
                                            </div>
                                             <div class="col-md-4 col-sm-4">
                                            <label class="control-label">Amasaha</label>
                                               <input type="time" class="form-control" name="empto_t" value="@php echo date('i:s');@endphp"  />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Uramisigariraho</label>
                                            <input type="text" placeholder="who is employee will help the people" class="form-control" value="" id="assista" name="assista" />
                                        </div>

                                </div>
                            </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal">Funga</button>
                <button class="btn btn-success btnsaveexce" type="submit">Tangaza</button>
            </div>

                                    </form>
        </div>
    </div>
</div>
