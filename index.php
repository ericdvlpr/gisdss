<?php include 'includes/header.php';?>
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
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <div class="row">
            <div class="col-md-9 col-sm-8">
              <div class="pad">

                    <div id="map"></div>
                </div>
              </div>
            <div class="col-md-3 col-sm-4">
              <div class="pad box-pane-right bg-green" style="min-height: 280px">
                <div class="description-block margin-bottom">
                  <div class="sparkbar pad" data-color="#fff"><canvas width="34" height="30" style="display: inline-block; width: 34px; height: 30px; vertical-align: top;"></canvas></div>
                  <h5 class="description-header">8390</h5>
                  <span class="description-text">Visits</span>
                </div>
                <div class="description-block margin-bottom">
                  <div class="sparkbar pad" data-color="#fff"><canvas width="34" height="30" style="display: inline-block; width: 34px; height: 30px; vertical-align: top;"></canvas></div>
                  <h5 class="description-header">30%</h5>
                  <span class="description-text">Referrals</span>
                </div>
                <div class="description-block">
                  <div class="sparkbar pad" data-color="#fff"><canvas width="34" height="30" style="display: inline-block; width: 34px; height: 30px; vertical-align: top;"></canvas></div>
                  <h5 class="description-header">70%</h5>
                  <span class="description-text">Organic</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <!-- Info Boxes Style 2 -->
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Inventory</span>
          <span class="info-box-number">5,200</span>

          <div class="progress">
            <div class="progress-bar" style="width: 50%"></div>
          </div>
          <span class="progress-description">
                50% Increase in 30 Days
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Mentions</span>
          <span class="info-box-number">92,050</span>

          <div class="progress">
            <div class="progress-bar" style="width: 20%"></div>
          </div>
          <span class="progress-description">
                20% Increase in 30 Days
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-red">
        <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Downloads</span>
          <span class="info-box-number">114,381</span>

          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
                70% Increase in 30 Days
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Direct Messages</span>
          <span class="info-box-number">163,921</span>

          <div class="progress">
            <div class="progress-bar" style="width: 40%"></div>
          </div>
          <span class="progress-description">
                40% Increase in 30 Days
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->

      <!-- <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Browser Usage</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>

        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <div class="chart-responsive">
                <canvas id="pieChart" height="195" width="303" style="width: 243px; height: 156px;"></canvas>
              </div>

            </div>

            <div class="col-md-4">
              <ul class="chart-legend clearfix">
                <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                <li><i class="fa fa-circle-o text-green"></i> IE</li>
                <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
              </ul>
            </div>

          </div>

        </div>

        <div class="box-footer no-padding">
          <ul class="nav nav-pills nav-stacked">
            <li><a href="#">United States of America
              <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
            <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
            </li>
            <li><a href="#">China
              <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
          </ul>
        </div>
      </div>
      -->

      <!--
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Recently Added Products</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <ul class="products-list product-list-in-box">
            <li class="item">
              <div class="product-img">
                <img src="dist/img/default-50x50.gif" alt="Product Image">
              </div>
              <div class="product-info">
                <a href="javascript:void(0)" class="product-title">Samsung TV
                  <span class="label label-warning pull-right">$1800</span></a>
                <span class="product-description">
                      Samsung 32" 1080p 60Hz LED Smart HDTV.
                    </span>
              </div>
            </li>

            <li class="item">
              <div class="product-img">
                <img src="dist/img/default-50x50.gif" alt="Product Image">
              </div>
              <div class="product-info">
                <a href="javascript:void(0)" class="product-title">Bicycle
                  <span class="label label-info pull-right">$700</span></a>
                <span class="product-description">
                      26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                    </span>
              </div>
            </li>
            <
            <li class="item">
              <div class="product-img">
                <img src="dist/img/default-50x50.gif" alt="Product Image">
              </div>
              <div class="product-info">
                <a href="javascript:void(0)" class="product-title">Xbox One <span class="label label-danger pull-right">$350</span></a>
                <span class="product-description">
                      Xbox One Console Bundle with Halo Master Chief Collection.
                    </span>
              </div>
            </li>
            <li class="item">
              <div class="product-img">
                <img src="dist/img/default-50x50.gif" alt="Product Image">
              </div>
              <div class="product-info">
                <a href="javascript:void(0)" class="product-title">PlayStation 4
                  <span class="label label-success pull-right">$399</span></a>
                <span class="product-description">
                      PlayStation 4 500GB Console (PS4)
                    </span>
              </div>
            </li>
          </ul>
        </div>
        <div class="box-footer text-center">
          <a href="javascript:void(0)" class="uppercase">View All Products</a>
        </div>
      </div>
    -->
    </div>
  </div>
   </section>







<?php

include 'includes/footer.php';

?>
