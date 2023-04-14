<?php
$title = "강의 관리 > 강의 작성"; // 타이틀
include_once('./common.php');

$id = (empty($_GET['course_id']) ? '' : $_GET['course_id']);
$id = mysqli_real_escape_string($con, $id);
if($id != '') {
$query = "SELECT * FROM course_id WHERE course_id = '$id'";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
} else {
  $data = array(
    'course_title' => '',
    'course_cate' => '',
    'course_edu_time' => '',
    'course_price' => '',
    'course_edu_time' => '',
    'course_teacher' => '',
    'course_ask_sdate' => '',
    'course_ask_edate' => '',
    'course_edu_sdate' => '',
    'course_edu_edate' => '',
    'course_edu_time' => '',
    'course_tag' => '',
  );
}

$sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_id = '$mb_id'";
$result_member = mysqli_query($con, $sql_member);
$row_member = mysqli_fetch_array($result_member);

?>
<main class="board_insert">
  <ul class="board_h">
    <li><h2 class="a_title">강의추가</h2></li>
    <li><a href="adm_board_list.php" class="a_title">목록으로 이동<i class="fa-solid fa-chevron-right"></i></a></li>
  </ul>

  <form name="write" method="post" action="adm_board_insert_action.php">
    <!-- <input type="hidden" name="id" value="<?=$id?>"> -->
    <div class="board_wrap">
      <dl>
        <dt>강의명</dt>
        <dd><input type="text" name="notice_title" value="<?=$data['notice_title']?>"  class="txe" required ></dd>

        <dt>강의 분류</dt>
        <dd><input type="text" name="notice_title" value="<?=$data['notice_title']?>"  class="txe" required ></dd>

        <dt>강의 가격</dt>
        <dd><input type="text" name="notice_title" value="<?=$data['notice_title']?>"  class="txe" required ></dd>

        <dt>강의 가격</dt>
        <dd><input type="text" name="notice_title" value="<?=$data['notice_title']?>"  class="txe" required ></dd>

        <dt>강의 가격</dt>
        <dd><input type="text" name="notice_title" value="<?=$data['notice_title']?>"  class="txe" required ></dd>

      </dl>

      <!-- 삭제/완료 -->
      <ul class="board_b">
        <li><a href="adm_academy_list.php">삭제</a></li>
        <li class="nw_success"><input type="submit" value="완료"></li>
      </ul>
    </div>
  </form>
</main>
<?php
include_once('./footer.php');
?>