<?php
$title = "강의"; // 타이틀
include_once('../common.php');
$cate = (empty($_GET['cate']) ? '' : $_GET['cate']); // 탭
$search = (empty($_GET['search']) ? '' : $_GET['search']); // 검색태그
$c_cate = ($cate == 'online' ? '온라인' : '오프라인');

function getYoutubeThumb($url) {
  if($url) {
    preg_match_all('/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/', $url, $matchs);
    return "https://img.youtube.com/vi/" .$matchs[7][0]."/mqdefault.jpg";
  }
}

if($search != ''){
  $sql = "select * from course where course_cate = '$c_cate' and course_tag like '%".$search."%' order by course_id desc;";
  $result = mysqli_query($con, $sql);
  $all = mysqli_num_rows($result);
}else if($cate = 'online'){
  $sql_on = "select * from course where course_cate = '온라인' order by course_id desc;";
  $result_on = mysqli_query($con, $sql_on);
}else if($cate = 'offline'){
  $sql_off = "select * from course where course_cate = '오프라인' order by course_id desc;";
  $result_off = mysqli_query($con, $sql_off);
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
      <p class="<?=(empty($_GET['search']) ? 'hidden' : '')?>"><span>'<?=$search?>'</span>의 검색 결과 <span><?=$all?></span>건</p>
      <ul>
      <?php
        while($data = mysqli_fetch_array($result)){
          $sdate = date_format(date_create($data['course_edu_sdate']), "Y-m-d");
          $edate = date_format(date_create($data['course_edu_edate']), "Y-m-d");
          $date_dif = abs(strtotime($sdate)-strtotime($edate));
          $eday = ceil($date_dif / (60*60*24));
        ?>
        <li>
          <a href="academy_view.php?course_id=<?=$data['course_id']?>" title="<?=$data['course_title']?>">
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
      <p class="<?=(empty($_GET['search']) ? 'hidden' : '')?>"><span>'<?=$search?>'</span>의 검색 결과 <span><?=$all?></span>건</p>
      <ul>
      <?php
        while($data = mysqli_fetch_array($result)){
          $sdate = date_format(date_create($data['course_edu_sdate']), "Y-m-d");
          $edate = date_format(date_create($data['course_edu_edate']), "Y-m-d");
          $date_dif = abs(strtotime($sdate)-strtotime($edate));
          $eday = ceil($date_dif / (60*60*24));
        ?>
        <li>
          <a href="academy_view.php?course_id=<?=$data['course_id']?>" title="<?=$data['course_title']?>">
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

    </section>
  </article>
</main>
<?php
include_once('../../footer.php');
?>