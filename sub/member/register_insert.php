<?php
include_once('../../db/db_con.php'); // db연결하기

// 전달받은 데이터값을 각각 변수에 담기
$mb_id = $_POST['mb_id'];
$mb_password = password_hash($_POST['mb_password'], PASSWORD_DEFAULT);
$mb_name = $_POST['mb_name'];
$mb_nick = $_POST['mb_nick'];
$mb_tel = $_POST['mb_tel'];
$mb_birth = $_POST['mb_birth'];
$mb_email = $_POST['mb_email'];
$mb_sns = $_POST['mb_sns'];

$sql = "INSERT INTO member SET mb_id='$mb_id', mb_password='$mb_password', mb_name='$mb_name',  mb_nick='$mb_nick', mb_tel='$mb_tel', mb_birth='$mb_birth', mb_email='$mb_email', mb_sns='$mb_sns'";

$result = mysqli_query($con, $sql);
mysqli_close($con);

if($result) {
?>
<script>
  alert('회원가입 완료');
  location.href = './login.php';
</script>
<?php } else { ?>
<script>
  alert('회원가입 실패');
  location.href = './register.php';
</script>
<?php
  }
?>