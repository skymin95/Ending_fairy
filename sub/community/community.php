<?php
$title = "마이페이지 > 커뮤니티"; // 타이틀
include_once('../common.php');
$mb_id = $_SESSION['mb_id']; // 회원명

$id = (empty($_GET['community_id']) ? '' : $_GET['community_id']);
$id = mysqli_real_escape_string($con, $id);

// $sql_community= "SELECT * FROM board_community";
// $result = mysqli_query($con, $sql_community);

$sql = "select * from board_community order by community_id desc;";
$result = mysqli_query($con, $sql);

$sql_community_parent= "SELECT * FROM board_community WHERE community_parent_id  = '".$id."' " ;
$result_parent = mysqli_query($con, $sql_community_parent);
$data_parent = mysqli_fetch_array($result_parent);


?>

<main>
<!-- <form name="community" id="community_form" method="post" action=""> -->
  <article id="community_wrap">
      <h2>커뮤니티</h2>
    <div class="community_all_box">
      <!-- 작성하기 버튼 -->
      <ul class="community_write_btn">
        <li>
          <a href="community_write.php" class="community_write test02" title="작성하기버튼">작성하기</a>
        </li>
      </ul>

      <!-- 아이콘,닉네임,날짜 -->
      <?php
      // 데이터 출력
        while($data = mysqli_fetch_array($result)){
        $sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick, mb_1 FROM member WHERE mb_no = '".$data['mb_no']."'";
        $result_member = mysqli_query($con, $sql_member);
        $row_member = mysqli_fetch_array($result_member);
      ?>
      <ul class="community_user_info">
        <li>
          <?php if(empty($row_member['mb_1'])) {?>
            <img src="<?=$base_URL?>images/userimg_mypage.png" alt="userimg" class="com_user_img">
          <?php } else {
            $sql_file = "SELECT * FROM upload_file WHERE fileID = '".$row_member['mb_1']."'" ;
            $result_file = mysqli_query($con, $sql_file);
            $row_file = mysqli_fetch_assoc($result_file);
          ?>
          <img src="<?=$base_URL.'upload/'.$row_file['nameSave']?>" alt="userimg" class="com_user_img">
          <?php } ?>
        </li>
        <li class="name_day">
          <p><?= ($row_member['mb_nick'] == '' ? $row_member['mb_name'] : $row_member['mb_nick'])?> 
          </p>
          <span>
            <?=date_format(date_create($data['community_wdate']), "Y-m-d")?>
          </span>
        </li>
      </ul>

      <!-- 1번째 -->
      <ul class="community_ul"> 
        <!-- 상단이미지 li -->
        <li>
          <a href="community_view.php" title="상세페이지이동">
            <img src="http://localhost/Ending_fairy/images/community.png" alt="userimg" class="community_img">
          </a>
        </li>

        <!-- 하단 내용 li -->
        <li class="com_content_box">
          <a href="community_view.php?community_id=<?=$data['community_id']?>" title="상세페이지이동">
            <h3>
              <?=$data['community_title']?>
            </h3>
            <div class="community_content">
              <?=$data['community_content']?>
            </div>
  
          </a>
          <!-- 좋아요,댓글 버튼 -->
          <ul class="heart_btn">
            <li>
              <img src="http://localhost/Ending_fairy/images/heart.png" alt="userimg">
              <span>898</span>
            </li>
            <li>  
              <img src="http://localhost/Ending_fairy/images/댓글.png" alt="userimg">
              <span>24</span>
            </li>
          </ul>
        </li>
      </ul>
      <?php } ?>



      
    </div>
  </article>
</main>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>
