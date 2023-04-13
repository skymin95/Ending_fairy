<?php

include_once('./common.php');

  // $notice_id = $_POST['notice_id'];
  $notice_title = $_POST['notice_title'];
  $notice_content = $_POST['notice_content'];
  // $notice_wdate = $_POST['notice_wdate'];
  $mb_id = $_SESSION['mb_id'];
  $fileID = $_POST['fileID'];

  $query_member = "SELECT mb_no, mb_id FROM member WHERE mb_id='$mb_id'";
  $result_member = mysqli_query($con, $query_member);
  $row_member = mysqli_fetch_array($result_member);

  $mb_no = $row_member['mb_no'];

  //입력한 데이터의 보안성을 위해 한번더 저장
  // $notice_id = mysqli_real_escape_string($con, $notice_id);
  $notice_title = mysqli_real_escape_string($con, $notice_title);
  $notice_content = mysqli_real_escape_string($con, $notice_content);
  // $notice_wdate = mysqli_real_escape_string($con, $notice_wdate);
  $fileID = mysqli_real_escape_string($con, $fileID);

  $regdate = date("Y-m-d H:i:s");

  $ip = $_SERVER['REMOTE_ADDR'];

  if($id != ''){
      $query = "SELECT * FROM board_notice WHERE id = '$id'";
      $result = mysqli_query($con,$query);
      $data = mysqli_fetch_assoc($result);

      
      if(!$data['id']){
        echo "<script>alert('비밀번호가 달라 수정 할 수 없습니다. 다시 확인하세요.');</script>";
        echo "<script>history.back();</script>"; 
      } 
        echo "
        <script>
          alert('작성이 완료되었습니다.');
          location.replace('noticelist.php');
        </script>";
      
    }else {
      $query = "INSERT INTO board_notice(notice_id, notice_title, notice_content, notice_wdate, mb_no, fileID) VALUES(0, '$notice_title', '$notice_content', sysdate(),'$mb_no',$fileID)";
      mysqli_query($con, $query);
  
      echo "
      <script>
        alert('입력이 완료되었습니다.');
        location.replace('adm_board_list.php');
      </script>";
    }
?>