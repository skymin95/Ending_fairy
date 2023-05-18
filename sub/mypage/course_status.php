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
    <?php
    $sql_cnt_online = "SELECT COUNT(*) AS cnt FROM (SELECT * FROM course_status WHERE mb_no = ".$row_member['mb_no']." AND index_id IS NULL) AS a,
    (SELECT * FROM course) AS b WHERE a.course_id = b.course_id AND b.course_cate = '온라인' AND (a.status < 80 OR a.status IS NULL)";
    $result_cnt_online = mysqli_query($con, $sql_cnt_online);
    $cnt_online = mysqli_fetch_assoc($result_cnt_online)['cnt'];

    $sql_cnt_offline = "SELECT COUNT(*) AS cnt FROM (SELECT * FROM course_status WHERE mb_no = ".$row_member['mb_no']." AND index_id IS NULL) AS a,
    (SELECT * FROM course) AS b WHERE a.course_id = b.course_id AND b.course_cate = '오프라인'";
    $result_cnt_offline = mysqli_query($con, $sql_cnt_offline);
    $cnt_offline = mysqli_fetch_assoc($result_cnt_offline)['cnt'];
    
    $sql_cnt_online_submit = "SELECT COUNT(*) AS cnt FROM (SELECT * FROM course_status WHERE mb_no = ".$row_member['mb_no']." AND index_id IS NULL) AS a,
    (SELECT * FROM course) AS b WHERE a.course_id = b.course_id AND b.course_cate = '온라인' AND a.status >= 80";
    $result_cnt_online_submit = mysqli_query($con, $sql_cnt_online_submit);
    $cnt_online_submit = mysqli_fetch_assoc($result_cnt_online_submit)['cnt'];
    ?>
    <nav>
      <ul class="line_tab">
        <li>수강 중(<?=$cnt_online?>)</li>
        <li>신청&middot;대기(<?=$cnt_offline?>)</li>
        <li>수강완료(<?=$cnt_online_submit?>)</li>
      </ul>
      <span class="tab_on"></span>
    </nav>
    <div class="tab_con">
      <p>수강중인 강의 <span class="emp"><?=$cnt_online?></span>개</p>
      <ul>
        <?php
        $sql_status = "SELECT * FROM course_status WHERE mb_no = ".$row_member['mb_no']." AND index_id IS NULL";
        $result_status = mysqli_query($con, $sql_status);
        $offline_course = [];
        $offline_status = [];
        $online_course_submit = [];
        $online_status_submit = [];

        while($row_status = mysqli_fetch_assoc($result_status)) {
          $sql_course = "SELECT * FROM course WHERE course_id = ".$row_status['course_id']."";
          $result_course = mysqli_query($con, $sql_course);
          $row_course = mysqli_fetch_assoc($result_course);

          if($row_course['course_cate'] == '온라인') {
            if($row_status['status'] < 80) {
            $nowdate = date("Y-m-d", strtotime("+1 day"));
            $sdate = date_format(date_create($row_course['course_edu_sdate']), "Y-m-d");
            $edate = date_format(date_create($row_course['course_edu_edate']), "Y-m-d");
            $date_dif = abs(strtotime($nowdate)-strtotime($edate));
            $eday = ceil($date_dif / (60*60*24));
        ?>
        <li>
          <p><?=$row_course['course_cate']?> 강의</p>
          <h4><?=$row_course['course_title']?></h4>
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
          <a href="<?=$base_URL?>sub/mypage/course_view.php?course_id=<?=$row_course['course_id']?>">수강하기</a>
          <div class="progress-bar" data-color="#D9D9D9,#DE0010" data-percent="<?=($row_status['status'] ? $row_status['status'] : 0)?>" data-text="수강율">
            <div class="wrap-sub">
              <div class="left-sub"></div>
              <div class="right-sub"></div>
            </div>
          </div>
        </li>
        <?php
            } else {
              $online_course_submit[] = $row_course;
              $online_status_submit[] = $row_status;
            }
          } else {
            $offline_course[] = $row_course;
            $offline_status[] = $row_status;
          }
        }
        ?>
      </ul>
    </div>
    <div class="tab_con">
      <p>신청&middot;대기중인 강의 <span class="emp"><?=$cnt_offline?></span>개</p>
      <ul>
        <?php for($i = 0; $i < count($offline_course); $i++) {
          $sdate = date_format(date_create($offline_course[$i]['course_edu_sdate']), "Y-m-d");
          $edate = date_format(date_create($offline_course[$i]['course_edu_edate']), "Y-m-d");
          $date_dif = abs(strtotime($nowdate)-strtotime($edate));
          $eday = ceil($date_dif / (60*60*24));
        ?>
        <li>
          <p><?=$offline_course[$i]['course_cate']?> 강의</p>
          <h4><?=$offline_course[$i]['course_title']?></h4>
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
            <dd><?=$offline_course[$i]['course_edu_time']?></dd>
          </dl>
          <a href="<?=$base_URL?>sub/mypage/course_view.php?course_id=<?=$offline_course[$i]['course_id']?>">수강하기</a>
          <div class="progress-bar" data-color="#D9D9D9,#DE0010" data-percent="D-<?=$eday?>" data-text="수강율">
            <div class="wrap-sub">
              <div class="left-sub"></div>
              <div class="right-sub"></div>
            </div>
          </div>
        </li>
        <?php } ?>
      </ul>
    </div>
    <div class="tab_con">
      <p>수강완료 강의 <span class="emp"><?=$cnt_online_submit?></span>개</p>
      <ul>
        <?php for($i = 0; $i < count($online_course_submit); $i++) {
          $sdate = date_format(date_create($online_course_submit[$i]['course_edu_sdate']), "Y-m-d");
          $edate = date_format(date_create($online_course_submit[$i]['course_edu_edate']), "Y-m-d");
          $date_dif = abs(strtotime($nowdate)-strtotime($edate));
          $eday = ceil($date_dif / (60*60*24));
        ?>
        <li>
          <p><?=$online_course_submit[$i]['course_cate']?> 강의</p>
          <h4><?=$online_course_submit[$i]['course_title']?></h4>
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
            <dd><?=$online_course_submit[$i]['course_edu_time']?></dd>
          </dl>
          <a href="<?=$base_URL?>sub/mypage/course_view.php?course_id=<?=$online_course_submit[$i]['course_id']?>">수강하기</a>
          <div class="progress-bar" data-color="#D9D9D9,#DE0010" data-percent="<?=($online_status_submit[$i]['status'] ? $online_status_submit[$i]['status'] : 0)?>" data-text="수강율">
            <div class="wrap-sub">
              <div class="left-sub"></div>
              <div class="right-sub"></div>
            </div>
          </div>
        </li>
        <?php } ?>
      </ul>
    </div>
  
  </article>
</main>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>