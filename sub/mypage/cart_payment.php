<?php
$title = "장바구니 > 결제하기"; // 타이틀
include_once('../common.php');
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
  <form action="">
    <section class="payment_wrap">
      <h2 class="hidden">결제하기</h2>
      <article class="payment_course_info_wrap">
        <h3>결제강의</h3>
        <div class="course_info">
          <h3 class="hidden">강의 정보</h3>
          <img src="<?=$base_URL?>images/class6.png" alt="풍경 사진 첫걸음" class="course_image">
          <div class="course_title">
            <p>온라인 강의</p>
            <h4>풍경 사진 첫걸음</h4>
          </div>
          <dl>
            <dt>교육기간</dt>
            <dd>2023.05.01 ~ 2023.08.24</dd>
          </dl>
          <dl>
            <dt>남은 수강 기간</dt>
            <dd>73일</dd>
          </dl>
          <dl>
            <dt>교육시간</dt>
            <dd>87분</dd>
          </dl>
          <dl>
            <dt>강사</dt>
            <dd>강병영</dd>
          </dl>
        </div>
      </article>
      <article class="payment_price_wrap">
        <h3>결제금액</h3>
        <div>
          <h4>쿠폰</h4>
          <select name="coupon">
            <option value="">쿠폰선택</option>
            <option value="쿠폰1">쿠폰1</option>
            <option value="쿠폰2">쿠폰2</option>
            <option value="쿠폰3">쿠폰3</option>
          </select>
          <dl>
            <dt>선택상품 금액</dt>
            <dd>350,000원</dd>
          </dl>
          <dl>
            <dt>할인금액</dt>
            <dd>4,000원</dd>
          </dl>
          <dl>
            <dt>총 결제금액</dt>
            <dd>310,000원</dd>
          </dl>
        </div>
      </article>
      <article class="payment_user_wrap">
        <h3>결제자 정보</h3>
        <div>
          <ul>
            <li>이름: 김민석</li>
            <li>휴대전화: 01066559036</li>
            <li>E-mail: minseok9036@naver.com </li>
          </ul>
        </div>
      </article>
      <article class="payment_price_info_wrap">
        <h3>결제 정보</h3>
        <div>
          <dl class="payment_price">
            <dt>최종 결제 금액</dt>
            <dd>310,000 원</dd>
          </dl>
          <div class="payment_tool_wrap">
            <p>결제수단 선택</p>
            <ul>
              <li><input type="radio" name="payment_option" id="card" checked></li>
              <li><label for="card">신용카드</label></li>
              <li><input type="radio" name="payment_option" id="transfer"></li>
              <li><label for="transfer">계좌이체</label></li>
              <li><input type="radio" name="payment_option" id="deposit"></li>
              <li><label for="deposit">무통장입금</label></li>
            </ul>
            <p class="agree_text">상품 이용 및 환불 시 [이용안내],[환불규정],[혜택안내] 및 [이용약관]에 명시된 규정에 따릅니다.</p>
            <label for="agree">
              <input type="checkbox" name="agree" id="agree">
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