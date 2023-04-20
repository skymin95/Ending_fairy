<?php
$title = "쿠폰 관리 > 쿠폰 추가"; // 타이틀
include_once('./common.php');

$id = (empty($_GET['coupon_no']) ? '' : $_GET['coupon_no']);
$id = mysqli_real_escape_string($con, $id);
if($id != '') {
  $query = "SELECT * FROM coupon_list WHERE coupon_no = '$id'";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
} else {
  $data = array(
    'coupon_kind' => '',
    'coupon_title' => '',
    'coupon_code' => '',
    'coupon_sdate' => '',
    'coupon_edate' => '',
    'coupon_cdate' => '',
    'coupon_count' => '',
    'coupon_sale' => ''
  );
}

$sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick FROM member WHERE mb_id = '".$_SESSION['mb_id']."'";
$result_member = mysqli_query($con, $sql_member);
$row_member = mysqli_fetch_array($result_member);

?>
<main class="board_insert">
  <ul class="board_h">
    <li><h2 class="a_title">쿠폰추가</h2></li>
    <li><a href="adm_coupon_list.php" class="a_title">목록으로 이동<i class="fa-solid fa-chevron-right"></i></a></li>
  </ul>

  <form name="write" method="post" action="adm_coupon_insert_action.php">
    <input type="hidden" name="id" value="<?=($id == '' ? '' : $id)?>">
    <div class="board_wrap">
      <dl>
        <dt>쿠폰 종류</dt>
        <dd>
          <select name="coupon_kind">
            <option value="수강할인">수강할인</option>
            <option value="제품할인">제품할인</option>
            <option value="특별쿠폰">특별쿠폰</option>
          </select>
        </dd>

        <dt>쿠폰 이름</dt>
        <dd>
          <input type="text" name="coupon_title" value="<?=$data['coupon_title']?>" required>
        </dd>

        <dt>쿠폰 코드</dt>
        <dd>
          <input type="text" name="coupon_code" value="<?=$data['coupon_code']?>" required>
          <button type="button" class="ran_btn">랜덤생성</button>
        </dd>

        <dt>할인 금액</dt>
        <dd class=>
          <input type="text" name="coupon_sale" value="<?=$data['coupon_sale']?>" placeholder="원, %" required>
        </dd>

        <dt>사용 횟수</dt>
        <dd class="w-30">
          <input type="text" name="coupon_count" value="<?=$data['coupon_count']?>" required>
        </dd>

        <dt>쿠폰 사용기한</dt>
        <dd class="w-30">
          <input type="text" name="coupon_cdate" value="<?=$data['coupon_cdate']?>" required> 일
        </dd>

        <dt>사용 시작일</dt>
        <dd class="w-30">
          <input type="date" name="coupon_sdate" value="<?=date_format(date_create($data['coupon_sdate']), "Y-m-d")?>" required >
        </dd>

        <dt>사용 종료일</dt>
        <dd class="w-30">
          <input type="date" name="coupon_edate" value="<?=date_format(date_create($data['coupon_edate']), "Y-m-d")?>" required >
        </dd>
      </dl>

      <!-- 삭제/완료 -->
      <ul class="board_b">
        <li>
        <?php if($id != '') {?><a href="adm_coupon_delete.php?coupon_no=<?=$id?>" title="삭제">삭제</a><?php } ?>
        </li>
        <li class="nw_success"><input type="submit" value="완료"></li>
      </ul>
    </div>
  </form>
</main>
<?php
include_once('./footer.php');
?>