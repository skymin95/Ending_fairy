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
      <a href="adm_board_insert.php" class="board_wp">글쓰기</a>
    </ul>

    <div id="tab1" class="tab_content active">
    <table>
        <th>번호</th>
        <th>제목</th>
        <th>글쓴이</th>
        <th>등록일</th>
        <th>관리</th>
        <tr>
          <td>8</td>
          <td>4월 캐논아카데미 오프라인 강의 안내</td>
          <td>관리자</td>
          <td>23-03-26</td>
          <td>수정/삭제</td>
        </tr>
      </table>
    </div>

    <div id="tab2" class="tab_content">
      탭 2 
    </div>

    <div id="tab3" class="tab_content">
      탭 3
    </div>
  </div>
</main>
<?php
include_once('./footer.php');
?>