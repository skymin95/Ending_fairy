<?php
$title = "게시판 관리 > 관리자 글쓰기"; // 타이틀
include_once('./common.php');
$mb_id = $_SESSION['mb_id']; // 회원명

$id = (empty($_GET['board_id']) ? '' : $_GET['board_id']);
$id = mysqli_real_escape_string($con, $id);
$cate = empty($_GET['cate']) ? 1 : $_GET['cate']; // 현재 카테고리
switch($cate) {
  case '1': $cate_name = '공지사항'; $cate_table = 'notice'; break;
  case '2': $cate_name = '이벤트'; $cate_table = 'event'; break;
  case '3': $cate_name = '커뮤니티'; $cate_table = 'community'; break;
  default: $cate_name = '공지사항';  break;
}
if($id != '') {
$query = "SELECT * FROM board_".$cate_table." WHERE ".$cate_table."_id = '$id'";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
} else {
  $data = array(
    $cate_table.'_title' => '',
    $cate_table.'_content' => '',
    'mb_no' => ''
  );
}

$sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_id = '$mb_id'";
$result_member = mysqli_query($con, $sql_member);
$row_member = mysqli_fetch_array($result_member);

?>
<main class="board_insert">
    <ul class="board_h">
      <li><h2 class="a_title"><?=$cate_name?></h2></li>
      <li><a href="adm_board_list.php" class="a_title">목록으로 이동<i class="fa-solid fa-chevron-right"></i></a></li>
    </ul>

    <form name="write" method="post" action="adm_board_insert_action.php">
      <input type="hidden" name="id" value="<?=$id?>">
      <input type="hidden" name="cate_table" value="<?=$cate_table?>">
    
      <div class="board_wrap">
        <dl>
            <dt>제목</dt>
            <dd><input type="text" name="board_title" value="<?=$data[$cate_table.'_title']?>"  class="txe" required ></dd>

            <dt>작성자</dt>
            <dd><input type="text" name="mb_nick" value=
            <?= ($row_member['mb_nick'] == '' ? $row_member['mb_name'] : $row_member['mb_nick'])?>  required disabled></dd>

            <dt>파일선택</dt>
            <dd class="asd"><input type="text" name="fileID">
              <button class="board_file">파일추가</button>
            </dd>

            <dt>내용</dt>
            <dd><textarea name="board_content" required><?=$data[$cate_table.'_content']?></textarea></dd>       
          </dl>

          <!-- 삭제/완료 -->
          <ul class="board_b">
            <li>
              <?php if($id != '') {?><a href="adm_board_del.php?board_id=<?=$id?>&cate=<?=$cate?>" title="삭제">삭제</a><?php } ?>
            </li>
            <li class="nw_success"><input type="submit" value="완료"></li>
          </ul>
      </div>
    </form>
  </main>
<?php
include_once('./footer.php');
?>                 