<?php
$title = "마이페이지"; // 타이틀
include_once('../common.php');
empty($_SESSION['mb_id']) || $mb_id = $_SESSION['mb_id']."님 환영합니다.";
?>
<main>
  <article class="info_user">
    ㅁㄴㅇㄹ
  </article>
  <article class="list_menu">

  </article>
</main>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>