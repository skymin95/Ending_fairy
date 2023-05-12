<?php
$title = "마이페이지 > 1:1문의"; // 타이틀
include_once('../common.php');
?>
<main>
  <h2>1:1문의</h2>
    <a href="question_write.php">작성하기</a>
    <ul>
      <?php
        $sql_question = "select * from board_question order by question_id desc limit 8";
        $result_question = mysqli_query($con, $sql_question);
        // 데이터 출력
        while($data = mysqli_fetch_array( $result_question)){
          $sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_no = '".$data['mb_no']."'";
          $result_member = mysqli_query($con, $sql_member);
          $row_member = mysqli_fetch_array($result_member);

          $sql_parent = "SELECT * FROM `board_question` AS a INNER JOIN (SELECT question_parent_id FROM `board_question` WHERE question_parent_id IS NOT NULL) AS b ON b.question_parent_id = a.question_id WHERE question_id = ".$data['question_id']."";
          $result_parent = mysqli_query($con, $sql_parent);
          $row_parent = mysqli_num_rows($result_parent);
        ?>
          <ul>
            <li><a href="question_view.php?question_id=<?=$data['question_id']?>"><?=$data['question_title']?></a></li>
            <li>
              <?= ($row_parent == '0' ? '답변대기중' : '답변완료')?>
              /<?= date_format(date_create($data['question_wdate']), "Y-m-d") ?>
            </li>

          </ul>
          <?php } ?>
    </ul>
</main>
