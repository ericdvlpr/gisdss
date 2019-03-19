<?php include 'includes/header.php';
      include 'core/function.php';
?>
    <section class="content-header">


   </section>
   <section class="content">
     <div class="row">
       <div class="col-md-12">
         <div class="box">
             <div class="box-header">
               <div class="pull-right">
                 <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#residentModal" class="btn btn-success btn-md"><i class="fa fa-fw fa-plus"></i> Add</button>
               </div>
               <h3 class="box-title">
                  Resident
                </h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
               <table id="residenttbl" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                   <th>Name</th>
                   <th>Barangay</th>
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
           <!-- /.box -->
         </div>
         <!-- /.col -->
       </div>
       <!-- /.row -->
   </section>
   <div id="residentModal" class="modal fade">
      <div class="modal-dialog">
           <form method="post" id="resident_form">
              <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title"><i class="fa fa-plus"></i> Add Resident</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="res_name" id="res_name" class="form-control" placeholder="Name" required />
                 </div>
                 <div class="form-group">
                    <label>Barangay</label>
                    <select class="form-control" name="res_brgy" id="res_brgy" required>
                      <?php echo get_barangay($connect); ?>
                    </select>
                 </div>
                 <div class="form-group">
                       <label>Username</label>
                       <input type="text" name="res_username" id="res_username" class="form-control" placeholder="Username" required />
                  </div>
                   <div class="form-group">
                      <label>Enter User Password</label>
                      <input type="password" name="res_password" id="res_password" class="form-control" Placeholder="Password" required />
                   </div>
                </div>
                  <div class="modal-footer">
                   <input type="hidden" name="res_id" id="res_id" />
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
