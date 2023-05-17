<?php
$title = "장바구니"; // 타이틀
include_once('../common.php');

$query = "SELECT * FROM course";
$result = mysqli_query($con, $query);
function getYoutubeThumb($url) {
  if($url) {
    preg_match_all('/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/', $url, $matchs);
    return "https://img.youtube.com/vi/" .$matchs[7][0]."/mqdefault.jpg";
  }
}
$data = mysqli_fetch_assoc($result);
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
          <input type="checkbox" id="check">
          전체선택
        </label>
        <a href="#none" title="선택삭제" id="cart_delete_all">선택삭제</a>
      </div>

      <div class="no_data">
        <p>장바구니에 담긴 강의가 없습니다.</p>
        <a href="<?=$base_URL?>sub/academy/academy_list.php?cate=online" title="강의목록 가기">강의목록 가기</a>
      </div>
      <ul class="list_data_wrap">
        <li class="list_data">
          <input type="checkbox">
          <img src="<?=empty($data['course_img']) ? getYoutubeThumb($data['course_link']) : "../images/".$data['course_img']?>" alt="<?=$data['course_title']?>">
          <div>
            <span><?=date_format(date_create($data['course_edu_sdate']), "Y.m.d")?> ~ <?=date_format(date_create($data['course_edu_edate']), "Y.m.d")?></span>
            <p class="course_title"><?=$data['course_title']?></p>
            <p class="course_price"><?=number_format($data['course_price'])?>원</p>
          </div>
          <a href="#none" title="삭제" class="cart_delete">삭제</a>
        </li>
        <li class="list_data">
          <input type="checkbox">
          <img src="<?=empty($data['course_img']) ? getYoutubeThumb($data['course_link']) : "../images/".$data['course_img']?>" alt="<?=$data['course_title']?>">
          <div>
            <span><?=date_format(date_create($data['course_edu_sdate']), "Y.m.d")?> ~ <?=date_format(date_create($data['course_edu_edate']), "Y.m.d")?></span>
            <p class="course_title"><?=$data['course_title']?></p>
            <p class="course_price"><?=number_format($data['course_price'])?>원</p>
          </div>
          <a href="#none" title="삭제" class="cart_delete">삭제</a>
        </li>
      </ul>

      <p class="total_price">
        <span>총 결제 금액</span>
        <span>123,400원</span>
      </p>
      <button type="submit" class="cart_submit">123,400원 결제하기</button>
    </form>
  </article>


</main>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>