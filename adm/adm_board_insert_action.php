<?php

include_once('./common.php');

  $mb_id = $_SESSION['mb_id'];

  $board_title = $_POST['board_title'];
  $board_content = $_POST['board_content'];
  $cate_table = $_POST['cate_table'];
  $file_id = '';

  if($cate_table == 'event'){
    $event_sdate = $_POST['event_sdate'];
    $event_edate = $_POST['event_edate'];
  }

  $query_member = "SELECT mb_no, mb_id FROM member WHERE mb_id='$mb_id'";
  $result_member = mysqli_query($con, $query_member);
  $row_member = mysqli_fetch_array($result_member);

  $mb_no = $row_member['mb_no'];

  $board_title = mysqli_real_escape_string($con, $board_title);
  $board_content = mysqli_real_escape_string($con, $board_content);

  $regdate = date("Y-m-d H:i:s");

  $id = (empty($_POST['id']) ? '' : $_POST['id']);
  
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
  } else if($id != '') {
    $sql_board = "SELECT * FROM board_".$cate_table." WHERE  ".$cate_table."_id = '$id'";
    $result_board = mysqli_query($con, $sql_board);
    $row_board = mysqli_fetch_assoc($result_board);

    if(!empty($row_board['fileID'])){
      $file_id = $row_board['fileID'];
    }
  }
  
  if($id != ''){
    if($cate_table != 'event') {
      $query = "UPDATE board_".$cate_table." SET ".$cate_table."_title = '$board_title', ".$cate_table."_content = '$board_content', fileID = '$file_id' WHERE ".$cate_table."_id = '$id'";
    } else {
      $query = "UPDATE board_event SET event_title = '$board_title', event_content = '$board_content', event_sdate = '$event_sdate', event_edate = '$event_edate', fileID = '$file_id' WHERE event_id = '$id' ";
    }
    $result = mysqli_query($con,$query);
  
    echo "
    <script>
      alert('입력이 완료되었습니다.');
      location.replace('adm_board_list.php');
    </script>";
  
  }else {
    if($cate_table != 'event') {
      $query = "INSERT INTO board_".$cate_table."(".$cate_table."_id, ".$cate_table."_title, ".$cate_table."_content, ".$cate_table."_wdate, mb_no, fileID) VALUES(0, '$board_title', '$board_content', sysdate(),'$mb_no','$file_id')";
    } else {
      $query = "INSERT INTO board_event(event_id, event_title, event_content, event_wdate, event_sdate, event_edate, mb_no, fileID) VALUES(0, '$board_title', '$board_content', sysdate(), '$event_sdate', '$event_edate','$mb_no','$file_id')";
    }
    mysqli_query($con, $query);

    echo "
    <script>
      alert('작성이 완료되었습니다.');
      location.replace('adm_board_list.php');
    </script>";
  }
?>