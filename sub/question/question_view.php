<?php
$title = "마이페이지 > 1:1문의 상세페이지"; // 타이틀
include_once('../common.php');
$id = (empty($_GET['question_id']) ? '' : $_GET['question_id']);
$id = mysqli_real_escape_string($con, $id);

$sql_question= "SELECT * FROM board_question WHERE question_id  = '".$id."' ";
$result = mysqli_query($con, $sql_question);
$data = mysqli_fetch_array($result);

$sql_question_parent= "SELECT * FROM board_question WHERE question_parent_id  = '".$id."' ";
$result_parent = mysqli_query($con, $sql_question_parent);
$data_parent = mysqli_fetch_array($result_parent);


?>
<main>

<!-- 상단 뒤로가기 박스 -->
<h2 class="sub_title_prev">
  <a href="question.php" title="돌아가기">
  <img src="<?=$base_URL?>images/arrow_title_prev.svg" alt="prev">
  1:1문의
  </a>
</h2>
<!-- 문의 내용 -->
<article class="question_view_box">
<h3><?=$data['question_title']?>1</h3>

<div class="question_content_box">
<p><?=$data['question_content']?></p>
</div>

<div class="question_answer_box">
<p><?=empty($data_parent['question_content']) ? '답변이 없습니다.' : $data_parent['question_content']?></p>
</div>

<a href="question.php" title="목록으로"class="question_link">목록으로</a>




</article>

</main>