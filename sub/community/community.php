<?php
$title = "마이페이지 > 커뮤니티"; // 타이틀
include_once('../common.php');
?>

<main>
<form name="community" id="community_form" method="post" action="">
  <article id="community_wrap">
    <h2>커뮤니티</h2>

  <div class="community_all_box">
    <ul class="community_write_btn">
      <li>
        <a href="community_write.php" class="community_write test02" title="작성하기버튼">작성하기</a>
      </li>
    </ul>
    <!-- 1번째 -->
    <ul class="community_ul">
      <li>
        <!-- 아이콘,닉네임,날짜 -->
        <ul class="community_user_info">
          <li><img src="http://localhost/Ending_fairy/images/userimg_mypage.png" alt="userimg" class="com_user_img">
          </li>
          <li class="name_day">
          <p>뇽뇽</p>
          <span>2023-05-08</span>
          </li>
        </ul>
        <!-- 사진 -->
        <a href="community_view.php" title="상세페이지이동">
          <img src="http://localhost/Ending_fairy/images/community.png" alt="userimg" class="community_img">
            <div class="com_content_box">
            <h3>친구랑 인생샷 건진 날</h3>
            <p class="community_content">
            오늘 친구랑 올림픽공원에서 촬영했어요.
            날씨가 너무 좋아서 사진 색감이 잘 뽑히더라구요DSLR로 찍으니까 감성이 더해져서 인생샷을 건질 수 있었어요. 여러분들은 오늘 어떤 하루를 보내셨나요?$_ENV
            </p>
        </a>
          <!-- 좋아요,댓글 버튼 -->
        <ul class="heart_btn">
            <li>
            <img src="http://localhost/Ending_fairy/images/heart.png" alt="userimg">
            </li>
            <li><span>898</span></li>
            <li>
            <img src="http://localhost/Ending_fairy/images/댓글.png" alt="userimg">
            </li>
            <li><span>24</span></li>
          </ul>
        </li>
      </ul>

       <!-- 2번째 -->
    <ul class="community_ul">
      <li>
        <!-- 아이콘,닉네임,날짜 -->
        <ul class="community_user_info">
          <li><img src="http://localhost/Ending_fairy/images/userimg_mypage.png" alt="userimg" class="com_user_img">
          </li>
          <li class="name_day">
          <p>뇽뇽</p>
          <span>2023-05-08</span>
          </li>
        </ul>
        <!-- 사진 -->
        <img src="http://localhost/Ending_fairy/images/커뮤2.png" alt="userimg" class="community_img">
          <div class="com_content_box">
          <h3>친구랑 인생샷 건진 날</h3>
          <p class="community_content">
          오늘 친구랑 올림픽공원에서 촬영했어요.
          날씨가 너무 좋아서 사진 색감이 잘 뽑히더라구요DSLR로 찍으니까 감성이 더해져서 인생샷을 건질 수 있었어요. 여러분들은 오늘 어떤 하루를 보내셨나요?
          </p>
          <!-- 좋아요,댓글 버튼 -->
          <ul class="heart_btn">
            <li>
            <img src="http://localhost/Ending_fairy/images/heart.png" alt="userimg">
            </li>
            <li><span>898</span></li>
            <li>
            <img src="http://localhost/Ending_fairy/images/댓글.png" alt="userimg">
            </li>
            <li><span>24</span></li>
          </ul>
        </li>
      </ul>

       <!-- 3번째 -->
    <ul class="community_ul">
      <li>
        <!-- 아이콘,닉네임,날짜 -->
        <ul class="community_user_info">
          <li><img src="http://localhost/Ending_fairy/images/userimg_mypage.png" alt="userimg" class="com_user_img">
          </li>
          <li class="name_day">
          <p>뇽뇽</p>
          <span>2023-05-08</span>
          </li>
        </ul>
        <!-- 사진 -->
        <img src="http://localhost/Ending_fairy/images/커뮤3.png" alt="userimg" class="community_img">
          <div class="com_content_box">
          <h3>친구랑 인생샷 건진 날</h3>
          <p class="community_content">
          오늘 친구랑 올림픽공원에서 촬영했어요.
          날씨가 너무 좋아서 사진 색감이 잘 뽑히더라구요DSLR로 찍으니까 감성이 더해져서 인생샷을 건질 수 있었어요. 여러분들은 오늘 어떤 하루를 보내셨나요?
          </p>
          <!-- 좋아요,댓글 버튼 -->
          <ul class="heart_btn">
            <li>
            <img src="http://localhost/Ending_fairy/images/heart.png" alt="userimg">
            </li>
            <li><span>898</span></li>
            <li>
            <img src="http://localhost/Ending_fairy/images/댓글.png" alt="userimg">
            </li>
            <li><span>24</span></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  </article>
</main>
