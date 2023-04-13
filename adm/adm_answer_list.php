<?php
$title = "1:1문의 관리"; // 타이틀
include_once('./common.php');
$mb_id = $_SESSION['mb_id']; // 회원명
?>
<main>
<div class="tab_menu">
    <ul>
      <li class="a_title active "><a href="#tab1">전체</a></li>
      <li class="a_title"><a href="#tab2">답변대기중</a></li>
      <li class="a_title"><a href="#tab3">답변완료</a></li>
    </ul>

    <div id="tab1" class="tab_content active">
      <form action="" method="post" name="">
        <table>
          <colgroup>
            <col style="width: 80px;">
            <col style="width: 400px;">
            <col style="width: 150px;">
            <col style="width: 250px;">
            <col style="width: 100px;">
            <col style="width: 220px;">
          </colgroup>
          <tr>
            <th>번호</th>
            <th>제목</th>
            <th>글쓴이</th>
            <th>등록일</th>
            <th>상태</th>
            <th>관리</th>
          </tr>
          <?php
            $query = 'select * from board_question order by question_id desc'; //가장 최근 질문을 위로 올라오게 조회하여 데이터에 저장
            $result = mysqli_query($con, $query);
            while($data = mysqli_fetch_array($result)){
              $sql_member = "SELECT mb_no, mb_name, mb_nick FROM member WHERE mb_no = '".$data['mb_no']."'";
              $result_member = mysqli_query($con, $sql_member);
              $row_member = mysqli_fetch_array($result_member);
          ?>
          <tr>
            <td><?=$data['question_id']?></td>
            <td><?=$data['question_title']?></td>
            <td><?= ($row_member['mb_nick'] == '' ? $row_member['mb_name'] : $row_member['mb_nick'])?></td>
            <td><?=$data['question_wdate']?></td>
            <td><?= ($data['question_parent_id'] == '0' ? '답변대기중' : '답변완료')?></td>
            <td>
              <button class="answer_btn"><a href="" title="답변">답변</a></button>
              <button class="del_btn"><a href="" title="삭제">삭제</a></button>
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
            <col style="width: 400px;">
            <col style="width: 150px;">
            <col style="width: 250px;">
            <col style="width: 100px;">
            <col style="width: 220px;">
          </colgroup>
          <tr>
            <th>번호</th>
            <th>제목</th>
            <th>글쓴이</th>
            <th>등록일</th>
            <th>상태</th>
            <th>관리</th>
          </tr>
          <?php
            $query = 'select * from board_question where question_id is null order by question_id desc'; //가장 최근 질문을 위로 올라오게 조회하여 데이터에 저장
            $result = mysqli_query($con, $query);
            while($data = mysqli_fetch_array($result)){
              $sql_member = "SELECT mb_no, mb_name, mb_nick FROM member WHERE mb_no = '".$data['mb_no']."'";
              $result_member = mysqli_query($con, $sql_member);
              $row_member = mysqli_fetch_array($result_member);
          ?>
          <tr>
            <td><?=$data['question_id']?></td>
            <td><?=$data['question_title']?></td>
            <td><?= ($row_member['mb_nick'] == '' ? $row_member['mb_name'] : $row_member['mb_nick'])?></td>
            <td><?=$data['question_wdate']?></td>
            <td><?= ($data['question_parent_id'] == '0' ? '답변대기중' : '답변완료')?></td>
            <td>
              <button class="answer_btn"><a href="" title="답변">답변</a></button>
              <button class="del_btn"><a href="" title="삭제">삭제</a></button>
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
            <col style="width: 400px;">
            <col style="width: 150px;">
            <col style="width: 250px;">
            <col style="width: 100px;">
            <col style="width: 220px;">
          </colgroup>
          <tr>
            <th>번호</th>
            <th>제목</th>
            <th>글쓴이</th>
            <th>등록일</th>
            <th>상태</th>
            <th>관리</th>
          </tr>
          <?php
            $query = 'select * from board_question where question_parent_id is not null order by question_id desc'; //가장 최근 질문을 위로 올라오게 조회하여 데이터에 저장
            $result = mysqli_query($con, $query);
            while($data = mysqli_fetch_array($result)){
              $sql_member = "SELECT mb_no, mb_name, mb_nick FROM member WHERE mb_no = '".$data['mb_no']."'";
              $result_member = mysqli_query($con, $sql_member);
              $row_member = mysqli_fetch_array($result_member);
          ?>
          <tr>
            <td><?=$data['question_id']?></td>
            <td><?=$data['question_title']?></td>
            <td><?= ($row_member['mb_nick'] == '' ? $row_member['mb_name'] : $row_member['mb_nick'])?></td>
            <td><?=$data['question_wdate']?></td>
            <td><?= ($data['question_parent_id'] == '0' ? '답변대기중' : '답변완료')?></td>
            <td>
              <button class="answer_btn"><a href="" title="답변">답변</a></button>
              <button class="del_btn"><a href="" title="삭제">삭제</a></button>
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