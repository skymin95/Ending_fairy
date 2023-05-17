<?php
$title = "검색"; // 타이틀
include_once('../common.php');
?>
<main>
  <!-- 검색 -->
  <div id="search">
    <h2>어떤 강의를<br>찾고 계신가요?</h2>
    <form action="<?=$base_URL?>sub/search/search_academy.php" method="get" id="tag_search">
      <fieldset>
        <legend class="hidden">태그 검색</legend>
        <div class="on_off">
          <input type="radio" id="on" name="cate" value="online" class="hidden" checked>
          <label for="on">온라인 강의</label>
          <input type="radio" id="off" name="cate" value="offline" class="hidden">
          <label for="off">오프라인 강의</label>
        </div>
        <input type="text" name="search" placeholder="원하는 강의 태그를 검색해보세요.">
        <button type="submit"><i class="fas fa-search"></i></button>
      </fieldset>
    </form>
    <ul class="tag">
      <li><a href="#none" title="입문자">#입문자</a></li>
      <li><a href="#none" title="일상">#일상</a></li>
      <li><a href="#none" title="피크닉">#피크닉</a></li>
      <li><a href="#none" title="야경사진">#야경사진</a></li>
      <li><a href="#none" title="전문가">#전문가</a></li>
    </ul>
    <a href="javascript:window.history.back();" title="닫기" class="close"><i class="fas fa-x"></i></a>
  </div>
</main>