<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?></title>
  <link rel="stylesheet" href="<?=$base_URL?>skin/reset.css" type="text/css">
  <link rel="stylesheet" href="<?=$base_URL?>skin/base.css" type="text/css">
  <link rel="stylesheet" href="<?=$base_URL?>skin/common.css" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" type="text/css">
  <link rel="shortcut icon" href="<?=$base_URL?>images/favicon.png" type="image/x-icon">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="<?=$base_URL?>skin/common.js" defer></script>

  <?php
  
  if(basename($_SERVER['PHP_SELF']) == 'index.php'){
    echo "<link rel='stylesheet' href='".$base_skin_URL."main/main.css' type='text/css'>";
    echo "<script src='".$base_skin_URL."main/main.js' defer></script>";
    echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css'/>
    <script src='https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js'></script>";
  }
  if($title == "로그인"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."member/login.css' type='text/css'>";
  }
  if($title == "회원가입"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."member/register.css' type='text/css'>";
    echo "<script src='".$base_skin_URL."member/register.js' defer></script>";
  }
  if($title == "마이페이지"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."mypage/mypage.css' type='text/css'>";
    echo "<script src='".$base_skin_URL."mypage/mypage.js' defer></script>";
  }
  if($title == "강의"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."academy/academy.css' type='text/css'>";
    echo "<script src='".$base_skin_URL."academy/academy.js' defer></script>";
  }

  ?>
</head>
<body>
<header>
  <input type="checkbox" id="sideMnu" class="hidden">
  <nav class="top">
    <ul>
      <li>
        <h1>
          <a href="<?=$base_URL?>index.php" title="메인으로 돌아가기">
            <img src="<?=$base_URL?>images/logo.png" alt="logo">
          </a>
        </h1>
      </li>
      <li class="top-right">
        <div class="answer" data-cnt="4">
          <img src="<?=$base_URL?>images/header_bell.png" alt="bell">
        </div>
        <div class="menu">
          <label for="sideMnu">
            <span></span>
            <span></span>
            <span></span>
          </label>
        </div>
      </li>
    </ul>
  </nav>
  <?php
    $seq = 2; // 0 ~ 4 순서로 검색, 내 강의실, 홈, 장바구니, 마이페이지
    switch($title) {
      case "캐논 아카데미":
        $seq = 2;
        break;
      case "마이페이지":
        $seq = 4;
        break;
    }
  ?>
  <nav class="bottom" style="--data-seq:<?=$seq?>;">
    <ul>
      <li>
        <a href="#search" title="검색하기" <?=$seq!=0?:"class=active"?>>
          <img src="<?=$base_URL?>images/nav_search<?=$seq!=0?"":"_active"?>.png" alt="search">
          <span>검색</span>
        </a>
      </li>
      <li>
        <a href="#academy" title="내 강의실" <?=$seq!=1?:"class=active"?>>
          <img src="<?=$base_URL?>images/nav_academy<?=$seq!=1?"":"_active"?>.png" alt="academy">
          <span>내 강의실</span>
        </a>
      </li>
      <li>
        <a href="<?=$base_URL?>index.php" title="메인으로 돌아가기" <?=$seq!=2?:"class=active"?>>
          <img src="<?=$base_URL?>images/nav_home<?=$seq!=2?"":"_active"?>.png" alt="home">
          <span>홈</span>
        </a>
      </li>
      <li>
        <a href="#cart" title="장바구니" <?=$seq!=3?:"class=active"?>>
          <img src="<?=$base_URL?>images/nav_cart<?=$seq!=3?"":"_active"?>.png" alt="cart">
          <span>장바구니</span>
        </a>
      </li>
      <li>
        <a href="<?=$base_URL?>sub/mypage/mypage.php" title="마이페이지" <?=$seq!=4?:"class=active"?>>
          <img src="<?=$base_URL?>images/nav_mypage<?=$seq!=4?"":"_active"?>.png" alt="mypage">
          <span>마이페이지</span>
        </a>
      </li>
    </ul>
  </nav>
</header>