<?php
include_once('./common.php');

$id = $_POST['question_id'];
$content = $_POST['question_content'];

$sql_parent = "SELECT * FROM `board_question` AS a INNER JOIN (SELECT question_parent_id FROM `board_question` WHERE question_parent_id IS NOT NULL) AS b ON b.question_parent_id = a.question_id WHERE question_id = '$id'";
$result_parent = mysqli_query($con, $sql_parent);
$row_parent = mysqli_num_rows($result_parent);

if($row_parent != '0'){
  $sql = "UPDATE board_question SET question_content = '$content' WHERE question_parent_id = '$id'";
  $result = mysqli_query($con, $sql);
}else{
  $sql = "INSERT INTO board_question(question_parent_id, question_content, question_wdate, mb_no) VALUES('$id', '$content', now(), '')";
  mysqli_query($con, $sql);
}

echo "
<script>
  alert('답변이 완료되었습니다.');
  location.replace('adm_answer_list.php');
</script>";
?>