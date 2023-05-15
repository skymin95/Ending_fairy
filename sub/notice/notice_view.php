<?php
$title = "마이페이지 > 공지사항 상세페이지"; // 타이틀
include_once('../common.php');
$id = (empty($_GET['board_id']) ? '' : $_GET['board_id']);
$id = mysqli_real_escape_string($con, $id);

$sql_notice= "SELECT * FROM board_notice WHERE notice_id = '".$id."' ";
$result = mysqli_query($con, $sql_notice);
$data = mysqli_fetch_array($result);
?>
<main>
<!-- 상단  -->
<h2 class="sub_title_prev">
  <a href="notice.php" title="돌아가기">
  <img src="<?=$base_URL?>images/arrow_title_prev.svg" alt="prev">
  공지사항
  </a>
</h2>
<!-- 작성자 정보 -->
<!-- 컨텐츠 -->
<div id="notice_view_wrap">
  <article id="notice_view_box">
    <h3><?=$data['notice_title']?></h3>
    <!-- <img src="<?=$base_URL?>images/logo_admin.png" alt="로고"> -->
    <p><?=$data['notice_content']?></p>
</div>
    <a href="notice.php" title="목록으로"class="notice_link">목록으로</a>
</article>

</main>