<?php
$title = "쿠폰 관리"; // 타이틀
include_once('./common.php');
$mb_id = $_SESSION['mb_id']; // 회원명
$page = empty($_GET['page']) ? 1 : $_GET['page']; // 현재페이지
$cate = empty($_GET['cate']) ? 1 : $_GET['cate']; // 현재 카테고리

$sql_coupon = "SELECT * FROM coupon_list";
$result_coupon = mysqli_query($con, $sql_coupon);

?>
<main>
  <div class="tab_menu">
    <ul>
      <li class="a_title active"><a href="#tab1">쿠폰관리</a></li>
    </ul>
    <a href="adm_coupon_insert.php" class="a_title board_wp" title="쿠폰추가">쿠폰추가</a>

    <div id="tab1" class="tab_content active">
      <form action="adm_member_search.php" method="get">
        <input type="hidden" name="cate" value="<?=$cate?>">
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
                <?php while($row_coupon = mysqli_fetch_assoc($result_coupon)) { ?>
                <tr>
                  <td><?=$row_coupon['coupon_kind']?></td>
                  <td><?=$row_coupon['coupon_title']?></td>
                  <td><?=$row_coupon['coupon_code']?></td>
                  <td><?=$row_coupon['coupon_sale']?></td>
                  <td>
                    <p class="date_s_e">등록 후 <?=$row_coupon['coupon_cdate']?>
                      <span><?=date_format(date_create($row_coupon['coupon_sdate']), "Y-m-d").'<br/>'.date_format(date_create($row_coupon['coupon_edate']), "Y-m-d")?></span>
                    </p>
                  </td>
                  <td><?=$row_coupon['coupon_count'] == '0' ? '무제한' : '0'.'/'.$row_coupon['coupon_count']?></td>
                  <td>
                    <a href="adm_member_insert.php?mb_no=90" title="수정" class="b_btn edit_btn">수정</a>
                    <a href="adm_member_delete.php?mb_no=90" title="삭제" class="b_btn del_btn">삭제</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
          </table>

        
        <div class="s_wrap">
          <select name="category">
            <option value="">검색옵션</option>
            <option value="mb_name">쿠폰종류</option>
            <option value="mb_id">쿠폰이름</option>
            <option value="mb_email">쿠폰금액</option>
            <option value="mb_tel">쿠폰코드</option>
            <option value="mb_tel">사용기간</option>
            <option value="mb_tel">사용횟수</option>
          </select>
          <input type="text" name="search" placeholder="SEARCH">
          <button type="submit" class="s_btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        
        <div class="pagination">
          <ul class="pagination">
              <li><a href="?cate=1&amp;page=1" title="prev" class="prev"><i class="fa-solid fa-chevron-left"></i></a></li>
    
                <li class="p_on"><a href="?cate=1&amp;page=1" title="">1</a></li>
                <li><a href="?cate=1&amp;page=2" title="">2</a></li>
                <li><a href="?cate=1&amp;page=3" title="">3</a></li>
                <li><a href="?cate=1&amp;page=4" title="">4</a></li>
                <li><a href="?cate=1&amp;page=5" title="">5</a></li>
    
                  <li><a href="?cate=1&amp;page=2" title="next" class="next"><i class="fa-solid fa-chevron-right"></i></a></li>
              </ul>
        </div>
      </form>
      <form action="adm_member_list.php" method="GET" id="paging">
        <input type="hidden" name="page" value="1">
        <input type="hidden" name="cate" value="1">
      </form>
    </div>
  </div>
</main>
<?php
include_once('./footer.php');
?>