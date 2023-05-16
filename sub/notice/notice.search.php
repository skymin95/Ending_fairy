<?php
$title = "마이페이지 > 공지사항"; // 타이틀
include_once('../common.php');
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
  <article id="notice_wrap">
  <h2>공지사항</h2>
  <div class="notice_box">
  <ul class="notice_ul">
    <form name="notice" id="notice_form" method="get" action="notice.php">
      <?php
      $sql_notice = "select * from board_notice order by notice_id desc limit 8;";
      $result_notice= mysqli_query($con, $sql_notice);

        // 페이지내이션
        $num = mysqli_num_rows($result_notice);
        $list_num = 7; /* paging : 한 페이지 당 데이터 개수 */
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
        $result_notice = mysqli_query($con, $sql); /* paging : 쿼리 전송 */
        $number = 0 + ($start);
  
      // 데이터 출력
      while($data = mysqli_fetch_array($result_notice)){
        $sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_no = '".$data['mb_no']."'";
        $result_member = mysqli_query($con, $sql_member);
        $row_member = mysqli_fetch_array($result_member);
      ?>
      <li>
        <a href="notice_view.php?board_id=<?=$data['notice_id']?>" title="<?=$data['notice_title']?>">
          <p><?=$data['notice_title']?></p>
          <span><?= ($row_member['mb_nick'] == '' ? $row_member['mb_name'] : $row_member['mb_nick'])?> /</span>
          <span><?=date_format(date_create($data['notice_wdate']), "Y-m-d")?></span>
        </a>
      </li>
      <?php } ?>
    </ul>
    </div>
    <!-- 검색박스 -->
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
    </article>
</main>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>