<?php include 'includes/header.php';
?>
    <section class="content-header">
     <h1>
      Report
     </h1>

   </section>
   <section class="content">
     <div class="row">
       <div class="col-md-12">
         <div class="box box-success">
             <div class="box-header with-border">
               <i class="fa fa-warning"></i>
               <div class="box-title">
                 <h3>Historical Data</h3>
               </div>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
                 <form id="hsdata_form" method="post" >
                   <div class="row">
                     <div class="col-xs-3">
                       <div class="form-group">
                          <label>Date range:</label>

                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" name="daterange" id="reservation">
                          </div>
                          <!-- /.input group -->
                        </div>
                     </div>
                 </div>
                 <input type="hidden" name="btn_action" id="btn_action" value="fetch" />
                 <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <div id="reports_table">

                </div>
             </div>
             <!-- /.box-body -->
           </div>
       </div>
      </div>
   </section>

<?php
include 'includes/footer.php';
?>
