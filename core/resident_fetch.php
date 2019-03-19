<?php
include('database.php');
include 'function.php';
$query = '';

$output = array();

$query = "SELECT * FROM resident";


// if(isset($_POST["search"]["value"]))
// {
//  $query .= '(user_email LIKE "%'.$_POST["search"]["value"].'%" ';
//  $query .= 'OR user_name LIKE "%'.$_POST["search"]["value"].'%" ';
//  $query .= 'OR user_status LIKE "%'.$_POST["search"]["value"].'%") ';
// }
//
// if(isset($_POST["order"]))
// {
//  $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
// }
// else
// {
//  $query .= 'ORDER BY user_id DESC ';
// }
//
// if($_POST["length"] != -1)
// {
//  $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
// }

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

$filtered_rows = $statement->rowCount();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['res_name'];
 $sub_array[] = get_resident_brgy($connect,$row['res_brgy']);
 $sub_array[] = '<button type="button" name="update" id="'.$row["res_id"].'" class="btn btn-warning btn-xs updateRes">Update</button>';
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
 $statement = $connect->prepare("SELECT * FROM resident");
 $statement->execute();
 return $statement->rowCount();
}

 ?>
