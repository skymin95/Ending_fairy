<?php
$title = "회원 관리"; // 타이틀
include_once('./common.php');
$mb_id = $_SESSION['mb_id']; // 회원명
?>
<main>
<div class="tab_menu">
    <ul>
      <li class="a_title active "><a href="#tab1">전체</a></li>
      <li class="a_title"><a href="#tab2">강사</a></li>
      <li class="a_title"><a href="#tab3">수강생</a></li>
    </ul>

    <div id="tab1" class="tab_content active">
      <form action="" method="post" name="">
        <table>
          <colgroup>
            <col style="width: 80px;">
            <col style="width: 180px;">
            <col style="width: 180px;">
            <col style="width: 260px;">
            <col style="width: 80px;">
            <col style="width: 200px;">
            <col style="width: 220px;">
          </colgroup>
          <tr>
            <th>번호</th>
            <th>이름</th>
            <th>아이디</th>
            <th>이메일</th>
            <th>등급</th>
            <th>전화번호</th>
            <th>관리</th>
          </tr>
          <?php
            $query = 'select * from member order by mb_id desc'; //가장 최신 회원을 위로 올라오게 조회하여 데이터에 저장
            $result = mysqli_query($con, $query);
            while($data = mysqli_fetch_array($result)){
          ?>
          <tr>
            <td><?=$data['mb_no']?></td>
            <td><?=$data['mb_name']?></td>
            <td><?=$data['mb_id']?></td>
            <td><?=$data['mb_email']?></td>
            <td><?=$data['mb_level']?></td>
            <td><?=$data['mb_tel']?></td>
            <td>
              <button class="edit_btn"><a href="adm_member_insert.php?mb_no=<?=$data['mb_no']?>" title="수정">수정</a></button>
              <button class="del_btn"><a href="adm_member_delete.php?mb_no=<?=$data['mb_no']?>" title="삭제">삭제</a></button>
            </td>
          </tr>
          <?php } ?>
        </table>

        <!-- 검색 -->
        <div class="s_wrap">
          <label for="b_search">검색옵션</label>
          <select name="b_search" id="b_search">
            <option vlaue="검색옵션">검색옵션</option>
            <option vlaue="제목">제목</option>
            <option vlaue="내용">내용</option>
            <option vlaue="글쓴이">글쓴이</option>
          </select>
          <input type="text" placeholder="SEARCH">
          <button type="submit" class="s_btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        <!-- 페이지내이션 -->
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
      </form>
    </div>

    <div id="tab2" class="tab_content">
      <form action="" method="post" name="">
        <table>
          <colgroup>
            <col style="width: 80px;">
            <col style="width: 180px;">
            <col style="width: 180px;">
            <col style="width: 260px;">
            <col style="width: 80px;">
            <col style="width: 200px;">
            <col style="width: 220px;">
          </colgroup>
          <tr>
            <th>번호</th>
            <th>이름</th>
            <th>아이디</th>
            <th>이메일</th>
            <th>등급</th>
            <th>전화번호</th>
            <th>관리</th>
          </tr>
          <?php
            $query = 'select * from member where mb_level="9" order by mb_no desc';
            $result = mysqli_query($con, $query);
            while($data = mysqli_fetch_array($result)){
          ?>
          <tr>
            <td><?=$data['mb_no']?></td>
            <td><?=$data['mb_name']?></td>
            <td><?=$data['mb_id']?></td>
            <td><?=$data['mb_email']?></td>
            <td><?=$data['mb_level']?></td>
            <td><?=$data['mb_tel']?></td>
            <td>
              <button class="edit_btn"><a href="adm_member_insert.php?mb_no=<?=$data['mb_no']?>" title="수정">수정</a></button>
              <button class="del_btn"><a href="adm_member_delete.php?mb_no=<?=$data['mb_no']?>" title="삭제">삭제</a></button>
            </td>
          </tr>
          <?php } ?>
        </table>

        <!-- 검색 -->
        <div class="s_wrap">
          <label for="b_search">검색옵션</label>
          <select name="b_search" id="b_search">
            <option vlaue="검색옵션">검색옵션</option>
            <option vlaue="제목">제목</option>
            <option vlaue="내용">내용</option>
            <option vlaue="글쓴이">글쓴이</option>
          </select>
          <input type="text" placeholder="SEARCH">
          <button type="submit" class="s_btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        <!-- 페이지내이션 -->
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
      </form>
    </div>

    <div id="tab3" class="tab_content">
      <form action="" method="post" name="">
        <table>
          <colgroup>
            <col style="width: 80px;">
            <col style="width: 180px;">
            <col style="width: 180px;">
            <col style="width: 260px;">
            <col style="width: 80px;">
            <col style="width: 200px;">
            <col style="width: 220px;">
          </colgroup>
          <tr>
            <th>번호</th>
            <th>이름</th>
            <th>아이디</th>
            <th>이메일</th>
            <th>등급</th>
            <th>전화번호</th>
            <th>관리</th>
          </tr>
          <?php
            $query = 'select * from member where mb_level="1" order by mb_no desc';
            $result = mysqli_query($con, $query);
            while($data = mysqli_fetch_array($result)){
          ?>
          <tr>
            <td><?=$data['mb_no']?></td>
            <td><?=$data['mb_name']?></td>
            <td><?=$data['mb_id']?></td>
            <td><?=$data['mb_email']?></td>
            <td><?=$data['mb_level']?></td>
            <td><?=$data['mb_tel']?></td>
            <td>
              <button class="edit_btn"><a href="adm_member_insert.php?mb_no=<?=$data['mb_no']?>" title="수정">수정</a></button>
              <button class="del_btn"><a href="adm_member_delete.php?mb_no=<?=$data['mb_no']?>" title="삭제">삭제</a></button>
            </td>
          </tr>
          <?php } ?>
        </table>

        <!-- 검색 -->
        <div class="s_wrap">
          <label for="b_search">검색옵션</label>
          <select name="b_search" id="b_search">
            <option vlaue="검색옵션">검색옵션</option>
            <option vlaue="제목">제목</option>
            <option vlaue="내용">내용</option>
            <option vlaue="글쓴이">글쓴이</option>
          </select>
          <input type="text" placeholder="SEARCH">
          <button type="submit" class="s_btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        <!-- 페이지내이션 -->
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
      </form>
    </div>
  </div>
</main>
<?php
include_once('./footer.php');
?>