<?php include 'includes/header.php';?>
   <section class="content">
     <div class="row">
       <div class="col-md-12">
         <div class="box">
             <div class="box-header">
               <h3 class="box-title">
                  Advisory
                </h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
               <table id="advisorytbl" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                   <th>Issue #</th>
                   <th>Issue date</th>
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
   <div id="inputAdvisory" class="modal fade">
      <div class="modal-dialog">

           <form method="post" id="advisory_form">
              <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title"><i class="fa fa-plus"></i> Update Advisory</h4>
              </div>

              <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Issue No:</label>
                          <input type="text" readonly class="form-control"  name="issue_no" id="issue_no">
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Issue Date:</label>
                        <input type="text" readonly class="form-control" name="issue_date" id="issue_date">
                      </div>
                  </div>
                </div>
                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                          <label>Wind Speed:</label>
                              <input type="text" name="alrt_wind" id="alrt_wind" class="form-control"/>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label>Wave Height:</label>
                            <input type="text" name="alrt_wave" id="alrt_wave"  class="form-control"/>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Volumn of Rain:</label>
                          <input type="text" name="alrt_rain" id="alrt_rain"  class="form-control" />
                        </div>
                      </div>
                    </div>
                </div>
                  <div class="modal-footer">
                   <input type="text" name="advisory_id" id="advisory_id" />
                   <input type="text" name="btn_action" id="btn_action" />
                   <input type="submit" name="action" id="action" class="btn btn-info" value="Create" />
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
             </div>
           </form>
        </div>
    </div>
<?php
include 'includes/footer.php';
?>
