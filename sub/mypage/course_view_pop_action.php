<?php
include_once('../common.php');

$index_id = $_GET['index_id'];
$currentTime = $_GET['currentTime'];
$duration = $_GET['duration'];

$sql_status = "SELECT * FROM course_status WHERE index_id = $index_id AND mb_no = ".$row_member['mb_no'];
$result_status = mysqli_query($con, $sql_status);
$cnt_status = mysqli_num_rows($result_status);

$sql_index = "SELECT * FROM course_index WHERE index_id = $index_id";
$result_index = mysqli_query($con, $sql_index);
$row_index = mysqli_fetch_assoc($result_index);

$status = floor(($currentTime / $duration) * 100);

if($cnt_status > 0) {
  $sql_status = "UPDATE course_status SET status = ".$status." WHERE index_id = $index_id AND mb_no = ".$row_member['mb_no'];
  $result_status = mysqli_query($con, $sql_status);
} else {
  $sql_status = "INSERT INTO course_status(status_id, status, course_id, mb_no, index_id) VALUES (0, '$status', ".$row_index['course_id'].", ".$row_member['mb_no'].", $index_id)";
  $result_status = mysqli_query($con, $sql_status);
}

?>