<?php
include_once('../common.php');

$sql_cart_info = "SELECT * FROM cart WHERE mb_no =".$row_member['mb_no']." AND course_id = ".$_GET['code']." ";
$result_cart_info = mysqli_query($con, $sql_cart_info);
$num_cart_info = mysqli_num_rows($result_cart_info);
if($num_cart_info > 0) {
  echo "<script>
    alert('이미 등록되어있는 상품입니다.');
    history.back();
  </script>";
} else {
  $sql_cart = "INSERT INTO cart(cart_id, mb_no, course_id) VALUES (0, '".$row_member['mb_no']."', '".$_GET['code']."')";
  $result_cart = mysqli_query($con, $sql_cart);
  echo "<script>
    if(confirm('장바구니에 등록이 완료되었습니다. 장바구니로 이동하시겠습니까?')){
      location.href = '".$base_URL."sub/mypage/cart.php';
    } else {
      history.back();
    }
  </script>";
}

?>