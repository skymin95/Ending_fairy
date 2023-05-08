<?php
$title = "마이페이지"; // 타이틀
include_once('../common.php');
empty($_SESSION['mb_id']) || $mb_id = $_SESSION['mb_id']."님 환영합니다.";
?>
<main>
  <article class="info_user">
    <h2 class="hidden">유저정보</h2>
    <ul class="box_profile">
      <li>
        <img src="<?=$base_URL?>images/userimg_mypage.png" alt="userimg" class="profile_img">
      </li>
      <li>
        <p><span class="emp">유진영(뇽뇽)</span>님,</p>
        <p>반갑습니다!</p>
      </li>
    </ul>
    <ul class="user_menu">
      <li>
        <a href="#none">
          <img src="<?=$base_URL?>images/mypage_edit.png" alt="회원정보수정">
          회원정보수정
        </a>
      </li>
      <li>
        <a href="#none">
          <img src="<?=$base_URL?>images/mypage_lock.png" alt="로그아웃">
          로그아웃
        </a>
      </li>
    </ul>
    <ul class="user_status">
      <li>
        <a href="#none" title="내 강의실">
          <span>내 강의실</span>
          <strong>5</strong>
        </a>
      </li>
      <li>
        <a href="#none" title="장바구니">
          <span>장바구니</span>
          <strong>5</strong>
        </a>
      </li>
      <li>
        <a href="#none" title="쿠폰">
          <span>쿠폰</span>
          <strong>5</strong>
        </a>
      </li>
    </ul>
  </article>
  <article class="list_menu">
    <h2 class="hidden">메뉴리스트</h2>
    <nav>
      <ul>
        <li>
          <a href="#none" title="1:1 문의하기">
            <img src="<?=$base_URL?>images/mypage_answer.png" alt="1:1 문의하기">
            1:1 문의하기</a>
        </li>
        <li>
          <a href="#none" title="나의 수강후기">
            <img src="<?=$base_URL?>images/mypage_review.png" alt="나의 수강후기">
            나의 수강후기</a>
        </li>
        <li>
          <a href="#none" title="나의 활동">
            <img src="<?=$base_URL?>images/mypage_work.png" alt="나의 활동">
            나의 활동</a>
        </li>
        <li>
          <a href="#none" title="공지사항">
            <img src="<?=$base_URL?>images/mypage_notice.png" alt="공지사항">
            공지사항</a>
        </li>
        <li>
          <a href="#none" title="고객센터">
            <img src="<?=$base_URL?>images/mypage_center.png" alt="고객센터">
            고객센터</a>
        </li>
        <li>
          <a href="#none" title="알림설정">
            <img src="<?=$base_URL?>images/mypage_alert.png" alt="알림설정">
            알림설정</a>
        </li>
      </ul>
    </nav>
  </article>
</main>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>