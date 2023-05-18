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
  <link rel="stylesheet" href="<?=$base_URL?>skin/layout.css" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" type="text/css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
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
  if($title == "캐논아카데미 소개"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."info/info.css' type='text/css'>";
    echo "<script src='".$base_skin_URL."info/info.js' defer></script>";
  }
  if($title == "마이페이지"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."mypage/mypage.css' type='text/css'>";
    echo "<script src='".$base_skin_URL."mypage/mypage.js' defer></script>";
  }
  if($title == "마이페이지 > 회원정보 수정"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."mypage/update_member.css' type='text/css'>";
  }
  if($title == "장바구니 > 결제하기"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."mypage/cart_payment.css' type='text/css'>";
    echo "<script src='".$base_skin_URL."mypage/cart_payment.js' defer></script>";
  }
  if($title == "마이페이지 > 내 강의실"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."mypage/course_status.css' type='text/css'>";
    echo "<script src='".$base_skin_URL."mypage/course_status.js' defer></script>";
  } else if($title == "마이페이지 > 수강중인 강의"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."mypage/course_view.css' type='text/css'>";
    echo "<script src='".$base_skin_URL."lib/progressbar.min.js'></script>";
    echo "<script src='".$base_skin_URL."mypage/course_view.js' defer></script>";
  } else if($title == "강의" || $title == "강의 상세"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."academy/academy.css' type='text/css'>";
    echo "<script src='".$base_skin_URL."academy/academy.js' defer></script>";
  }
  if($title == "마이페이지 > 쿠폰관리"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."mypage/my_coupon.css' type='text/css'>";
    echo "<script src='".$base_skin_URL."mypage/my_coupon.js' defer></script>";
  }
  if($title ==  "마이페이지 > 공지사항"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."notice/notice.css' type='text/css'>";
  }
  if($title ==  "마이페이지 > 공지사항 상세페이지"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."notice/notice.css' type='text/css'>";
  }
  if($title ==  "마이페이지 > 1:1문의"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."question/question.css' type='text/css'>";
  }
  if($title ==  "마이페이지 > 1:1문의 상세페이지"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."question/question.css' type='text/css'>";
  }
  if($title ==   "마이페이지 > 1:1문의 글쓰기"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."question/question_write.css' type='text/css'>";
  }
  if($title ==   "마이페이지 > 커뮤니티"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."community/community.css' type='text/css'>";
  }
  if($title ==   "마이페이지 > 커뮤니티 상세페이지"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."community/community.css' type='text/css'>";
    echo "<script src='".$base_skin_URL."community/community.js' defer></script>";
  }
  if($title ==   "마이페이지 > 커뮤니티 글쓰기"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."community/community_write.css' type='text/css'>";
  }
  if($title ==   "장바구니"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."mypage/cart.css' type='text/css'>";
  }
  if($title == "검색"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."search/search.css' type='text/css'>";
    echo "<script src='".$base_skin_URL."search/search.js' defer></script>";
  }

  ?>
