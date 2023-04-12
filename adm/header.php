<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?></title>
  <link rel="stylesheet" href="<?=$base_URL?>skin/reset.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="<?=$base_admin_URL?>css/admin.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

  <?php
    if(basename($_SERVER['PHP_SELF']) == 'index.php'){
      echo "<link rel='stylesheet' href='".$base_admin_URL."css/main.css' type='text/css'>";
      echo "<script src='./script/main.js' defer></script>";
    }
    if($title == "게시판 관리"){
      echo "<link rel='stylesheet' href='".$base_admin_URL."css/board.css' type='text/css'>";
      echo "<script src='./script/board.js' defer></script>";
    }
    if($title == "게시판 관리 > 관리자 글쓰기"){
      echo "<link rel='stylesheet' href='".$base_admin_URL."css/boardwrite.css' type='text/css'>";
    }
  ?>
</head>
<body>
<header>
  <h1>
    <a href="<?=$base_URL?>" title="메인으로 돌아가기">
      <img src="<?=$base_URL?>images/logo_admin.png" alt="로고">
    </a>
  </h1>
  <ul>
    <li>
      <i class="fa-regular fa-bell">
        <span class="count">1</span>
      </i>
    </li>
    <li>
      <?=$_SESSION['mb_id']?>
    </li>
    <li>
      <!-- A or T -->
      <span class="answer">A</span>
    </li>
    <li>
      <a href="<?=$base_URL?>sub/member/logout.php">로그아웃</a>
    </li>
  </ul>
  <nav>
    <ul>
      <li <?=basename($_SERVER['PHP_SELF']) == "index.php" ? "class='active'" : ""?>>
        <a href="<?=$base_admin_URL?>index.php">HOME</a>
      </li>
      <li <?=explode(" > ", $title)[0] == "강의 관리" ? "class='active'" : ""?>>
        <a href="<?=$base_admin_URL?>adm_academy_list.php" title="강의 관리"><img src="<?=$base_URL?>images/icon_academy<?=explode(" > ", $title)[0] == "강의 관리" ? "_active" : ""?>.svg" alt="강의 관리"> 강의 관리</a>
      </li>
      <li <?=explode(" > ", $title)[0] == "회원 관리" ? "class='active'" : ""?>>
        <a href="<?=$base_admin_URL?>adm_member_list.php" title="회원 관리"><img src="<?=$base_URL?>images/icon_member<?=explode(" > ", $title)[0] == "회원 관리" ? "_active" : ""?>.svg" alt="회원 관리"> 회원 관리</a>
      </li>
      <li <?=explode(" > ", $title)[0] == "게시판 관리" ? "class='active'" : ""?>>
        <a href="<?=$base_admin_URL?>adm_board_list.php" title="게시판 관리"><img src="<?=$base_URL?>images/icon_board<?=explode(" > ", $title)[0] == "게시판 관리" ? "_active" : ""?>.svg" alt="게시판 관리"> 게시판 관리</a>
      </li>
      <li <?=explode(" > ", $title)[0] == "1:1문의 관리" ? "class='active'" : ""?>>
        <a href="<?=$base_admin_URL?>adm_answer_list.php" title="1:1문의 관리"><img src="<?=$base_URL?>images/icon_answer<?=explode(" > ", $title)[0] == "1:1문의 관리" ? "_active" : ""?>.svg" alt="1:1문의 관리"> 1:1문의 관리</a>
      </li>
      <li <?=explode(" > ", $title)[0] == "쿠폰 관리" ? "class='active'" : ""?>>
        <a href="<?=$base_admin_URL?>adm_coupon_list.php" title="쿠폰 관리"><img src="<?=$base_URL?>images/icon_coupon<?=explode(" > ", $title)[0] == "쿠폰 관리" ? "_active" : ""?>.svg" alt="쿠폰 관리"> 쿠폰 관리</a>
      </li>
    </ul>
  </nav>
</header>