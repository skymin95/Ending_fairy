<?php
include_once('./common.php');

$id = $_GET['course_id'];
$id = mysqli_real_escape_string($con, $id);

$query = "DELETE FROM course WHERE course_id = '$id'";
$result = mysqli_query($con, $query);

$sql_chapter_remove = "DELETE FROM course_index WHERE course_id = $id";
$query_chapter_remove = mysqli_query($con, $sql_chapter_remove);

?>
<script>
  alert('삭제 완료되었습니다.');
  location.href='<?=$base_admin_URL?>adm_academy_list.php';
</script>