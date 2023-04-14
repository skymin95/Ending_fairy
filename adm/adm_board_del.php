<?php
include_once('./common.php');

$id = $_GET['notice_id'];
$id = mysqli_real_escape_string($con, $id);

$query = "DELETE FROM board_notice WHERE notice_id = '$id'";
$result = mysqli_query($con, $query);

echo "<script>alert('삭제되었습니다.')</script>";
?>
<script>
  location.href = 'adm_board_list.php';
</script>