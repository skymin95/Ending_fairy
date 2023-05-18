<?php
$title = "장바구니 > 결제하기"; // 타이틀
include_once('../common.php');

function getYoutubeThumb($url) {
  if($url) {
    preg_match_all('/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/', $url, $matchs);
    return "https://img.youtube.com/vi/" .$matchs[7][0]."/mqdefault.jpg";
  }
}

$total_price = 0; //총 가격
?>
<main>
  <article>
    <h2 class="sub_title_prev">
      <a href="<?=$base_URL?>sub/mypage/cart.php" title="돌아가기">
        <img src="<?=$base_URL?>images/arrow_title_prev.svg" alt="prev">
        결제하기
      </a>
    </h2>
  </article>
  <form action="cart_payment_action.php" method="post">
    <section class="payment_wrap">
      <h2 class="hidden">결제하기</h2>
      <article class="payment_course_info_wrap">
        <h3>결제강의</h3>
        <?php
          for ($i = 0; $i < count($_POST['checked_list']); $i++) {
            $sql_cart = "SELECT * FROM cart WHERE cart_id = ".$_POST['checked_list'][$i]." AND mb_no = ".$row_member['mb_no'];
            $result_cart = mysqli_query($con, $sql_cart);
            $row_cart = mysqli_fetch_assoc($result_cart);

            $sql_course = "SELECT * FROM course WHERE course_id = ".$row_cart['course_id'];
            $result_course = mysqli_query($con, $sql_course);
            $row_course = mysqli_fetch_assoc($result_course);
            
            $sdate = date_format(date_create($row_course['course_edu_sdate']), "Y-m-d");
            $edate = date_format(date_create($row_course['course_edu_edate']), "Y-m-d");
            $date_dif = abs(strtotime($sdate)-strtotime($edate));
            $eday = ceil($date_dif / (60*60*24)+1);

            $total_price += $row_course['course_price'];
        ?>
        <div class="course_info">
          <input type="hidden" name="course_id[]" value="<?=$row_cart['course_id']?>">
          <h3 class="hidden">강의 정보</h3>
          <img src="<?=empty($row_course['course_img']) ? getYoutubeThumb($row_course['course_link']) : "../images/".$row_course['course_img']?>" alt="<?=$row_course['course_title']?>" class="course_image">
          <div class="course_title">
            <p><?=$row_course['course_cate']?> 강의</p>
            <h4><?=$row_course['course_title']?></h4>
          </div>
          <dl>
            <dt>교육기간</dt>
            <dd><?=$sdate?> ~ <?=$edate?></dd>
          </dl>
          <dl>
            <dt>남은 수강 기간</dt>
            <dd><?=$eday?>일</dd>
          </dl>
          <dl>
            <dt>교육시간</dt>
            <dd><?=$row_course['course_edu_time']?></dd>
          </dl>
          <dl>
            <dt>강사</dt>
            <dd><?=$row_course['course_teacher']?></dd>
          </dl>
        </div>
        <?php } ?>
      </article>
      <article class="payment_price_wrap">
        <h3>결제금액</h3>
        <div>
          <?php
          $sql_coupon = "SELECT * FROM coupon_status WHERE coupon_status = 0 AND mb_no =".$row_member['mb_no'];
          $result_coupon = mysqli_query($con, $sql_coupon);
          ?>
          <h4>쿠폰</h4>
          <select name="coupon" id="couponSelect">
            <option value="">쿠폰선택</option>
            <?php
            while($row_coupon = mysqli_fetch_assoc($result_coupon)) {
              $sql_coupon_list = "SELECT * FROM coupon_list WHERE coupon_no =".$row_coupon['coupon_no'];
              $result_coupon_list = mysqli_query($con, $sql_coupon_list);
              $row_coupon_list = mysqli_fetch_assoc($result_coupon_list);
            ?>
            <option value="<?=$row_coupon['coupon_no']?>" data-sale="<?=$row_coupon_list['coupon_sale']?>"><?=$row_coupon_list['coupon_title']?></option>
            <?php
            }
            ?>
          </select>
          <dl>
            <dt>선택상품 금액</dt>
            <dd class="origin_price"><?=number_format($total_price)?>원</dd>
          </dl>
          <dl>
            <dt>할인금액</dt>
            <dd class="sale_price">0원</dd>
          </dl>
          <dl>
            <dt>총 결제금액</dt>
            <dd class="total_price"><?=number_format($total_price)?>원</dd>
          </dl>
        </div>
      </article>
      <article class="payment_user_wrap">
        <h3>결제자 정보</h3>
        <div>
          <ul>
            <li>이름: <?=$row_member['mb_name']?></li>
            <li>휴대전화: <?=$row_member['mb_tel']?></li>
            <li>E-mail: <?=$row_member['mb_email']?> </li>
          </ul>
        </div>
      </article>
      <article class="payment_price_info_wrap">
        <h3>결제 정보</h3>
        <div>
          <input type="hidden" name="payment_price" id="payment_price_input" value="<?=$total_price?>">
          <dl class="payment_price">
            <dt>최종 결제 금액</dt>
            <dd id="payment_price"><?=number_format($total_price)?>원</dd>
          </dl>
          <div class="payment_tool_wrap">
            <p>결제수단 선택</p>
            <ul>
              <li><input type="radio" name="payment_option" id="card" checked value="card"></li>
              <li><label for="card">신용카드</label></li>
              <li><input type="radio" name="payment_option" id="transfer" value="transfer"></li>
              <li><label for="transfer">계좌이체</label></li>
              <li><input type="radio" name="payment_option" id="deposit" value="deposit"></li>
              <li><label for="deposit">무통장입금</label></li>
            </ul>
            <p class="agree_text">상품 이용 및 환불 시 [이용안내],[환불규정],[혜택안내] 및 [이용약관]에 명시된 규정에 따릅니다.</p>
            <label for="agree">
              <input type="checkbox" name="agree" id="agree" required>
              동의합니다.
            </label>
            <p class="payment_btns">
              <button type="button">취소하기</button>
              <button type="submit">결제하기</button>
            </p>
          </div>
        </div>
      </article>
    </section>
  </form>
</main>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>