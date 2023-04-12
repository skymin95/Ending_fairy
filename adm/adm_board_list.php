<?php
$title = "게시판 관리"; // 타이틀
include_once('./common.php');
?>
<main>
<div class="tab_menu">
    <ul>
      <li class="active"><a href="#tab1">공지사항</a></li>
      <li><a href="#tab2">이벤트</a></li>
      <li><a href="#tab3">커뮤니티</a></li>
    </ul>

    <div id="tab1" class="tab_content active">
      th
    </div>

    <div id="tab2" class="tab_content">
      탭 2 내용
    </div>

    <div id="tab3" class="tab_content">
      탭 3 내용
    </div>
  </div>
</main>
<?php
include_once('./footer.php');
?>