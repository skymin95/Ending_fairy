<?php
include_once('./common.php');

$id = $_GET['question_id'];
$content = $_POST['question_content'];

if($row_parent != '0'){
  $query = "UPDATE board_question SET question_content = '$content' WHERE question_parent_id = '$id'";
  $result = mysqli_query($con,$query);
}else{
  $query = "INSERT INTO board_question(question_parent_id, question_content, question_wdate, mb_no) VALUES('$id', '$content', now(), '')";
  mysqli_query($con, $query);
}

echo "
<script>
  alert('답변이 완료되었습니다.');
  location.replace('adm_answer_list.php');
</script>";
?>