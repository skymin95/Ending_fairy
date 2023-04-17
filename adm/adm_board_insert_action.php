<?php

include_once('./common.php');

  $mb_id = $_SESSION['mb_id'];

  $board_title = $_POST['board_title'];
  $board_content = $_POST['board_content'];
  $fileID = $_POST['fileID'];
  $cate_table = $_POST['cate_table'];

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
  $fileID = mysqli_real_escape_string($con, $fileID);

  $regdate = date("Y-m-d H:i:s");

  $id = (empty($_POST['id']) ? '' : $_POST['id']);

  if($id != ''){
    if($cate_table != 'event') {
      $query = "UPDATE board_".$cate_table." SET ".$cate_table."_title = '$board_title', ".$cate_table."_content = '$board_content', fileID = '$fileID' WHERE ".$cate_table."_id = '$id'";
    } else {
      $query = "UPDATE board_event SET event_title = '$board_title', board_content = '$board_content', event_sdate = '$event_sdate', event_edate = '$event_edate', fileID = '$fileID' WHERE event_id = '$id' ";
    }
    $result = mysqli_query($con,$query);
  
    echo "
    <script>
      alert('입력이 완료되었습니다.');
      location.replace('adm_board_list.php');
    </script>";
  
  }else {
    if($cate_table != 'event') {
      $query = "INSERT INTO board_".$cate_table."(".$cate_table."_id, ".$cate_table."_title, ".$cate_table."_content, ".$cate_table."_wdate, mb_no, fileID) VALUES(0, '$board_title', '$board_content', sysdate(),'$mb_no','$fileID')";
    } else {
      $query = "INSERT INTO board_event(event_id, event_title, event_content, event_wdate, event_sdate, event_edate, mb_no, fileID) VALUES(0, '$board_title', '$board_content', sysdate(), '$event_sdate', '$event_edate','$mb_no','$fileID')";
    }
    mysqli_query($con, $query);

    echo "
    <script>
      alert('작성이 완료되었습니다.');
      location.replace('adm_board_list.php');
    </script>";
  }
?>