<?php
$title = "마이페이지 > 수강중인 강의"; // 타이틀
include_once('../common.php');

function getYoutubeThumb($url) {
  if($url) {
    preg_match_all('/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/', $url, $matchs);
    return "https://img.youtube.com/vi/" .$matchs[7][0]."/mqdefault.jpg";
  }
}

$course_id = $_GET['course_id'];

$sql_course = "SELECT * FROM course WHERE course_id = $course_id";
$result_course = mysqli_query($con, $sql_course);
$row_course = mysqli_fetch_assoc($result_course);

$sql_status = "SELECT * FROM course_status WHERE course_id = $course_id AND mb_no = ".$row_member['mb_no']."";
$result_status = mysqli_query($con, $sql_status);
$row_status = mysqli_fetch_assoc($result_status);

if(!empty($row_course['course_img'])){
  $sql_file = "SELECT * FROM upload_file WHERE fileID = '".$row_course['course_img']."'";
  $result_file = mysqli_query($con, $sql_file);
  $row_file = mysqli_fetch_assoc($result_file);
}

$nowdate = date("Y-m-d", strtotime("+1 day"));
$sdate = date_format(date_create($row_course['course_edu_sdate']), "Y-m-d");
$edate = date_format(date_create($row_course['course_edu_edate']), "Y-m-d");
$date_dif = abs(strtotime($nowdate)-strtotime($edate));
$eday = ceil($date_dif / (60*60*24));
?>
<main>
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
      <img src="<?=empty($row_course['course_img']) ? getYoutubeThumb($row_course['course_link']) : "".$base_URL."upload/".$row_file['nameSave']?>" alt="<?=$row_course['course_title']?>" class="course_image">
      <div class="course_title">
        <p><?=$row_course['course_cate']?> 강의</p>
        <h4><?=$row_course['course_title']?></h4>
      </div>
      <dl>
        <dt>교육기간</dt>
        <dd><?=date_format(date_create($sdate), "Y.m.d")?> ~ <?=date_format(date_create($edate), "Y.m.d")?></dd>
      </dl>
      <dl>
        <dt>남은 수강 기간</dt>
        <dd><?=$eday?>일</dd>
      </dl>
      <dl>
        <dt>교육시간</dt>
        <dd><?=$row_course['course_edu_time']?></dd>
      </dl>
      <dl>
        <dt>강사</dt>
        <dd><?=$row_course['course_teacher']?></dd>
      </dl>
      <div class="btn_list">
        <a href="#courseList">처음부터 학습하기</a>
        <a href="#courseList">이어서 학습하기</a>
      </div>
    </article>
    <article class="course_status">
      <h3>나의 수강 현황</h3>
      <?php
        $sql_index = "SELECT * FROM course_index WHERE course_id = $course_id AND class IS NOT NULL";
        $result_index = mysqli_query($con, $sql_index);

        $cnt_index = mysqli_num_rows($result_index);

        $sql_index_submit = "SELECT * FROM course_status AS stat INNER JOIN course_index AS idx ON stat.index_id = idx.index_id WHERE mb_no =".$row_member['mb_no']." AND idx.course_id = $course_id";
        $result_index_submit = mysqli_query($con, $sql_index_submit);

        $sql_chapter = "SELECT * FROM course_index WHERE course_id = $course_id AND class IS NULL";
        $result_chapter = mysqli_query($con, $sql_chapter);

        $cnt_index_submit = 0;
        $percentage = 0;

        while($row_index_submit = mysqli_fetch_assoc($result_index_submit)) {
          $percentage += $row_index_submit['status'];
          if((int)$row_index_submit['status'] >= 80) $cnt_index_submit++;
        }
        $percentage = floor($percentage / $cnt_index);
      ?>
      <div class="progress-bar" data-color="#D9D9D9,#DE0010" data-percent="<?=$percentage?>">
        <div class="wrap-sub">
          <div class="left-sub"></div>
          <div class="right-sub"></div>
        </div>
      </div>
      <p><span class="emp"><?=$cnt_index_submit?>차시</span> / <?=$cnt_index?>차시</p>
    </article>
    <article class="course_list" id="courseList">
      <h3>강의 목록</h3>
      <ul>
        <?php
          $chapter_index = 0;
          $class_index = 0;
          while($row_chapter = mysqli_fetch_assoc($result_chapter)) {
            $sql_index_class = "SELECT * FROM course_index WHERE course_id = $course_id AND class IS NOT NULL AND chapter = ".$row_chapter['chapter_id'];
            $result_index_class = mysqli_query($con, $sql_index_class);
            $chapter_index++;
        ?>
        <li>
          <h5>chapter <?=$chapter_index?>. <?=$row_chapter['chapter']?></h5>
          <ul>
            <?php
              while($row_index_class = mysqli_fetch_assoc($result_index_class)) {
                $class_index++;
                $sql_status_class = "SELECT * FROM course_status WHERE index_id = ".$row_index_class['index_id'];
                $result_status_class = mysqli_query($con, $sql_status_class);
                $row_status_class = mysqli_fetch_assoc($result_status_class);
            ?>
            <li><?=$class_index?>차시 <span class="emp"><?=$row_index_class['class']?></span></li>
            <li class="status_data_wrap">
              <dl>
                <dt>수강율</dt>
                <dd class="status">
                  <span class="status_percent"><?=(empty($row_status_class['status']) ? 0 : $row_status_class['status'])?>%</span>
                  <div id="lineBox1" class="line_box" data-percent="<?=(empty($row_status_class['status']) ? 0 : $row_status_class['status'])?>"></div>
                </dd>
              </dl>
              <!-- 
              <dl>
                <dt>학습시간</dt>
                <dd>31분 / 35분 (최근 학습일 00.00.00)</dd>
              </dl>
              -->
            </li>
            <li>
              <a href="./course_view_pop.php?index_id=<?=$row_index_class['index_id']?>" title="수강하기" target="_blank">수강하기</a>
            </li>
            <?php
              }
            ?>
          </ul>
        </li>
        <?php } ?>
      </ul>
    </article>
  </section>
</main>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>