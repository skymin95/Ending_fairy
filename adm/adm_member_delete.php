<?php
include_once('./common.php');


$mb_no = $_GET['mb_no']??'';

$query = "DELETE FROM member WHERE mb_no = $mb_no";
$result = mysqli_query($con, $query);

echo "<script>alert('삭제되었습니다.')</script>";
?>
<script>
  location.href = 'adm_member_list.php';
</script>