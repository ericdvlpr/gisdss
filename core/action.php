<?php
  include('database.php');
  if(isset($_POST["login"]))
  {

  $query = "
   SELECT * FROM users
    WHERE username = :username
   ";
   $statement = $connect->prepare($query);
   $statement->execute(
    array(
      'username' => $_POST["username"]
     )
   );
    $count = $statement->rowCount();
   if($count > 0)
   {
    $result = $statement->fetchAll();
      foreach($result as $row)
      {
     if(password_verify($_POST["password"], $row["password"]))
      {
      if($row['active'] == 1)
      {

        $_SESSION['access'] = $row['access'];
        $_SESSION['userid'] = $row['userid'];
        $_SESSION['username'] = $row['username'];
         header("location:../index.php");
      }
      else
      {
       $message = "<label>Your account is disabled, Contact Master</label>";
      }
     }
     else
     {
      $message = "<label>Wrong Password</label>";
        }
      }
   }
   else
   {
    $message = "<label>Wrong Email Address</labe>";
   }
  }
 ?>
