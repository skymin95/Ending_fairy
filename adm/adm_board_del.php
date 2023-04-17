<?php
include_once('./common.php');

$id = $_GET['board_id'];
$id = mysqli_real_escape_string($con, $id);

$cate = empty($_GET['cate']) ? 1 : $_GET['cate']; // 현재 카테고리

switch($cate) {
  case '1': $cate_name = '공지사항'; $cate_table = 'notice'; break;
  case '2': $cate_name = '이벤트'; $cate_table = 'event'; break;
  case '3': $cate_name = '커뮤니티'; $cate_table = 'community'; break;
  default: $cate_name = '공지사항';  break;
}

$query = "DELETE FROM board_".$cate_table." WHERE ".$cate_table."_id = '$id'";
$result = mysqli_query($con, $query);

echo "<script>alert('삭제되었습니다.')</script>";
?>
<script>
  location.href = 'adm_board_list.php';
</script>