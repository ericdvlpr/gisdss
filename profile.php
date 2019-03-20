<?php include 'includes/header.php';
      include 'core/function.php';
?>

   <section class="content">
     <div class="row">
       <div class="col-md-4"></div>
           <div class="col-md-4">
                 <div class="box box-primary">
                   <div class="box-body box-profile">
                     <img class="profile-user-img img-responsive img-circle" src="images/default-user.png" alt="User profile picture">

                     <h3 class="profile-username text-center"><?php echo $_SESSION['username']; ?></h3>
                     <form class="form-horizontal" id="user_form">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Password</label>

                              <div class="col-sm-10">
                                <input type="password" class="form-control"  name="password" id="password" placeholder="Password">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Re-type Password</label>

                              <div class="col-sm-10">
                                <input type="password" class="form-control"  name="password" id="password" placeholder="Retype Password">
                              </div>
                            </div>
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <input type="hidden" name="user_id" id="user_id" />
                             <input type="hidden" name="btn_action" id="btn_action" value="Edit" />
                             <input type="submit" name="action" id="action" class="btn btn-info" value="Update" />
                          </div>
                          <!-- /.box-footer -->
                        </form>
                   </div>
                   <!-- /.box-body -->
                 </div>
             <!-- /.box -->
             <!-- /.box -->
           </div>
           <div class="col-md-4"></div>
         </div>
   </section>
<?php

include 'includes/footer.php';

?>
