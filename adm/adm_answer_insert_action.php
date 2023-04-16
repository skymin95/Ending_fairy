<?php
include_once('./common.php');
  $id = $_POST['question_id'];
  $faq_content = $_POST['faq_content'];

  $query = "SELECT * FROM board_question WHERE question_id = '$id'";
  $query = "SELECT question_title, question_wdate, question_content FROM board_question WHERE question_id = '$id'";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result);

  $query = "UPDATE board_question SET question_parent_id = '3' WHERE question_id = '$id'";
  $result = mysqli_query($con,$query);

  $query = "INSERT INTO board_faq(faq_id, faq_parent_id, faq_content) VALUES('', '$id', '$faq_content')";
  mysqli_query($con, $query);

  echo "
  <script>
    alert('답변이 완료되었습니다.');
    location.replace('adm_answer_list.php');
  </script>";
?>