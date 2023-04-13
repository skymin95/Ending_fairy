<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/db/db_con.php');

$query = "SELECT * FROM course WHERE course_edu_sdate LIKE '".$_POST['nowCalendarMonth']."%' ";
$result = mysqli_query($con, $query);
$data = "";
$i = 0;
$array = array();
$resultArray = array();

while($row = mysqli_fetch_assoc($result)) {
  foreach($row as $key => $value){
    $array[$key] = $value;
  }
  $resultArray[$i] = $array;
  $i++;
}

echo json_encode($resultArray);
?>