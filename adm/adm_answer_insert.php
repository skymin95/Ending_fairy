<?php
$title = "1:1문의 관리 > 1:1문의 답변"; // 타이틀
include_once('./common.php');
$mb_id = $_SESSION['mb_id']; // 회원명

$id = $_GET['question_id'];

$query = "SELECT * FROM board_question WHERE question_id = '$id'";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);

$sql_parent = "SELECT * FROM `board_question` AS a INNER JOIN (SELECT question_parent_id FROM `board_question` WHERE question_parent_id IS NOT NULL) AS b ON b.question_parent_id = a.question_id WHERE question_id = '$id'";
$result_parent = mysqli_query($con, $sql_parent);
$row_parent = mysqli_num_rows($result_parent);

if($row_parent != '0') {
  $query = "SELECT * FROM board_question WHERE question_parent_id = '$id'";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result); 
}else{
  $query = "SELECT * FROM board_question WHERE question_parent_id = '$id'";
  $result = mysqli_query($con, $query);
  $row = array('question_content' => '');
}

$query_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_id = '$mb_id'";
$result_member = mysqli_query($con, $query_member);
$row_member = mysqli_fetch_array($result_member);
?>

<main class="board_insert answer">
  <ul class="board_h">
    <li><h2 class="a_title">답변하기</h2></li>
    <li><a href="adm_answer_list.php" class="a_title">목록으로 이동<i class="fa-solid fa-chevron-right"></i></a></li>
  </ul>

  <form name="write" method="post" action="adm_answer_insert_action.php">
    <input type="hidden" name="question_id" value="<?=$id?>">
    <div class="board_wrap">
      <dl>
        <dt>제목</dt>
        <dd><p><?=$data['question_title']?></p></dd>

        <dt>작성자</dt>
        <dd><p><?=$row_member['mb_name']?></p></dd>

        <dt>작성일</dt>
        <dd><p><?= date_format(date_create($data['question_wdate']), "Y-m-d") ?></p></dd>

        <dt>내용</dt>
        <dd><p><?=$data['question_content']?></p></dd>

        <dt>답변</dt>
        <dd><textarea name="question_content" required><?=$row['question_content']?></textarea></dd>
      </dl>

      <!-- 삭제/완료 -->
      <ul class="board_b">
        <li><a href="adm_answer_delete.php?question_id=<?=$id?>" title="삭제">삭제</a></li>
        <li class="nw_success"><input type="submit" value="완료"></li>
      </ul>
    </div>
  </form>
</main>
<?php
include_once('./footer.php');
?>