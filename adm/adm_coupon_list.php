<?php
$title = "쿠폰 관리"; // 타이틀
include_once('./common.php');
$mb_id = $_SESSION['mb_id']; // 회원명
$page = empty($_GET['page']) ? 1 : $_GET['page']; // 현재페이지
$cate = empty($_GET['cate']) ? 1 : $_GET['cate']; // 현재 카테고리

$sql_coupon = "SELECT * FROM coupon_list order by coupon_no desc";
$result_coupon = mysqli_query($con, $sql_coupon);

?>
<main>
  <div class="tab_menu">
    <ul>
      <li class="a_title active"><a href="#tab1">쿠폰관리</a></li>
    </ul>
    <a href="adm_coupon_insert.php" class="a_title board_wp" title="쿠폰추가">쿠폰추가</a>

    <div id="tab1" class="tab_content active">
      <form action="adm_coupon_search.php" method="get">
          <table>
              <colgroup>
                <col style="width: 153px;">
                <col style="width: 280px;">
                <col style="width: 213px;">
                <col style="width: 127px;">
                <col style="width: 213px;">
                <col style="width: 107px;">
                <col style="width: 251px;">
              </colgroup>
              <thead>
                <tr>
                  <th>쿠폰종류</th>
                  <th>쿠폰이름</th>
                  <th>쿠폰코드</th>
                  <th>할인금액</th>
                  <th>사용기간</th>
                  <th>사용횟수</th>
                  <th>관리</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                // 페이지내이션
                $num = mysqli_num_rows($result_coupon);
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

                $sql_coupon = "$sql_coupon limit $start, $list_num"; /* paging : 쿼리 작성 - limit 몇번부터, 몇개 */
                $result_coupon = mysqli_query($con, $sql_coupon); /* paging : 쿼리 전송 */
                $number = 0 + ($start);

                while($row_coupon = mysqli_fetch_assoc($result_coupon)) { ?>
                <tr>
                  <td><?=$row_coupon['coupon_kind']?></td>
                  <td><?=$row_coupon['coupon_title']?></td>
                  <td><?=$row_coupon['coupon_code']?></td>
                  <td><?=$row_coupon['coupon_sale']?></td>
                  <td>
                    <p class="date_s_e">등록 후 <?=$row_coupon['coupon_cdate']?>일
                      <span><?=date_format(date_create($row_coupon['coupon_sdate']), "Y-m-d").'<br/>'.date_format(date_create($row_coupon['coupon_edate']), "Y-m-d")?></span>
                    </p>
                  </td>
                  <td><?=$row_coupon['coupon_count'] == '0' ? '무제한' : '0'.'/'.$row_coupon['coupon_count']?></td>
                  <td>
                    <a href="adm_coupon_insert.php?coupon_no=<?=$row_coupon['coupon_no']?>" title="수정" class="b_btn edit_btn">수정</a>
                    <a href="adm_coupon_delete.php?coupon_no=<?=$row_coupon['coupon_no']?>" title="삭제" class="b_btn del_btn">삭제</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
          </table>

        
        <div class="s_wrap">
          <select name="category">
            <option value="">검색옵션</option>
            <option value="coupon_kind">쿠폰종류</option>
            <option value="coupon_title">쿠폰이름</option>
            <option value="coupon_sale">쿠폰금액</option>
            <option value="coupon_code">쿠폰코드</option>
            <option value="coupon_cdate">사용기간(시작일)</option>
            <option value="coupon_sdate">사용기간(종료일)</option>
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