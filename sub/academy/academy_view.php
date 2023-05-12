<?php
$title = "강의 상세"; // 타이틀
include_once('../common.php');

$id = $_GET['course_id'];
$id = mysqli_real_escape_string($con, $id);

$query = "SELECT * FROM course WHERE course_id = '$id'";
$result = mysqli_query($con, $query);
function getYoutubeThumb($url) {
  if($url) {
    preg_match_all('/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/', $url, $matchs);
    return "https://img.youtube.com/vi/" .$matchs[7][0]."/mqdefault.jpg";
  }
}
$data = mysqli_fetch_assoc($result);

$sdate = date_format(date_create($data['course_edu_sdate']), "Y-m-d");
$edate = date_format(date_create($data['course_edu_edate']), "Y-m-d");
$date_dif = abs(strtotime($sdate)-strtotime($edate));
$eday = ceil($date_dif / (60*60*24));
?>

<main>
  <!-- 강의 상세 -->
  <article id="detail" class="course">
    <h2><a href="javascript:window.history.back();" title="뒤로가기"><i class="fas fa-chevron-left"></i>상세보기</a></h2>

    <img src="<?=empty($data['course_img']) ? getYoutubeThumb($data['course_link']) : "../images/".$data['course_img']?>" alt="<?=$data['course_title']?>">

    <section class="c_info">
      <h2 class="hidden">강의 상세</h2>
      <div class="tag">
        <span><?=str_replace(",", "</span><span>", $data['course_tag'])?></span>
      </div>
      <p><?=$data['course_title']?></p>
      <p><?=$data['course_content']?></p>
      <p><span>신청기간</span> <?=$data['course_ask_sdate']?> ~ <?=$data['course_ask_edate']?></p>
      <p><span>교육기간</span> <?=$eday?>일</p>
      <p><span>교육시간</span> <?=$data['course_edu_time']?></p>
      <p><span>교육비</span> <?=number_format($data['course_price'])?>원</p>
      <div class="c_btn">
        <a href="<?=$data['course_link']?>" title="미리보기" class="pre" target='_blank'>미리보기</a>
        <a href="cart_insert.php" title="장바구니" class="cart"><i class="fas fa-shopping-bag"></i>장바구니</a>
      </div>
    </section>

    <section class="c_detail c_tab">
      <ul class="line_tab">
        <li class="a_title">과정소개</li>
        <li class="a_title">강사</li>
        <li class="a_title">목차</li>
        <li class="a_title">수강평</li>
      </ul>
      <span class="tab_on"></span>
      
      <section class="tab_con">
        <h3 class="hidden">과정소개</h3>
        <img src="../../images/<?=$data['fileID']?>" alt="과정소개">
      </section>

      <section class="tab_con">
        <h3 class="hidden">강사</h3>
        <p>강사명 : <?=$data['course_teacher']?></p>
      </section>

      <section class="tab_con index">
        <h3 class="hidden">목차</h3>
        <dl>
        <?php
          $sql_chapter = "SELECT * FROM course_index WHERE course_id = $id AND class IS NULL";
          $result_chapter = mysqli_query($con, $sql_chapter);
          $class_index = 0;
          while($row_chapter = mysqli_fetch_assoc($result_chapter)) {
        ?>
          <dt><span>Chapter <?=$row_chapter['chapter_id']?>.</span><?=$row_chapter['chapter']?></dt>
        <?php
            $sql_class = "SELECT * FROM course_index WHERE course_id = $id AND class IS NOT NULL AND chapter = ".$row_chapter['chapter_id']."";
            $result_class = mysqli_query($con, $sql_class);
            while($row_class = mysqli_fetch_assoc($result_class)) {
            $class_index++;
        ?>
          <dd><span><?=$class_index?>차시</span><?=$row_class['class']?></dd>
        <?php
            }
          }
        ?>
        </dl>
      </section>

      <section class="tab_con review">
        <?php
          $sql = "select * from course_review where course_id = $id";
          $result = mysqli_query($con, $sql);
          $all = mysqli_num_rows($result);
        ?>
        <h3 class="hidden">수강평</h3>
        <p>후기 <span><?=$all?></span>개</p>
        <ul>
          <?php
            while($data = mysqli_fetch_array($result)){
              $sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_no = '".$data['mb_no']."'";
              $result_member = mysqli_query($con, $sql_member);
              $row_member = mysqli_fetch_array($result_member);

              $name = preg_replace('/(.{1})(.*?)$/u', '$1**', $row_member['mb_name']);
          ?>
          <li>
            <p><?=$name?></p>
            <div class="star">
              <img src="../../images/star_f.png" alt="별점">
              <!-- <?=$data['review_star']?> -->
            </div>
            <p><?=$data['review_title']?></p>
            <p><?=$data['review_content']?></p>
            <p><?=date_format(date_create($data['review_wdate']), "Y.m.d")?></p>
          </li>
          <?php } ?>
        </ul>
      </section>
    </section>
  </article>

</main>
<?php
include_once('../../footer.php');
?>