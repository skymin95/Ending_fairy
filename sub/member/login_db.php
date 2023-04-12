<?php

include_once('../../db/db_con.php'); // db연결하기

// login.php에서 post방식으로 전달받은 id, pw를 변수에 각각 담는다.

$id = $_POST['id'];
$pw = $_POST['pw'];

// 쿼리문을 사용하여 id조회한 결과값을 sql변수에 저장
$sql = "select * from member where mb_id = '$id'";
$result = mysqli_query($con, $sql);

$num_match = mysqli_num_rows($result);
if(!$num_match){
  echo("
    <script>
      window.alert('등록되지 않은 아이디입니다.');
      history.go(-1);
    </script>
  ");
}else{
  $row = mysqli_fetch_array($result);
  $db_pass = $row['mb_password']; // db에서 넘어온 패스워드를 저장

  mysqli_close($con);

  if(!password_verify($pw, $db_pass)) { // 패스워드가 일치하지 않는다면
    echo("
      <script>
        window.alert('비밀번호가 틀립니다.')
        history.go(-1)
      </script>
    ");
    exit;
  }else{
    session_start();
    $_SESSION['mb_id'] = $row['id'];
    echo("
      <script>
        location.href='../../index.php';
      </script>
    ");
  }
}

?>