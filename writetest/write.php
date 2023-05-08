<?php
$title = "캐논 아카데미"; // 타이틀
include_once('../common.php');
empty($_SESSION['mb_id']) || $mb_id = $_SESSION['mb_id']."님 환영합니다.";

?>
<style>
  main {padding: 20px;}
</style>
<script type="text/javascript" src="<?=$base_URL?>se2/js/HuskyEZCreator.js" charset="utf-8"></script>
<main>
  <textarea name="editorTxt" id="editorTxt" rows="10" cols="100" style="width: 100%;min-width:260px;"></textarea>
</main>
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
<?php
include_once('../footer.php');
?>