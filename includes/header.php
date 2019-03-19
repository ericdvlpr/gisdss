
 <?php
 //Developed by: ERIC PAUL JAUCIAN
 include 'core/database.php';

 if(!isset($_SESSION["username"])){
   header('location:./login.php');
 }
 ?>
 <!DOCTYPE html>
 <html>
      <head>
   		<title>GISDSS</title>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
      <!-- jvectormap -->
      <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
      <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
      <!-- daterange picker -->
      <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
      <!-- bootstrap datepicker -->
      <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
      <link rel="stylesheet" href="bower_components/weather-icons-master/css/weather-icons.min.css">
      <link rel="stylesheet" href="dist/css/style.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

      </head>
      </head>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
        <?php include 'includes/nav.php'; ?>
        <?php include 'includes/sidemenu.php'; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="info-box">
            <span class="info-box-icon bg-aqua"><img src="images/pioduran-logo.png" class="img-circle" alt="User Image" width="90" height="90"></span>

            <div class="info-box-content">
              <h1> Municipality of Pioduran Flood and Storm Surge Awareness GIS-BASED DSS</h1>
            </div>
            <!-- /.info-box-content -->
          </div>


         </section>
