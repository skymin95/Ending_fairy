<?php
$title = "검색"; // 타이틀
include_once('../common.php');
?>
<main>
  <!-- 검색 -->
  <div id="search">
    <h2>어떤 강의를<br>찾고 계신가요?</h2>
    <form action="" name="" method="">
      <fieldset>
        <legend>태그 검색</legend>
        <input type="text" placeholder="원하는 강의 태그를 검색해보세요.">
      </fieldset>
    </form>
    <ul>
      <li><a href="#none" title="">#입문자</a></li>
      <li><a href="#none" title="">#일상</a></li>
      <li><a href="#none" title="">#피크닉</a></li>
      <li><a href="#none" title="">#야경사진</a></li>
      <li><a href="#none" title="">#전문가</a></li>
    </ul>
    <a href="javascript:window.history.back();" title="닫기" class="close"><i class="fas fa-x"></i></a>
  </div>
</main>