<?php include 'includes/header.php';
    include 'core/function.php';

?>
   <section class="content">
          <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title"><i class="wi wi-day-snow-wind"></i>View Advisory</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <?php $advisory=view_advisory($connect, $_GET['advisoryID']);?>
                                <div class="col-xs-6">
                                    <h3>Issue #:<?php echo $advisory["issue_no"]; ?></h3>
                                    <h3>Wind: <?php echo $advisory["wind"]; ?> KPH</h3>

                                    <h3>Wave Height: <?php echo $advisory["wave"]; ?> Feet</h3>
                                    <h3>RainFall: <?php echo $advisory["rain"]; ?> mm/hr</h3>

                              </div>
                                 <div class="col-xs-6">
                                   <h3>Issue Date: <?php echo $advisory["issue_date"]; ?></h3>
                                 </div>
                  </div>
                  <?php if( $advisory["wind"] == 45 || $advisory["wind"] == 61 ){
                    echo '<div class="callout callout-danger">
                      <h1><strong>ALERT STATUS:</strong>Tropical Depressionr</h1>
                    </div>';
                  } elseif($advisory["wind"] == 62 || $advisory["wind"] == 117){
                    echo '<div class="callout callout-danger">
                      <h1><strong>ALERT STATUS:</strong>Tropical Storm</h1>
                    </div>';
                  }elseif($advisory["wind"] == 118 || $advisory["wind"] == 219){
                    echo '<div class="callout callout-danger">
                      <h1><strong>ALERT STATUS:</strong>Typhoon</h1>
                    </div>';
                  }elseif($advisory["wind"] > 219){
                    echo '<div class="callout callout-danger">
                      <h1><strong>ALERT STATUS:</strong> Super Typhoon</h1>
                    </div>';
                  }
                  ?>
              </div>
            </div>
           
   </section>
<?php
include 'includes/footer.php';
?>
