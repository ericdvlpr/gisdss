<?php include 'includes/header.php';
      include 'core/function.php';
?>

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
                    <div id="map"  style="width:100%;height:700px;"></div>
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
  <div class="row">
 <!-- Left col -->
 <div class="col-md-8">
   <!-- MAP & BOX PANE -->
   <div class="box box-success">
     <div class="box-header with-border">
       <h3 class="box-title">History of Municipality</h3>

       <div class="box-tools pull-right">
       </div>
     </div>
     <!-- /.box-header -->
     <div class="box-body text-justify" >
       <p>Pioduran was first known to early settlers as Panganiran because of its location facing 20 kms. stretch of Panganiran Bay. Its rich coastal resources particularly the marshland tree, Marokbarok superseded the popularity of the bay itself that later, the place became known as Marokbarok. The tree’s specific name was changed to Malacbalac and it also became the name of the place. </p>
        <p>Originally, the barangays covered by Pioduran were part of the municipalities of Guinobatan, Ligao and Jovellar. The attempt to create Malacbalac as a separate town was initiated in Year 1928 by Don Hilario Peñaflor and Prescillano Osial but it was set aside by then Congressman Pedro Sabido who gave priority to the construction of a national road, now known as the 39kms. Ligao – Pioduran Road. This road became the turning point for the people of Malacbalac as it opened–up trade with nearby towns of Ligao, Oas and Libon of Albay Province; Donsol and Pilar of Sorsogon Province; and Claveria of Masbate Province. </p>

        <p>After World War II, Capt Prescillano Osial, a guerilla soldier who was then a Councilor of Guinobatan petitioned Rep. Marcial O. Rañola  to make Malacbalac an independent town. A bill was filed in Year 1939 and it was supported by the Congressman who succeeded Rep. Rañola in the name of Rep. Pio Duran. It was on June 12, 1963 that House Bill No. 5335 was enacted into law, Republic Act No. 3817 creating the Municipality of PIO DURAN within the Province of Albay. At that time, it was already Congresswoman Josefina Duran, the wife of the late Rep. Pio Duran who crusaded for the success of the bill. Republic Act 3817 was signed by the President Diosdado Macapagal. Malacbalac then was officially changed to Pioduran after the late Congressman Pio Duran.</p>

          <p>Municipality of Pio Duran was first comprised of twenty (20) barangays taken from the Municipalities of Ligao, Guinobatan and Jovellar. Later, eight (8) barangays were added.</p>

        <p>The Poblacion barangays was divided into five (5) barangays under PD 86 and pursuant to RA 7160 (Local Government Code of 1991), Sitio La Medalla was created s a new Barangay in Year 1992, thus making the total number of barangays in Pioduran into thirty three (33) barangays.
        </p>
     </div>
   </div>
   <div class="box box-success">
     <div class="box-header with-border">
       <h3 class="box-title">Maps of Municipality</h3>

       <div class="box-tools pull-right">
       </div>
     </div>
     <!-- /.box-header -->
     <div class="box-body" >
           <img src="images/urban_map.jpg" class="img-thumbnail">
           <img src="images/climate.jpg" class="img-thumbnail">
           <img src="images/rainfall.jpg" class="img-thumbnail">
           <img src="images/wind.jpg" class="img-thumbnail">
     </div>
   </div>
 </div>

 <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">List of Barangay</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php echo list_barangay($connect);  ?>
                <!-- /.item -->
              </ul>
            </div>
        </div>
 </div>
</div>
   </section>
<?php

include 'includes/footer.php';

?>
