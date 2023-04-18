<?php
$title = "강의 관리"; // 타이틀
include_once('./common.php');
$mb_id = $_SESSION['mb_id']; // 회원명
$page = empty($_GET['page']) ? 1 : $_GET['page']; // 현재페이지
$cate = empty($_GET['cate']) ? 1 : $_GET['cate']; // 현재 카테고리
?>
<main>
  <div class="tab_menu academy">
    <ul>
      <li class="a_title <?=(empty($_GET['cate']) ? 'active' : '')?>"><a href="#tab1">온라인 강의</a></li>
      <li class="a_title"><a href="#tab2">오프라인 강의</a></li>
      <a href="adm_academy_insert.php" class="a_title board_wp" title="강의추가">강의추가</a>
    </ul>

    <div id="tab1" class="tab_content <?=(empty($_GET['cate']) ? 'active' : '')?>">
      <form action="adm_academy_search.php" method="get">
        <input type="hidden" name="cate" value="<?=$cate?>">
        <table>
          <colgroup>
            <col style="width: 120px;">
            <col style="width: 200px;">
            <col style="width: 90px;">
            <col style="width: 90px;">
            <col style="width: 90px;">
            <col style="width: 100px;">
            <col style="width: 110px;">
            <col style="width: 110px;">
            <col style="width: 110px;">
            <col style="width: 220px;">
          </colgroup>
          <tr>
            <th>썸네일</th>
            <th>강의명</th>
            <th>강의분류</th>
            <th>교육시간</th>
            <th>담당강사</th>
            <th>강의가격</th>
            <th>강의신청기간</th>
            <th>강의교육기간</th>
            <th>강의태그</th>
            <th>관리</th>
          </tr>          
          <?php
            $sql = "select * from course where course_cate = '온라인' order by course_id desc;";
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

            $sql = "select * from course where course_cate = '온라인' order by course_id desc limit $start, $list_num;"; /* paging : 쿼리 작성 - limit 몇번부터, 몇개 */
            $result = mysqli_query($con, $sql); /* paging : 쿼리 전송 */
            $number = 0 + ($start);
            
            // 데이터 출력
            function getYoutubeThumb($url) {
              if($url)  {
                preg_match_all('/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/', $url, $matchs);
                return "https://img.youtube.com/vi/" .$matchs[7][0]."/mqdefault.jpg";
              }
          }
            while($data = mysqli_fetch_array($result)){
          ?>
          <tr>
            <td><img src="<?=empty($data['course_img']) ? getYoutubeThumb($data['course_link']) : "../images/".$data['course_img']?>" alt="<?=$data['course_title']?>"></td>
            <td><?=$data['course_title']?></td>
            <td><?=$data['course_cate']?></td>
            <td><?=$data['course_edu_time']?></td>
            <td><?=$data['course_teacher']?></td>
            <td><?=number_format($data['course_price'])?></td>
            <td><?=date_format(date_create($data['course_ask_sdate']), "Y-m-d")?> ~ <?=date_format(date_create($data['course_ask_edate']), "Y-m-d")?></td>
            <td><?=date_format(date_create($data['course_edu_sdate']), "Y-m-d")?> ~ <?=date_format(date_create($data['course_edu_edate']), "Y-m-d")?></td>
            <td><ul><li><?=str_replace(",", "</li><li>", $data['course_tag'])?></li></ul></td>
            <td>
              <a href="adm_academy_insert.php?course_id=<?=$data['course_id']?>" title="수정" class="b_btn edit_btn">수정</a>
              <a href="adm_academy_delete.php?course_id=<?=$data['course_id']?>" title="삭제" class="b_btn del_btn">삭제</a>
            </td>
          </tr>
          <?php } ?>
        </table>

        <!-- 검색 -->
        <div class="s_wrap">
          <select name="category">
            <option value="">검색옵션</option>
            <option value="course_title">강의명</option>
            <option value="course_edu_time">교육시간</option>
            <option value="course_teacher">담당강사</option>
            <option value="course_price">강의가격</option>
            <option value="course_ask_sdate">신청기간(시작일)</option>
            <option value="course_ask_edate">신청기간(종료일)</option>
            <option value="course_edu_sdate">교육기간(시작일)</option>
            <option value="course_edu_edate">교육기간(종료일)</option>
            <option value="course_tag">강의태그</option>
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
      <form action="adm_academy_list.php" method="GET" id="paging">
        <input type="hidden" name="page" value="<?=$page?>">
        <input type="hidden" name="cate" value="1">
      </form>
    </div>

    <div id="tab2" class="tab_content">
      <form action="adm_academy_search.php" method="get">
      <input type="hidden" name="cate" value="<?=$cate?>">
      <table>
          <colgroup>
            <col style="width: 120px;">
            <col style="width: 200px;">
            <col style="width: 90px;">
            <col style="width: 90px;">
            <col style="width: 90px;">
            <col style="width: 100px;">
            <col style="width: 110px;">
            <col style="width: 110px;">
            <col style="width: 110px;">
            <col style="width: 220px;">
          </colgroup>
          <tr>
            <th>썸네일</th>
            <th>강의명</th>
            <th>강의분류</th>
            <th>교육시간</th>
            <th>담당강사</th>
            <th>강의가격</th>
            <th>강의신청기간</th>
            <th>강의교육기간</th>
            <th>강의태그</th>
            <th>관리</th>
          </tr>          
          <?php
            $sql = "select * from course where course_cate = '오프라인' order by course_id desc;";
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

            $sql = "select * from course where course_cate = '오프라인' order by course_id desc  limit $start, $list_num;"; /* paging : 쿼리 작성 - limit 몇번부터, 몇개 */
            $result = mysqli_query($con, $sql); /* paging : 쿼리 전송 */
            $number = 0 + ($start);
            
            while($data = mysqli_fetch_array($result)){
          ?>
          <tr>
            <td><img src="<?=empty($data['course_img']) ? getYoutubeThumb($data['course_link']) : "../images/".$data['course_img']?>" alt="<?=$data['course_title']?>"></td>
            <td><?=$data['course_title']?></td>
            <td><?=$data['course_cate']?></td>
            <td><?=$data['course_edu_time']?></td>
            <td><?=$data['course_teacher']?></td>
            <td><?=number_format($data['course_price'])?></td>
            <td><?=date_format(date_create($data['course_ask_sdate']), "Y-m-d")?> ~ <?=date_format(date_create($data['course_ask_edate']), "Y-m-d")?></td>
            <td><?=date_format(date_create($data['course_edu_sdate']), "Y-m-d")?> ~ <?=date_format(date_create($data['course_edu_edate']), "Y-m-d")?></td>
            <td><ul><li><?=str_replace(",", "</li><li>", $data['course_tag'])?></li></ul></td>
            <td>
              <a href="adm_academy_insert.php?course_id=<?=$data['course_id']?>" title="수정" class="b_btn edit_btn">수정</a>
              <a href="adm_academy_delete.php?course_id=<?=$data['course_id']?>" title="삭제" class="b_btn del_btn">삭제</a>
            </td>
          </tr>
          <?php } ?>
        </table>

        <!-- 검색 -->
        <div class="s_wrap">
          <select name="category">
            <option value="">검색옵션</option>
            <option value="course_title">강의명</option>
            <option value="course_edu_time">교육시간</option>
            <option value="course_teacher">담당강사</option>
            <option value="course_price">강의가격</option>
            <option value="course_ask_sdate">신청기간(시작일)</option>
            <option value="course_ask_edate">신청기간(종료일)</option>
            <option value="course_edu_sdate">교육기간(시작일)</option>
            <option value="course_edu_edate">교육기간(종료일)</option>
            <option value="course_tag">강의태그</option>
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
      <form action="adm_academy_list.php" method="GET" id="paging">
        <input type="hidden" name="page" value="<?=$page?>">
        <input type="hidden" name="cate" value="1">
      </form>
    </div>
  </div>
</main>
<?php
include_once('./footer.php');
?>