</head>
<body>
<header>
  <input type="checkbox" id="m_gnb" class="hidden">
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
          <label for="m_gnb">
            <span></span>
            <span></span>
            <span></span>
          </label>
        </div>
      </li>
    </ul>
  </nav>
  <div id="m_header_wrap">
  <?php

    if(!isset($_SESSION['mb_id'])){

    
  ?>
    <article class="nav_user">
      <h2 class="hidden">내비 유저정보</h2>
      <ul class="nav_box">
        <li>
          <img src="<?=$base_URL?>images/userimg_mypage.png" alt="기본프로필">
        </li>
        <li>
          <p>로그인 후, 나의 정보를 확인하세요.</p>
        </li>
      </ul>
      <ul class="nav_boxmenu">
        <li>
          <a href="<?=$base_URL?>sub/member/login.php">
            로그인
          </a>
        </li>
        <li>
          <a href="<?=$base_URL?>sub/member/register.php">
            회원가입
          </a>
        </li>
      </ul>
    </article>
    <?php } else { 
      $mb_id = $_SESSION['mb_id'];

      $sql_member = "SELECT * FROM member WHERE mb_id = '".$_SESSION['mb_id']."' ";
      $result_member = mysqli_query($con, $sql_member);
      $row_member = mysqli_fetch_array($result_member);
      
      $sql_file = "SELECT * FROM upload_file WHERE fileID = '".$row_member['mb_1']."'";
      $result_file = mysqli_query($con, $sql_file);
      $row_file = mysqli_fetch_assoc($result_file);

      ?>
    <!-- //아래 -->
    <article class="nav_user">
      <h2 class="hidden">내비 유저정보</h2>
      <ul class="nav_box">
        <li>
          <img src="<?=(empty($row_member['mb_1']) == ''?"".$base_URL."upload/".$row_file['nameSave']."":"".$base_URL."images/userimg_mypage.png")?>" alt="userimg" class="profile_img">
        </li>
        <li>
          <p><?=$row_member['mb_name']."".(empty($row_member['mb_nick']) == ''?"(".$row_member['mb_nick'].")":"")?><span>님</span></p>
        </li>
      </ul>
      <ul class="nav_user_menu">
        <li>
          <a href="<?=$base_URL?>sub/member/logout.php">
            <img src="<?=$base_URL?>images/mypage_lock.png " alt="로그아웃">
            로그아웃
          </a>
        </li>
        <li>
          <a href="<?=$base_URL?>sub/mypage/mypage.php">
            <img src="<?=$base_URL?>images/icon_navi_member.svg" alt="마이페이지">
            마이페이지
          </a>
        </li>
      </ul>
    </article>
    <?php } ?>        
    <div id="m_sitemap">
      <input type="radio" name="m_sitemap" id="m_intro" class="hidden" checked>
      <input type="radio" name="m_sitemap" id="m_class" class="hidden">
      <input type="radio" name="m_sitemap" id="m_commu" class="hidden">
      <input type="radio" name="m_sitemap" id="m_service" class="hidden">
      <input type="radio" name="m_sitemap" id="m_event" class="hidden">
      <ul class="m_gnb">
        <li>
          <label for="m_intro">
            아카데미 소개
          </label>
        </li>
        <li>
          <label for="m_class">
            강의
          </label>
        </li>
        <li>
          <!-- a태그 범위 수정부탁드립니다 -민석 -->
          <label for="m_commu">
            <a href="<?=$base_URL?>sub/community/community.php" title="커뮤니티" class="m_community_link">
              커뮤니티
            </a>
          </label>
        </li>
        <li>
          <label for="m_service">
            고객센터
          </label>
        </li>
        <li>
          <label for="m_event">
            이벤트
          </label>
        </li>
      </ul>
      <div class="m_lnb_wrap">
        <div class="m_lnb m_intro hidden">
          <ul>
            <li>
              <a href="<?=$base_URL?>sub/info/info.php" title="아카데미소개">
                아카데미소개
              </a>
            </li>
            <li>
              <a href="#" title="기업출강">
                기업출강
              </a>
            </li>
            <li>
              <a href="#" title="강사진">
                강사진
              </a>
            </li>
          </ul>
        </div>
        <div class="m_lnb m_class hidden">
          <ul>
            <li>
              <a href="<?=$base_URL?>sub/academy/academy_list.php?cate=online" title="온라인 강의">
                온라인 강의
              </a>
            </li>
            <li>
              <a href="<?=$base_URL?>sub/academy/academy_list.php?cate=offline" title="오프라인 강의">
                오프라인 강의
              </a>
            </li>
            <li>
              <a href="<?=$base_URL?>sub/academy/academy_list.php?cate=curriculum" title="커리큘럼">
                커리큘럼
              </a>
            </li>
          </ul>
        </div>
        <div class="m_lnb m_service hidden">
          <ul>
            <li>
              <a href="<?=$base_URL?>sub/notice/notice.php"title="공지사항">
                공지사항
              </a>
            </li>
            <li>
              <a href="#none" title="자주하는 질문">
                자주하는 질문
              </a>
            </li>
            <li>
              <a href="<?=$base_URL?>sub/question/question.php"title="1:1문의">
                1:1문의
              </a>
            </li>
          </ul>
        </div>
        <div class="m_lnb m_event hidden">
          <ul>
            <li>
              <a href="#none" title="진행중인 이벤트">
                진행중인 이벤트
              </a>
            </li>
            <li>
              <a href="#none" title="마감된 이벤트">
                마감된 이벤트
              </a>
            </li>
            <li>
              <a href="#none" title="당첨자 발표">
                당첨자 발표
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <?php
    $seq = 2; // 0 ~ 4 순서로 검색, 내 강의실, 홈, 장바구니, 마이페이지
    switch($title) {
      case "검색":
        $seq = 0;
        break;
      case "캐논 아카데미":
        $seq = 2;
        break;
      case "장바구니":
        $seq = 3;
        break;
      case "마이페이지":
        $seq = 4;
        break;
    }
  ?>
  <nav class="bottom" style="--data-seq:<?=$seq?>;">
    <ul>
      <li>
        <a href="<?=$base_URL?>sub/search/search.php" title="검색하기" <?=$seq!=0?:"class=active"?>>
          <img src="<?=$base_URL?>images/nav_search<?=$seq!=0?"":"_active"?>.png" alt="search">
          <span>검색</span>
        </a>
      </li>
      <li>
        <a href="#academy" title="내 강의실" <?=$seq!=1?:"class=active"?>>
          <img src="<?=$base_URL?>images/nav_academy<?=$seq!=1?"":"_active"?>.png" alt="academy">
          <span>내강의실</span>
        </a>
      </li>
      <li>
        <a href="<?=$base_URL?>index.php" title="메인으로 돌아가기" <?=$seq!=2?:"class=active"?>>
          <img src="<?=$base_URL?>images/nav_home<?=$seq!=2?"":"_active"?>.png" alt="home">
          <span>홈</span>
        </a>
      </li>
      <li>
        <a href="<?=$base_URL?>sub/mypage/cart.php" title="장바구니" <?=$seq!=3?:"class=active"?>>
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