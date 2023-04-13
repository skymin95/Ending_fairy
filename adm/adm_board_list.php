<?php
$title = "게시판 관리"; // 타이틀
include_once('./common.php');
$mb_id = $_SESSION['mb_id']; // 회원명
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
      <tr>
        <th>번호</th>
        <th>제목</th>
        <th>글쓴이</th>
        <th>등록일</th>
        <th>관리</th>
      </tr>
      <?php

$query = 'select * from board_notice order by notice_id desc'; //가장 최신글을 위로 올라오게 조회하여 데이터에 저장
$result = mysqli_query($con, $query);
      while($data = mysqli_fetch_array($result)){
        $sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_no = '".$data['mb_no']."'";
        $result_member = mysqli_query($con, $sql_member);
        $row_member = mysqli_fetch_array($result_member);
  ?>
        <tr>
        <td><?=$data['notice_id']?></td>
        <td><a href="adm_board_view.php?notice_id=<?=$data['notice_id']?>"><?=$data['notice_title']?></a></td>
        <td><?= ($row_member['mb_nick'] == '' ? $row_member['mb_name'] : $row_member['mb_nick'])?></td>
        <td><?=substr($data['mb_no'],0,10)?></td>
        <td></td>
      </tr>
        <?php } ?>
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