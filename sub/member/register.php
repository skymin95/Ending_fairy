<?php
$title = "회원가입"; // 타이틀
include_once('../common.php');
?>
<main>
  <!-- 회원가입 영역 -->
  <section class="member">
    <h1>
      <a href="<?=$base_URL?>index.php">
        <img src="<?=$base_URL?>images/logo_w.png" alt="상단 로고">
      </a>
    </h1>
    <article class="register">
      <h2>회원가입</h2>
      <form action="register_insert.php" name="register" id="member_form" method="post">
        <label for="mb_id" class="id">아이디</label>
        <input type="text" name="mb_id" id="mb_id" required>
        <span id="id_check_msg" data-check="0"></span>

        <label for="mb_password">비밀번호</label>
        <input type="password" name="mb_password" id="mb_password" required>

        <label for="mb_name">이름</label>
        <input type="text" name="mb_name" id="mb_name" required>

        <label for="mb_nick">닉네임<small>(선택)</small></label>
        <input type="text" name="mb_nick" id="mb_nick">

        <label for="mb_tel">휴대폰번호</label>
        <input type="text" name="mb_tel" id="mb_tel" required>

        <label for="mb_birth">생년월일</label>
        <input type="date" name="mb_birth" id="mb_birth" required>

        <label for="mb_email">이메일</label>
        <input type="text" name="mb_email" id="mb_email" required>

        <div class="mail_check">
          <p>메일 수신 여부</p>
          <label for="mail01">
            <input type="radio" name="mb_sns" id="mail01" value="0" class="mail">
            <span>수신</span>
          </label>
          <label for="mail02">
            <input type="radio" name="mb_sns" id="mail02" value="1" class="mail" checked>
            <span>거부</span>
          </label>
        </div>

        <button type="submit" class="m_btn" id="save_frm">회원가입</button>
        <button type="reset" class="m_btn">다시쓰기</button>
      </form>
    </article>
  </section>
</main>

<!-- 푸터 영역 -->
<?php include '../../footer.php' ?>

</body>