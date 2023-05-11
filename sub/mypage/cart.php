<?php
$title = "마이페이지 > 장바구니"; // 타이틀
include_once('../common.php');
empty($_SESSION['mb_id']) || $mb_id = $_SESSION['mb_id']."님 환영합니다.";
?>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>