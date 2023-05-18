<?php
$title = "로그인"; // 타이틀
include_once('../common.php');
?>
<main>
  <section class="member">
    <h1>
    <a href="<?=$base_URL?>index.php">
        <img src="<?=$base_URL?>images/logo_w.png" alt="상단 로고">
      </a>
    </h1>
    <article class="login">
      <h2 class="a_title">로그인</h2>
      <form name="로그인" method="post" action="login_db.php" id="member_form">
        <label for="id">아이디</label>
        <input type="text" name="id" id="id">
        <label for="pw">비밀번호</label>
        <input type="password" name="pw" id="pw">
        <span class="id_save">
          <input type="checkbox" id="log_save">
          <label for="log_save">아이디저장</label>
        </span>
        <button type="submit" class="m_btn">로그인</button>
        <p>
          <a href="register.php" title="회원가입 하러가기">회원가입</a>
          <a href="#none" title="">아이디 찾기</a>
          <a href="#none" title="">비밀번호 찾기</a>
        </p>
        <ul class="log_sns">
          <li><a href="#none" title="구글로 로그인"><img src="<?=$base_URL?>images/log_icon01.png" alt="구글로 로그인"></a></li>
          <li><a href="#none" title="페이스북으로 로그인"><img src="<?=$base_URL?>images/log_icon02.png" alt="페이스북으로 로그인"></a></li>
          <li><a href="#none" title="네이버로 로그인"><img src="<?=$base_URL?>images/log_icon03.png" alt="네이버로 로그인"></a></li>
          <li><a href="#none" title="카카오로 로그인"><img src="<?=$base_URL?>images/log_icon04.png" alt="카카오로 로그인"></a></li>
        </ul>
      </form>
    </article>
  </section>
</main>

<!-- 푸터 영역 -->
<?php include '../../footer.php' ?>

</body>