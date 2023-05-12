<?php
$title = "마이페이지 > 내 강의실"; // 타이틀
include_once('../common.php');
empty($_SESSION['mb_id']) || $mb_id = $_SESSION['mb_id']."님 환영합니다.";
?>
<article>
  <h2 class="sub_title_prev">
    <a href="<?=$base_URL?>sub/mypage/mypage.php" title="돌아가기">
      <img src="<?=$base_URL?>images/arrow_title_prev.svg" alt="prev">
      내 강의실
    </a>
  </h2>
</article>
<article class="list_tab">
  <h3 class="hidden">강의실 탭 메뉴</h3>
  <nav>
    <ul class="line_tab">
      <li>수강 중 (5)</li>
      <li>신청&middot;대기(2)</li>
      <li>수강완료(3)</li>
    </ul>
    <span class="tab_on"></span>
  </nav>
</article>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>