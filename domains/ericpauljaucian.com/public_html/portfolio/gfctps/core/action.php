<?php
 //action.php
 include 'database.php';
 $object = new Database();
 if(isset($_POST['login'])){
 	$field = array(
 		'username' => $_POST['username'],
 		'password' => md5($_POST['password'])
 		);
 			if($object->can_login("users_details", $field)){
 				$post_data = $object->can_login("users_details", $field);
 				foreach($post_data as $post){

 				$_SESSION["username"] = $post["username"];
 				$_SESSION["id"] = $post['id'];;
 				$_SESSION["access"] = $post['access'];;
 				$_SESSION["assign"] = $post['assign'];;
 				header("location:../index.php");
 				}
 			}else{
        $message = 'INVALID USERNAME AND PASSWORD';
        header("location:../login.php?msg=".$message."");

 			}

 }
if(isset($_POST["action"])) {
        if($_POST["action"] == "Load") {
             echo $object->get_data_in_table("SELECT * FROM users_details ORDER BY id DESC");
        }
        if($_POST["action"] == "Employee") {
             echo $object->get_employee_data("SELECT * FROM employees");
        }
        if($_POST["action"] == "Customer") {
             echo $object->get_employee_data("SELECT * FROM employees");
        }
        if($_POST["action"] == "addEmployee") {
           $employeeID = mysqli_escape_string($object->connect,$_POST['employeeID']);
           $employeeName = mysqli_escape_string($object->connect,$_POST['employee_name']);
           $address = mysqli_escape_string($object->connect,$_POST['address']);
           $gender = mysqli_escape_string($object->connect,$_POST['gender']);
            $bday = mysqli_escape_string($object->connect,$_POST['bday']);
           $query="INSERT INTO employees(employee_id,employee_name,address,gender,birthday) VALUES ('".$employeeID."','".$employeeName."','".$address."','".$gender."','".$bday."')";
          $object->execute_query($query);
          echo 'Employee Data Inserted';
        }
        if($_POST["action"] == "addProduct") {
            $productID = mysqli_escape_string($object->connect,$_POST['productID']);
            $productName = mysqli_escape_string($object->connect,$_POST['product_name']);
            $description = mysqli_escape_string($object->connect,$_POST['description']);
            $productQty = mysqli_escape_string($object->connect,$_POST['product_qty']);
          $query="INSERT INTO products(product_id,product_name,description,quantity) VALUES ('".$productID."','".$productName."','".$description."','".$productQty."')";
          $object->execute_query($query);
          echo 'Product Data Inserted';
        }
        if($_POST["action"] == "addOrder") {
            $orderID = mysqli_escape_string($object->connect,$_POST['orderID']);
            $productID = mysqli_escape_string($object->connect,$_POST['product']);
            $customerID = mysqli_escape_string($object->connect,$_POST['customer']);
            $address = mysqli_escape_string($object->connect,$_POST['address']);
            $number = mysqli_escape_string($object->connect,$_POST['number']);
            $quantity = mysqli_escape_string($object->connect,$_POST['quantity']);
$query="INSERT INTO orders(order_id,customer_id,product_id,address,contact_number,order_quantity) VALUES ('".$orderID."','".$customerID."','".$productID."','".$address."','".$number."','".$quantity."')";
           $query1 = "UPDATE products SET quantity=quantity-'$quantity' WHERE product_id='".$productID."' ";
          $object->execute_query($query1);
          $object->execute_query($query);
          echo 'Order Data Inserted';
        }
        if($_POST["action"] == "addCustomer") {
            $customerID = mysqli_escape_string($object->connect,$_POST['customerID']);
            $customerName = mysqli_escape_string($object->connect,$_POST['customer_name']);
            $address = mysqli_escape_string($object->connect,$_POST['address']);
            $number = mysqli_escape_string($object->connect,$_POST['number']);
            $query="INSERT INTO customer(customer_id,name,address,contact_number) VALUES ('".$customerID."','".$customerName."','".$address."','".$number."')";
            $object->execute_query($query);
            echo 'Customer Data Inserted';
        }
        if($_POST["action"] == "addTask") {
            $taskID = mysqli_escape_string($object->connect,$_POST['taskID']);
            $subject = mysqli_escape_string($object->connect,$_POST['subject']);
            $description = mysqli_escape_string($object->connect,$_POST['description']);
            $date_assigned = mysqli_escape_string($object->connect,$_POST['date_assigned']);
            $due_date = mysqli_escape_string($object->connect,$_POST['due_date']);
            $employees = mysqli_escape_string($object->connect,$_POST['employees']);
          $query="INSERT INTO task(task_id,subject,description,assigned,due,employee_id,status) VALUES ('".$taskID."','".$subject."','".$description."','".$date_assigned."','".$due_date."','". $employees."','0')";
          $object->execute_query($query);
          echo 'Task Data Inserted';
        }
        if($_POST["action"] == "addDelivery") {
            $deliveryID = mysqli_escape_string($object->connect,$_POST['deliveryID']);
            $orderID = mysqli_escape_string($object->connect,$_POST['orderID']);
            $customerName = mysqli_escape_string($object->connect,$_POST['customerName']);
            $customerLocation = mysqli_escape_string($object->connect,$_POST['customerLocation']);

            // $employee_id = $_SESSION['id'];
          $query="INSERT INTO deliveries(delivery_id,order_id,customer_name,address,employee_id,status) VALUES ('".$deliveryID."','".$orderID."','".$customerName."','".$customerLocation."','1','0')";
          $object->execute_query($query);
          echo 'Delivery Data Inserted';
        }
        if($_POST["action"] == "addUsers") {
            $username = mysqli_escape_string($object->connect,$_POST['username']);
            $password = mysqli_escape_string($object->connect,md5($_POST['password']));
            $access = mysqli_escape_string($object->connect,$_POST['access']);
            $assign = mysqli_escape_string($object->connect,$_POST['assign']);
            // $employee_id = $_SESSION['id'];
          $query0 ="UPDATE employees SET user_acct = '1' WHERE employee_id='$assign'";
          $query="INSERT INTO users_details(user_name,user_password,user_access,user_assign) VALUES ('".$username."','".$password."','".$access."','".$assign."')";
          $object->execute_query($query0);
          $object->execute_query($query);
          echo 'User Data Inserted';
        }
        if($_POST["action"]=="Fetch Employee Data") {
            $output =array();
            $query = "SELECT * FROM employees WHERE id ='".$_POST['employee_id']."'";
            $result = $object->execute_query($query);
            while($row = mysqli_fetch_array($result)) {
              $output["id"] = $row["id"];
              $output["employees_id"] = $row["employee_id"];
              $output["employee_name"] = $row["employee_name"];
              $output["address"] = $row["address"];
              if($row["gender"]== 'M'){
                $gender = 'Male';
              }else{
                $gender = 'Female';
              }
              $output["gender"] = $row["gender"];
              $output["bday"] = $row["birthday"];
            }
            echo json_encode($output);
          }
          if($_POST["action"]=="Fetch Customer Data") {
            $output =array();
            $query = "SELECT * FROM customer WHERE id ='".$_POST['customer_id']."'";
            $result = $object->execute_query($query);
            while($row = mysqli_fetch_array($result)) {
              $output["id"] = $row["id"];
              $output["customer_id"] = $row["customer_id"];
              $output["name"] = $row["name"];
              $output["address"] = $row["address"];
              $output["number"] = $row["contact_number"];
            }
            echo json_encode($output);
          }
          if($_POST["action"]=="Fetch Product Data") {
            $output =array();
            $query = "SELECT * FROM products WHERE product_id ='".$_POST['product_id']."'";
            $result = $object->execute_query($query);
            while($row = mysqli_fetch_array($result)) {
              $output["id"] = $row["id"];
              $output["product_id"] = $row["product_id"];
              $output["product_name"] = $row["product_name"];
              $output["description"] = $row["description"];
              $output["quantity"] = $row["quantity"];
            }
            echo json_encode($output);
          }
          if($_POST["action"]=="Fetch Order Data") {
            $output =array();
            $query = "SELECT * FROM orders o JOIN customer c USING (customer_id) JOIN products p USING (product_id) WHERE order_id ='".$_POST['order_id']."'";
            $result = $object->execute_query($query);
            while($row = mysqli_fetch_array($result)) {
              $output["id"] = $row["id"];
              $output["order_id"] = $row["order_id"];
              $output["customer_id"] = $row["customer_id"];
              $output["customer_name"] = $row["name"];
              $output["product_id"] = $row["product_id"];
              $output["product_name"] = $row["product_name"];
              $output["address"] = $row["address"];
              $output["contact_number"] = $row["contact_number"];
              $output["quantity"] = $row["order_quantity"];
            }
            echo json_encode($output);
          }
          if($_POST["action"]=="Fetch Task Data") {
            $output =array();
            $query = "SELECT * FROM task WHERE task_id ='".$_POST['task_id']."'";
            $result = $object->execute_query($query);
            while($row = mysqli_fetch_array($result)) {
              $output["id"] = $row["id"];
              $output["taskID"] = $row["task_id"];
              $output["subject"] = $row["subject"];
              $output["description"] = $row["description"];
              $output["assigned"] = $row["assigned"];
              $output["due"] = $row["due"];
              $output["employee_id"] = $row["employee_id"];
            }
            echo json_encode($output);
          }
          if($_POST["action"]=="Fetch Delivery Data") {
            $output =array();
            $query = "SELECT * FROM deliveries WHERE delivery_id ='".$_POST['delivery_id']."'";
            $result = $object->execute_query($query);
            while($row = mysqli_fetch_array($result)) {
              $output["id"] = $row["id"];
              $output["delivery_id"] = $row["delivery_id"];
              $output["order_id"] = $row["order_id"];
              $output["customer_name"] = $row["customer_name"];
              $output["address"] = $row["address"];
              $output["employee_id"] = $row["employee_id"];
            }
            echo json_encode($output);
          }
          if($_POST["action"]=="Fetch Users Data") {
            $output =array();
            $query = "SELECT * FROM users WHERE id ='".$_POST['id']."'";
            $result = $object->execute_query($query);
            while($row = mysqli_fetch_array($result)) {
              $output["id"] = $row["id"];
              $output["username"] = $row["username"];
              $output["password"] = $row["password"];
              $output["access"] = $row["access"];
              $output["assign"] = $row["assign"];

            }
            echo json_encode($output);
          }
          if($_POST['action']=="Edit Product") {
               $product_name = mysqli_escape_string($object->connect,$_POST['product_name']);
               $description = mysqli_escape_string($object->connect,$_POST['description']);
               $product_qty = mysqli_escape_string($object->connect,$_POST['product_qty']);
              $query = "UPDATE products SET  product_name='$product_name', description='$description', quantity='$product_qty' WHERE id = '".$_POST['product_id']."' ";
              $object->execute_query($query);
               echo 'Product Data Updated';/**/
           }
          if($_POST['action']=="Edit Employee") {
               $employee_name = mysqli_escape_string($object->connect,$_POST['employee_name']);
               $address = mysqli_escape_string($object->connect,$_POST['address']);
               $gender = mysqli_escape_string($object->connect,$_POST['gender']);
               $bday = mysqli_escape_string($object->connect,$_POST['bday']);
              $query = "UPDATE employees SET  employee_name='$employee_name', address='$address', gender='$gender', birthday='$bday' WHERE id = '".$_POST['employee_id']."' ";
              $object->execute_query($query);
              echo 'Data Updated';/**/
          }
          if($_POST['action']=="Edit User") {
               $username = mysqli_escape_string($object->connect,$_POST['username']);
               $password = mysqli_escape_string($object->connect,md5($_POST['password']));
               $access = mysqli_escape_string($object->connect,$_POST['access']);
              $query = "UPDATE users SET username='$username', password='$password', access='$access' WHERE id = '".$_POST['users_id']."' ";
              $object->execute_query($query);
              echo 'Data User Updated';/**/
          }
          if($_POST['action']=="Edit Customer") {
               $customer_name = mysqli_escape_string($object->connect,$_POST['customer_name']);
               $address = mysqli_escape_string($object->connect,$_POST['address']);
               $number = mysqli_escape_string($object->connect,$_POST['number']);

              $query = "UPDATE customer SET  name='$customer_name', address='$address', contact_number='$number' WHERE id = '".$_POST['customer_id']."' ";
              $object->execute_query($query);
              echo 'Data Updated';/**/
          }
          // if($_POST['action']=="Edit Item") {
          //      $productID = mysqli_escape_string($object->connect,$_POST['productID']);
          //   $productName = mysqli_escape_string($object->connect,$_POST['product_name']);
          //   $description = mysqli_escape_string($object->connect,$_POST['description']);
          //   $productQty = mysqli_escape_string($object->connect,$_POST['product_qty']);
          //     $query = "UPDATE items SET  item_name='$productName', description='$description', quantity='$productQty' WHERE id = '".$_POST['product_id']."' ";
          //     $object->execute_query($query);
          //     echo 'Data Updated';/**/
          // }
          if($_POST['action']=="Edit Order") {
             $orderID = mysqli_escape_string($object->connect,$_POST['orderID']);
             $product = mysqli_escape_string($object->connect,$_POST['product']);
             $customer = mysqli_escape_string($object->connect,$_POST['customer']);
             $address = mysqli_escape_string($object->connect,$_POST['address']);
             $number = mysqli_escape_string($object->connect,$_POST['number']);
             $quantity = mysqli_escape_string($object->connect,$_POST['quantity']);
               $query = "UPDATE orders SET  product_id='$product', customer_id='$customer', address='$address',contact_number='$number',order_quantity='$quantity' WHERE id = '".$_POST['order_id']."' ";
               $query1 = "UPDATE products SET quantity=quantity-'$quantity' WHERE product_id='".$product."' ";
          $object->execute_query($query1);

              $object->execute_query($query);
              echo 'Data Updated';/**/
          }
          if($_POST['action']=="Edit Delivery") {
             $deliveryID = mysqli_escape_string($object->connect,$_POST['deliveryID']);
             $orderID = mysqli_escape_string($object->connect,$_POST['orderID']);
             $customerName = mysqli_escape_string($object->connect,$_POST['customerName']);
             $customerLocation = mysqli_escape_string($object->connect,$_POST['customerLocation']);
              $status = mysqli_escape_string($object->connect,$_POST['status']);
              $date = date('Y-m-j');
               $query = "UPDATE deliveries SET status = '$status', dateofdelivery = '$date' WHERE delivery_id = '".$_POST['delivery_id']."' ";
               $query = "UPDATE order SET status = 1 WHERE order_id = '$orderID' ";
              $object->execute_query($query);
              echo 'Data Updated';/**/
          }
          if($_POST['action']=="Edit Task") {
             $taskID = mysqli_escape_string($object->connect,$_POST['taskID']);
            $subject = mysqli_escape_string($object->connect,$_POST['subject']);
            $description = mysqli_escape_string($object->connect,$_POST['description']);
            $date_assigned = mysqli_escape_string($object->connect,$_POST['date_assigned']);
            $due_date = mysqli_escape_string($object->connect,$_POST['due_date']);
            $employees = mysqli_escape_string($object->connect,$_POST['employees']);
            if(isset($_POST['status'])){
              $status = mysqli_escape_string($object->connect,$_POST['status']);
               $query = "UPDATE task SET  subject='$subject', description='$description',assigned='$date_assigned',due='$due_date',status='$status' WHERE id = '".$_POST['task_id']."' ";
            }else{
               $query = "UPDATE task SET  subject='$subject', description='$description',assigned='$date_assigned',due='$due_date',employee_id='$employees',status='$status' WHERE id = '".$_POST['task_id']."' ";
            }


              $object->execute_query($query);
              echo 'Data Updated';/**/
          }
          if($_POST['action']=="Delete") {

            $query = "DELETE FROM employees WHERE id = '".$_POST['employee_id']."' ";
             $object->execute_query($query);
             echo "Data Deleted";
          }
          if($_POST['action']=='Report') {
            // if($_POST['type']=='product') {
            //       $output='';
            //       $query = " SELECT * FROM products";
            //       $result = mysqli_query($object->connect, $query);
            //       $output .= '
            //            <table class="table table-bordered">
            //                 <tr>
            //                      <th width="5%">Product ID</th>
            //                      <th width="30%">Product Name</th>
            //                      <th width="43%">Description</th>
            //                      <th width="10%">Quantity</th>
            //                 </tr>
            //       ';
            //       if(mysqli_num_rows($result) > 0)
            //       {
            //            while($row = mysqli_fetch_array($result))
            //            {
            //                 $output .= '
            //                      <tr>
            //                           <td>'. $row["product_id"] .'</td>
            //                           <td>'. $row["product_name"] .'</td>
            //                           <td>'. $row["description"] .'</td>
            //                           <td>'.$row["quantity"] .'</td>
            //                      </tr>
            //                 ';
            //            }
            //       }
            //       else
            //       {
            //            $output .= '
            //                 <tr>
            //                      <td colspan="5">No Order Found</td>
            //                 </tr>
            //            ';
            //       }
            //       $output .= '</table>';
            //       echo $output;

            // }else
            if($_POST['type']=='delivery') {
                $dates = explode('-',$_POST["daterange"]);
                 $startDate = date('Y-m-d',strtotime($dates[0]));
                 $endDate = date('Y-m-d',strtotime($dates[1]));
                 $output='';
                 $query = " SELECT * FROM deliveries JOIN employees USING (employee_id) WHERE date_delivered BETWEEN '".$startDate."' AND '".$endDate."'";
                  $result = mysqli_query($object->connect, $query);
                  $output .= '
                        <div class="btn-group">
                        <button class="btn btn-default" id="print" onclick="printContent(\'div1\')"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> PRINT</button>
                      </div>
                  <div id="div1">
                       <table class="table table-bordered">
                            <tr>
                                 <th width="15%">Delivery ID</th>
                                 <th width="15%">Order ID</th>
                                 <th width="20%">Customer Name</th>
                                 <th width="20%">Address</th>
                                 <th width="10%">Employee</th>
                                 <th width="10%">Date of Delivery</th>
                                 <th width="10%">Status</th>
                            </tr>';
                  if(@mysqli_num_rows($result) > 0)
                  {
                       while($row = mysqli_fetch_array($result))
                       {
                        if($row["status"]==0){
                          $status = 'Out for Delivery';
                        }else{
                           $status = 'Delivered';
                        }
                            $output .= '
                                 <tr>
                                      <td>'. $row["delivery_id"].'</td>
                                      <td>'. $row["order_id"].'</td>
                                      <td>'. $row["customer_name"].'</td>
                                      <td>'.$row["address"].'</td>
                                      <td>'.$row["employee_name"].'</td>
                                      <td>'.$row["date_delivered"].'</td>
                                      <td>'.$status.'</td>
                                 </tr>
                            ';
                       }
                  }
                  else
                  {
                       $output .= '
                            <tr>
                                 <td colspan="7">No Delivery Report Found</td>
                            </tr>
                       ';
                  }
                  $output .= '</table>
                              </div>
                      ';
                  echo $output;

            }elseif($_POST['type']=='task') {
              $dates = explode('-',$_POST["daterange"]);
              $startDate = date('Y-m-d',strtotime($dates[0]));
              $endDate = date('Y-m-d',strtotime($dates[1]));
                  $output='';
                  $query = " SELECT * FROM task JOIN employees USING (employee_id) WHERE assigned BETWEEN '".$startDate."' AND '".$endDate."' OR due BETWEEN '".$startDate."' AND '".$endDate."' ";
                  $result = mysqli_query($object->connect, $query);
                  $output .= '
                  <div class="btn-group">
                        <button class="btn btn-default" id="print" onclick="printContent(\'div1\')"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> PRINT</button>
                      </div>

                  <div id="div1">

                       <table class="table table-bordered">
                            <tr>
                                 <th width="15%">Task ID</th>
                                 <th width="15%">Task Subject</th>
                                 <th width="20%">Description</th>
                                 <th width="20%">Date Assigned</th>
                                 <th width="20%">Date Due</th>
                                 <th width="10%">Employee</th>
                                 <th width="10%">Status</th>
                            </tr>';
                  if(@mysqli_num_rows($result) > 0)
                  {
                       while($row = mysqli_fetch_array($result))
                       {
                        if($row["status"]==0){
                          $status = 'Pending';
                        }else{
                           $status = 'Completed';
                        }
                            $output .= '
                                 <tr>
                                      <td>'. $row["task_id"].'</td>
                                      <td>'. $row["subject"].'</td>
                                      <td>'. $row["description"].'</td>
                                      <td>'.$row["assigned"].'</td>
                                      <td>'.$row["due"].'</td>
                                      <td>'.$row["employee_name"].'</td>
                                      <td>'.$status.'</td>
                                 </tr>
                            ';
                       }
                  }
                  else
                  {
                       $output .= '
                            <tr>
                                 <td colspan="7">No Task Report Found</td>
                            </tr>
                       ';
                  }
                  $output .= '</table>
                  </div>';
                  echo $output;
            }
      }

   }
 ?>
