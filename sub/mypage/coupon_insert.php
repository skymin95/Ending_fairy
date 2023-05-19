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

if(!empty($row_coupon_info)){
  $sql_coupon = "SELECT * FROM coupon_status WHERE coupon_no = ".$row_coupon_info['coupon_no']." AND mb_no = ".$row_member['mb_no'];
  $result_coupon = mysqli_query($con, $sql_coupon);
  $num_coupon = mysqli_num_rows($result_coupon);

  if($num_coupon > 0){
    echo "<script>
      alert('이미 등록되어있는 쿠폰입니다.');
      history.back();
    </script>";
  } else {
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
  }
} else {
  echo "<script>
    alert('존재하지 않는 쿠폰입니다.');
    history.back();
  </script>";
}


?>