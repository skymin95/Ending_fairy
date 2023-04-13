<?php
$title = "게시판 관리"; // 타이틀
include_once('./common.php');
?>
<main>
  <div class="tab_menu">
    <ul>
      <li class="active"><a href="#tab1" title="공지사항">공지사항</a></li>
      <li><a href="#tab2" title="이벤트">이벤트</a></li>
      <li><a href="#tab3" title="커뮤니티">커뮤니티</a></li>
      <a href="adm_board_insert.php" title="글쓰기" class="board_wp">글쓰기</a>
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
          <td><a href="" title="">4월 캐논아카데미 오프라인 강의 안내</a></td>
          <td>관리자</td>
          <td>23-03-26</td>
          <td>
            <button class="edit_btn"><a href="" title="수정">수정</a></button>
            <button class="del_btn"><a href="" title="삭제">삭제</a></button>
          </td>
        </tr>
        <tr>
          <td>8</td>
          <td><a href="" title="">4월 캐논아카데미 오프라인 강의 안내</a></td>
          <td>관리자</td>
          <td>23-03-26</td>
          <td>
            <button class="edit_btn"><a href="" title="수정">수정</a></button>
            <button class="del_btn"><a href="" title="삭제">삭제</a></button>
          </td>
        </tr>
        <tr>
          <td>8</td>
          <td><a href="" title="">4월 캐논아카데미 오프라인 강의 안내</a></td>
          <td>관리자</td>
          <td>23-03-26</td>
          <td>
            <button class="edit_btn"><a href="" title="수정">수정</a></button>
            <button class="del_btn"><a href="" title="삭제">삭제</a></button>
          </td>
        </tr>
        <tr>
          <td>8</td>
          <td><a href="" title="">4월 캐논아카데미 오프라인 강의 안내</a></td>
          <td>관리자</td>
          <td>23-03-26</td>
          <td>
            <button class="edit_btn"><a href="" title="수정">수정</a></button>
            <button class="del_btn"><a href="" title="삭제">삭제</a></button>
          </td>
        </tr>
        <tr>
          <td>8</td>
          <td><a href="" title="">4월 캐논아카데미 오프라인 강의 안내</a></td>
          <td>관리자</td>
          <td>23-03-26</td>
          <td>
            <button class="edit_btn"><a href="" title="수정">수정</a></button>
            <button class="del_btn"><a href="" title="삭제">삭제</a></button>
          </td>
        </tr>
      </table>
      <div class="pagination">
        <ul class="pagination">
          <a class="prev" href="?page=1" title="prev"><i class="fa-solid fa-chevron-left"></i></a>
          <li class="p_on"><a href="?page=1" title="">1</a></li>
          <li><a href="?page=2" title="">2</a></li>
          <li><a href="?page=3" title="">3</a></li>
          <li><a href="?page=4" title="">4</a></li>
          <li><a href="?page=5" title="">5</a></li>
          <a class="next" href="?page=2" title="next"><i class="fa-solid fa-chevron-right"></i></a>
        </ul>            
      </div>
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