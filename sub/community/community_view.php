<?php
$title = "마이페이지 > 커뮤니티 상세페이지"; // 타이틀
include_once('../common.php');
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
  <ul class="community_user_info">
        <li>
          <img src="http://localhost/Ending_fairy/images/userimg_mypage.png" alt="userimg" class="com_user_img">
        </li>
        <li class="name_day">
          <p>뇽뇽</p>
          <span>2023-05-08</span>
        </li>
  </ul>
  <!-- 내용박스 -->
  <ul class="community_view_ul">
    <h3>친구랑 인생샷 건진 날</h3>
    <li>
    <img src="http://localhost/Ending_fairy/images/커뮤상세1.png" alt="커뮤상세1">
    </li>
    <li>
    <img src="http://localhost/Ending_fairy/images/커뮤상세2.png" alt="커뮤상세2">
    </li>
      <p>
        오늘 친구랑 올림픽공원에서 촬영했어요. 
        날씨가 너무 좋아서 사진 색감이 잘 뽑히더라구요
        DSLR로 찍으니까 감성이 더해져서 인생샷을 건질 수 있었어요. 여러분들은 오늘 어떤 하루를 보내셨나요?
      </p>  
  </ul>

  <div class="comm_answer">
    <p class="answer_num">댓글 <span>5</span>개</p>
    <input type="textarea" placeholder="댓글을 남겨보세요!" class="answer_box1">
    <!-- 댓글 버튼서식 -->
    <ul class= "comm_answer_btn">
      <li class="comm_an_cancel">
        <a href="community.php" title="취소버튼">취소</a>
      </li>
      <li class="comm_an_submit">
        <input type="submit" value="등록">
      </li>
    </ul>

    <ul class="answer_ans_wrap">
      <!-- 댓글 -->
      <li class="user_ans">
      <img src="http://localhost/Ending_fairy/images/userimg_mypage.png" alt="userimg" class="com_user_img">
        <p>강*영</p>
      </li>
      <li>
        <span class="ans_title">헐 대박 완전 인생샷!!
          저도 거기 가고싶네요 ㅎㅎ 시간 될 때 가야겠어요~~!
        </span>
        <div class="answer_ans">
          <span>3분전</span> <a href="#">답글쓰기</a>
        </div>
      </li>
      <!-- 댓글에 댓글 -->
      <li class="ans_ans">
        <img src="http://localhost/Ending_fairy/images/userimg_mypage.png" alt="userimg" class="com_user_img">
        <p>강*영1</p>
      </li>
      <li class="ans_ans1">
        <span class="ans_title">헐 대박 완전 인생샷!!
          저도 거기 가고싶네요 ㅎㅎ 시간 될 때 가야겠어요~~!
        </span>
        <div class="answer_ans">
          <span>3분전</span> <a href="#" title="답글쓰기">답글쓰기</a> <a href="#" title="삭제하기" class="ans_delete">삭제하기</a>
        </div>
      </li>
        
        <!-- 댓글 -->
        <li class="user_ans">
      <img src="http://localhost/Ending_fairy/images/userimg_mypage.png" alt="userimg" class="com_user_img">
        <p>김*석</p>
      </li>
      <li>
        <span class="ans_title">헐 대박 완전 인생샷!!
          저도 거기 가고싶네요 ㅎㅎ 시간 될 때 가야겠어요~~!
        </span>
        <div class="answer_ans">
          <span>3분전</span> <a href="#">답글쓰기</a>
        </div>
      </li>
    </ul>
    <input type="textarea" placeholder="댓글을 남겨보세요!" class="answer_box1">
    <ul class= "comm_answer_btn">
      <li class="comm_an_cancel">
        <a href="community.php" title="취소버튼">취소</a>
      </li>
      <li class="comm_an_submit">
        <input type="submit" value="등록">
      </li>
    </ul>
  </div>
</article>
</main>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/footer.php');
?>