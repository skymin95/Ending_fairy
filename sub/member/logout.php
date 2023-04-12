<!-- logout.php 로그아웃 -->
<?php

session_start();
// unset = 정보삭제
unset($_SESSION['userid']);

echo("<script>location.href='../../index.php';</script>");

?>