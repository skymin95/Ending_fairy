<?php
$title = "마이페이지 > 1:1문의"; // 타이틀
include_once('../common.php');
?>
<main>
  <form name="question" id="question_form" method="post" action="">
  <article id="question_wrap">
    <h2>1:1문의</h2>
    <ul class="question_write_btn">
      <li>
        <a href="question_write.php" class="question_write">문의하기</a>
      </li>
    </ul>
    <ul class="question_ul">
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
            <li>
              <h3>
                <a href="question_view.php?question_id=<?=$data['question_id']?>"><?=$data['question_title']?></a>
              </h3>
              <span>  <?= ($row_parent == '0' ? '답변대기중' : '답변완료')?>/</span>
              <span><?= date_format(date_create($data['question_wdate']), "Y-m-d") ?></span>
            </li>
          </ul>
          <?php } ?>
    </ul>
    <div class="s_wrap">
          <label for="category">검색옵션</label>
          <select name="category" id="category">
            <option value="">검색옵션</option>
            <option value="notice_title" <?=$category=="notice_title" ? "selected" : ""?>>제목</option>
            <option value="notice_content" <?=$category=="notice_content" ? "selected" : ""?>>내용</option>
          </select>
          <input type="text" name="search" placeholder="SEARCH">
          <button type="submit" class="s_btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </article>
  </form>
</main>
