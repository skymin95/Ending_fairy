<?php
include_once('../common.php');

$code = $_POST['coupon_code'];

$sql_coupon_info = "SELECT * FROM coupon_list WHERE coupon_code = '$code'";
$result_coupon_info = mysqli_query($con, $sql_coupon_info);
$row_coupon_info = mysqli_fetch_assoc($result_coupon_info);

$str_sdate = strtotime($row_coupon_info['coupon_sdate']);
$str_edate = strtotime($row_coupon_info['coupon_edate']);
$str_nowtime = strtotime(date('Y-m-d H:i:s'));

echo $str_nowtime.'<br>';
echo $str_sdate.'<br>';
echo $str_edate;

if($str_nowtime > $str_sdate && $str_nowtime < $str_edate) {
  $sql_coupon_insert = "INSERT INTO coupon_status(coupon_status, coupon_no, coupon_wdate, mb_no) VALUES (0, ".$row_coupon_info['coupon_no'].", now(), ".$row_member['mb_no'].")";
  $query_coupon_insert = mysqli_query($con, $sql_coupon_insert);
  echo "<script>
    alert('입력되었습니다.');
    history.back();
  </script>";
} else {
  echo "<script>
    alert('해당 쿠폰은 입력 가능한 기간이 아닙니다.');
    history.back();
  </script>";
}



?>