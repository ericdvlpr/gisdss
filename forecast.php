<?php include 'includes/header.php';?>
   <section class="content">
     <div class="row">
       <div class="col-md-12">
         <div class="box">
             <div class="box-header">
               <div class="pull-right">
                 <button type="button" name="input" id="input_button" data-toggle="modal" data-target="#inputModal" class="btn btn-success btn-md"><i class="fa fa-fw fa-plus"></i> Input</button>
               </div>
               <h3 class="box-title">
                    Weather Forecast
                </h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
               <table id="forecasttbl" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                   <th>Issue #</th>
                   <th>Issue at</th>
                   <th>Valid Until</th>
                   <th>Command</th>
                 </tr>
                 </thead>
                 <tbody>
                   <tr>
                   </tr>
               </table>
             </div>
             <!-- /.box-body -->
           </div>

       </div>
      </div>
   </section>
   <div id="inputModal" class="modal fade">
      <div class="modal-dialog">
           <form method="post" id="forecast_form">
              <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title"><i class="fa fa-plus"></i>Add Forecast</h4>
              </div>
              <div class="modal-body">
                    <div class="row">
                      <div class="col-xs-4">
                          <div class="form-group">
                              <div class="input-group">
                                <input type="text" name="issue_no" id="issue_no" class="form-control" placeholder="Issue #" required autocomplete="off" />
                                <span class="input-group-addon">#</span>
                              </div>
                            </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="form-group">
                          <div class="input-group">
                              <input type="text" name="issue_date" id="datepicker" class="form-control" placeholder="Issue Date" required autocomplete="off" />
                              <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                            </div>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="form-group">
                          <div class="input-group">
                              <input type="text" name="valid_date" id="valid_date" class="form-control" placeholder="Valid Date" required autocomplete="off" />
                              <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                            </div>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                        <div class="col-xs-4">
                          <div class="form-group">
                            <div class="input-group">
                              <input type="number" min='0' name="wind" id="wind" class="form-control" placeholder="Wind">
                              <span class="input-group-addon"><i class="wi wi-strong-wind"></i></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-4">
                          <div class="form-group">
                              <div class="input-group">
                                <input type="number" min='0' name="wave" id="wave" class="form-control" placeholder="Wave Height">
                                <span class="input-group-addon"><i class="wi wi-tsunami"></i></span>
                              </div>
                          </div>
                        </div>
                        <div class="col-xs-4">
                          <div class="form-group">
                              <div class="input-group">
                                <input type="number" min='0' name="rain" id="rain" class="form-control" placeholder="RainFall">
                                <span class="input-group-addon"><i class="wi wi-rain"></i></span>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-6">
                          <div class="form-group">
                            <div class="input-group">
                              <input type="number" name="temp" id="temp" step=".01" class="form-control" placeholder="Temp">
                              <span class="input-group-addon"><i class="wi wi-sunrise"></i></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-6">
                          <div class="form-group">
                              <div class="input-group">
                                <input type="number" name="hum" id="hum" step=".01" class="form-control" placeholder="Humidity">
                                <span class="input-group-addon"><i class="wi wi-sunrise"></i></span>
                              </div>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-xs-6">
                          <div class="form-group">
                            <div class="input-group">
                              <input type="time" name="sunrise" id="sunrise" class="form-control" placeholder="Sunrise">
                              <span class="input-group-addon"><i class="wi wi-sunrise"></i></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-6">
                          <div class="form-group">
                              <div class="input-group">
                                <input type="time" name="sunset" id="sunset" class="form-control" placeholder="Sunset">
                                <span class="input-group-addon"><i class="wi wi-sunrise"></i></span>
                              </div>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-xs-6">
                          <div class="form-group">
                              <div class="input-group">
                                <input type="time" name="moonrise" id="moonrise" class="form-control" placeholder="Moonrise">
                                <span class="input-group-addon"><i class="wi wi-moonrise"></i></span>
                              </div>
                          </div>
                        </div>
                        <div class="col-xs-6">
                          <div class="form-group">
                              <div class="input-group">
                                <input type="time" name="moonset" id="moonset" class="form-control" placeholder="Moonset">
                                <span class="input-group-addon"><i class="wi wi-moonset"></i></span>
                              </div>
                          </div>
                        </div>
                      </div>
                </div>
                  <div class="modal-footer">
                   <input type="hidden" name="forecast_id" id="forecast_id" />
                   <input type="hidden" name="btn_action" id="btn_action" />
                   <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
             </div>
           </form>
        </div>
    </div>
<?php
include 'includes/footer.php';
?>
