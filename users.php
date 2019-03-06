<?php include 'includes/header.php';?>
    <section class="content-header">


   </section>
   <section class="content">
     <div class="row">
       <div class="col-md-12">
         <div class="box">
             <div class="box-header">
               <div class="pull-right">
                 <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-success btn-md"><i class="fa fa-fw fa-plus"></i> Add</button>
               </div>
               <h3 class="box-title">
                  Users
                </h3>


             </div>
             <!-- /.box-header -->
             <div class="box-body">
               <table id="userstbl" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                   <th>Name</th>
                   <th>Username</th>
                   <th>Status</th>
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
   <div id="userModal" class="modal fade">
      <div class="modal-dialog">
           <form method="post" id="user_form">
              <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title"><i class="fa fa-plus"></i> Add User</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" id="name" class="form-control" placeholder="Name" required />
                 </div>
                  <div class="form-group">
                        <label>Enter User Name</label>
                        <input type="text" name="username" id="username" class="form-control" required />
                   </div>
                   <div class="form-group">
                      <label>Enter User Password</label>
                      <input type="password" name="password" id="password" class="form-control" required />
                   </div>
                   <div class="form-group">
                      <label>Enter Access Level</label>
                      <select class="form-control" name="access" id="access" required>
                        <option value="">Please Select</option>
                        <option>1</option>
                        <option>2</option>
                      </select>
                   </div>
                </div>
                  <div class="modal-footer">
                   <input type="hidden" name="user_id" id="user_id" />
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
