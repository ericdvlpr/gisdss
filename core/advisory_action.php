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
  SELECT * FROM users WHERE user_id = :user_id
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':user_id' => $_POST["user_id"]
   )
  );
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $output['name'] = $row['name'];
   $output['username'] = $row['username'];
   $output['access'] = $row['access'];
  }
  echo json_encode($output);
 }

 if($_POST['btn_action'] == 'Edit')
 {
  if($_POST['password'] != '')
  {
   $query = "
   UPDATE users SET
    name = '".$_POST["name"]."',
    username = '".$_POST["username"]."',
    password = '".password_hash($_POST["password"], PASSWORD_DEFAULT)."'
    WHERE user_id = '".$_POST["user_id"]."'
   ";
  }
  else
  {
   $query = "
   UPDATE users SET
   name = '".$_POST["name"]."',
   username = '".$_POST["username"]."',
    WHERE user_id = '".$_POST["user_id"]."'
   ";
  }
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  if(isset($result))
  {
   echo 'User Details Edited';
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