<?php
$query = '';

$output = array();

function totalBrgy($connect){
  $total = $connect->prepare("SELECT * FROM barangay");
  $total->execute();
  return $total->rowCount();
}


function get_total_all_flood_records($connect)
{
 $statement = $connect->prepare("SELECT * FROM barangay WHERE flood = '1' ");
 $statement->execute();
 return $statement->rowCount().' out of '. totalBrgy($connect);
}

function get_total_all_storm_surge_records($connect)
{
 $statement = $connect->prepare("SELECT * FROM barangay WHERE storm_surge = '1' ");
 $statement->execute();
 return $statement->rowCount().' out of '. totalBrgy($connect);
}

function get_total_all_tsunami_records($connect)
{
 $statement = $connect->prepare("SELECT * FROM barangay WHERE tsunami = '1' ");
 $statement->execute();
 return $statement->rowCount().' out of '. totalBrgy($connect);
}

function get_total_all_landslide_records($connect)
{
 $statement = $connect->prepare("SELECT * FROM barangay WHERE landslide = '1' ");
 $statement->execute();
 return $statement->rowCount().' out of '. totalBrgy($connect);
}

function check_weather_forecast($connect, $issueId){
  $query = "
   SELECT * FROM forecast WHERE forecast_id = :forecast_id
   ";
   $statement = $connect->prepare($query);
   $statement->execute(
    array(
     ':forecast_id' => $issueId
    )
   );
   $dataOutput = array();
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
      $dataOutput['issue_no']=$row["issue_no"];
      $dataOutput['wind']=  $row["wind"];
      $dataOutput['wave']=$row["wave"];
      $dataOutput['rain']=  $row["rain"];
      $dataOutput['issue_date']=  $row["issue_date"];
      $dataOutput['valid']=  $row["valid"];
      $dataOutput['temp']=  $row["temp"];
      $dataOutput['humid']=  $row["humid"];
      $dataOutput['sunrise']=  $row["sunrise"];
      $dataOutput['sunset']=  $row["sunset"];
      $dataOutput['moonrise']=  $row["moonrise"];
      $dataOutput['moonset']=  $row["moonset"];
   }
   return $dataOutput;
  }

