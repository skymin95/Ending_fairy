<?php
$title = "마이페이지"; // 타이틀
include_once('../common.php');
empty($_SESSION['mb_id']) || $mb_id = $_SESSION['mb_id']."님 환영합니다.";

if(isset($_SESSION['mb_id'])){
  $mb_id = $_SESSION['mb_id'];

  $sql_member = "SELECT * FROM member WHERE mb_id = '".$_SESSION['mb_id']."' ";
  $result_member = mysqli_query($con, $sql_member);
  $row_member = mysqli_fetch_array($result_member);

  $sql_file = "SELECT * FROM upload_file WHERE fileID = '".$row_member['mb_1']."'";
  $result_file = mysqli_query($con, $sql_file);
  $row_file = mysqli_fetch_assoc($result_file);
} else {
  echo '<script>
    alert("로그인 후 이용하실 수 있습니다.");
    location.href = "'.$base_URL.'";
  </script>';
}
?>
<main>
  <article class="info_user">
    <h2 class="hidden">유저정보</h2>
    <ul class="box_profile">
      <li>
        <img src="<?=(empty($row_member['mb_1']) == ''?"".$base_URL."upload/".$row_file['nameSave']."":"".$base_URL."images/userimg_mypage.png")?>" alt="userimg" class="profile_img">
      </li>
      <li>
        <p><span class="emp"><?=$row_member['mb_name']."".(empty($row_member['mb_nick']) == ''?"(".$row_member['mb_nick'].")":"")?></span>님,</p>
        <p>반갑습니다!</p>
      </li>
    </ul>
    <ul class="user_menu">
      <li>
        <a href="<?=$base_URL?>sub/mypage/update_member.php">
          <img src="<?=$base_URL?>images/mypage_edit.png" alt="회원정보수정">
          회원정보수정
        </a>
      </li>
      <li>
        <a href="<?=$base_URL?>sub/member/logout.php">
          <img src="<?=$base_URL?>images/mypage_lock.png" alt="로그아웃">
          로그아웃
        </a>
      </li>
    </ul>
    <ul class="user_status">
      <li>
        <?php
        //내 강의실
        $sql_status_cnt = "SELECT COUNT(*) AS cnt FROM course_status WHERE mb_no = ".$row_member['mb_no'];
        $result_status_cnt = mysqli_query($con, $sql_status_cnt);
        $row_status_cnt = mysqli_fetch_assoc($result_status_cnt);
        ?>
        <a href="<?=$base_URL?>sub/mypage/course_status.php" title="내 강의실">
          <span>내 강의실</span>
          <strong><?=$row_status_cnt['cnt']?></strong>
        </a>
      </li>
      <li>
        <?php
        //장바구니
        $sql_cart_cnt = "SELECT COUNT(*) AS cnt FROM cart WHERE mb_no = ".$row_member['mb_no'];
        $result_cart_cnt = mysqli_query($con, $sql_cart_cnt);
        $row_cart_cnt = mysqli_fetch_assoc($result_cart_cnt);
        ?>
        <a href="<?=$base_URL?>sub/mypage/cart.php" title="장바구니">
          <span>장바구니</span>
          <strong><?=$row_cart_cnt['cnt']?></strong>
        </a>
      </li>
      <li>
        <?php
        //쿠폰
        $sql_coupon_cnt = "SELECT COUNT(*) AS cnt FROM coupon_status WHERE mb_no = ".$row_member['mb_no'];
        $result_coupon_cnt = mysqli_query($con, $sql_coupon_cnt);
        $row_coupon_cnt = mysqli_fetch_assoc($result_coupon_cnt);
        ?>
        <a href="<?=$base_URL?>sub/mypage/my_coupon.php" title="쿠폰">
          <span>쿠폰</span>
          <strong><?=$row_coupon_cnt['cnt']?></strong>
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