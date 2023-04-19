<?php
include_once('./common.php');

$coupon_no = $_GET['coupon_no']??'';

$query = "DELETE FROM coupon_list WHERE coupon_no = $coupon_no";
$result = mysqli_query($con, $query);

?>
<script>
  alert('삭제 완료되었습니다.');
  location.href='<?=$base_admin_URL?>adm_coupon_list.php';
</script>