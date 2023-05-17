<?php
$title = "마이페이지 > 커뮤니티 글쓰기"; // 타이틀
include_once('../common.php');

$id = (empty($_GET['community_id']) ? '' : $_GET['community_id']);
$id = mysqli_real_escape_string($con, $id);
if($id != '') {
$query = "SELECT * FROM board_community WHERE community_id = '$id'";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
} else {
  $data = array(
    'community_title' => '',
    'community_content' => '',
    'community_wdate' => '',
  );
}
$sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_id = '".$_SESSION['mb_id']."'";
$result_member = mysqli_query($con, $sql_member);
$row_member = mysqli_fetch_array($result_member);
?>
<script type="text/javascript" src="<?=$base_URL?>se2/js/HuskyEZCreator.js" charset="utf-8"></script>
<main>

<h2 class="sub_title_prev">
  <a href="community.php" title="돌아가기">
  <img src="<?=$base_URL?>images/arrow_title_prev.svg" alt="prev">
  커뮤니티
  </a>
</h2>
<form name="community_write" id="community_w_form" method="post" action="community_write_action.php">

<article class="comm_write_box">
<input type="text" name="community_title" placeholder="제목을 입력하세요." class="comm_write_input">

<textarea name="community_content" id="editorTxt" rows="10" cols="100" style="width: 100%;min-width:260px;" class="comm_editor"></textarea>
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
    let comm_form = document.querySelector('#community_w_form');
  comm_form.addEventListener('submit', function(e){
    e.preventDefault();
    oEditors.getById["editorTxt"].exec("UPDATE_CONTENTS_FIELD", []);
    console.log('dd');
    this.submit();
  });
}
smartEditor();
</script>
<!-- 버튼 -->
<ul class= "comm_write_btn">
  <li class="comm_cancel">
    <a href="community.php" title="취소버튼">취소</a>
  </li>
  <li class="comm_submit">
    <input type="submit" value="등록">
  </li>
</ul>

</article>

</main>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>