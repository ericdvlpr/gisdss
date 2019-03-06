<?php
include('database.php');
$query = '';

$output = array();

$query .= "
SELECT * FROM forecast
";

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
 $sub_array[] = $row['issue_no'];
 $sub_array[] = $row['issue_date'];
 $sub_array[] = $row['valid'];
 $sub_array[] = '<a href="viewForecast.php?forecastID='.$row["forecast_id"].'" name="view" id="'.$row["forecast_id"].'" class="btn btn-info btn-xs viewForcast">View</a> <button type="button" name="update" id="'.$row["forecast_id"].'" class="btn btn-warning btn-xs updateForcast">Update</button>';
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

 ?>
