<?php
$title = "마이페이지 > 1:1문의 글쓰기"; // 타이틀
include_once('../common.php');
$mb_id = $_SESSION['mb_id']; // 회원명

$id = (empty($_GET['question_id']) ? '' : $_GET['question_id']);
$id = mysqli_real_escape_string($con, $id);
if($id != '') {
$query = "SELECT * FROM board_question WHERE question_id = '$id'";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
} else {
  $data = array(
    'question_title' => '',
    'question_content' => '',
    'question_wdate' => '',
  );
}

$sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_id = '".$_SESSION['mb_id']."'";
$result_member = mysqli_query($con, $sql_member);
$row_member = mysqli_fetch_array($result_member);

?>
<script type="text/javascript" src="<?=$base_URL?>se2/js/HuskyEZCreator.js" charset="utf-8"></script>
<main>

<h2 class="sub_title_prev">
  <a href="question.php" title="돌아가기">
  <img src="<?=$base_URL?>images/arrow_title_prev.svg" alt="prev">
  1:1문의
  </a>
</h2>
<form name="question_write" id="question_w_form" method="post" action="question_write_action.php">

<article class="question_write_box">
  <h3>공지사항</h3>
<input type="text" name="question_title" placeholder="제목을 입력하세요." class="q_write_input">

<textarea name="question_content" id="editorTxt" rows="10" cols="100" style="width: 100%;min-width:260px;" class="q_editor"></textarea>
<script id="smartEditor" type="text/javascript"> 
/* 에디터 설정 */
let oEditors = [];

smartEditor = function() {
    nhn.husky.EZCreator.createInIFrame({
        oAppRef: oEditors,
        elPlaceHolder: "editorTxt",
        sSkinURI: "<?=$base_URL?>se2/SmartEditor2Skin.html",
        fCreator: "createSEditor2"
    })
  let w_form = document.querySelector('#question_w_form');
  w_form.addEventListener('submit', function(e){
    e.preventDefault();
    oEditors.getById["editorTxt"].exec("UPDATE_CONTENTS_FIELD", []);
    console.log('dd');
    this.submit();
  });
}

smartEditor();
</script>
<!-- 버튼 -->
<ul class="q_write_btn">
  <li class="q_cancel">
    <a href="question.php" title="취소버튼">취소</a>
  </li>
  <li class="q_submit">
    <input type="submit" value="등록">
  </li>
</ul>
</form>

</article>
</main>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>
