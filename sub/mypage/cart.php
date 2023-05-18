<?php
$title = "장바구니"; // 타이틀
include_once('../common.php');

$query = "SELECT * FROM course INNER JOIN (SELECT * FROM cart WHERE mb_no = ".$row_member['mb_no'].") AS cart ON course.course_id = cart.course_id";
$result = mysqli_query($con, $query);
function getYoutubeThumb($url) {
  if($url) {
    preg_match_all('/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/', $url, $matchs);
    return "https://img.youtube.com/vi/" .$matchs[7][0]."/mqdefault.jpg";
  }
}
$cnt = mysqli_num_rows($result);
$total_price = 0; // 총 가격
?>

<main>
  <!-- 장바구니 -->
  <article>
    <h2 class="sub_title_prev">
      <a href="<?=$base_URL?>sub/mypage/mypage.php" title="돌아가기">
        <img src="<?=$base_URL?>images/arrow_title_prev.svg" alt="prev">
        장바구니
      </a>
    </h2>
  </article>

  <article class="cart_list_form">
    <form action="cart_delete.php" name="cart_delete" method="post">
      <div class="delete_wrap">
        <label for="check">
          <input type="checkbox" id="all">
          전체선택
        </label>
        <a href="#none" title="선택삭제" id="cart_delete_all">선택삭제</a>
      </div>
      <?php if($cnt < 1) {?>
      <div class="no_data">
        <p>장바구니에 담긴 강의가 없습니다.</p>
        <a href="<?=$base_URL?>sub/academy/academy_list.php?cate=online" title="강의목록 가기">강의목록 가기</a>
      </div>
      <?php } else { ?>
        <ul class="list_data_wrap">
          <?php
          while($data = mysqli_fetch_assoc($result)) {
            $total_price += $data['course_price'];
          ?>
          <li class="list_data">
            <input type="checkbox" name="checked_list[]" class="check" value="<?=$data['cart_id']?>">
            <img src="<?=empty($data['course_img']) ? getYoutubeThumb($data['course_link']) : "../images/".$data['course_img']?>" alt="<?=$data['course_title']?>">
            <div>
              <span><?=date_format(date_create($data['course_edu_sdate']), "Y.m.d")?> ~ <?=date_format(date_create($data['course_edu_edate']), "Y.m.d")?></span>
              <p class="course_title"><?=$data['course_title']?></p>
              <p class="course_price"><?=number_format($data['course_price'])?>원</p>
            </div>
            <a href="<?=$base_URL?>sub/mypage/cart_delete.php?cart_id=<?=$data['cart_id']?>" title="삭제" class="cart_delete">삭제</a>
          </li>
          <?php } ?>
          </ul>

      <p class="total_price">
        <span>총 결제 금액</span>
        <span><?=number_format($total_price)?>원</span>
      </p>
      <button type="submit" class="cart_submit" id="cart_submit_payment"><?=number_format($total_price)?>원 결제하기</button>
      <?php } ?>
    </form>
  </article>


</main>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>