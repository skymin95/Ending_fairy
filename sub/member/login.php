<?php
// include_once('../common.php');
include_once('../../db/db_con.php');
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>canon</title>
  <link rel="stylesheet" href="../../skin/reset.css" type="text/css">
  <link rel="stylesheet" href="../../skin/base.css" type="text/css">
  <link rel="stylesheet" href="../../skin/common.css" type="text/css">
  <link rel="stylesheet" href="../../skin/member/login.css" type="text/css">
</head>
<body>
  <main>
    <section class="member">
      <h1>
        <a href="../../index.php">
          <img src="../../images/logo_w.png" alt="상단 로고">
        </a>
      </h1>
      <article class="login">
        <h2>로그인</h2>
        <form name="로그인" method="post" action="login_db.php" id="member_form">
          <label>아이디</label>
          <input type="text" name="id">
          <label>비밀번호</label>
          <input type="password" name="pw">
          <span>
            <input type="checkbox" id="log_save">
            <label for="log_save">아이디저장</label>
          </span>
          <button type="submit" class="m_btn">로그인</button>
          <p>
            <a href="register.php" title="회원가입 하러가기">회원가입</a>
            <a href="" title="">아이디 찾기</a>
            <a href="" title="">비밀번호 찾기</a>
          </p>
          <ul class="log_sns">
            <li><a href="" title="구글로 로그인"><img src="../../images/log_icon01.png" alt="구글로 로그인"></a></li>
            <li><a href="" title="페이스북으로 로그인"><img src="../../images/log_icon02.png" alt="페이스북으로 로그인"></a></li>
            <li><a href="" title="네이버로 로그인"><img src="../../images/log_icon03.png" alt="네이버로 로그인"></a></li>
            <li><a href="" title="카카오로 로그인"><img src="../../images/log_icon04.png" alt="카카오로 로그인"></a></li>
          </ul>
        </form>
      </article>
    </section>
  </main>

  <!-- 푸터 영역 -->
  <?php include '../../footer.php' ?>

</body>
</html>