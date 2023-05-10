<?php
$title = "강의"; // 타이틀
include_once('../common.php');
?>
<main>
  <!-- 강의 목록 -->

  <article id="course_list">
    <!-- 탭메뉴 -->
    <ul class="line_tab">
      <li class="a_title"><a href="#none" title="온라인 강의">온라인 강의</a></li>
      <li><a href="#none" title="오프라인 강의">오프라인 강의</a></li>
      <li><a href="#none" title="커리큘럼">커리큘럼</a></li>
    </ul>
    <span class="tab_on"></span>

    <article class="list">
      <h2>온라인 강의</h2>
      <div>
        <ul>
        <?php
          $sql = "select * from course where course_cate = '온라인' order by course_id desc;";
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
          <li>
            <a href="./sub/academy/academy_view.php?course_id=<?=$data['course_id']?>" title="<?=$data['course_title']?>">
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
      </div>
    </article>
  </article>
</main>
<?php
include_once('../../footer.php');
?>