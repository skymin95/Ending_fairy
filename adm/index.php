<?php
include_once('./common.php');
?>
<main class="home">
  <input type="checkbox" id="calenderChk" checked>
  <article class="calender">
    <h3>강의 스케줄 관리</h3>
    <ul class="cal_nav">
      <a href="#none" class="nav-btn go-prev" title="방향">
        <img src="<?=$base_URL?>images/cal_arrow.svg" alt="arrow">
      </a>
      <li class="now_year">
        <span>2023년</span>
      </li>
      <div class="year-month">
        <li>
          <a href="#none" title="1">1</a>
        </li>
        <li>
          <a href="#none" title="2">2</a>
        </li>
        <li>
          <a href="#none" title="3">3</a>
        </li>
        <li>
          <a href="#none" title="4">4</a>
        </li>
        <li>
          <a href="#none" title="5">5</a>
        </li>
        <li>
          <a href="#none" title="6">6</a>
        </li>
        <li>
          <a href="#none" title="7">7</a>
        </li>
        <li>
          <a href="#none" title="8">8</a>
        </li>
        <li>
          <a href="#none" title="9">9</a>
        </li>
        <li>
          <a href="#none" title="10">10</a>
        </li>
        <li>
          <a href="#none" title="11">11</a>
        </li>
        <li>
          <a href="#none" title="12">12</a>
        </li>
      </div>
      <a href="#none" class="nav-btn go-next" title="방향">
        <img src="<?=$base_URL?>images/cal_arrow.svg" alt="arrow">
      </a>
    </ul>
    <div class="sec_cal">
      <div class="cal_wrap">
        <div class="days">
          <div class="day">일</div>
          <div class="day">월</div>
          <div class="day">화</div>
          <div class="day">수</div>
          <div class="day">목</div>
          <div class="day">금</div>
          <div class="day">토</div>
        </div>
        <div class="dates"></div>
      </div>
    </div>
  </article>
</main>
<?php
include_once('./footer.php');
?>