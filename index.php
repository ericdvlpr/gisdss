<?php include 'includes/header.php';
      include 'core/function.php';
?>
    <section class="content-header">
     <h1>
       Dashboard
     </h1>

   </section>
   <section class="content">
     <div class="row">
    <!-- Left col -->
    <div class="col-md-8">
      <!-- MAP & BOX PANE -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Visitors Report</h3>

          <div class="box-tools pull-right">
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="pad">
                    <div id="map"></div>
                </div>
              </div>

          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="info-box bg-red ">
        <span class="info-box-icon"> &nbsp;<i class="wi wi-flood"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Flood prone barangays</span>
          <span class="info-box-number"><?php echo get_total_all_flood_records($connect); ?></span>
        </div>
      </div>
      <div class="info-box bg-green ">
        <span class="info-box-icon"> &nbsp;<i class="wi wi-tsunami"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Storm surge barangays</span>
          <span class="info-box-number"><?php echo get_total_all_storm_surge_records($connect); ?></span>
        </div>
      </div>
      <div class="info-box bg-blue ">
        <span class="info-box-icon"> &nbsp;<i class="wi wi-tsunami"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Tsunami prone barangays</span>
          <span class="info-box-number"><?php echo get_total_all_tsunami_records($connect); ?></span>
        </div>
      </div>
      <div class="info-box bg-gray">
        <span class="info-box-icon"> &nbsp;<i class="wi wi-volcano"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Landslide prone barangays</span>
          <span class="info-box-number"><?php echo get_total_all_landslide_records($connect); ?></span>
        </div>
      </div>

    </div>
  </div>
   </section>
<?php

include 'includes/footer.php';

?>
