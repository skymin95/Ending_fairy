<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?></title>
  <link rel="stylesheet" href="<?=$base_URL?>skin/reset.css" type="text/css">
  <link rel="stylesheet" href="<?=$base_URL?>skin/base.css" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="<?=$base_admin_URL?>css/admin.css" type="text/css">
  <link rel="shortcut icon" href="<?=$base_URL?>images/favicon.png" type="image/x-icon">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

  <?php

    $sql_member_level = "SELECT mb_level FROM member WHERE mb_id = '".$_SESSION['mb_id']."' ";
    $result_member_level = mysqli_query($con, $sql_member_level);
    $member_level = mysqli_fetch_row($result_member_level)[0];

    if($member_level < 8 || empty($member_level)) {
      echo "<script>
      alert('강사등급 이상의 회원만 입장이 가능합니다.');
      location.href='".$base_URL."';
      </script>";
    }

    if(basename($_SERVER['PHP_SELF']) == 'index.php'){
      echo "<link rel='stylesheet' href='".$base_admin_URL."css/main.css' type='text/css'>";
      echo "<script src='./script/main.js' defer></script>";
    }
    if($title == "강의 관리"){
      echo "<link rel='stylesheet' href='".$base_admin_URL."css/board.css' type='text/css'>";
      echo "<link rel='stylesheet' href='".$base_admin_URL."css/academy.css' type='text/css'>";
      echo "<script src='./script/board.js' defer></script>";
    }
    if($title == "강의 관리 > 강의 작성"){
      echo "<link rel='stylesheet' href='".$base_admin_URL."css/boardwrite.css' type='text/css'>";
      echo "<link rel='stylesheet' href='".$base_admin_URL."css/academywrite.css' type='text/css'>";
      echo "<script src='".$base_admin_URL."script/academywrite.js' defer></script>";
    }
    if($title == "회원 관리"){
      echo "<link rel='stylesheet' href='".$base_admin_URL."css/board.css' type='text/css'>";
      echo "<script src='./script/board.js' defer></script>";
    }
    if($title == "회원 관리 > 회원 수정"){
      echo "<link rel='stylesheet' href='".$base_admin_URL."css/member_insert.css' type='text/css'>";
      echo "<script src='./script/board.js' defer></script>";
      echo "<script src='./script/jQuery-plugin-progressbar.js' defer></script>";
    
    }
    if($title == "게시판 관리"){
      echo "<link rel='stylesheet' href='".$base_admin_URL."css/board.css' type='text/css'>";
      echo "<script src='./script/board.js' defer></script>";
    }
    if($title == "게시판 관리 > 관리자 글쓰기"){
      echo "<link rel='stylesheet' href='".$base_admin_URL."css/boardwrite.css' type='text/css'>";
      echo "<script src='".$base_admin_URL."script/boardwrite.js' defer></script>";
    }
    if($title == "1:1문의 관리"){
      echo "<link rel='stylesheet' href='".$base_admin_URL."css/board.css' type='text/css'>";
      echo "<script src='./script/board.js' defer></script>";
    }
    if($title == "1:1문의 관리 > 1:1문의 답변"){
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
      <?php
        //답변이 달려있지 않은 질문 조회
        $sql_answer = "SELECT COUNT(*)
        FROM board_question AS origin
        WHERE origin.question_id 
        NOT IN (SELECT a.question_id 
                FROM board_question AS a, 
                  (SELECT question_parent_id 
                    FROM board_question 
                    WHERE question_parent_id IS NOT NULL) AS b 
                WHERE a.question_id = b.question_parent_id) AND origin.question_parent_id IS NULL";
        $result_answer = mysqli_query($con, $sql_answer);
        $row_answer = mysqli_fetch_row($result_answer);
      ?>
        <?php if($member_level == '10') {?>
      <a href="<?=$base_admin_URL?>adm_answer_list.php?page=1&cate=2">
        <i class="fa-regular fa-bell">
          <span class="count"><?=$row_answer[0]?></span>
        </i>
      </a>
      <?php }?>
    </li>
    <li>
      <?=$_SESSION['mb_id']?>
    </li>
    <li>
      <!-- A or T -->
      <?php if($member_level == '10') {?>
      <span class="answer">A</span>
      <?php } else if($member_level == '8') {?>
      <span class="answer teacher">T</span>
      <?php }?>
    </li>
    <li>
      <a href="<?=$base_URL?>sub/member/logout.php">로그아웃</a>
    </li>
  </ul>
  <nav>
    <ul>
      <?php if($member_level == '10') {?>
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
        <a href="<?=$base_admin_URL?>adm_coupon_list.php" onclick="alert('준비중입니다.');return false;" title="쿠폰 관리"><img src="<?=$base_URL?>images/icon_coupon<?=explode(" > ", $title)[0] == "쿠폰 관리" ? "_active" : ""?>.svg" alt="쿠폰 관리"> 쿠폰 관리</a>
      </li>
      <?php } else if($member_level == '8') {?>
      <li <?=basename($_SERVER['PHP_SELF']) == "index.php" ? "class='active'" : ""?>>
        <a href="<?=$base_admin_URL?>index.php">HOME</a>
      </li>
      <li <?=explode(" > ", $title)[0] == "강의 관리" ? "class='active'" : ""?>>
        <a href="<?=$base_admin_URL?>adm_academy_list.php" title="강의 관리"><img src="<?=$base_URL?>images/icon_academy<?=explode(" > ", $title)[0] == "강의 관리" ? "_active" : ""?>.svg" alt="강의 관리"> 강의 관리</a>
      </li>
      <li <?=explode(" > ", $title)[0] == "회원 관리" ? "class='active'" : ""?>>
        <a href="<?=$base_admin_URL?>adm_member_list.php" title="회원 관리"><img src="<?=$base_URL?>images/icon_member<?=explode(" > ", $title)[0] == "회원 관리" ? "_active" : ""?>.svg" alt="회원 관리"> 회원 관리</a>
      </li>
      <li <?=explode(" > ", $title)[0] == "1:1문의 관리" ? "class='active'" : ""?>>
        <a href="<?=$base_admin_URL?>adm_answer_list.php" title="1:1문의 관리"><img src="<?=$base_URL?>images/icon_answer<?=explode(" > ", $title)[0] == "1:1문의 관리" ? "_active" : ""?>.svg" alt="1:1문의 관리"> 1:1문의 관리</a>
      </li>
      <?}?>
    </ul>
  </nav>
</header>