<?php
$title = "마이페이지 > 공지사항 상세페이지"; // 타이틀
include_once('../common.php');
$id = (empty($_GET['board_id']) ? '' : $_GET['board_id']);
$id = mysqli_real_escape_string($con, $id);


$sql_notice= "SELECT * FROM board_notice WHERE notice_id = '".$id."' ";
$result = mysqli_query($con, $sql_notice);
$data = mysqli_fetch_array($result);

$sql_member_board= "SELECT * FROM member WHERE mb_no = ".$data['mb_no']." ";
$result_member_board = mysqli_query($con, $sql_member_board);
$row_member_board = mysqli_fetch_array($result_member_board);

?>

<main>
<!-- 상단  -->
<h2 class="sub_title_prev">
  <a href="notice.php" title="돌아가기">
  <img src="<?=$base_URL?>images/arrow_title_prev.svg" alt="prev">
  공지사항
  </a>
</h2>
<!-- 작성자 정보 -->
<!-- 컨텐츠 -->
<div id="notice_view_wrap">
  <!-- 작성자 정보 -->
  <ul class="notice_user_info">
    <li><img src="http://localhost/Ending_fairy/images/userimg_mypage.png" alt="userimg" class="noti_user_img">
    </li>
    <li class="noti_name_day">
    <p><?= ($row_member_board['mb_nick'] == '' ? $row_member_board['mb_name'] : $row_member_board['mb_nick'])?> </p>
    <span><?=date_format(date_create($data['notice_wdate']), "Y-m-d")?></span>
    </li>
  </ul>

  <article id="notice_view_box">
    <h3><?=$data['notice_title']?></h3>
    <!-- <img src="<?=$base_URL?>images/logo_admin.png" alt="로고"> -->
    <p><?=$data['notice_content']?></p>
  </article>
  
  <p class="notice_link">
    <a href="notice.php" title="목록으로">목록으로</a>
  </p>
</div>
</main>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>