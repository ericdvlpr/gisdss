<?php
  include('database.php');
  if(isset($_POST["login"])) {

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
    if($count > 0) {
      $result = $statement->fetchAll();
        foreach($result as $row) {
            if(password_verify($_POST["password"], $row["password"])) {
                  if($row['access'] == 1) {
                      $_SESSION['access'] = $row['access'];
                      $_SESSION['userid'] = $row['userid'];
                      $_SESSION['username'] = $row['username'];
                       header("location:../index.php");
                    } else {
                        $_SESSION['access'] = $row['access'];
                        $_SESSION['userid'] = $row['userid'];
                        $_SESSION['brgy'] = $row['brgy'];
                        $_SESSION['username'] = $row['username'];
                         header("location:../index.php");
                    }
               } else {
                header("location:../login.php?error=INVALID USERNAME AND PASSWORD");
               }
        }
     } else {
      header("location:../login.php?error=INVALID USERNAME AND PASSWORD");
     }
  }

  if(isset($_POST["login_guest"]))  {
    $query = "
     SELECT * FROM resident
      WHERE res_username = :username
     ";
     $statement = $connect->prepare($query);
     $statement->execute(
      array(
        'username' => $_POST["res_username"]
       )
     );
      $count = $statement->rowCount();
     if($count > 0) {
      $result = $statement->fetchAll();
        foreach($result as $row)  {
       if(password_verify($_POST["res_password"], $row["res_password"])){
          $_SESSION['res_id'] = $row['res_id'];
          $_SESSION['brgy'] = $row['res_brgy'];
           header("location:../public_warning.php");
         } else {
          header("location:../login.php?error=INVALID USERNAME AND PASSWORD");
          }
        }
     } else {
      header("location:../login.php?error=INVALID USERNAME AND PASSWORD");
     }
  }
 ?>
