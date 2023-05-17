<?php
$title = "마이페이지 > 쿠폰관리"; // 타이틀
include_once('../common.php');
?>
<main>
  <dialog id="couponModal">
    <div id="modal_close_btn">
      <span></span>
      <span></span>
    </div>
    <form action="coupon_insert.php" method="post">
      <h4>쿠폰 등록</h4>
      <input type="text" name="coupon_code" id="coupon_code" placeholder="쿠폰코드를 입력해주세요.">
      <button type="submit" disabled>등록하기</button>
      <ul>
        <li>유효기간이 지난 쿠폰은 등록이 불가합니다.</li>
        <li>쿠폰 등록 내역은 ‘쿠폰함’에서 확인할 수 있습니다.</li>
        <li>이미 쿠폰의 아이템을 보유 시 쿠폰이 등록되지 않습니다.</li>
      </ul>
    </form>
  </dialog>
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
      <button type="button" id="coupon_add">쿠폰 등록하기</button>
    </article>
    <article class="coupon_list_wrap">
      <h3 class="hidden">쿠폰 목록</h3>
      <?php
      $sql_coupon = "SELECT * FROM coupon_status WHERE mb_no = ".$row_member['mb_no']." AND coupon_status = 0";
      $result_coupon = mysqli_query($con, $sql_coupon);
      ?>
      <p>보유큐폰 <span class="emp"><?=mysqli_num_rows($result_coupon)?></span>장</p>
      <ul>
        <?php
        while($row_coupon = mysqli_fetch_assoc($result_coupon)){
          $sql_coupon_list = "SELECT * FROM coupon_list WHERE coupon_no = ".$row_coupon['coupon_no'];
          $result_coupon_list = mysqli_query($con, $sql_coupon_list);
          $row_coupon_list = mysqli_fetch_assoc($result_coupon_list);
          //날짜 비교
          $from = new DateTime(date('Y-m-d H:i:s'));
          $to = new DateTime(date('Y-m-d', strtotime('+'.$row_coupon_list['coupon_cdate'].' days', strtotime($row_coupon['coupon_wdate']))));
          $days = date_diff($from, $to) -> days;
        ?>
        <li>
          <span class="d_day">D-<?=$days?></span>
          <p class="coupon_cate"><?=$row_coupon_list['coupon_kind']?></p>
          <h5>[<?=$row_coupon_list['coupon_title']?>]</h6>
          <p class="coupon_price"><?=$row_coupon_list['coupon_sale']?></p>
          <p class="coupon_edate"><?=date('Y-m-d', strtotime('+'.$row_coupon_list['coupon_cdate'].' days', strtotime($row_coupon['coupon_wdate'])))?> 까지 사용 가능</p>
        </li>
        <?php } ?>
      </ul>
    </article>
  </section>
</main>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>