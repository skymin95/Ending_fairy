<?php
$title = "게시판 관리"; // 타이틀
include_once('./common.php');
$mb_id = $_SESSION['mb_id']; // 회원명
$page = empty($_GET['page']) ? 1 : $_GET['page']; // 현재페이지
$cate = empty($_GET['cate']) ? 1 : $_GET['cate']; // 현재 카테고리
$category = empty($_GET['category']) ? 1 : $_GET['category']; // 현재 카테고리

switch($cate) {
  case '1': $cate_name = '공지사항'; $cate_table = 'notice'; break;
  case '2': $cate_name = '이벤트'; $cate_table = 'event'; break;
  case '3': $cate_name = '커뮤니티'; $cate_table = 'community'; break;
  default: $cate_name = '공지사항';  break;
}
?>
<main>
  <div class="tab_menu board">
    <ul>
      <li class="a_title active"><a href="#tab1">공지사항</a></li>
      <li class="a_title"><a href="#tab2">이벤트</a></li>
      <li class="a_title"><a href="#tab3">커뮤니티</a></li>
      <a href="adm_board_insert.php?cate=<?=$cate?>" class="a_title board_wp"  title="글쓰기">글쓰기</a>
    </ul>

    <div id="tab1" class="tab_content <?=(empty($_GET['cate']) ? 'active' : '')?>">
      <form action="adm_board_search.php" method="get">
        <input type="hidden" name="cate" value="<?=$cate?>">
        <table>
          <colgroup>
            <col style="width: 80px;">
            <col style="width: 550px;">
            <col style="width: 150px;">
            <col style="width: 250px;">
            <col style="width: 220px;">
          </colgroup>
          <tr>
            <th>번호</th>
            <th>제목</th>
            <th>글쓴이</th>
            <th>등록일</th>
            <th>관리</th>
          </tr>     
          <?php
            $sql = "select * from board_notice order by notice_id desc;";
            $result = mysqli_query($con, $sql);

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

            $sql = "select * from board_notice order by notice_id desc limit $start, $list_num"; /* paging : 쿼리 작성 - limit 몇번부터, 몇개 */
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
            <td><a href="adm_board_view.php?board_id=<?=$data['notice_id']?>&cate=<?=$cate?>"><?=$data['notice_title']?></a></td>
            <td><?= ($row_member['mb_nick'] == '' ? $row_member['mb_name'] : $row_member['mb_nick'])?></td>
            <td><?=date_format(date_create($data['notice_wdate']), "Y-m-d")?></td>
            <td>
              <a href="adm_board_view.php?board_id=<?=$data['notice_id']?>&cate=<?=$cate?>" title="수정" class="b_btn edit_btn">수정</a>
              <a href="adm_board_del.php?board_id=<?=$data['notice_id']?>&cate=<?=$cate?>" title="삭제" class="b_btn del_btn">삭제</a>
            </td>
          </tr>
          <?php } ?>
        </table>

        <!-- 검색 -->
        <div class="s_wrap">
          <label for="category">검색옵션</label>
          <select name="category" id="category">
            <option value="">검색옵션</option>
            <option value="notice_title" <?=$category=="notice_title" ? "selected" : ""?>>제목</option>
            <option value="notice_content" <?=$category=="notice_content" ? "selected" : ""?>>내용</option>
          </select>
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
      <form action="adm_board_list.php" method="GET" id="paging">
        <input type="hidden" name="page" value="<?=$page?>">
        <input type="hidden" name="cate" value="1">
      </form>
    </div>

    <div id="tab2" class="tab_content">
      <form action="adm_board_search.php" method="get">
        <input type="hidden" name="cate" value="<?=$cate?>">
        <table>
          <colgroup>
            <col style="width: 80px;">
            <col style="width: 600px;">
            <col style="width: 300px;">
            <col style="width: 220px;">
          </colgroup>
          <tr>
            <th>번호</th>
            <th>제목</th>
            <th>기간</th>
            <th>관리</th>
          </tr>       
          <?php
            $sql = "select * from board_event order by event_id desc;";
            $result = mysqli_query($con, $sql);

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

            $sql = "select * from board_event order by event_id desc limit $start, $list_num;"; /* paging : 쿼리 작성 - limit 몇번부터, 몇개 */
            $result = mysqli_query($con, $sql); /* paging : 쿼리 전송 */
            $number = 0 + ($start);

            // 데이터 출력
            while($data = mysqli_fetch_array($result)){
          ?>
          <tr>
            <td><?=++$number?></td>
            <td><a href="adm_board_view.php?board_id=<?=$data['event_id']?>&cate=<?=$cate?>"><?=$data['event_title']?></a></td>
            <td><?=date_format(date_create($data['event_sdate']), "Y-m-d").' ~ '.date_format(date_create($data['event_edate']), "Y-m-d")?></td>
            <td>
              <a href="adm_board_view.php?board_id=<?=$data['event_id']?>&cate=<?=$cate?>" title="수정" class="b_btn edit_btn">수정</a>
              <a href="adm_board_del.php?board_id=<?=$data['event_id']?>&cate=<?=$cate?>" title="삭제" class="b_btn del_btn">삭제</a>
            </td>
          </tr>
          <?php } ?>
        </table>

        <!-- 검색 -->
        <div class="s_wrap">
          <label for="category">검색옵션</label>
          <select name="category" id="category">
            <option value="">검색옵션</option>
            <option value="event_title" <?=$category=="event_title" ? "selected" : ""?>>제목</option>
            <option value="event_sdate" <?=$category=="event_sdate" ? "selected" : ""?>>시작일</option>
            <option value="event_edate" <?=$category=="event_edate" ? "selected" : ""?>>종료일</option>
          </select>
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
      <form action="adm_board_list.php" method="GET" id="paging">
        <input type="hidden" name="page" value="<?=$page?>">
        <input type="hidden" name="cate" value="1">
      </form>
    </div>

    <div id="tab3" class="tab_content">
      <form action="adm_board_search.php" method="get">
        <input type="hidden" name="cate" value="<?=$cate?>">
        <table>
          <colgroup>
            <col style="width: 80px;">
            <col style="width: 550px;">
            <col style="width: 150px;">
            <col style="width: 250px;">
            <col style="width: 220px;">
          </colgroup>
          <tr>
            <th>번호</th>
            <th>제목</th>
            <th>글쓴이</th>
            <th>등록일</th>
            <th>관리</th>
          </tr>      
          <?php
            $sql = "select * from board_community order by community_id desc;";
            $result = mysqli_query($con, $sql);

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

            $sql = "select * from board_community order by community_id desc limit $start, $list_num;"; /* paging : 쿼리 작성 - limit 몇번부터, 몇개 */
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
            <td><a href="adm_board_view.php?board_id=<?=$data['community_id']?>&cate=<?=$cate?>"><?=$data['community_title']?></a></td>
            <td><?= ($row_member['mb_nick'] == '' ? $row_member['mb_name'] : $row_member['mb_nick'])?></td>
            <td><?=date_format(date_create($data['community_wdate']), "Y-m-d H:i")?></td>
            <td>
              <a href="adm_board_view.php?board_id=<?=$data['community_id']?>&cate=<?=$cate?>" title="수정" class="b_btn edit_btn">수정</a>
              <a href="adm_board_del.php?board_id=<?=$data['community_id']?>&cate=<?=$cate?>" title="삭제" class="b_btn del_btn">삭제</a>
            </td>
          </tr>
          <?php } ?>
        </table>

        <!-- 검색 -->
        <div class="s_wrap">
          <label for="category">검색옵션</label>
          <select name="category" id="category">
            <option value="">검색옵션</option>
            <option value="community_title" <?=$category=="community_title" ? "selected" : ""?>>제목</option>
            <option value="community_content" <?=$category=="community_content" ? "selected" : ""?>>내용</option>
            <option value="mb_name" <?=$category=="mb_name" ? "selected" : ""?>>글쓴이</option>
          </select>
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
      <form action="adm_board_list.php" method="GET" id="paging">
        <input type="hidden" name="page" value="<?=$page?>">
        <input type="hidden" name="cate" value="1">
      </form>
    </div>
  </div>
</main>
<?php
include_once('./footer.php');
?>