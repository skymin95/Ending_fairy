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

  <?php
  
  if(basename($_SERVER['PHP_SELF']) == 'index.php'){
    echo "<link rel='stylesheet' href='".$base_skin_URL."main/main.css' type='text/css'>";
    echo "<script src='".$base_skin_URL."main/main.js'></script>";
  }
  if($title == "로그인"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."member/login.css' type='text/css'>";
  }
  if($title == "회원가입"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."member/register.css' type='text/css'>";
    echo "<script src='".$base_skin_URL."member/register.js' defer></script>";
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
            <div></div>
            <div></div>
            <div></div>
          </label>
        </div>
      </li>
    </ul>
  </nav>
  <nav class="bottom">
    <ul>
      <li>
        <a href="#search" title="검색하기">
          <img src="<?=$base_URL?>images/nav_search.png" alt="search">
        </a>
      </li>
      <li>
        <a href="#academy" title="내 강의실">
          <img src="<?=$base_URL?>images/nav_academy.png" alt="academy">
        </a>
      </li>
      <li>
        <a href="<?=$base_URL?>index.php" title="메인으로 돌아가기" class="active">
          <img src="<?=$base_URL?>images/nav_home_active.png" alt="home">
        </a>
      </li>
      <li>
        <a href="#cart" title="장바구니">
          <img src="<?=$base_URL?>images/nav_cart.png" alt="cart">
        </a>
      </li>
      <li>
        <a href="#mypage" title="마이페이지">
          <img src="<?=$base_URL?>images/nav_mypage.png" alt="mypage">
        </a>
      </li>
    </ul>
  </nav>
</header>