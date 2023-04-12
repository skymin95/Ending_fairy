<?php
include_once('../../db/db_con.php');
// include_once('config.php');
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
  <link rel="stylesheet" href="../../skin/member/register.css" type="text/css">
  <!-- 제이쿼리 라이브러리 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script>
    // 회원가입 입력양식에 대한 유효성검사
    $(document).ready(function(){
      $('#mb_id').blur(function(){ // 아이디박스에 초점이 없어질 때 아래 내용실행
        if($(this).val()==''){
          $('#id_check_msg').html('아이디를 입력해주세요.').attr('data-check','0');
        }else{
          checkIdAjax();
        }
      });
      // id값을 post로 전송하여 서버와 통신을 통해 중복결과 json형태로 받아오기 위한 함수
      function checkIdAjax(){
        $.ajax({
          url:'check_id.php',
          type:'post',
          dataType:'json',
          data:{
            'mb_id':$('#mb_id').val()
          },
          success:function(data){
            if(data.check){
              $('#id_check_msg').html('사용 가능한 아이디 입니다.').css('color','#00f').attr('data-check','1');
            }else{
              $('#id_check_msg').html('중복된 아이디 입니다.').css('color','#f00').attr('data-check','0');
            }
          }
        });
      }

      $('#save_frm').click(function(){
        check_input(); // 유효성 검사를 실시한다
        return false;
      });

      function check_input(){
        if(!$('#mb_id').val()){; // 아이디값을 입력하지 않은 경우
          alert('아이디를 입력하지 않았습니다.');
          $('#mb_id').focus(); // 초점을 아이디 입력박스에 만든다
          return false;
        }

        if($('#id_check_msg').attr('data-check')=='0'){
          alert('아이디가 존재합니다. 다시 입력하세요.');
          $('#mb_id').focus();
          return false;
        }

        if(!$('#mb_password').val()){
          alert('비밀번호를 입력하지 않았습니다.');
          $('#mb_password').focus();
          return false;
        }

        if(!$('#mb_name').val()){
          alert('이름을 입력하지 않았습니다.');
          $('#mb_name').focus();
          return false;
        }

        if(!$('#mb_tel').val()){
          alert('휴대폰번호를 입력하지 않았습니다.');
          $('#mb_tel').focus();
          return false;
        }

        if(!$('#mb_birth').val()){
          alert('생년월일을 입력하지 않았습니다.');
          $('#mb_birth').focus();
          return false;
        }

        if(!$('#mb_email').val()){
          alert('이메일을 입력하지 않았습니다.');
          $('#mb_email').focus();
          return false;
        }

        if(!$('#mb_sns').val()){
          alert('메일 수신 여부를 선택하지 않았습니다.');
          $('#mb_sns').focus();
          return false;
        }

        // 위 입력양식을 검사를 통과하면 아래 폼내용 전송
        $('#member_form').submit();

      };
    });
  </script>
</head>
<body>
  <main>
    <!-- 회원가입 영역 -->
    <section class="member">
      <h1>
        <a href="../../index.php">
          <img src="../../images/logo_w.png" alt="상단 로고">
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
              <input type="radio" name="mb_sns" id="mail02" value="1" class="mail">
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
</html>