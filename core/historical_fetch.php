<?php
include('database.php');
include 'function.php';

     $output = '';

     $query = "
     SELECT * FROM forecast
     ";
     $statement = $connect->prepare($query);

     $statement->execute();
     if(isset($_SESSION['brgy'])){
         $output .='<h2>'.get_resident_brgy($connect, $_SESSION['brgy']).'</h2>';
     }
     $result = $statement->fetchAll();
     if(isset($_SESSION['brgy'])){
       $output .= '
             <div class="btn-group pull-right">
             <button class="btn btn-default" id="print" onclick="printContent(\'div1\')"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> PRINT</button>
           </div>
       <div id="div1">
            <table class="table table-bordered">
                 <tr>
                      <th width="15%">Issue ID</th>
                      <th width="15%">Issue Date</th>
                      <th width="20%">Valid</th>
                      <th width="20%">Wind</th>
                      <th width="10%">Wave</th>
                      <th width="10%">Rain</th>
                      <th width="10%">Temperature</th>
                      <th width="10%">Humid</th>
                      <th width="10%">Sunrise</th>
                      <th width="10%">Sunset</th>
                      <th width="10%">Moonrise</th>
                      <th width="10%">Moonset</th>
                 </tr>';
     }else{
       $output .= '
             <div class="btn-group pull-right">
             <button class="btn btn-default" id="print" onclick="printContent(\'div1\')"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> PRINT</button>
           </div>
       <div id="div1">
            <table class="table table-bordered">
                 <tr>
                      <th width="15%">Issue ID</th>
                      <th width="15%">Issue Date</th>
                      <th width="20%">Valid</th>
                      <th width="20%">Wind</th>
                      <th width="10%">Wave</th>
                      <th width="10%">Rain</th>
                      <th width="10%">Temperature</th>
                      <th width="10%">Humid</th>
                      <th width="10%">Sunrise</th>
                      <th width="10%">Sunset</th>
                      <th width="10%">Moonrise</th>
                      <th width="10%">Moonset</th>
                 </tr>';
     }

     foreach($result as $row)
     {
       $output .= '
            <tr>
                 <td>'. $row["issue_no"].'</td>
                 <td>'. $row["issue_date"].'</td>
                 <td>'. $row["valid"].'</td>
                 <td>'.$row["wind"].'KPH</td>
                 <td>'.$row["wave"].'Feet</td>
                 <td>'.$row["rain"].'mm/hr </td>
                 <td>'.$row["temp"].'°</td>
                 <td>'.$row["humid"].'°</td>
                 <td>'.$row["sunrise"].'</td>
                 <td>'.$row["sunset"].'</td>
                 <td>'.$row["moonrise"].'</td>
                 <td>'.$row["moonset"].'</td>
           </tr>';
     }
    echo $output;

?>
