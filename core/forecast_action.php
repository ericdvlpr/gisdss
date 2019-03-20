<?php
include('database.php');

if(isset($_POST['btn_action']))
{
   if($_POST['btn_action'] == 'Add')
   {
    $query = "
    INSERT INTO forecast (issue_no, issue_date, valid, wind, rain,wave,temp,humid,sunrise,sunset,moonrise,moonset)
    VALUES (:issue_no, :issue_date, :valid_date, :wind, :rain,:wave,:temp,:humid,:sunrise,:sunset,:moonrise,:moonset)
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
     array(
      ':issue_no'  => $_POST["issue_no"],
      ':issue_date' => $_POST["issue_date"],
      ':valid_date'  => $_POST["valid_date"],
      ':wind'  => $_POST['wind'],
      ':wave'  => $_POST['wave'],
      ':rain'  => $_POST['rain'],
      ':temp'  => $_POST['temp'],
      ':humid'  => $_POST['hum'],
      ':sunrise'  => $_POST['sunrise'],
      ':sunset'  => $_POST['sunset'],
      ':moonrise'  => $_POST['moonrise'],
      ':moonset'  => $_POST['moonset']
     )
    );
    $result = $statement->fetchAll();
    if(isset($result))
    {
     echo 'Forecast successfully Added';
    }
 }
 if($_POST['btn_action'] == 'fetch_single')
 {
  $output = array();
  $query = "
  SELECT * FROM forecast WHERE forecast_id = :forecast_id
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':forecast_id' => $_POST["forecast_id"]
   )
  );
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
    $output["issue_no"] =$row["issue_no"];
    $output["issue_date"] =    $row["issue_date"];
    $output["valid_date"] =    $row["valid"];
    $output['wind'] =    $row['wind'];
    $output['wave'] =    $row['wave'];
    $output['rain'] =    $row['rain'];
    $output['temp'] =    $row['temp'];
    $output['hum'] =    $row['humid'];
    $output['sunrise'] =    $row['sunrise'];
    $output['sunset'] =    $row['sunset'];
    $output['moonrise'] =    $row['moonrise'];
    $output['moonset'] =    $row['moonset'];
  }
  echo json_encode($output);
 }

 if($_POST['btn_action'] == 'Edit')
 {

  echo $query = "UPDATE forecast SET issue_no = '".$_POST["issue_no"]."',
   issue_date = '".$_POST["issue_date"]."',
   valid = '".$_POST["valid_date"]."',
   wind = '".$_POST["wind"]."',
   wave = '".$_POST["wave"]."',
    rain = '".$_POST["rain"]."',
    temp  ='".$_POST['temp']."',
    humid  = '".$_POST['hum']."',
    sunrise  = '".$_POST['sunrise']."',
    sunset  = '".$_POST['sunset']."',
    moonrise  = '".$_POST['moonrise']."',
    moonset  = '".$_POST['moonset'] ."'
    WHERE forecast_id = '".$_POST["forecast_id"]."'
   ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  if(isset($result))
  {
   echo 'Foreacast Edited';
  }
 }

}

?>
