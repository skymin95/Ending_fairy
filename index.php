<?php
$title = "캐논 아카데미"; // 타이틀
include_once('./common.php');
?>
<main>
  <!-- 상단 슬라이드 -->
  <article id="m_slide" class="swiper">
    <h2>메인 슬라이드</h2>
    <ul class="swiper-wrapper">
      <li class="swiper-slide">
        <a href="#none" title="">
          <span><small>한폭의 그림같은 풍경 담기</small><br>풍경 사진 첫걸음</span>
          <img src="./images/main_banner01.jpg" alt="">
        </a>
      </li>
      <li class="swiper-slide">
        <a href="#none" title="">
          <span><small>하루 한 컷으로 만드는 특별한 일상</small><br>매일 사진 한장</span>
          <img src="./images/main_banner02.jpg" alt="">
        </a>
      </li>
      <li class="swiper-slide">
        <a href="#none" title="">
          <span><small>화려한 조명이 나를 감싸네</small><br>도심 랜드마크 촬영 노하우</span>
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
    <?php
      if(isset($_SESSION['mb_id'])){
        $mb_id = $_SESSION['mb_id'];

        $sql_member = "SELECT * FROM member WHERE mb_id = '".$_SESSION['mb_id']."' ";
        $result_member = mysqli_query($con, $sql_member);
        $row_member = mysqli_fetch_array($result_member);

        $sql_file = "SELECT * FROM upload_file WHERE fileID = '".$row_member['mb_1']."'";
        $result_file = mysqli_query($con, $sql_file);
        $row_file = mysqli_fetch_assoc($result_file);

        if($row_member['mb_level'] < 9 || empty($row_member['mb_level'])){ // 일반회원
          echo "
          <div class='member'>
            <p>
              개인회원
              <a href='".$base_URL."sub/mypage/mypage.php' title=''>
                <img src='".(empty($row_member['mb_1']) == ''?"".$base_URL."upload/".$row_file['nameSave']."":"".$base_URL."images/userimg_mypage.png'")."' alt='userimg'>
                마이페이지
              </a>
            </p>
            <h3>".$row_member['mb_name']."".(empty($row_member['mb_nick']) == ''?"(".$row_member['mb_nick'].")":"")."님</h3>
            <div class='mypage'>
              <a href='".$base_URL."sub/mypage/mypage.php' title='회원정보관리'>
                <img src='".$base_URL."images/mypage_modify.png' alt=''>
                회원정보관리
              </a>
              <a href='".$base_URL."sub/member/logout.php' title='로그아웃'>
                <img src='".$base_URL."images/mypage_logout.png' alt=''>
                로그아웃
              </a>
            </div>
            <div>
              <ul>
                <li><a href='' title=''>수강중인 강의<span>1</span></a></li>
                <li><a href='' title=''>신청 &middot; 대기 강의<span>1</span></a></li>
                <li><a href='' title=''>수강완료 강의<span>1</span></a></li>
              </ul>
            </div>
            <p>풍경 사진 첫걸음</p>
            <a href='".$base_URL."sub/mypage/course_status.php'>더보기<i class='fas fa-play'></i></a>
          </div>
          ";
        }else{ // 관리자
          echo "
          <div class='admin'>
            <p>
            ".($row_member['mb_level'] == '10'?"관리자":"강사")."
              <a href='".$base_URL."sub/mypage/mypage.php' title=''>
                <img src='".(empty($row_member['mb_1']) == ''?"".$base_URL."upload/".$row_file['nameSave']."":"".$base_URL."images/userimg_mypage.png'")."' alt=''>
                마이페이지
              </a>
            </p>
            <h3>".$row_member['mb_name']."".(empty($row_member['mb_nick']) == ''?"(".$row_member['mb_nick'].")":"")."님</h3>
            <div class='mypage'>
              <a href='".$base_URL."adm/index.php' title='관리자페이지'>
                <img src='".$base_URL."images/mypage_work.png' alt=''>
                관리자페이지
              </a>
              <a href='".$base_URL."sub/member/logout.php' title='로그아웃'>
                <img src='".$base_URL."images/mypage_logout.png' alt=''>
                로그아웃
              </a>
            </div>
          </div>
          ";
        }
      }else{ // 비로그인
        echo "
        <div class='logout'>
          <h3>지금, 로그인하세요.</h3>
          <div>
            <a href='".$base_URL."sub/member/login.php' title='로그인페이지로 이동'>로그인</a>
            <a href='".$base_URL."sub/member/register.php' title='회원가입'>회원가입</a>
          </div>
        </div>
        ";
      }
    ?>
  </article>
  <!-- my 영역 끝 -->


  <!-- 강의 영역 -->
  <article id="m_academy">
    <h2>강의탭</h2>
    <ul class="line_tab">
      <li>온라인 강의</li>
      <li>오프라인 강의</li>
    </ul>
    <span class="tab_on"></span>

    <!-- 온라인 영역 -->
    <div class="tab_con online">
      <input type="radio" id="on_b" name="tab" checked>
      <label for="on_b">입문자용 인기강좌</label>
      <input type="radio" id="on_e" name="tab">
      <label for="on_e">전문가용 인기강좌</label>

      <!-- 입문자용 -->
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
            <a href="./sub/academy/academy_view.php?course_id=<?=$data['course_id']?>" title="<?=$data['course_title']?>">
              <img src="<?=empty($data['course_img']) ? getYoutubeThumb($data['course_link']) : "../images/".$data['course_img']?>" alt="<?=$data['course_title']?>">
              <p><?=$data['course_title']?></p>
              <p><?=$data['course_content']?></p>
              <div class="tab_tag">
                <span><?=str_replace(",", "</span><span>", $data['course_tag'])?></span>
              </div>
              <p><span>교육기간</span> <?=$eday?>일</p>
              <p><span>교육시간</span> <?=$data['course_edu_time']?></p>
              <p><span>교육비</span> <?=number_format($data['course_price'])?>원</p>
            </a>
          </li>
          <?php } ?>
        </ul>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div><!-- 입문자용 -->
      
      <!-- 전문가용 -->
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
            <a href="./sub/academy/academy_view.php?course_id=<?=$data['course_id']?>" title="<?=$data['course_title']?>">
              <img src="<?=empty($data['course_img']) ? getYoutubeThumb($data['course_link']) : "../images/".$data['course_img']?>" alt="<?=$data['course_title']?>">
              <p><?=$data['course_title']?></p>
              <p><?=$data['course_content']?></p>
              <div class="tab_tag">
                <span><?=str_replace(",", "</span><span>", $data['course_tag'])?></span>
              </div>
              <p><span>교육기간</span> <?=$eday?>일</p>
              <p><span>교육시간</span> <?=$data['course_edu_time']?></p>
              <p><span>교육비</span> <?=number_format($data['course_price'])?>원</p>
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
      <input type="radio" id="off_b" name="tab2" checked>
      <label for="off_b" class="on">입문자용 인기강좌</label>
      <input type="radio" id="off_e" name="tab2">
      <label for="off_e">전문가용 인기강좌</label>

      <!-- 입문자용 -->
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
            <a href="./sub/academy/academy_view.php?course_id=<?=$data['course_id']?>" title="<?=$data['course_title']?>">
              <img src="<?=empty($data['course_img']) ? getYoutubeThumb($data['course_link']) : "../images/".$data['course_img']?>" alt="<?=$data['course_title']?>">
              <p><?=$data['course_title']?></p>
              <p><?=$data['course_content']?></p>
              <div class="tab_tag">
                <span><?=str_replace(",", "</span><span>", $data['course_tag'])?></span>
              </div>
              <p><span>교육기간</span> <?=$eday?>일</p>
              <p><span>교육시간</span> <?=$data['course_edu_time']?></p>
              <p><span>교육비</span> <?=number_format($data['course_price'])?>원</p>
            </a>
          </li>
          <?php } ?>
        </ul>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div><!-- 입문자용 -->
      
      <!-- 전문가용 -->
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
            <a href="./sub/academy/academy_view.php?course_id=<?=$data['course_id']?>" title="<?=$data['course_title']?>">
              <img src="<?=empty($data['course_img']) ? getYoutubeThumb($data['course_link']) : "../images/".$data['course_img']?>" alt="<?=$data['course_title']?>">
              <p><?=$data['course_title']?></p>
              <p><?=$data['course_content']?></p>
              <div class="tab_tag">
                <span><?=str_replace(",", "</span><span>", $data['course_tag'])?></span>
              </div>
              <p><span>교육기간</span> <?=$eday?>일</p>
              <p><span>교육시간</span> <?=$data['course_edu_time']?></p>
              <p><span>교육비</span> <?=number_format($data['course_price'])?>원</p>
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
  <article id="review" class="swiper">
    <h2>BEST 수강평</h2>
    <ul class="swiper-wrapper">
      <?php
        $sql = "select * from course_review where review_star = '5'";
        $result = mysqli_query($con, $sql);
        while($data = mysqli_fetch_array($result)){
          $sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_no = '".$data['mb_no']."'";
          $result_member = mysqli_query($con, $sql_member);
          $row_member = mysqli_fetch_array($result_member);

          $sql_course = "SELECT * FROM course WHERE course_id = '".$data['course_id']."'";
          $result_course = mysqli_query($con, $sql_course);
          $row_course = mysqli_fetch_array($result_course);

          $name = preg_replace('/(.{1})(.*?)$/u', '$1**', $row_member['mb_name']);
        ?>
      <li class="swiper-slide">
        <a href="<?=$base_URL?>sub/academy/academy_view.php?course_id=<?=$row_course['course_id']?>" title="<?=$row_course['course_title']?>">
          <p><?=$name?></p>
          <div class="star">
            <img src="./images/star_f.png" alt="별점">
            <p><?=$data['review_star']?></p>
          </div>
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
      <a href="#none" title="이벤트배너">
        <img src="./images/event01.jpg" alt="이벤트배너">
      </a>
    </div>
    <div>
      <a href="#none" title="이벤트배너">
        <img src="./images/event02.jpg" alt="이벤트배너">
      </a>
    </div>
    <a href="./sub/event/event.php" title="더보기">더보기<i class="fas fa-play"></i></a>
  </article>
  <!-- 이벤트 영역 끝 -->


  <!-- 게시판 영역  -->
  <article id="board">
    <h2>게시판 영역</h2>
    <ul class="line_tab">
      <li>공지사항</li>
      <li>자주하는 질문</li>
    </ul>
    <span class="tab_on"></span>

    <ul class="board_con">
      <?php
      $sql_board = "select * from board_notice order by notice_id desc limit 4;";
      $result_board = mysqli_query($con, $sql_board);
      // 데이터 출력
      while($data = mysqli_fetch_array($result_board)){
        $sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_no = '".$data['mb_no']."'";
        $result_member = mysqli_query($con, $sql_member);
        $row_member = mysqli_fetch_array($result_member);
      ?>
      <li>
        <a href="<?=$base_URL?>sub/notice/notice_view.php?board_id=<?=$data['notice_id']?>" title="<?=$data['notice_title']?>">
          <p><?=$data['notice_title']?></p>
          <span><?= ($row_member['mb_nick'] == '' ? $row_member['mb_name'] : $row_member['mb_nick'])?> /</span>
          <span><?=date_format(date_create($data['notice_wdate']), "Y-m-d")?></span>
        </a>
      </li>
      <?php } ?>
    </ul>
    <a href="<?=$base_URL?>sub/notice/notice.php" title="더보기">더보기<i class="fas fa-play"></i></a>
  </article>
  <!-- 게시판 영역 끝  -->

</main>
<?php
include_once('./footer.php');
?>