<?php
include_once('./common.php');
$id = $_POST['id'];

$id = mysqli_real_escape_string($con, $id);
$pwd = mysqli_real_escape_string($con, $pwd);

$query = "SELECT * FROM board_notice WHERE id = '$id' AND pwd = CONCAT('*', UPPER(SHA1(UNHEX(SHA1('$pwd')))))";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($result);

if($pwd = '') {
  echo "<script>alert('비밀번호를 입력해주세요.')</script>";
} else if(!$data['id']) {
    echo "<script>alert('비밀번호가 달라 삭제 할 수 없습니다. 다시 확인하세요.');</script>";
    echo "<script>location.href = 'noticelist.php';</script>"; 
  } else {
    $query = "DELETE FROM board_notice WHERE id = '$id'";
    mysqli_query($con, $query);
  }
  
?>
<script>
  location.href = 'adm_board_list.php';
</script>