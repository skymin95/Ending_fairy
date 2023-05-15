<?php
$title = "마이페이지 > 1:1문의 글쓰기"; // 타이틀
include_once('../common.php');
?>
<script type="text/javascript" src="<?=$base_URL?>se2/js/HuskyEZCreator.js" charset="utf-8"></script>
<main>

<h2 class="sub_title_prev">
  <a href="question.php" title="돌아가기">
  <img src="<?=$base_URL?>images/arrow_title_prev.svg" alt="prev">
  1:1문의
  </a>
</h2>
<form name="question_write" id="question_w_form" method="post" action="">

<article class="question_write_box">
<input type="text" placeholder="제목을 입력하세요." class="q_write_input">

<textarea name="editorTxt" id="editorTxt" rows="10" cols="100" style="width: 100%;min-width:260px;" class="q_editor"></textarea>
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




</article>

</main>