<?php include 'includes/header.php';
    include 'core/function.php';

?>
   <section class="content">
          <div class="box box-danger">
              <div class="box-header with-border">
                <button type="button" name="button" id="createAdvi"  data-toggle="modal" data-target="#inputAdvisory" class="btn btn-success pull-right">Post Advisory</button>

                <h3 class="box-title"><i class="wi wi-day-snow-wind"></i>View Forecast</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <?php $forecast=check_weather_forecast($connect, $_GET['forecastID']);
                    ?>
                                <div class="col-xs-6">
                                    <h3>Issue #:<?php echo $forecast["issue_no"]; ?></h3>
                                    <h3>Wind: <?php echo $forecast["wind"]; ?> KPH</h3>

                                    <h3>Wave Height: <?php echo $forecast["wave"]; ?> Feet</h3>
                                    <h3>RainFall: <?php echo $forecast["rain"]; ?> mm/hr</h3>
                                    <h3>Sunrise: <?php echo $forecast["sunrise"]; ?></h3>
                                    <h3>Sunset: <?php echo $forecast["sunset"]; ?></h3>

                              </div>
                                 <div class="col-xs-6">
                                   <h3>Issue Date: <?php echo $forecast["issue_date"]; ?></h3>
                                   <h3>Valid Date: <?php echo $forecast["valid"]; ?></h3>
                                   <h3>Temperature: <?php echo $forecast["temp"]; ?>°</h3>
                                   <h3>Humid: <?php echo $forecast["humid"]; ?>°</h3>
                                   <h3>Moonrise: <?php echo $forecast["moonrise"]; ?></h3>
                                   <h3>Moonset: <?php echo $forecast["moonset"]; ?></h3>
                                 </div>
                  </div>
                  <?php if( $forecast["wind"] == 45 || $forecast["wind"] == 61 ){
                    echo '<div class="callout callout-danger">
                      <h1><strong>ALERT STATUS:</strong>Tropical Depressionr</h1>
                    </div>';
                  } elseif($forecast["wind"] == 62 || $forecast["wind"] == 117){
                    echo '<div class="callout callout-danger">
                      <h1><strong>ALERT STATUS:</strong>Tropical Storm</h1>
                    </div>';
                  }elseif($forecast["wind"] == 118 || $forecast["wind"] == 219){
                    echo '<div class="callout callout-danger">
                      <h1><strong>ALERT STATUS:</strong>Typhoon</h1>
                    </div>';
                  }elseif($forecast["wind"] > 219){
                    echo '<div class="callout callout-danger">
                      <h1><strong>ALERT STATUS:</strong> Super Typhoon</h1>
                    </div>';
                  }
                  ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                                <div class="box-title">
                                  <h5>Barangay Affected by Flood</h5>
                                </div>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                    </button><br />

                                </div>
                      </div>
                      <div class="box-body">
                        <ul class="products-list product-list-in-box">
                        <?php
                         $barangay = check_action_plan($connect,$forecast["wind"],$forecast["wave"],$forecast["rain"],'flood');
                            if(!empty($barangay)){
                                if($forecast["rain"] == 50 || $forecast["rain"] == 60){
                                  echo '<div class="callout callout-warning">
                                    <p>Following Barangay are under <strong>FLOOD MONITORING</strong></p>
                                  </div>';
                                }elseif($forecast["rain"] > 180){
                                  echo '<div class="callout callout-danger">
                                    <p>Following Barangay under <strong>FORCE EVACUATION</strong></p>
                                  </div>';
                                }
                            }

                          foreach($barangay as $key => $barangays){
                          ?>
                            <li class="item">
                              <div class="product-img">

                              </div>
                              <div class="product-info">
                                <a href='mapView.php?id=<?php echo $barangays["flood"]["brgy_id"];?>&&bname=<?php echo $barangays["flood"]["brgy_name"];?>&&lat=<?php echo $barangays["flood"]["lat"];?>&&long=<?php echo $barangays["flood"]["longi"];?>' class="product-title"><?php echo $barangays['flood']['brgy_name']; ?>
                                  <span class="label label-warning pull-right"><?php echo $barangays['flood']['population']; ?></span></a>
                                  <span class="product-description">
                                    <i class="wi wi-rain"></i>
                                    <i class="wi wi-flood"></i>

                                  </span>
                              </div>
                            </li>
                          <?php } ?>
                        </ul>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="box box-primary">
                        <div class="box-header with-border">
                                  <div class="box-title">
                                    <h5>Barangay Affected by StormSurge</h5>
                                  </div>
                                  <div class="box-tools pull-right">
                                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                      </button><br />

                                    </div>
                        </div>
                        <div class="box-body">
                          <ul class="products-list product-list-in-box">
                          <?php
                          $barangay = check_action_plan($connect,$forecast["wind"],$forecast["wave"],$forecast["rain"],'storm');
                          if(!empty($barangay)){
                              if($forecast["wind"] == 100 && $forecast["wave"] >= 9 || $forecast["wind"] ==100 && $forecast["wave"] == 12){
                                echo '<div class="callout callout-warning">
                                  <p>Following Barangay are under <strong>Warning for Evacuation</strong></p>
                                </div>';
                             }elseif($forecast["wind"] == 200 && $forecast["wave"] >= 18 || $forecast["wind"]==200 && $forecast["wave"] == 20){
                               echo '<div class="callout callout-warning">
                                 <p>Following Barangay are under <strong>Pre-emptive Evacuation</strong></p>
                               </div>';
                             }elseif($forecast["wind"] == 300 && $forecast["wave"] >= 27 || $forecast["wind"]==300 && $forecast["wave"] == 30){
                               echo '<div class="callout callout-danger">
                                 <p>Following Barangay are under <strong>Evacuation of population at risk</strong></p>
                               </div>';
                             }
                          }
                            foreach($barangay as $key => $barangays){
                            ?>
                              <li class="item">
                                <div class="product-info">
                                  <a href='mapView.php?id=<?php echo $barangays["storm"]["brgy_id"];?>&&bname=<?php echo $barangays["storm"]["brgy_name"];?>&&lat=<?php echo $barangays["storm"]["lat"];?>&&long=<?php echo $barangays["storm"]["longi"];?>' class="product-title"><?php echo $barangays['storm']['brgy_name']; ?>
                                    <span class="label label-warning pull-right"><?php echo $barangays['storm']['population']; ?></span></a>
                                    <span class="product-description">
                                      <i class="wi wi-rain"></i>
                                      <i class="wi wi-strong-wind"></i>

                                    </span>
                                </div>
                              </li>
                            <?php } ?>
                          </ul>
                        </div>
                    </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                                <div class="box-title">
                                  <h5>Barangay Affected by Landslide</h5>
                                </div>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                    </button><br />

                                  </div>
                      </div>
                      <div class="box-body">
                        <ul class="products-list product-list-in-box">
                        <?php
                        $barangay = check_action_plan($connect,$forecast["wind"],$forecast["wave"],$forecast["rain"],'landslide');
                        if(!empty($barangay)){
                            if($forecast["rain"] == 50 || $forecast["rain"] == 60){
                              echo '<div class="callout callout-warning">
                                <p>Following barangay are under <strong>MONITORING</strong></p>
                              </div>';
                            }elseif($forecast["rain"] > 180){
                              echo '<div class="callout callout-danger">
                                <p>Following barangay are under <strong>FORCE EVACUATION</strong></p>
                              </div>';
                            }

                        }
                          foreach($barangay as $key => $barangays){
                          ?>
                            <li class="item">
                              <div class="product-info">
                                <a  href='mapView.php?id=<?php echo $barangays["landslide"]["brgy_id"];?>&&bname=<?php echo $barangays["landslide"]["brgy_name"];?>&&lat=<?php echo $barangays["landslide"]["lat"];?>&&long=<?php echo $barangays["landslide"]["longi"];?>' class="product-title"><?php echo $barangays['landslide']['brgy_name']; ?>
                                  <span class="label label-warning pull-right"><?php echo $barangays['landslide']['population']; ?></span></a>
                                  <span class="product-description">
                                    <i class="wi wi-rain"></i>
                                    <i class="wi wi-earthquake"></i>

                                  </span>
                              </div>
                            </li>
                          <?php } ?>
                        </ul>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                                <div class="box-title">
                                  <h5>Barangay Affected by Tsunami</h5>
                                </div>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                    </button><br />

                                  </div>
                      </div>
                      <div class="box-body">
                        <ul class="products-list product-list-in-box">
                        <?php
                            $barangay = check_action_plan($connect,$forecast["wind"],$forecast["wave"],$forecast["rain"],'tsunami');
                            if(!empty($barangay)){
                              if($forecast["wind"] == 100 && $forecast["wave"] >= 9 || $forecast["wind"]==100 && $forecast["wave"] == 12){
                                echo '<div class="callout callout-warning">
                                  <p>Following Barangay are under <strong>Warning for Evacuation</strong></p>
                                </div>';
                              }elseif($forecast["wind"] == 200 && $forecast["wave"] >= 18 || $forecast["wind"]==200 && $forecast["wave"] == 20){
                                echo '<div class="callout callout-warning">
                                   <p>Following Barangay are under <strong>Pre-emptive Evacuation</strong></p>
                                </div>';
                              }elseif($forecast["wind"] == 300 && $forecast["wave"] >= 27 || $forecast["wind"]==200 && $forecast["wave"] == 30){
                                echo '<div class="callout callout-danger">
                                  <p>Following Barangay are under <strong>Evacuation of population at risk</strong></p>
                                </div>';
                              }
                            }
                          foreach($barangay as $key => $barangays){
                          ?>
                            <li class="item">
                              <div class="product-info">
                                <a  href='mapView.php?id=<?php echo $barangays["tsunami"]["brgy_id"];?>&&bname=<?php echo $barangays["tsunami"]["brgy_name"];?>&&lat=<?php echo $barangays["tsunami"]["lat"];?>&&long=<?php echo $barangays["tsunami"]["longi"];?>' class="product-title"><?php echo $barangays['tsunami']['brgy_name']; ?>
                                  <span class="label label-warning pull-right"><?php echo $barangays['tsunami']['population']; ?></span></a>
                                  <span class="product-description">
                                    <i class="wi wi-rain"></i>
                                    <i class="wi wi-tsunami"></i>

                                  </span>
                              </div>
                            </li>
                          <?php } ?>
                        </ul>
                      </div>
                  </div>
              </div>
          </div>
   </section>
   <div id="inputAdvisory" class="modal fade">
      <div class="modal-dialog">

           <form method="post" id="forecast_form">
              <div class="modal-content">
              <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title"><i class="fa fa-plus"></i>Create Advisory</h4>
              </div>

              <div class="modal-body">
                <div class="row">
                  <div class="form-group">
                      <div class="col-xs-3">

                        <input type="email" class="form-control" name="issue_no" id="issue_no" >
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-xs-3">
                      
                        <input type="email" class="form-control" name="issue_date" id="issue_date">
                      </div>
                  </div>
              </div>
                    <div class="row">
                      <div class="col-xs-4">
                        <input type="text" name="alrt_wind" class="form-control" value="<?php echo $forecast["wind"]; ?>" />
                        <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                      </div>
                      <div class="col-xs-4">
                        <input type="text" name="alrt_wave"  class="form-control" value="<?php echo $forecast["wave"]; ?>" />
                        <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                      </div>
                      <div class="col-xs-4">
                        <input type="text" name="alrt_rain"  class="form-control" value="<?php echo $forecast["rain"]; ?>" />
                        <span class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
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
