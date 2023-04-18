<?php
include_once('./common.php');
empty($_SESSION['mb_id']) || $mb_id = $_SESSION['mb_id']."님 환영합니다.";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">
  <title>캐논아카데미</title>
</head>
<body>
<p>
  <?php if(empty($mb_id)) {?>
    <a href="<?=$base_URL?>sub/member/login.php">로그인 페이지로 이동하기</a><br/>
    <?php } else { ?>
    <?=$mb_id?><br/>
  <a href="<?=$base_URL?>sub/member/logout.php">로그아웃</a><br/>
  <a href="<?=$base_URL?>adm/">관리자 페이지로 이동하기</a>
  <?php } ?>
</p>
</body>
</html>