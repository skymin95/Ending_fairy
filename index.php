<?php
$title = "캐논 아카데미"; // 타이틀
include_once('./common.php');
empty($_SESSION['mb_id']) || $mb_id = $_SESSION['mb_id']."님 환영합니다.";
?>
<main>
  <!-- 상단 슬라이드 -->
  <article id="m_slide">
    <h2>메인 슬라이드</h2>
    <ul>
      <li>
        <a href="" title="">
          <span><small>한폭의 그림같은 풍경 담기</small><br>풍경 사진 첫걸음</span>
          <img src="./images/main_banner01.jpg" alt="">
        </a>
      </li>
    </ul>
  </article>
  <!-- 상단 슬라이드 끝 -->

  <!-- my 영역 -->
  <article id="m_my">
    <h3>지금, 로그인하세요.</h3>
    <div>
      <a href="" title="">로그인</a>
      <a href="" title="">아이디/비번 찾기</a>
    </div>
  </article>
  <!-- my 영역 끝 -->

  <!-- 강의 영역 -->
  <article id="m_academy">
    <h2>강의탭</h2>
    <ul class="tab01">
      <li class="on"><a href="" title="온라인 강의">온라인 강의</a></li>
      <li><a href="" title="오프라인 강의">오프라인 강의</a></li>
    </ul>

    <!-- 온라인 영역 -->
    <?php
    $sql = "select * from course where course_cate = '온라인' order by course_id desc;";
    $result = mysqli_query($con, $sql);
    ?>
    <div class="tab_con online">
      <ul class="tab02">
        <li class="on"><a href="" title="입문자용 인기강좌">입문자용 인기강좌</a></li>
        <li><a href="" title="전문가용 인기강좌">전문가용 인기강좌</a></li>
      </ul>

      <!-- 입문자용 -->
      <div class="con_list beginner">
        <ul>
        <?php
          // 데이터 출력
          function getYoutubeThumb($url) {
            if($url)  {
              preg_match_all('/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/', $url, $matchs);
              return "https://img.youtube.com/vi/" .$matchs[7][0]."/mqdefault.jpg";
            }
          }
          while($data = mysqli_fetch_array($result)){
          ?>
          <li>
            <a href="" title="">
              <img src="<?=empty($data['course_img']) ? getYoutubeThumb($data['course_link']) : "../images/".$data['course_img']?>" alt="<?=$data['course_title']?>">
              <p><?=$data['course_title']?></p>
              <p>40만의 팔로워를 보유한 @misshattan의 여행사진 촬영팁!</p>
              <div class="tab_tag">
                <span><?=str_replace(",", "</span><span>", $data['course_tag'])?></span>
              </div>
              <p>교육기간 : 150일</p>
              <p>교육시간 : <?=$data['course_edu_time']?>시간</p>
              <p>교육비 : 25,000원 </p>
            </a>
          </li>
          <?php } ?>
        </ul>
      </div>


      <!-- 전문가용 -->
      <div class="con_list expert">
        <ul>
          <li><a href="" title=""><img src="./images/online01.jpg" alt=""></a></li>
        </ul>
      </div>

    </div>
    <!-- 온라인 영역 끝 -->

  </article>
  <!-- 강의 영역 끝 -->
</main>
<?php
include_once('./footer.php');
?>