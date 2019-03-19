<?php
    include 'includes/alt_header.php';
    include 'core/function.php';
    include 'core/database.php';
    if(!isset($_SESSION["res_id"])){
      header('location:./login_guest.php');
    }
    $advisory = post_advisory($connect);
    $barangaystatus= check_barangay_status($connect,$_SESSION['brgy']);
   $barangaylist = check_action_plan($connect,$advisory[0]["alrt_wind"],$advisory[0]["alrt_rain"],$advisory[0]["alrt_wave"],$barangaystatus);
?>
<div class="container" style="background:white;">
  <div class="row">
    <a href="logout_parse.php" class="btn btn-danger btn-xs pull-right"><i class="fa fa-power"></i>Logout</a>
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

              <?php if($advisory[0]["alrt_wind"] == 45 || $advisory[0]["alrt_wind"] == 61 ){
                echo '<h1><strong>STATUS:</strong>Tropical Depressionr</h1>';
              } elseif($advisory[0]["alrt_wind"] == 62 || $advisory[0]["alrt_wind"] == 117){
                echo '<h1><strong>STATUS:</strong>Tropical Storm</h1>';
              }elseif($advisory[0]["alrt_wind"] == 118 || $advisory[0]["alrt_wind"] == 219){
                echo '<h1><strong>STATUS:</strong>Typhoon</h1>';
              }elseif($advisory[0]["alrt_wind"] > 219){
                echo '<h1><strong>ALERT STATUS:</strong> Super Typhoon</h1>';
              }
              ?>
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
        <div class="box box-success">
            <div class="box-header with-border">
              <i class="fa fa-warning"></i>

              <h3 class="box-title">Forecast</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php echo '<div class="callout callout-warning">
                <h2>Barangay is  <strong>'.strtoupper($barangaystatus).' PRONE</strong></h2>
              </div>'; ?>
              <h3>Wind: <?php  echo $advisory[0]["alrt_wind"]; ?> KPH</h3>
              <h3>Rain: <?php  echo $advisory[0]["alrt_rain"]; ?> MM/HR</h3>
              <h3>Wave: <?php  echo $advisory[0]["alrt_wave"]; ?> Feet</h3>

            </div>
            <!-- /.box-body -->
          </div>
    </div>
    <div class="col-md-6">
      <div class="box box-success">
          <div class="box-header with-border">
            <i class="fa fa-warning"></i>

            <div class="box-title">
              <h3><?php echo get_resident_brgy($connect,$_SESSION['brgy']); ?></h3>

            </div>

          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php
               $resBrgy=get_resident_brgy($connect,$_SESSION['brgy']);

              foreach($barangaylist as $key => $value){
                $checkBrgy=in_array($resBrgy,$value);
                $brgy_names = array_column($value, 'brgy_name');
                $checkBrgy=in_array($resBrgy, $brgy_names);
              }
              if($barangaylist){
                    if($advisory[0]["alrt_rain"] == 50 || $advisory[0]["alrt_rain"] == 60){
                      echo '<div class="callout callout-warning">
                        <p>Following Barangay under <strong>'.ucwords($barangaystatus).'MONITORING</strong></p>
                      </div>';
                    }elseif($advisory[0]["alrt_rain"] > 180){
                      echo '<div class="callout callout-danger">
                        <p>Following Barangay under <strong>FORCE EVACUATION</strong></p>
                        <p>Please be advise to evacuate to the nearest Evac Center</p>
                      </div>';
                    }
              }

             ?>
          </div>
          <!-- /.box-body -->
        </div>
    </div>
  </div>

</div>
<?php
include 'includes/alt_footer.php';
?>
