<?php
include('database.php');

if(isset($_POST['btn_action']))
{
 if($_POST['btn_action'] == 'Add')
 {
  $query = "
  INSERT INTO resident (res_name, res_brgy,res_username, res_password)
  VALUES (:res_name, :res_barangay ,:res_username, :res_password)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':res_name'  => $_POST["res_name"],
    ':res_password' => password_hash($_POST["res_password"], PASSWORD_DEFAULT),
    ':res_username'  => $_POST["res_username"],
    ':res_barangay'  => $_POST['res_brgy']
   )
  );
  $result = $statement->fetchAll();
  if(isset($result))
  {
   echo 'New Resident Added';
  }
 }
 if($_POST['btn_action'] == 'fetch_single')
 {
  $query = "
  SELECT * FROM resident WHERE res_id = :res_id
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':res_id' => $_POST["res_id"]
   )
  );
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $output['res_name'] = $row['res_name'];
   $output['res_username'] = $row['res_username'];
   $output['res_password'] = $row['res_password'];
   $output['res_brgy'] = $row['res_brgy'];
  }
  echo json_encode($output);
 }

 if($_POST['btn_action'] == 'Edit')
 {
  if($_POST['res_password'] != '')
  {
   $query = "
   UPDATE resident SET
    res_name = '".$_POST["res_name"]."',
    res_username = '".$_POST["res_username"]."',
    res_password = '".password_hash($_POST["res_password"], PASSWORD_DEFAULT)."',
    res_brgy = '".$_POST["res_brgy"]."'
    WHERE res_id = '".$_POST["res_id"]."'
   ";
  }
  else
  {
   $query = "
   UPDATE resident SET
   res_name = '".$_POST["res_name"]."',
   res_username = '".$_POST["res_username"]."',
   res_brgy = '".$_POST["res_brgy"]."'
    WHERE res_id = '".$_POST["res_id"]."'
   ";
  }
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  if(isset($result))
  {
   echo 'Resident Details Edited';
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
