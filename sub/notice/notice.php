<?php
$title = "마이페이지 > 공지사항"; // 타이틀
include_once('../common.php');
?>
<main>
  <article id="notice_wrap">
  <h2>공지사항</h2>
  <ul class="notice_ul">
    <form name="notice" id="notice_form" method="post" action="">
      <?php
      $sql_notice = "select * from board_notice order by notice_id desc limit 8;";
      $result_notice= mysqli_query($con, $sql_notice);
      // 데이터 출력
      while($data = mysqli_fetch_array($result_notice)){
        $sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_no = '".$data['mb_no']."'";
        $result_member = mysqli_query($con, $sql_member);
        $row_member = mysqli_fetch_array($result_member);
      ?>
      <li>
        <a href="notice_view.php?board_id=<?=$data['notice_id']?>" title="<?=$data['notice_title']?>">
          <p><?=$data['notice_title']?></p>
          <span><?= ($row_member['mb_nick'] == '' ? $row_member['mb_name'] : $row_member['mb_nick'])?> /</span>
          <span><?=date_format(date_create($data['notice_wdate']), "Y-m-d")?></span>
        </a>
      </li>
      <?php } ?>
    </ul>
    <!-- 검색박스 -->
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

    </form>
    </article>
</main>