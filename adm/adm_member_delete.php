<?php
include_once('./common.php');


$mb_no = $_GET['mb_no']??'';

$query = "DELETE FROM member WHERE mb_no = $mb_no";
$result = mysqli_query($con, $query);

?>
<script>
  alert('삭제 완료되었습니다.');
  location.href='<?=$base_admin_URL?>adm_member_list.php';
</script>