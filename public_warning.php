<?php include 'includes/alt_header.php';
    include 'core/function.php';

?>
<div class="container">
  <div class="row">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
      <h1><i class="fa fa-fw fa-exclamation-triangle"></i>WEATHER ALERT</h1>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="small-box bg-aqua">
            <div class="inner">
              <h1>Warning no: 1</h1>
            </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="small-box bg-red">
            <div class="inner">
              <h1>Status:</h1>
            </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="box box-success">
          <div class="box-header with-border">
            <i class="fa fa-warning"></i>

            <h3 class="box-title">Issued</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <h3><?php  print date("h:i:sa, j \o\\f F Y"); ?></h3>
          </div>
          <!-- /.box-body -->
        </div>
    </div>
    <div class="col-md-6">
      <div class="pad" >
            <div id="map" style="width:560px;"></div>
        </div>
    </div>
  </div>
</div>
<?php
include 'includes/alt_footer.php';
?>
