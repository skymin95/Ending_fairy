<?php
$title = "회원 관리"; // 타이틀
include_once('./common.php');
$mb_id = $_SESSION['mb_id']; // 회원명
$page = empty($_GET['page']) ? 1 : $_GET['page']; // 현재페이지
$cate = empty($_GET['cate']) ? 1 : $_GET['cate']; // 현재 카테고리

?>
<main>
  <div class="tab_menu">
    <ul>
      <li class="a_title <?=(empty($_GET['cate']) ? 'active' : '')?>"><a href="#tab1">전체</a></li>
      <li class="a_title"><a href="#tab2">강사</a></li>
      <li class="a_title"><a href="#tab3">수강생</a></li>
    </ul>

    <div id="tab1" class="tab_content <?=(empty($_GET['cate']) ? 'active' : '')?>">
      <form action="adm_member_search.php" method="get">
        <input type="hidden" name="cate" value="<?=$cate?>">
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
            $sql = "select * from member order by mb_no desc;";
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

            $sql = "select * from member order by mb_no desc limit $start, $list_num;"; /* paging : 쿼리 작성 - limit 몇번부터, 몇개 */
            $result = mysqli_query($con, $sql); /* paging : 쿼리 전송 */
            $number = 0 + ($start);

            // 데이터 출력
            while($data = mysqli_fetch_array($result)){
          ?>
          <tr>
            <td><?=++$number?></td>
            <td><?=$data['mb_name']?></td>
            <td><?=$data['mb_id']?></td>
            <td><?=$data['mb_email']?></td>
            <td><?=$data['mb_level']?></td>
            <td><?=$data['mb_tel']?></td>
            <td>
              <button class="edit_btn" type="button"><a href="adm_member_insert.php?mb_no=<?=$data['mb_no']?>" title="수정">수정</a></button>
              <button class="del_btn" type="button"><a href="adm_member_delete.php?mb_no=<?=$data['mb_no']?>" title="삭제">삭제</a></button>
            </td>
          </tr>
          <?php } ?>
        </table>

        <!-- 검색 -->
        <div class="s_wrap">
          <label for="category">검색옵션</label>
          <select name="category" id="category">
            <option value="">검색옵션</option>
            <option value="mb_name">이름</option>
            <option value="mb_id">아이디</option>
            <option value="mb_email">이메일</option>
            <option value="mb_tel">전화번호</option>
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
            <a href="?cate=<?=$cate?>&page=1" title="prev" class="prev"><i class="fa-solid fa-chevron-left"></i></a>
            <?php } else{ ?>
            <a href="?cate=<?=$cate?>&page=<?php echo ($page-1); ?>" title="prev" class="prev"><i class="fa-solid fa-chevron-left"></i></a>
            <?php }?>

            <?php
            for($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++){
            ?>
            <li <?=$page == $print_page ? ' class="p_on"' : ''?>><a href="?cate=<?=$cate?>&page=<?php echo $print_page; ?>" title=""><?php echo $print_page; ?></a></li>
            <?php }?>

            <?php
            if($page >= $total_page){
            ?>
            <a href="?cate=<?=$cate?>&page=<?php echo $total_page; ?>" title="next" class="next"><i class="fa-solid fa-chevron-right"></i></a>
            <?php } else{ ?>
            <a href="?cate=<?=$cate?>&page=<?php echo ($page+1); ?>" title="next" class="next"><i class="fa-solid fa-chevron-right"></i></a>
          </ul>
          <?php }?>
        </div>
      </form>
      <form action="adm_member_list.php" method="GET">
        <input type="hidden" name="page" value="<?=$page?>">
        <input type="hidden" name="cate" value="1">
      </form>
    </div>

    <div id="tab2" class="tab_content">
      <form action="adm_member_search.php" method="get">
        <input type="hidden" name="cate" value="<?=$cate?>">
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
            $sql = 'select * from member where mb_level="9" order by mb_no desc';
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

            $sql = "select * from member where mb_level='9' order by mb_no desc limit $start, $list_num;"; /* paging : 쿼리 작성 - limit 몇번부터, 몇개 */
            $result = mysqli_query($con, $sql); /* paging : 쿼리 전송 */
            $number = 0 + ($start);

            // 데이터 출력
            while($data = mysqli_fetch_array($result)){
          ?>
          <tr>
            <td><?=++$number?></td>
            <td><?=$data['mb_name']?></td>
            <td><?=$data['mb_id']?></td>
            <td><?=$data['mb_email']?></td>
            <td><?=$data['mb_level']?></td>
            <td><?=$data['mb_tel']?></td>
            <td>
              <button class="edit_btn" type="button"><a href="adm_member_insert.php?mb_no=<?=$data['mb_no']?>" title="수정">수정</a></button>
              <button class="del_btn" type="button"><a href="adm_member_delete.php?mb_no=<?=$data['mb_no']?>" title="삭제">삭제</a></button>
            </td>
          </tr>
          <?php } ?>
        </table>

        <!-- 검색 -->
        <div class="s_wrap">
          <label for="category">검색옵션</label>
          <select name="category" id="category">
            <option value="">검색옵션</option>
            <option value="mb_name">이름</option>
            <option value="mb_id">아이디</option>
            <option value="mb_email">이메일</option>
            <option value="mb_tel">전화번호</option>
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
            <a href="?cate=<?=$cate?>&page=1" title="prev" class="prev"><i class="fa-solid fa-chevron-left"></i></a>
            <?php } else{ ?>
            <a href="?cate=<?=$cate?>&page=<?php echo ($page-1); ?>" title="prev" class="prev"><i class="fa-solid fa-chevron-left"></i></a>
            <?php }?>

            <?php
            for($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++){
            ?>
            <li <?=$page == $print_page ? ' class="p_on"' : ''?>><a href="?cate=<?=$cate?>&page=<?php echo $print_page; ?>" title=""><?php echo $print_page; ?></a></li>
            <?php }?>

            <?php
            if($page >= $total_page){
            ?>
            <a href="?cate=<?=$cate?>&page=<?php echo $total_page; ?>" title="next" class="next"><i class="fa-solid fa-chevron-right"></i></a>
            <?php } else{ ?>
            <a href="?cate=<?=$cate?>&page=<?php echo ($page+1); ?>" title="next" class="next"><i class="fa-solid fa-chevron-right"></i></a>
          </ul>
        <?php }?>
      </div>
      </form>
      <form action="adm_member_list.php" method="GET">
        <input type="hidden" name="page" value="<?=$page?>">
        <input type="hidden" name="cate" value="1">
      </form>
    </div>

    <div id="tab3" class="tab_content">
      <form action="adm_member_search.php" method="get">
        <input type="hidden" name="cate" value="<?=$cate?>">
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
            $sql = 'select * from member where mb_level="1" order by mb_no desc';
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

            $sql = "select * from member where mb_level='1' order by mb_no desc limit $start, $list_num;"; /* paging : 쿼리 작성 - limit 몇번부터, 몇개 */
            $result = mysqli_query($con, $sql); /* paging : 쿼리 전송 */
            $number = 0 + ($start);

            // 데이터 출력
            while($data = mysqli_fetch_array($result)){
          ?>
          <tr>
            <td><?=++$number?></td>
            <td><?=$data['mb_name']?></td>
            <td><?=$data['mb_id']?></td>
            <td><?=$data['mb_email']?></td>
            <td><?=$data['mb_level']?></td>
            <td><?=$data['mb_tel']?></td>
            <td>
              <button class="edit_btn" type="button"><a href="adm_member_insert.php?mb_no=<?=$data['mb_no']?>" title="수정">수정</a></button>
              <button class="del_btn" type="button"><a href="adm_member_delete.php?mb_no=<?=$data['mb_no']?>" title="삭제">삭제</a></button>
            </td>
          </tr>
          <?php } ?>
        </table>

        <!-- 검색 -->
        <div class="s_wrap">
          <label for="category">검색옵션</label>
          <select name="category" id="category">
            <option value="">검색옵션</option>
            <option value="mb_name">이름</option>
            <option value="mb_id">아이디</option>
            <option value="mb_email">이메일</option>
            <option value="mb_tel">전화번호</option>
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
            <a href="?cate=<?=$cate?>&page=1" title="prev" class="prev"><i class="fa-solid fa-chevron-left"></i></a>
            <?php } else{ ?>
            <a href="?cate=<?=$cate?>&page=<?php echo ($page-1); ?>" title="prev" class="prev"><i class="fa-solid fa-chevron-left"></i></a>
            <?php }?>

            <?php
            for($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++){
            ?>
            <li <?=$page == $print_page ? ' class="p_on"' : ''?>><a href="?cate=<?=$cate?>&page=<?php echo $print_page; ?>" title=""><?php echo $print_page; ?></a></li>
            <?php }?>

            <?php
            if($page >= $total_page){
            ?>
            <a href="?cate=<?=$cate?>&page=<?php echo $total_page; ?>" title="next" class="next"><i class="fa-solid fa-chevron-right"></i></a>
            <?php } else{ ?>
            <a href="?cate=<?=$cate?>&page=<?php echo ($page+1); ?>" title="next" class="next"><i class="fa-solid fa-chevron-right"></i></a>
          </ul>
        <?php }?>
      </div>
      </form>
      <form action="adm_member_list.php" method="GET">
        <input type="hidden" name="page" value="<?=$page?>">
        <input type="hidden" name="cate" value="1">
      </form>
    </div>
  </div>
</main>
<?php
include_once('./footer.php');
?>