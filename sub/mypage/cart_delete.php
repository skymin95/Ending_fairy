<?php
include_once('../common.php');


if(empty($_POST['checked_list'])) {

  $cart_id = $_GET['cart_id'];
  
  $sql_cart_info = "SELECT * FROM cart WHERE mb_no =".$row_member['mb_no']." AND cart_id = $cart_id";
  $result_cart_info = mysqli_query($con, $sql_cart_info);
  $num_cart_info = mysqli_num_rows($result_cart_info);

  if($num_cart_info == 1) {
    $sql_cart = "DELETE FROM cart WHERE mb_no =".$row_member['mb_no']." AND cart_id = $cart_id";
    $result_cart = mysqli_query($con, $sql_cart);
    echo "<script>
      alert('삭제 완료되었습니다.');
      history.back();
    </script>";
  } else {
    echo "<script>
      alert('잘못된 접근입니다.');
      history.back();
    </script>";
  }
} else {
  for($i = 0; $i < count($_POST['checked_list']); $i++){
    $sql_cart = "DELETE FROM cart WHERE mb_no =".$row_member['mb_no']." AND cart_id = ".$_POST['checked_list'][$i];
    $result_cart = mysqli_query($con, $sql_cart);
  }
  echo "<script>
    alert('삭제 완료되었습니다.');
    history.back();
  </script>";
}

?>