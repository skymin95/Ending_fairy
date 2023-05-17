<?php
$title = "강의"; // 타이틀
include_once('../common.php');
$cate = (empty($_GET['cate']) ? '' : $_GET['cate']); // 탭
$search = (empty($_GET['search']) ? '' : $_GET['search']); // 검색태그

function getYoutubeThumb($url) {
  if($url) {
    preg_match_all('/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/', $url, $matchs);
    return "https://img.youtube.com/vi/" .$matchs[7][0]."/mqdefault.jpg";
  }
}
?>
<main>
  <!-- 강의 목록 -->

  <article id="course_list" class="c_tab">
    <!-- 탭메뉴 -->
    <ul class="line_tab">
      <li class="a_title" data-cate="<?=$cate == 'online' ? $cate : ''?>">온라인 강의</li>
      <li class="a_title" data-cate="<?=$cate == 'offline' ? $cate : ''?>">오프라인 강의</li>
      <li class="a_title" data-cate="<?=$cate == 'curriculum' ? $cate : ''?>">커리큘럼</li>
    </ul>
    <span class="tab_on"></span>

    <section class="tab_con online">
      <h2 class="hidden">온라인 강의</h2>
      <?php
        $sql = "select * from course where course_cate = '온라인' and course_tag like '%".$search."%' order by course_id desc;";
        $result = mysqli_query($con, $sql);
        $all = mysqli_num_rows($result);
      ?>
      <p class="<?=(empty($search) ? 'hidden' : '')?>"><span>'<?=$search?>'</span>의 검색 결과 <span><?=$all?></span>건<a href="<?=$base_URL?>/sub/academy/academy_list.php?cate=online" title="전체보기">전체보기</a></p>

      <ul>
      <?php
        while($data = mysqli_fetch_array($result)){
          $sdate = date_format(date_create($data['course_edu_sdate']), "Y-m-d");
          $edate = date_format(date_create($data['course_edu_edate']), "Y-m-d");
          $date_dif = abs(strtotime($sdate)-strtotime($edate));
          $eday = ceil($date_dif / (60*60*24));
        ?>
        <li>
          <a href="<?=$base_URL?>/sub/academy/academy_view.php?course_id=<?=$data['course_id']?>" title="<?=$data['course_title']?>">
            <img src="<?=empty($data['course_img']) ? getYoutubeThumb($data['course_link']) : "../images/".$data['course_img']?>" alt="<?=$data['course_title']?>">
            <div class="tab_tag">
              <span><?=str_replace(",", "</span><span>", $data['course_tag'])?></span>
            </div>
            <p>교육기간 <?=$eday?>일</p>
            <p><?=$data['course_title']?></p>
            <p><?=$data['course_content']?></p>
            <p><?=number_format($data['course_price'])?>원</p>
          </a>
        </li>
      <?php } ?>
      </ul>
    </section>

    <section class="tab_con offline">
      <h2 class="hidden">오프라인 강의</h2>
      <?php
        $sql = "select * from course where course_cate = '오프라인' and course_tag like '%".$search."%' order by course_id desc;";
        $result = mysqli_query($con, $sql);
        $all = mysqli_num_rows($result);
      ?>
      <p class="<?=(empty($search) ? 'hidden' : '')?>"><span>'<?=$search?>'</span>의 검색 결과 <span><?=$all?></span>건<a href="<?=$base_URL?>/sub/academy/academy_list.php?cate=offline" title="전체보기">전체보기</a></p>

      <ul>
      <?php
        while($data = mysqli_fetch_array($result)){
          $sdate = date_format(date_create($data['course_edu_sdate']), "Y-m-d");
          $edate = date_format(date_create($data['course_edu_edate']), "Y-m-d");
          $date_dif = abs(strtotime($sdate)-strtotime($edate));
          $eday = ceil($date_dif / (60*60*24));
        ?>
        <li>
          <a href="<?=$base_URL?>/sub/academy/academy_view.php?course_id=<?=$data['course_id']?>" title="<?=$data['course_title']?>">
            <img src="<?=empty($data['course_img']) ? getYoutubeThumb($data['course_link']) : "../images/".$data['course_img']?>" alt="<?=$data['course_title']?>">
            <div class="tab_tag">
              <span><?=str_replace(",", "</span><span>", $data['course_tag'])?></span>
            </div>
            <p>교육기간 <?=$eday?>일</p>
            <p><?=$data['course_title']?></p>
            <p><?=$data['course_content']?></p>
            <p><?=number_format($data['course_price'])?>원</p>
          </a>
        </li>
      <?php } ?>
      </ul>
    </section>

    <section class="tab_con curriculum">
      <article class="curri_order">
        <h3>추천 수강 순서</h3>
        <ul>
          <li>
            <div class="order_box">
              <img src="<?=$base_URL?>images/class7.jpg" alt="제품 사용법 강의사진">
              <p>제품 사용법</p>
            </div>
            <div class="arrow">
              <img src="<?=$base_URL?>images/double_down_arrow..svg" alt="이중 아래방향 화살표">
            </div>
          </li>
          <li>
            <div class="order_box">
              <img src="<?=$base_URL?>images/class8.jpg" alt="사진 클래스 강의사진">
              <p>사진 클래스</p>
            </div>
            <div class="arrow">
              <img src="<?=$base_URL?>images/double_down_arrow..svg" alt="이중 아래방향 화살표">
            </div>
          </li>
          <li>
            <div class="order_box">
              <img src="<?=$base_URL?>images/class9.jpg" alt="영상 클래스 강의사진">
              <p>영상 클래스</p>
            </div>
          </li>
        </ul>
      </article>
      <article class="curri_recommend">
        <h3>추천 커리큘럼</h3>
        <dl>
          <dt>초급자</dt>
          <dd><span class="on_mini">온</span>EOS R6 사용법</dd>
          <dd><span class="on_mini">온</span>여행 사진 첫걸음</dd>
          <dd><span class="on_mini">온</span>왕초보를 위한 프리미어 프로</dd>

          <dt>중급자</dt>
          <dd><span class="on_mini">온</span>PowerShot G7 X Mark III 사용법</dd>
          <dd><span class="on_mini">온</span>인물 사진 첫걸음</dd>
          <dd><span class="on_mini">온</span>초보 탈출! 영상의 기초</dd>

          <dt>전문가</dt>
          <dd><span class="off_mini">오</span>봄꽃 사진 촬영 실습 -유채꽃-</dd>
          <dd><span class="off_mini">오</span>풍경 사진 마스터 -파노라마-</dd>
        </dl>
      </article>
    </section>
  </article>
</main>
<?php
include_once('../../footer.php');
?>