<?php
$title = "캐논 아카데미"; // 타이틀
include_once('./common.php');
empty($_SESSION['mb_id']) || $mb_id = $_SESSION['mb_id']."님 환영합니다.";

?>
<main>
  <!-- 상단 슬라이드 -->
  <article id="m_slide" class="swiper">
    <h2>메인 슬라이드</h2>
    <ul class="swiper-wrapper">
      <li class="swiper-slide">
        <a href="" title="">
          <span><small>한폭의 그림같은 풍경 담기</small><br>풍경 사진 첫걸음</span>
          <img src="./images/main_banner01.jpg" alt="">
        </a>
      </li>
      <li class="swiper-slide">
        <a href="" title="">
          <span><small>한폭의 그림같은 풍경 담기2</small><br>풍경 사진 첫걸음2</span>
          <img src="./images/main_banner02.jpg" alt="">
        </a>
      </li>
      <li class="swiper-slide">
        <a href="" title="">
          <span><small>한폭의 그림같은 풍경 담기3</small><br>풍경 사진 첫걸음3</span>
          <img src="./images/main_banner03.jpg" alt="">
        </a>
      </li>
    </ul>
    <div class="swiper-pagination"></div>
    <i class="fas fa-pause btn_pause"></i>
  </article>
  <!-- 상단 슬라이드 끝 -->


  <!-- my 영역 -->
  <article id="m_my">
    <h3>지금, 로그인하세요.</h3>
    <div>
      <a href="./sub/member/login.php" title="로그인페이지로 이동">로그인</a>
      <a href="#none" title="아이디/비번 찾기">아이디/비번 찾기</a>
    </div>
  </article>
  <!-- my 영역 끝 -->


  <!-- 강의 영역 -->
  <article id="m_academy">
    <h2>강의탭</h2>
    <ul class="line_tab">
      <li><a href="" title="온라인 강의">온라인 강의</a></li>
      <li><a href="" title="오프라인 강의">오프라인 강의</a></li>
    </ul>
    <span class="tab_on"></span>

    <!-- 온라인 영역 -->
    <div class="tab_con online">
      <label for="on_b" class="on">입문자용 인기강좌</label>
      <label for="on_e">전문가용 인기강좌</label>

      <!-- 입문자용 -->
      <input type="radio" id="on_b" name="tab" checked>
      <div class="con_list beginner swiper">
        <ul class="swiper-wrapper">
        <?php
          $sql = "select * from course where course_cate = '온라인' and course_tag LIKE '%입문자%' order by course_id desc;";
          $result = mysqli_query($con, $sql);
          function getYoutubeThumb($url) {
            if($url)  {
              preg_match_all('/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/', $url, $matchs);
              return "https://img.youtube.com/vi/" .$matchs[7][0]."/mqdefault.jpg";
            }
          }
          while($data = mysqli_fetch_array($result)){
            $sdate = date_format(date_create($data['course_edu_sdate']), "Y-m-d");
            $edate = date_format(date_create($data['course_edu_edate']), "Y-m-d");
            $date_dif = abs(strtotime($sdate)-strtotime($edate));
            $eday = ceil($date_dif / (60*60*24));
          ?>
          <li class="swiper-slide">
            <a href="" title="<?=$data['course_title']?>">
              <img src="<?=empty($data['course_img']) ? getYoutubeThumb($data['course_link']) : "../images/".$data['course_img']?>" alt="<?=$data['course_title']?>">
              <p><?=$data['course_title']?></p>
              <p><?=$data['course_content']?></p>
              <div class="tab_tag">
                <span><?=str_replace(",", "</span><span>", $data['course_tag'])?></span>
              </div>
              <p>교육기간 : <?=$eday?>일</p>
              <p>교육시간 : <?=$data['course_edu_time']?></p>
              <p>교육비 : <?=number_format($data['course_price'])?>원</p>
            </a>
          </li>
          <?php } ?>
        </ul>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div><!-- 입문자용 -->
      
      <!-- 전문가용 -->
      <input type="radio" id="on_e" name="tab">
      <div class="con_list expert swiper">
        <ul class="swiper-wrapper">
        <?php
          $sql_expert = "select * from course where course_cate = '온라인' and course_tag LIKE '%전문가%' order by course_id desc;";
          $result_expert = mysqli_query($con, $sql_expert);

          while($data = mysqli_fetch_array($result_expert)){
            $sdate = date_format(date_create($data['course_edu_sdate']), "Y-m-d");
            $edate = date_format(date_create($data['course_edu_edate']), "Y-m-d");
            $date_dif = abs(strtotime($sdate)-strtotime($edate));
            $eday = ceil($date_dif / (60*60*24));
          ?>
          <li class="swiper-slide">
            <a href="" title="<?=$data['course_title']?>">
              <img src="<?=empty($data['course_img']) ? getYoutubeThumb($data['course_link']) : "../images/".$data['course_img']?>" alt="<?=$data['course_title']?>">
              <p><?=$data['course_title']?></p>
              <p><?=$data['course_content']?></p>
              <div class="tab_tag">
                <span><?=str_replace(",", "</span><span>", $data['course_tag'])?></span>
              </div>
              <p>교육기간 : <?=$eday?>일</p>
              <p>교육시간 : <?=$data['course_edu_time']?></p>
              <p>교육비 : <?=number_format($data['course_price'])?>원</p>
            </a>
          </li>
          <?php } ?>
        </ul>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div><!-- 전문가용 -->
    </div>
    <!-- 온라인 영역 끝 -->

    <!-- 오프라인 영역 -->
    <div class="tab_con offline">
      <label for="off_b" class="on">입문자용 인기강좌</label>
      <label for="off_e">전문가용 인기강좌</label>

      <!-- 입문자용 -->
      <input type="radio" id="off_b" name="tab2" checked>
      <div class="con_list beginner swiper">
        <ul class="swiper-wrapper">
        <?php
          $sql = "select * from course where course_cate = '오프라인' and course_tag LIKE '%입문자%' order by course_id desc;";
          $result = mysqli_query($con, $sql);
          while($data = mysqli_fetch_array($result)){
            $sdate = date_format(date_create($data['course_edu_sdate']), "Y-m-d");
            $edate = date_format(date_create($data['course_edu_edate']), "Y-m-d");
            $date_dif = abs(strtotime($sdate)-strtotime($edate));
            $eday = ceil($date_dif / (60*60*24));
          ?>
          <li class="swiper-slide">
            <a href="" title="<?=$data['course_title']?>">
              <img src="<?=empty($data['course_img']) ? getYoutubeThumb($data['course_link']) : "../images/".$data['course_img']?>" alt="<?=$data['course_title']?>">
              <p><?=$data['course_title']?></p>
              <p><?=$data['course_content']?></p>
              <div class="tab_tag">
                <span><?=str_replace(",", "</span><span>", $data['course_tag'])?></span>
              </div>
              <p>교육기간 <?=$eday?>일</p>
              <p>교육시간 <?=$data['course_edu_time']?></p>
              <p>교육비 <?=number_format($data['course_price'])?>원</p>
            </a>
          </li>
          <?php } ?>
        </ul>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div><!-- 입문자용 -->
      
      <!-- 전문가용 -->
      <input type="radio" id="off_e" name="tab2">
      <div class="con_list expert swiper">
        <ul class="swiper-wrapper">
        <?php
          $sql_expert = "select * from course where course_cate = '오프라인' and course_tag LIKE '%전문가%' order by course_id desc;";
          $result_expert = mysqli_query($con, $sql_expert);

          while($data = mysqli_fetch_array($result_expert)){
            $sdate = date_format(date_create($data['course_edu_sdate']), "Y-m-d");
            $edate = date_format(date_create($data['course_edu_edate']), "Y-m-d");
            $date_dif = abs(strtotime($sdate)-strtotime($edate));
            $eday = ceil($date_dif / (60*60*24));
          ?>
          <li class="swiper-slide">
            <a href="" title="<?=$data['course_title']?>">
              <img src="<?=empty($data['course_img']) ? getYoutubeThumb($data['course_link']) : "../images/".$data['course_img']?>" alt="<?=$data['course_title']?>">
              <p><?=$data['course_title']?></p>
              <p><?=$data['course_content']?></p>
              <div class="tab_tag">
                <span><?=str_replace(",", "</span><span>", $data['course_tag'])?></span>
              </div>
              <p>교육기간 : <?=$eday?>일</p>
              <p>교육시간 : <?=$data['course_edu_time']?></p>
              <p>교육비 : <?=number_format($data['course_price'])?>원</p>
            </a>
          </li>
          <?php } ?>
        </ul>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div><!-- 전문가용 -->
    </div>
    <!-- 오프라인 영역 끝 -->
  </article>
  <!-- 강의 영역 끝 -->


  <!-- 수걍평 영역 -->
  <article id="reveiw" class="swiper">
    <h2>BEST 수강평</h2>
    <ul class="swiper-wrapper">
      <?php
        $sql = "select * from course_review where review_star = '5'";
        $result = mysqli_query($con, $sql);
        while($data = mysqli_fetch_array($result)){
          $sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_no = '".$data['mb_no']."'";
          $result_member = mysqli_query($con, $sql_member);
          $row_member = mysqli_fetch_array($result_member);

          $sql_course = "SELECT course_title, course_cate FROM course WHERE course_id = '".$data['course_id']."'";
          $result_course = mysqli_query($con, $sql_course);
          $row_course = mysqli_fetch_array($result_course);

          $name = preg_replace('/(.{1})(.*?)$/u', '$1**', $row_member['mb_name']);
        ?>
      <li class="swiper-slide">
        <a href="./sub/academy_view.php?<?=$data['course_id']?>" title="">
          <p><?=$name?></p>
          <div class="star"><?=$data['review_star']?></div>
          <p>[<?=$row_course['course_cate']?>] <?=$row_course['course_title']?></p>
          <p><?=$data['review_title']?></p>
        </a>
      </li>
      <?php } ?>
    </ul>
    <div class="swiper-pagination"></div>
  </article>
  <!-- 수걍평 영역 끝 -->


  <!-- 이벤트 영역 -->
  <article id="event">
    <h2>EVENT</h2>
    <p>캐논아카데미의 다양한 이벤트를 만나보세요.</p>
    <div>
      <a href="" title="">
        <img src="./images/event01.jpg" alt="">
      </a>
    </div>
    <div>
      <a href="" title="">
        <img src="./images/event02.jpg" alt="">
      </a>
    </div>
    <a href="./sub/evet/event.php" title="더보기">더보기<i class="fas fa-play"></i></a>
  </article>
  <!-- 이벤트 영역 끝 -->


  <!-- 게시판 영역  -->
  <article id="board">
    <h2>게시판 영역</h2>
    <ul class="line_tab">
      <li><a href="#none" title="공지사항">공지사항</a></li>
      <li><a href="#none" title="자주하는 질문">자주하는 질문</a></li>
    </ul>
    <span class="tab_on"></span>

    <ul class="board_con">
      <?php
      $sql_board = "select * from board_notice order by notice_id desc;";
      $result_board = mysqli_query($con, $sql_board);
      // 데이터 출력
      while($data = mysqli_fetch_array($result_board)){
        $sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_no = '".$data['mb_no']."'";
        $result_member = mysqli_query($con, $sql_member);
        $row_member = mysqli_fetch_array($result_member);
      ?>
      <li>
        <a href="" title="">
          <p><?=$data['notice_title']?></p>
          <span><?= ($row_member['mb_nick'] == '' ? $row_member['mb_name'] : $row_member['mb_nick'])?> /</span>
          <span><?=date_format(date_create($data['notice_wdate']), "Y-m-d")?></span>
        </a>
      </li>
      <?php } ?>
    </ul>
    <a href="./sub/notice/notice.php" title="더보기">더보기<i class="fas fa-play"></i></a>
  </article>
  <!-- 게시판 영역 끝  -->

  
  <!-- 사이드 버튼 영역 -->
  <aside id="side_btn">
    <a href="" title="">
      <i class="fas fa-headphones"></i>
      실시간 상담
    </a>
    <button type="button" class="t_btn">
      <i class="fas fa-arrow-up"></i>
    </button>
  </aside>
  <!-- 사이드 버튼 끝 -->
</main>
<?php
include_once('./footer.php');
?>