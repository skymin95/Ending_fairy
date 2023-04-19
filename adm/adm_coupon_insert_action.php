<?php
  include_once('./common.php');

  $id = $_POST['id']??'';

  $coupon_kind = $_POST['coupon_kind'];
  $coupon_title = $_POST['coupon_title'];
  $coupon_code = $_POST['coupon_code'];
  $coupon_sdate = $_POST['coupon_sdate'];
  $coupon_edate = $_POST['coupon_edate'];
  $coupon_cdate = $_POST['coupon_cdate'];
  $coupon_count = $_POST['coupon_count'];
  $coupon_sale = $_POST['coupon_sale'];

  if($id == ''){
    $sql_coupon = "INSERT INTO coupon_list(coupon_kind, coupon_title, coupon_code, coupon_sdate, coupon_edate, coupon_cdate, coupon_count, coupon_sale)
    VALUES('$coupon_kind' ,'$coupon_title' ,'$coupon_code' ,'$coupon_sdate' ,'$coupon_edate' ,'$coupon_cdate' ,'$coupon_count' ,'$coupon_sale')";
    $result_coupon = mysqli_query($con, $sql_coupon);
  } else {
    $sql_coupon = "UPDATE coupon_list
    SET coupon_kind = '$coupon_kind', 
        coupon_title = '$coupon_title', 
        coupon_code = '$coupon_code', 
        coupon_sdate = '$coupon_sdate', 
        coupon_edate = '$coupon_edate', 
        coupon_cdate = '$coupon_cdate', 
        coupon_count = '$coupon_count', 
        coupon_sale = '$coupon_sale', 
    WHERE coupon_no = '$id' ";
    $result_coupon = mysqli_query($con, $sql_coupon);
  }
?>
<script>
  alert('<?=$id == '' ? '추가' : '수정'?> 완료되었습니다.');
  location.href='<?=$base_admin_URL?>adm_coupon_list.php';
</script>