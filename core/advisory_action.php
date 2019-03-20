<?php
include('database.php');

if(isset($_POST['btn_action']))
{
 if($_POST['btn_action'] == 'Add')
 {
   $query = "
  INSERT INTO advisory (issue_no, issue_date, alrt_wind, alrt_wave, alrt_rain)
  VALUES (:issue_no, :issue_date, :alrt_wind, :alrt_wave, :alrt_rain)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':issue_no'  => $_POST["issue_no"],
    ':issue_date' => $_POST["issue_date"],
    ':alrt_wind'  => $_POST["alrt_wind"],
    ':alrt_wave'  => $_POST['alrt_wave'],
    ':alrt_rain'  => $_POST['alrt_rain']
   )
  );
  $result = $statement->fetchAll();
  if(isset($result))
  {
   echo 'New Advisory Added';
  }
 }
 if($_POST['btn_action'] == 'fetch_single')
 {
  $query = "
  SELECT * FROM advisory WHERE advisory_id = :advisory_id
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':advisory_id' => $_POST["advisory_id"]
   )
  );
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $output['issue_no'] = $row['issue_no'];
   $output['issue_date'] = $row['issue_date'];
   $output['alrt_wind'] = $row['alrt_wind'];
   $output['alrt_wave'] = $row['alrt_wave'];
   $output['alrt_rain'] = $row['alrt_rain'];
  }
  echo json_encode($output);
 }

 if($_POST['btn_action'] == 'Edit')
 {

   $query = "
   UPDATE advisory SET
   issue_no = '".$_POST["issue_no"]."',
   issue_date = '".$_POST["issue_date"]."',
   alrt_wind = '".$_POST["alrt_wind"]."',
   alrt_wave = '".$_POST["alrt_wave"]."',
   alrt_rain = '".$_POST["alrt_rain"]."'
    WHERE advisory_id = '".$_POST["advisory_id"]."'
   ";

  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  if(isset($result))
  {
   echo 'Advisory Edited';
  }
 }
 if($_POST['btn_action'] == 'delete')
 {
  $status = 'Active';
  if($_POST['status'] == 'Active')
  {
   $status = 'Inactive';
  }
  $query = "
  UPDATE user_details
  SET user_status = :user_status
  WHERE user_id = :user_id
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':user_status' => $status,
    ':user_id'  => $_POST["user_id"]
   )
  );
  $result = $statement->fetchAll();
  if(isset($result))
  {
   echo 'User Status change to ' . $status;
  }
 }
}

?>
