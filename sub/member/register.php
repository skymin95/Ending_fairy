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
      <h2 class="a_title">회원가입</h2>
      <form action="register_insert.php" name="register" id="member_form" method="post">
        <label for="mb_id" class="id">아이디</label>
        <input type="text" name="mb_id" id="mb_id" required>
        <span id="id_check_msg" data-check="0"></span>

        <label for="mb_password">비밀번호<span></span></label>
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
          <label for="mail">
            <input type="checkbox" name="mb_sns" id="mail" class="check">
            <span>이메일 수신 동의</span>
          </label>
        </div>

        <div class="terms">
          <p>이용약관 동의</p>
          <label for="all">
            <input type="checkbox" name="mb_sns" id="all">
            <span>모두 동의(선택 정보 포함)</span>
          </label>
          <label for="check1">
            <input type="checkbox" name="mb_sns" id="check1" class="check">
            <span>만 14세 이상 (필수)</span>
          </label>
          <label for="check2">
            <input type="checkbox" name="mb_sns" id="check2" class="check">
            <span>서비스 이용약관 동의 (필수)</span>
          </label>
          <label for="check3">
            <input type="checkbox" name="mb_sns" id="check3" class="check">
            <span>개인정보 처리방침 동의 (필수)</span>
          </label>
          <label for="check4">
            <input type="checkbox" name="mb_sns" id="check4" class="check">
            <span>광고성 정보 수신 및 마케팅 활용 동의 (선택)</span>
          </label>
        </div>

        <button type="submit" class="m_btn" id="save_frm">회원가입</button>
        <button type="reset" class="m_btn"><a href="javascript:window.history.back();" title="취소하b기">취소하기</a></button>
      </form>
    </article>
  </section>
</main>

<!-- 푸터 영역 -->
<?php include '../../footer.php' ?>

</body>