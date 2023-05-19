<?php
$title = "마이페이지 > 커뮤니티 상세페이지"; // 타이틀
include_once('../common.php');
$mb_id = $_SESSION['mb_id']; // 회원명

$id = (empty($_GET['community_id']) ? '' : $_GET['community_id']);
$id = mysqli_real_escape_string($con, $id);

$sql_community= "SELECT * FROM board_community WHERE community_id  = '".$id."' ";
$result = mysqli_query($con, $sql_community);
// $data = mysqli_fetch_array($result);

$sql_community_parent= "SELECT * FROM board_community WHERE community_parent_id  = '".$id."' ";
$result_parent = mysqli_query($con, $sql_community_parent);
$data_parent = mysqli_fetch_array($result_parent);


?>

<main>

<h2 class="sub_title_prev">
  <a href="community.php" title="돌아가기">
  <img src="<?=$base_URL?>images/arrow_title_prev.svg" alt="prev">
  커뮤니티
  </a>
</h2>

<article class="comm_view_box">
  <!-- 아이콘,닉네임,날짜 -->
  <?php
      // 데이터 출력
        $data = mysqli_fetch_array($result);
        $sql_member = "SELECT mb_no, mb_id, mb_name, mb_nick, mb_1  FROM member WHERE mb_no = '".$data['mb_no']."'";
        $result_member = mysqli_query($con, $sql_member);
        $row_member = mysqli_fetch_array($result_member);
      ?>
  <ul class="community_user_info">
    <li>
      <?php if(empty($row_member['mb_1'])) {?>
            <img src="<?=$base_URL?>images/userimg_mypage.png" al t="userimg" class="com_user_img">
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

    <li class="heart_info">
      <img src="<?=$base_URL?>images/heart.png" alt="userimg">
    </li>
  </ul>


  <!-- 내용박스 -->
  <ul class="community_view_ul">
    <h3><?=$data['community_title']?></h3>
    <li>
    <!-- <img src="<?=$base_URL?>images/커뮤상세1.png" alt="커뮤상세1"> -->
    </li>
    <li>
    <!-- <img src="<?=$base_URL?>images/커뮤상세2.png" alt="커뮤상세2"> -->
    </li>
      <p>
      <p><?=str_replace("src=\"", "src=\"/Ending_fairy/upload/", str_replace("title=", "src=", preg_replace("/ src=(\"|\')?([^\"\']+)(\"|\')?/","",$data['community_content'])))?></p>
      </p>  
  </ul>


  <form name="community_answer" id="community_a_form" method="post" action="community_answer_action.php">
    <input type="hidden" value="<?php echo $id ?>" name="answer_name">
    <!-- 댓글박스 -->
    <div class="comm_answer">
      <p class="answer_num">댓글 <span>5</span>개</p>
      <input type="text" name="community_answer_title" placeholder="댓글을 남겨보세요!" class="answer_box1">

      <!-- 댓글 버튼서식 -->
      <ul class= "comm_answer_btn">
        <li class="comm_an_cancel">
          <a href="community.php" title="취소버튼">취소</a>
        </li>
        <li class="comm_an_submit">
          <input type="submit" value="등록">
        </li>
      </ul>

      <!-- 대댓글 -->
      <ul class="answer_ans_wrap">
        <li class="user_ans">
          <img src="<?=$base_URL?>images/userimg_mypage.png" alt="userimg" class="com_user_img">
          <p>강*영</p>
        </li>

        <li>
          <span class="ans_title">헐 대박 완전 인생샷!!
            저도 거기 가고싶네요 ㅎㅎ 시간 될 때 가야겠어요~~!
          </span>
          <div class="answer_ans">
            <span>3분전</span> 
            <!-- <label for="ans_btn"></label> -->
            <input type="button" value="답글쓰기" onclick="addInput();" id="ans_btn"/>
          </div>
        </li>
        
        <div id="comm_answer"></div>
            
          <!-- 댓글 버튼서식 -->
          <ul class= "comm_answer_btn">
            <li class="comm_an_cancel">
              <input type="button" value="취소" onclick="deleteInput();"/>
            </li>
            <li class="comm_an_submit">
              <input type="submit" value="등록">
            </li>
          </ul>


        <!-- 댓글에 댓글 -->
        <!-- <li class="ans_ans">
          <img src="<?=$base_URL?>images/userimg_mypage.png" alt="userimg" class="com_user_img">
          <p>강*영1</p>
        </li>

        <li class="ans_ans1">
          <span class="ans_title">헐 대박 완전 인생샷!!
            저도 거기 가고싶네요 ㅎㅎ 시간 될 때 가야겠어요~~!
          </span>
          <div class="answer_ans">
            <span>3분전</span> <a href="#" title="답글쓰기">답글쓰기</a> <a href="#" title="삭제하기" class="ans_delete">삭제하기</a>
          </div>
        </li> -->

        <!-- 댓글 -->
        <!-- <li class="user_ans">
          <img src="<?=$base_URL?>images/userimg_mypage.png" alt="userimg" class="com_user_img">
            <p>김*석</p>
        </li>

        <li>
          <span class="ans_title">헐 대박 완전 인생샷!!
            저도 거기 가고싶네요 ㅎㅎ 시간 될 때 가야겠어요~~!
          </span>
          <div class="answer_ans">
            <span>3분전</span> <a href="#">답글쓰기</a>
          </div>
        </li> -->
      </ul>
      
      <!-- <input type="textarea" placeholder="댓글을 남겨보세요!" class="answer_box1">
      <ul class= "comm_answer_btn">
        <li class="comm_an_cancel">
          <a href="community.php" title="취소버튼">취소</a>
        </li>
        <li class="comm_an_submit">
          <input type="submit" value="등록">
        </li>
      </ul>
      -->
    </div>
  </form>
</article>
</main>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>