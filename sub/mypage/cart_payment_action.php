<?php
include_once('../common.php');

$course_id = $_POST['course_id']; // 강의 번호 배열
$coupon = $_POST['coupon']; // 쿠폰번호
$payment_price = $_POST['payment_price']; // 실 결제가격

if($coupon != ''){
  $sql_coupon = "UPDATE coupon_status SET coupon_status = 1 WHERE coupon_no = $coupon AND mb_no = ".$row_member['mb_no'];
  $query_coupon = mysqli_query($con, $sql_coupon);
}

for($i = 0; $i < count($course_id); $i++) {
  $sql_course = "INSERT INTO course_status(course_id, mb_no) VALUES('".$course_id[$i]."', '".$row_member['mb_no']."')";
  $query_course = mysqli_query($con, $sql_course);
  $sql_cart = "DELETE FROM cart WHERE course_id = ".$course_id[$i]." AND mb_no = ".$row_member['mb_no'];
  $query_cart = mysqli_query($con, $sql_cart);
}
?>
<script>
  alert('<?=number_format($payment_price)?>원 결제 완료되었습니다.');
  location.replace('cart.php');
</script>