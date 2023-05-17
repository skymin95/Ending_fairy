<?php
$title = "마이페이지 > 수강중인 강의"; // 타이틀
include_once('../common.php');
?>
<article>
  <h2 class="sub_title_prev">
    <a href="<?=$base_URL?>sub/mypage/course_status.php" title="돌아가기">
      <img src="<?=$base_URL?>images/arrow_title_prev.svg" alt="prev">
      수강중인 강의
    </a>
  </h2>
</article>
<section class="course_wrap">
  <h3 class="hidden">강의 정보</h3>
  <article class="course_info">
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
    <div class="btn_list">
      <button type="button">처음부터 학습하기</button>
      <button type="button">이어서 학습하기</button>
    </div>
  </article>
  <article class="course_status">
    <h3>나의 수강 현황</h3>
    <div class="progress-bar" data-color="#D9D9D9,#DE0010" data-percent="85">
      <div class="wrap-sub">
        <div class="left-sub"></div>
        <div class="right-sub"></div>
      </div>
    </div>
    <p><span class="emp">8차시</span> / 9차시</p>
  </article>
  <article class="course_list">
    <h3>강의 목록</h3>
    <ul>
      <li>
        <h5>chapter 1. 풍경사진 첫걸음 Intro</h5>
        <ul>
          <li>1차시 <span class="emp">풍경사진 첫걸음 Intro</span></li>
          <li class="status_data_wrap">
            <dl>
              <dt>수강율</dt>
              <dd class="status">
                <span class="status_percent">50%</span>
                <div id="lineBox1" class="line_box" data-percent="50"></div>
              </dd>
            </dl>
            <dl>
              <dt>학습시간</dt>
              <dd>31분 / 35분 (최근 학습일 00.00.00)</dd>
            </dl>
          </li>
          <li>
            <a href="#none" title="수강하기">수강하기</a>
          </li>
        </ul>
      </li>
      <li>
        <h5>chapter 2. 카메라 바로 알기</h5>
        <ul>
          <li>2차시 <span class="emp">카메라 바로 알기</span></li>
          <li class="status_data_wrap">
            <dl>
              <dt>수강율</dt>
              <dd class="status">
                <span class="status_percent">60%</span>
                <div id="lineBox2" class="line_box" data-percent="60"></div>
              </dd>
            </dl>
            <dl>
              <dt>학습시간</dt>
              <dd>31분 / 35분 (최근 학습일 00.00.00)</dd>
            </dl>
          </li>
          <li>
            <a href="#none" title="수강하기">수강하기</a>
          </li>
        </ul>
        <ul>
          <li>3차시 <span class="emp">렌즈의 이해</span></li>
          <li class="status_data_wrap">
            <dl>
              <dt>수강율</dt>
              <dd class="status">
                <span class="status_percent">80%</span>
                <div id="lineBox3" class="line_box" data-percent="80"></div>
              </dd>
            </dl>
            <dl>
              <dt>학습시간</dt>
              <dd>31분 / 35분 (최근 학습일 00.00.00)</dd>
            </dl>
          </li>
          <li>
            <a href="#none" title="수강하기">수강하기</a>
          </li>
        </ul>
      </li>
    </ul>
  </article>
</section>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>