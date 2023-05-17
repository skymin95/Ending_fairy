<?php
include_once('../common.php');

$community_title = $_POST['community_title'];
$community_content = $_POST['community_content'];
$content = $_POST['community_content'];
$mb_id = $_SESSION['mb_id'];
$file_id = '';

$sql_mb = "SELECT mb_no FROM member WHERE mb_id = '$mb_id'";
$result_mb = mysqli_query($con, $sql_mb);
$row_mb = mysqli_fetch_assoc($result_mb);
$mb_no = $row_mb['mb_no'];

$sql_parent = "SELECT * FROM `board_community` AS a INNER JOIN (SELECT community_parent_id FROM `board_community` WHERE community_parent_id IS NOT NULL) AS b ON b.community_parent_id = a.community_id WHERE community_id = '$id'";
$result_parent = mysqli_query($con, $sql_parent);
$row_parent = mysqli_num_rows($result_parent);

if($row_parent != '0'){
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
  if(!empty($row_board['fileID'])){
    $file_id = $row_board['fileID'];
  }
}


if($row_parent != '0'){
  $sql = "UPDATE board_community SET community_content = '$content', fileID = '$file_id' WHERE community_parent_id = '$id'";
  $result = mysqli_query($con, $sql);
} else {
  $sql = "INSERT INTO board_community(community_title,community_parent_id, community_content, community_wdate, mb_no, fileID) VALUES('$community_title','$id', '$content', now(), '$mb_no', '$file_id')";
  mysqli_query($con, $sql);
}

echo "
<script>
  alert('작성하신 글이 작성되었습니다.');
  location.replace('community.php');
</script>";
?>