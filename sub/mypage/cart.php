<?php
$title = "장바구니"; // 타이틀
include_once('../common.php');

$mb_id = $_SESSION['mb_id'];
$id = $_GET['course_id'];

$query = "SELECT * FROM course WHERE course_id = '$id'";
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

    <article>
      <form action="" name="">
        <input type="checkbox" id="check">
        <label for="check">전체선택</label>
        <button type="button" name="delete" onClick="">선택삭제</button>

        <ul>
          <li>
            <img src="<?=empty($data['course_img']) ? getYoutubeThumb($data['course_link']) : "../images/".$data['course_img']?>" alt="<?=$data['course_title']?>">
            <div>
              <span><?=$data['course_ask_sdate']?> ~ <?=$data['course_ask_edate']?></span>
              <p><?=$data['course_title']?></p>
              <p><?=number_format($data['course_price'])?>원</p>
            </div>
            <button type="button" name="delete" onClick="">삭제</button>
          </li>
        </ul>

        <p>총 결제 금액<span>123,400원</span></p>
        <button type="submit">결제하기</button>
      </form>
    </article>
  </article>


</main>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>