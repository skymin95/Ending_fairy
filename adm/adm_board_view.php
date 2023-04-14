<?php
$title = "게시판 관리 > 관리자 글쓰기"; // 타이틀
include_once('./common.php');
$mb_id = $_SESSION['mb_id']; // 회원명

$id = (empty($_GET['notice_id']) ? '' : $_GET['notice_id']);
$id = mysqli_real_escape_string($con, $id);
if($id != '') {
$query = "SELECT * FROM board_notice WHERE notice_id = '$id'";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
} else {
  $data = array(
    'notice_title' => '',
    'mb_no' => '',
    'notice_content' => '',
  );
}

$sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_id = '$mb_id'";
$result_member = mysqli_query($con, $sql_member);
$row_member = mysqli_fetch_array($result_member);

?>
<main class="board_insert">
    <ul class="board_h">
      <li><h2>공지사항</h2></li>
      <li><a href="adm_board_list.php">목록으로 이동</a></li>
    </ul>

    <form name="write" method="post" action="adm_board_insert_action.php">
      <input type="hidden" name="id" value="<?=$id?>">
    
      <div class="board_wrap">
        <dl>
            <dt>제목</dt>
            <dd><input type="text" name="notice_title" value="<?=$data['notice_title']?>"  class="txe" required ></dd>

            <dt>작성자</dt>
            <dd><input type="text" name="mb_nick" value=
            <?= ($row_member['mb_nick'] == '' ? $row_member['mb_name'] : $row_member['mb_nick'])?>  required disabled></dd>

            <dt>파일선택</dt>
            <dd class="asd"><input type="text" name="fileID">
              <button class="board_file">파일추가</button>
            </dd>

            <dt>내용</dt>
            <dd><textarea name="notice_content" required><?=$data['notice_content']?></textarea></dd>       
          </dl>

          <!-- 삭제/완료 -->
          <ul class="board_b">
            <li><a href="adm_board_del.php?notice_id=<?=$id?>" title="삭제">삭제</a></li>
            <li class="nw_success"><input type="submit" value="완료"></li>
          </ul>
      </div>
    </form>
  </main>
<?php
include_once('./footer.php');
?>                 