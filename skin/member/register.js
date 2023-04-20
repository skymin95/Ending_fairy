// 회원가입 입력양식에 대한 유효성검사
$(document).ready(function(){
  $('#mb_id').blur(function(){ // 아이디박스에 초점이 없어질 때 아래 내용실행
    if($(this).val()==''){
      $('#id_check_msg').html('아이디를 입력해주세요.').css('display','block').css('color','#DE0010').attr('data-check','0');
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
          $('#id_check_msg').html('사용 가능한 아이디 입니다.').css('display','block').css('color','#0059de').attr('data-check','1');
        }else{
          $('#id_check_msg').html('중복된 아이디 입니다.').css('display','block').css('color','#DE0010').attr('data-check','0');
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

    // 위 입력양식을 검사를 통과하면 아래 폼내용 전송
    $('#member_form').submit();

  };
});