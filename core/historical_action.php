<?php
include('database.php');

   if($_POST['btn_action'] == 'fetch')
   {
     $query = '';

     $output = array();

     $query .= "
     SELECT * FROM forecast
     ";

     $statement = $connect->prepare($query);

     $statement->execute();

     $result = $statement->fetchAll();

     $data = array();

     $filtered_rows = $statement->rowCount();

     foreach($result as $row)
     {
      $sub_array = array();
      $sub_array[] = $row['issue_no'];
      $sub_array[] = $row['issue_date'];
      $sub_array[] = $row['valid'];
      $sub_array[] = $row['wind'];
      $sub_array[] = $row['rain'];
      $sub_array[] = $row['wave'];
      $sub_array[] = $row['temp'];
      $sub_array[] = $row['humid'];
      $sub_array[] = $row['sunrise'];
      $sub_array[] = $row['sunset'];
      $sub_array[] = $row['moonrise'];
      $sub_array[] = $row['moonset'];
      $data[] = $sub_array;
     }

     $output = array(
      "draw"    => intval($_POST["draw"]),
      "recordsTotal"   =>  $filtered_rows,
      "recordsFiltered"  =>  get_total_all_records($connect),
      "data"       =>  $data
     );
     echo json_encode($output);

     function get_total_all_records($connect)
     {
      $statement = $connect->prepare("SELECT * FROM forecast");
      $statement->execute();
      return $statement->rowCount();
     }

   }
?>
