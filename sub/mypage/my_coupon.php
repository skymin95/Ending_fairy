<?php
$title = "마이페이지 > 쿠폰관리"; // 타이틀
include_once('../common.php');
?>
<article>
  <h2 class="sub_title_prev">
    <a href="<?=$base_URL?>sub/mypage/mypage.php" title="돌아가기">
      <img src="<?=$base_URL?>images/arrow_title_prev.svg" alt="prev">
      쿠폰함
    </a>
  </h2>
</article>
<section class="coupon_wrap">
  <h3 class="hidden">쿠폰관리</h3>
  <article class="coupon_add_wrap">
    <h4 class="hidden">쿠폰 등록하기</h3>
    <button type="button">쿠폰 등록하기</button>
  </article>
  <article class="coupon_list_wrap">
    <h3 class="hidden">쿠폰 목록</h3>
    <p>보유큐폰 <span class="emp">5</span>장</p>
    <ul>
      <li>
        <span class="d_day">D-7</span>
        <p class="coupon_cate">수강할인</p>
        <h5>[초특급 강의할인쿠폰]</h6>
        <p class="coupon_price">5,000원</p>
        <p class="coupon_edate">2023-04-19 까지 사용 가능</p>
      </li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </article>
</section>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>