function check_action_plan($connect, $wind, $wave, $rain,$warningID){
  $statement = $connect->prepare("SELECT * FROM action_plan");
  $statement->execute();
  $result1 = $statement->fetchAll();
  foreach($result1 as $row1)
  {
    $criteria= '';
    $result2 = array();
    $criteria = explode('-',$row1['criteria']);

    // print_r($wave>=$criteria[1] && $wind>$criteria[1]);
//     if($row1['warning_plan_id'] == 1){
//
//       //   if($wind>$criteria || $wind<$criteria){
//       //     $query = 'SELECT * FROM barangay WHERE landslide =1 AND storm_surge = 1 AND mudflow = 1 AND flood = 1';
//       //     // $result2=check_barangay($connect,$query,'landslide');
//       //     return $result2;
//       //   }
//     }
    if($row1['warning_plan_id'] == 2 && $warningID== 'storm'){
      if($wave>=@$criteria[1] || $wind>@$criteria[1]){
        $query = 'SELECT * FROM barangay WHERE storm_surge = 1';
        $result2=check_barangay_storm_surge($connect,$query,'storm');
        return $result2;
      }
    }
// // //
    if($row1['warning_plan_id'] == 3 && $warningID== 'flood'){
      if($rain>=@$criteria[1]){
        $query = 'SELECT * FROM barangay WHERE flood = 1';
        $result2=check_barangay_flood($connect,$query,'flood');
        return $result2;
      }
    }
// //   //
    if($row1['warning_plan_id'] == 4  && $warningID== 'landslide'){
        if($wind>@$criteria[1]){
          $query = 'SELECT * FROM barangay WHERE landslide =1';
          $result2=check_barangay_landslide($connect,$query,'landslide');
          return $result2;
        }
      }
// //       //
        if($row1['warning_plan_id'] == 5 && $warningID == 'tsunami'){
          if($wave>@$criteria[1]){
            $query = 'SELECT * FROM barangay WHERE tsunami = 1';
            $result2=check_barangay_tsunami($connect,$query,'tsunami');
            return $result2;
          }
        }
    }
}
function check_barangay_flood($connect, $query,$id){
  $listOutput = array();
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row2)
  {
    $listOutput[][$id] = $row2;
    // $listOutput[][$arrayID]=array('brgyId'=>$row2['brgy_id'],'brgyName'=>$row2['brgy_name'],'brgyLat'=>$row2['lat'],'brgyLongi'=>$row2['longi'],'brgyPop'=>$row2['population']);

  }
  return $listOutput;
}
function check_barangay_storm_surge($connect, $query,$id){
  $listOutput = array();
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row2)
  {
    $listOutput[][$id] = $row2;
    // $listOutput[][$arrayID]=array('brgyId'=>$row2['brgy_id'],'brgyName'=>$row2['brgy_name'],'brgyLat'=>$row2['lat'],'brgyLongi'=>$row2['longi'],'brgyPop'=>$row2['population']);

  }
  return $listOutput;
}
function check_barangay_landslide($connect, $query,$id){
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row2)
  {
    $listOutput[][$id] = $row2;
    // $listOutput[][$arrayID]=array('brgyId'=>$row2['brgy_id'],'brgyName'=>$row2['brgy_name'],'brgyLat'=>$row2['lat'],'brgyLongi'=>$row2['longi'],'brgyPop'=>$row2['population']);

  }
  return $listOutput;
}
function check_barangay_tsunami($connect, $query,$id){
  $listOutput = array();
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row2)
  {
    $listOutput[][$id] = $row2;
    // $listOutput[][$arrayID]=array('brgyId'=>$row2['brgy_id'],'brgyName'=>$row2['brgy_name'],'brgyLat'=>$row2['lat'],'brgyLongi'=>$row2['longi'],'brgyPop'=>$row2['population']);

  }
  return $listOutput;
}
function post_advisory($connect){
  $listOutput = array();
  $statement = $connect->prepare("SELECT * FROM advisory");
  $statement->execute();
  $result = $statement->fetchAll();
  return $result;
}
function get_barangay($connect){
  $output ='';
  $statement = $connect->prepare("SELECT * FROM barangay");
  $statement->execute();
  $result = $statement->fetchAll();
  $output = '<option value="">Please Select</option>';
  foreach($result as $row){
    $output .= '<option value='.$row['brgy_id'].'>'.$row['brgy_name'].'</option>';
  }
  return $output;
}
function get_resident_brgy($connect, $brgy_id){
  $statement = $connect->prepare("SELECT * FROM barangay WHERE brgy_id ='$brgy_id'");
  $statement->execute();
  $result = $statement->fetch();
  $brgy_name = $result['brgy_name'];
  return $brgy_name;
}
function check_barangay_status($connect, $bid){
  $statement = $connect->prepare("SELECT * FROM barangay WHERE brgy_id ='$bid'");
  $statement->execute();
  $result = $statement->fetchALL();
  foreach($result as $row){
    if($row['flood']== 1){
      $status = 'flood';
    }elseif($row['storm_surge']== 1){
        $status = 'storm';
    }elseif($row['landslide']== 1){
        $status = 'landslide';
    }
  }
  return $status;
}
function list_barangay($connect){
  $output ='';
  $statement = $connect->prepare("SELECT * FROM barangay");
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row){
    $output .= '<li class="item">'.$row['brgy_name'].'</li>';
  }
  return $output;
}
function view_advisory($connect,$advisoryID){
  $listOutput = array();
  $statement = $connect->prepare("SELECT * FROM advisory WHERE advisory_id = '$advisoryID' ");
  $statement->execute(
    array(
     ':advisoryID' => $advisoryID
    )
   );
   $dataOutput = array();
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
      $dataOutput['issue_no']=$row["issue_no"];
      $dataOutput['wind']=  $row["alrt_wind"];
      $dataOutput['wave']=$row["alrt_wave"];
      $dataOutput['rain']=  $row["alrt_rain"];
      $dataOutput['issue_date']=  $row["issue_date"];
   }
   return $dataOutput;
}
 ?>
