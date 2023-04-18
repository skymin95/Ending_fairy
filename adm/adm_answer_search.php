<?php
$title = "1:1문의 관리"; // 타이틀
include_once('./common.php');
$mb_id = $_SESSION['mb_id']; // 회원명
$page = empty($_GET['page']) ? 1 : $_GET['page']; // 현재페이지
$cate = empty($_GET['cate']) ? 1 : $_GET['cate']; // 현재 카테고리

$category = $_GET['category']; // 검색옵션
$search = $_GET['search']; // 검색내용

if($category==''){
  echo("<script>
    alert('검색 옵션을 선택해주세요.');
    history.back();
  </script>");
}else if($category=='mb_name'){
  $sql = "SELECT member.mb_name, member.mb_nick, member.mb_no, question.* FROM member INNER JOIN (SELECT origin.*
  FROM board_question AS origin 
  WHERE origin.question_id 
  NOT IN (SELECT a.question_id 
          FROM board_question AS a, 
            (SELECT question_parent_id 
              FROM board_question 
              WHERE question_parent_id IS NULL) AS b 
          WHERE a.question_id = b.question_parent_id) AND origin.question_parent_id IS NULL) AS question ON member.mb_no = question.mb_no
      WHERE member.mb_nick LIKE '%".$search."%' OR member.mb_name LIKE '%".$search."%'";
  $result = mysqli_query($con, $sql);

  //답변이 달려있지 않은 질문 조회
  $sql_w = "SELECT member.mb_name, member.mb_nick, member.mb_no, question.* FROM member INNER JOIN (SELECT origin.*
  FROM board_question AS origin 
  WHERE origin.question_id 
  NOT IN (SELECT a.question_id 
          FROM board_question AS a, 
            (SELECT question_parent_id 
              FROM board_question 
              WHERE question_parent_id IS NOT NULL) AS b 
          WHERE a.question_id = b.question_parent_id) AND origin.question_parent_id IS NULL) AS question ON member.mb_no = question.mb_no
      WHERE member.mb_nick LIKE '%".$search."%' OR member.mb_name LIKE '%".$search."%'";

  //답변이 달려있는 질문 조회
  $sql_c = "SELECT * FROM board_question AS a, 
  (SELECT question_parent_id FROM board_question WHERE question_parent_id IS NOT NULL) AS b,
  (SELECT mb_name, mb_nick, mb_no FROM member WHERE mb_name LIKE '%".$search."%' OR mb_nick LIKE '%".$search."%') AS member
  WHERE a.question_id = b.question_parent_id AND a.mb_no = member.mb_no";
}else{
  $sql = "SELECT * from board_question where question_parent_id is null AND $category like '%".$search."%' order by question_id desc";
  $result = mysqli_query($con, $sql);
  
  //답변이 달려있지 않은 질문 조회
  $sql_w = "SELECT origin.*
  FROM board_question AS origin 
  WHERE origin.question_id 
  NOT IN (SELECT a.question_id 
          FROM board_question AS a, 
            (SELECT question_parent_id 
              FROM board_question 
              WHERE question_parent_id IS NOT NULL) AS b 
          WHERE a.question_id = b.question_parent_id) AND origin.question_parent_id IS NULL AND $category like '%".$search."%' order by question_id desc";

  //답변이 달려있는 질문 조회
  $sql_c = "SELECT * FROM board_question AS a, (SELECT question_parent_id FROM board_question WHERE question_parent_id IS NOT NULL) AS b WHERE a.question_id = b.question_parent_id AND $category like '%".$search."%' order by question_id desc";
}
?>
<main>
  <div class="tab_menu answer">
    <ul>
      <li class="a_title active "><a href="#tab1">전체</a></li>
      <li class="a_title"><a href="#tab2">답변대기중</a></li>
      <li class="a_title"><a href="#tab3">답변완료</a></li>
    </ul>

    <!-- 전체 -->
    <div id="tab1" class="tab_content <?=(empty($_GET['cate']) ? 'active' : '')?>">
      <form action="adm_answer_search.php" method="get">
        <input type="hidden" name="cate" value="<?=$cate?>">
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
            // 페이지내이션
            $num = mysqli_num_rows($result);
            $list_num = 10; /* paging : 한 페이지 당 데이터 개수 */
            $page_num = 5; /* paging : 한 블럭 당 페이지 수 */
            // $page = isset($_GET["page"])? $_GET["page"] : 1; /* paging : 현재 페이지 */
            $total_page = ceil($num / $list_num); /* paging : 전체 페이지 수 = 전체 데이터 / 페이지당 데이터 개수, ceil : 올림값 */
            $total_block = ceil($total_page / $page_num); /* paging : 전체 블럭 수 = 전체 페이지 수 / 블럭 당 페이지 수 */
            $now_block = ceil($page / $page_num); /* paging : 현재 블럭 번호 = 현재 페이지 번호 / 블럭 당 페이지 수 */
            $s_pageNum = ($now_block - 1) * $page_num + 1; /* paging : 블럭 당 시작 페이지 번호 = (해당 글의 블럭번호 - 1) * 블럭당 페이지 수 + 1 */
            if($s_pageNum <= 0){ // 데이터가 0개인 경우
              $s_pageNum = 1;
            };
            $e_pageNum = $now_block * $page_num; /* paging : 블럭 당 마지막 페이지 번호 = 현재 블럭 번호 * 블럭 당 페이지 수 */
            if($e_pageNum > $total_page){ // 마지막 번호가 전체 페이지 수를 넘지 않도록
              $e_pageNum = $total_page;
            };
            $start = ($page - 1) * $list_num; /* paging : 시작 번호 = (현재 페이지 번호 - 1) * 페이지 당 보여질 데이터 수 */

            $sql = "$sql limit $start, $list_num"; /* paging : 쿼리 작성 - limit 몇번부터, 몇개 */
            $result = mysqli_query($con, $sql); /* paging : 쿼리 전송 */
            $number = 0 + ($start);

            // 데이터 출력
            while($data = mysqli_fetch_array($result)){
              $sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_no = '".$data['mb_no']."'";
              $result_member = mysqli_query($con, $sql_member);
              $row_member = mysqli_fetch_array($result_member);

              $sql_parent = "SELECT * FROM `board_question` AS a INNER JOIN (SELECT question_parent_id FROM `board_question` WHERE question_parent_id IS NOT NULL) AS b ON b.question_parent_id = a.question_id WHERE question_id = ".$data['question_id']."";
              $result_parent = mysqli_query($con, $sql_parent);
              $row_parent = mysqli_num_rows($result_parent);
            ?>
          <tr>
            <td><?=++$number?></td>
            <td><a href="adm_answer_insert.php?question_id=<?=$data['question_id']?>"><?=$data['question_title']?></a></td>
            <td><?= ($row_member['mb_nick'] == '' ? $row_member['mb_name'] : $row_member['mb_nick'])?></td>
            <td><?= date_format(date_create($data['question_wdate']), "Y-m-d") ?></td>
            <td><?= ($row_parent == '0' ? '답변대기중' : '답변완료')?></td>
            <td>
              <a href="adm_answer_insert.php?question_id=<?=$data['question_id']?>" title="<?= ($row_parent == '0' ? '답변' : '수정')?>" class="b_btn answer_btn <?= ($row_parent == '0' ? 'needanswer' : '')?>"><?= ($row_parent == '0' ? '답변' : '수정')?></a>
              <a href="adm_answer_delete.php?question_id=<?=$data['question_id']?>" title="삭제" class="b_btn del_btn">삭제</a>
            </td>
          </tr>
          <?php } ?>
        </table>

        <!-- 검색 -->
        <div class="s_wrap">
          <label for="category">검색옵션</label>
          <select name="category" id="category">
            <option value="">검색옵션</option>
            <option value="question_title">제목</option>
            <option value="question_content">내용</option>
            <option value="mb_name">글쓴이</option>
          </select>
          <script>document.getElementById('category').value = "<?=$_GET['category']?>";</script>
          <input type="text" name="search" placeholder="SEARCH">
          <button type="submit" class="s_btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        <!-- 페이지내이션 -->
        <div class="pagination">
          <ul class="pagination">
          <?php
            if($page <= 1){
          ?>
            <li><a href="?cate=<?=$cate?>&page=1" title="prev" class="prev"><i class="fa-solid fa-chevron-left"></i></a></li>
            <?php } else{ ?>
            <li><a href="?cate=<?=$cate?>&page=<?php echo ($page-1); ?>" title="prev" class="prev"><i class="fa-solid fa-chevron-left"></i></a></li>
            <?php }?>

            <?php
            for($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++){
            ?>
            <li <?=$page == $print_page ? ' class="p_on"' : ''?>><a href="?cate=<?=$cate?>&page=<?php echo $print_page; ?>" title=""><?php echo $print_page; ?></a></li>
            <?php }?>

            <?php
            if($page >= $total_page){
            ?>
            <li><a href="?cate=<?=$cate?>&page=<?php echo $total_page; ?>" title="next" class="next"><i class="fa-solid fa-chevron-right"></i></a></li>
            <?php } else{ ?>
              <li><a href="?cate=<?=$cate?>&page=<?php echo ($page+1); ?>" title="next" class="next"><i class="fa-solid fa-chevron-right"></i></a></li>
            <?php }?>
          </ul>
        </div>
      </form>
      <form action="adm_answer_list.php" method="GET" id="paging">
        <input type="hidden" name="page" value="<?=$page?>">
        <input type="hidden" name="cate" value="1">
      </form>
    </div>

    <!-- 답변대기중 -->
    <div id="tab2" class="tab_content">
      <form action="adm_answer_search.php" method="get">
        <input type="hidden" name="cate" value="<?=$cate?>">
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
            // 페이지내이션
            $num = mysqli_num_rows($result);
            $list_num = 10; /* paging : 한 페이지 당 데이터 개수 */
            $page_num = 5; /* paging : 한 블럭 당 페이지 수 */
            // $page = isset($_GET["page"])? $_GET["page"] : 1; /* paging : 현재 페이지 */
            $total_page = ceil($num / $list_num); /* paging : 전체 페이지 수 = 전체 데이터 / 페이지당 데이터 개수, ceil : 올림값 */
            $total_block = ceil($total_page / $page_num); /* paging : 전체 블럭 수 = 전체 페이지 수 / 블럭 당 페이지 수 */
            $now_block = ceil($page / $page_num); /* paging : 현재 블럭 번호 = 현재 페이지 번호 / 블럭 당 페이지 수 */
            $s_pageNum = ($now_block - 1) * $page_num + 1; /* paging : 블럭 당 시작 페이지 번호 = (해당 글의 블럭번호 - 1) * 블럭당 페이지 수 + 1 */
            if($s_pageNum <= 0){ // 데이터가 0개인 경우
              $s_pageNum = 1;
            };
            $e_pageNum = $now_block * $page_num; /* paging : 블럭 당 마지막 페이지 번호 = 현재 블럭 번호 * 블럭 당 페이지 수 */
            if($e_pageNum > $total_page){ // 마지막 번호가 전체 페이지 수를 넘지 않도록
              $e_pageNum = $total_page;
            };
            $start = ($page - 1) * $list_num; /* paging : 시작 번호 = (현재 페이지 번호 - 1) * 페이지 당 보여질 데이터 수 */

            $sql = "$sql_w limit $start, $list_num"; /* paging : 쿼리 작성 - limit 몇번부터, 몇개 */
            $result = mysqli_query($con, $sql); /* paging : 쿼리 전송 */
            $number = 0 + ($start);

            // 데이터 출력
            while($data = mysqli_fetch_array($result)){
              $sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_no = '".$data['mb_no']."'";
              $result_member = mysqli_query($con, $sql_member);
              $row_member = mysqli_fetch_array($result_member);
            ?>
          <tr>
            <td><?=++$number?></td>
            <td><a href="adm_answer_insert.php?question_id=<?=$data['question_id']?>"><?=$data['question_title']?></a></td>
            <td><?= ($row_member['mb_nick'] == '' ? $row_member['mb_name'] : $row_member['mb_nick'])?></td>
            <td><?= date_format(date_create($data['question_wdate']), "Y-m-d") ?></td>
            <td>답변대기중</td>
            <td>
              <a href="adm_answer_insert.php?question_id=<?=$data['question_id']?>" title="답변" class="b_btn answer_btn needanswer">답변</a>
              <a href="adm_answer_delete.php?question_id=<?=$data['question_id']?>" title="삭제" class="b_btn del_btn">삭제</a>
            </td>
          </tr>
          <?php } ?>
        </table>

        <!-- 검색 -->
        <div class="s_wrap">
          <label for="category">검색옵션</label>
          <select name="category" id="category">
            <option value="">검색옵션</option>
            <option value="question_title">제목</option>
            <option value="question_content">내용</option>
            <option value="mb_name">글쓴이</option>
          </select>
          <script>document.getElementById('category').value = "<?=$_GET['category']?>";</script>
          <input type="text" name="search" placeholder="SEARCH">
          <button type="submit" class="s_btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        <!-- 페이지내이션 -->
        <div class="pagination">
          <ul class="pagination">
          <?php
            if($page <= 1){
          ?>
            <li><a href="?cate=<?=$cate?>&page=1" title="prev" class="prev"><i class="fa-solid fa-chevron-left"></i></a></li>
            <?php } else{ ?>
            <li><a href="?cate=<?=$cate?>&page=<?php echo ($page-1); ?>" title="prev" class="prev"><i class="fa-solid fa-chevron-left"></i></a></li>
            <?php }?>

            <?php
            for($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++){
            ?>
            <li <?=$page == $print_page ? ' class="p_on"' : ''?>><a href="?cate=<?=$cate?>&page=<?php echo $print_page; ?>" title=""><?php echo $print_page; ?></a></li>
            <?php }?>

            <?php
            if($page >= $total_page){
            ?>
            <li><a href="?cate=<?=$cate?>&page=<?php echo $total_page; ?>" title="next" class="next"><i class="fa-solid fa-chevron-right"></i></a></li>
            <?php } else{ ?>
              <li><a href="?cate=<?=$cate?>&page=<?php echo ($page+1); ?>" title="next" class="next"><i class="fa-solid fa-chevron-right"></i></a></li>
            <?php }?>
          </ul>
        </div>
      </form>
      <form action="adm_answer_list.php" method="GET" id="paging">
        <input type="hidden" name="page" value="<?=$page?>">
        <input type="hidden" name="cate" value="1">
      </form>
    </div>

    <!-- 답변완료 -->
    <div id="tab3" class="tab_content">
      <form action="adm_answer_search.php" method="get">
        <input type="hidden" name="cate" value="<?=$cate?>">
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
            // 페이지내이션
            $num = mysqli_num_rows($result);
            $list_num = 10; /* paging : 한 페이지 당 데이터 개수 */
            $page_num = 5; /* paging : 한 블럭 당 페이지 수 */
            // $page = isset($_GET["page"])? $_GET["page"] : 1; /* paging : 현재 페이지 */
            $total_page = ceil($num / $list_num); /* paging : 전체 페이지 수 = 전체 데이터 / 페이지당 데이터 개수, ceil : 올림값 */
            $total_block = ceil($total_page / $page_num); /* paging : 전체 블럭 수 = 전체 페이지 수 / 블럭 당 페이지 수 */
            $now_block = ceil($page / $page_num); /* paging : 현재 블럭 번호 = 현재 페이지 번호 / 블럭 당 페이지 수 */
            $s_pageNum = ($now_block - 1) * $page_num + 1; /* paging : 블럭 당 시작 페이지 번호 = (해당 글의 블럭번호 - 1) * 블럭당 페이지 수 + 1 */
            if($s_pageNum <= 0){ // 데이터가 0개인 경우
              $s_pageNum = 1;
            };
            $e_pageNum = $now_block * $page_num; /* paging : 블럭 당 마지막 페이지 번호 = 현재 블럭 번호 * 블럭 당 페이지 수 */
            if($e_pageNum > $total_page){ // 마지막 번호가 전체 페이지 수를 넘지 않도록
              $e_pageNum = $total_page;
            };
            $start = ($page - 1) * $list_num; /* paging : 시작 번호 = (현재 페이지 번호 - 1) * 페이지 당 보여질 데이터 수 */

            $sql = "$sql_c limit $start, $list_num"; /* paging : 쿼리 작성 - limit 몇번부터, 몇개 */
            $result = mysqli_query($con, $sql); /* paging : 쿼리 전송 */
            $number = 0 + ($start);

            // 데이터 출력
            while($data = mysqli_fetch_array($result)){
              $sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_no = '".$data['mb_no']."'";
              $result_member = mysqli_query($con, $sql_member);
              $row_member = mysqli_fetch_array($result_member);
            ?>
          <tr>
            <td><?=++$number?></td>
            <td><a href="adm_answer_insert.php?question_id=<?=$data['question_id']?>"><?=$data['question_title']?></a></td>
            <td><?= ($row_member['mb_nick'] == '' ? $row_member['mb_name'] : $row_member['mb_nick'])?></td>
            <td><?= date_format(date_create($data['question_wdate']), "Y-m-d") ?></td>
            <td>답변완료</td>
            <td>
              <a href="adm_answer_insert.php?question_id=<?=$data['question_id']?>" title="수정" class="b_btn answer_btn">수정</a>
              <a href="adm_answer_delete.php?question_id=<?=$data['question_id']?>" title="삭제" class="b_btn del_btn">삭제</a>
            </td>
          </tr>
          <?php } ?>
        </table>

        <!-- 검색 -->
        <div class="s_wrap">
          <label for="category">검색옵션</label>
          <select name="category" id="category">
            <option value="">검색옵션</option>
            <option value="question_title">제목</option>
            <option value="question_content">내용</option>
            <option value="mb_name">글쓴이</option>
          </select>
          <script>document.getElementById('category').value = "<?=$_GET['category']?>";</script>
          <input type="text" name="search" placeholder="SEARCH">
          <button type="submit" class="s_btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        <!-- 페이지내이션 -->
        <div class="pagination">
          <ul class="pagination">
          <?php
            if($page <= 1){
          ?>
            <li><a href="?cate=<?=$cate?>&page=1" title="prev" class="prev"><i class="fa-solid fa-chevron-left"></i></a></li>
            <?php } else{ ?>
            <li><a href="?cate=<?=$cate?>&page=<?php echo ($page-1); ?>" title="prev" class="prev"><i class="fa-solid fa-chevron-left"></i></a></li>
            <?php }?>

            <?php
            for($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++){
            ?>
            <li <?=$page == $print_page ? ' class="p_on"' : ''?>><a href="?cate=<?=$cate?>&page=<?php echo $print_page; ?>" title=""><?php echo $print_page; ?></a></li>
            <?php }?>

            <?php
            if($page >= $total_page){
            ?>
            <li><a href="?cate=<?=$cate?>&page=<?php echo $total_page; ?>" title="next" class="next"><i class="fa-solid fa-chevron-right"></i></a></li>
            <?php } else{ ?>
              <li><a href="?cate=<?=$cate?>&page=<?php echo ($page+1); ?>" title="next" class="next"><i class="fa-solid fa-chevron-right"></i></a></li>
            <?php }?>
          </ul>
        </div>
      </form>
      <form action="adm_answer_list.php" method="GET" id="paging">
        <input type="hidden" name="page" value="<?=$page?>">
        <input type="hidden" name="cate" value="1">
      </form>
    </div>
  </div>
</main>
<?php
include_once('./footer.php');
?>