<?php

include_once('../common.php');

$mb_no = $row_member['mb_no']??'';
$mb_id = $_POST['mb_id']??'';
$mb_password = $_POST['mb_password']??'';
$mb_name = $_POST['mb_name']??'';
$mb_nick = $_POST['mb_nick']??'';
$mb_email = $_POST['mb_email']??'';
$mb_sns = $_POST['mb_sns']??'0';
$mb_level = $_POST['mb_level']??'';
$mb_birth = $_POST['mb_birth']??'';
$mb_tel = $_POST['mb_tel']??'';

if(isset($_FILES['fileDoc']) && $_FILES['fileDoc']['name'] != "") {
  $file = $_FILES['fileDoc'];
  $upload_directory = $_SERVER['DOCUMENT_ROOT']."/Ending_fairy/upload/";
  $ext_str = "hwp,xls,doc,xlsx,docx,pdf,jpg,gif,png,svg,txt,ppt,pptx";
  $allowed_extensions = explode(',', $ext_str);
  
  $max_file_size = 5242880; // 5MB
  $ext = substr($file['name'], strrpos($file['name'], '.') + 1);
  
  // 확장자 체크
  if(!in_array($ext, $allowed_extensions)) {
      echo "업로드할 수 없는 확장자 입니다.";
  }
  
  // 파일 크기 체크
  if($file['size'] >= $max_file_size) {
      echo "5MB 까지만 업로드 가능합니다.";
  }

  $path = md5(microtime()) . '.' . $ext;
  if(move_uploaded_file($file['tmp_name'], $upload_directory.$path)) {
    $file_id = md5(uniqid(rand(), true));
    $name_orig = $file['name'];
    $name_save = $path;
    $query_file = "INSERT INTO upload_file (fileID, nameOrigin, nameSave, wdate) VALUES('$file_id','$name_orig','$name_save',now())";
    $result_file = mysqli_query($con, $query_file);
  }
}

$sql_update = "UPDATE member
SET ".(empty($mb_password) ? "" : "mb_password = '".password_hash($mb_password, PASSWORD_DEFAULT)."', ")."
mb_nick = '$mb_nick', 
mb_email = '$mb_email', 
mb_sns = '$mb_sns', 
mb_birth = '$mb_birth'
".($file_id != "" ? ", mb_1 = '$file_id'" : "")."
WHERE mb_no = $mb_no
";
mysqli_query($con, $sql_update);

echo "
<script>
  alert('수정이 완료되었습니다.');
  location.replace('update_member.php');
</script>";


?>