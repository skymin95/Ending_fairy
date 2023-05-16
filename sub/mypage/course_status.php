<?php
$title = "마이페이지 > 내 강의실"; // 타이틀
include_once('../common.php');
?>
<main>
  <article>
    <h2 class="sub_title_prev">
      <a href="<?=$base_URL?>sub/mypage/mypage.php" title="돌아가기">
        <img src="<?=$base_URL?>images/arrow_title_prev.svg" alt="prev">
        내 강의실
      </a>
    </h2>
  </article>
  <article class="list_tab">
    <h3 class="hidden">강의실 탭 메뉴</h3>
    <nav>
      <ul class="line_tab">
        <li>수강 중(5)</li>
        <li>신청&middot;대기(2)</li>
        <li>수강완료(3)</li>
      </ul>
      <span class="tab_on"></span>
    </nav>
    <div class="tab_con">
      <p>수강중인 강의 <span class="emp">5</span>개</p>
      <ul>
        <li>
          <p>온라인 강의</p>
          <h4>풍경 사진 첫걸음</h4>
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
            <dd>45분</dd>
          </dl>
          <a href="<?=$base_URL?>sub/mypage/course_view.php">수강하기</a>
          <div class="progress-bar" data-color="#D9D9D9,#DE0010" data-percent="85" data-text="수강율">
            <div class="wrap-sub">
              <div class="left-sub"></div>
              <div class="right-sub"></div>
            </div>
          </div>
        </li>
        <li>
          <p>온라인 강의</p>
          <h4>풍경 사진 첫걸음</h4>
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
            <dd>45분</dd>
          </dl>
          <a href="<?=$base_URL?>sub/mypage/course_view.php">수강하기</a>
          <div class="progress-bar" data-color="#D9D9D9,#DE0010" data-percent="5" data-text="수강율">
            <div class="wrap-sub">
              <div class="left-sub"></div>
              <div class="right-sub"></div>
            </div>
          </div>
        </li>
        <li>
          <p>온라인 강의</p>
          <h4>풍경 사진 첫걸음</h4>
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
            <dd>45분</dd>
          </dl>
          <a href="<?=$base_URL?>sub/mypage/course_view.php">수강하기</a>
          <div class="progress-bar" data-color="#D9D9D9,#DE0010" data-percent="65" data-text="수강율">
            <div class="wrap-sub">
              <div class="left-sub"></div>
              <div class="right-sub"></div>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="tab_con">
      <p>신청&middot;대기중인 강의 <span class="emp">2</span>개</p>
      <ul>
        <li>
          <p>온라인 강의</p>
          <h4>풍경 사진 첫걸음</h4>
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
            <dd>45분</dd>
          </dl>
          <a href="<?=$base_URL?>sub/mypage/course_view.php">수강하기</a>
          <div class="progress-bar" data-color="#D9D9D9,#DE0010" data-percent="85" data-text="수강율">
            <div class="wrap-sub">
              <div class="left-sub"></div>
              <div class="right-sub"></div>
            </div>
          </div>
        </li>
        <li>
          <p>온라인 강의</p>
          <h4>풍경 사진 첫걸음</h4>
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
            <dd>45분</dd>
          </dl>
          <a href="<?=$base_URL?>sub/mypage/course_view.php">수강하기</a>
          <div class="progress-bar" data-color="#D9D9D9,#DE0010" data-percent="5" data-text="수강율">
            <div class="wrap-sub">
              <div class="left-sub"></div>
              <div class="right-sub"></div>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="tab_con">
      <p>수강완료 강의 <span class="emp">3</span>개</p>
      <ul>
        <li>
          <p>오프라인 강의</p>
          <h4>풍경 사진 첫걸음</h4>
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
            <dd>45분</dd>
          </dl>
          <a href="<?=$base_URL?>sub/mypage/course_view.php">수강하기</a>
          <div class="progress-bar" data-color="#D9D9D9,#DE0010" data-percent="D-8">
            <div class="wrap-sub">
              <div class="left-sub"></div>
              <div class="right-sub"></div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  
  </article>
</main>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>