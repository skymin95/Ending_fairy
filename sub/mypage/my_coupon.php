<?php
$title = "마이페이지 > 쿠폰관리"; // 타이틀
include_once('../common.php');
?>
<article>
  <h2 class="sub_title_prev">
    <a href="<?=$base_URL?>sub/mypage/mypage.php" title="돌아가기">
      <img src="<?=$base_URL?>images/arrow_title_prev.svg" alt="prev">
      장바구니
    </a>
  </h2>
</article>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>