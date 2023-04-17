<?php
include_once('../../db/db_con.php');

$sql_member = "SELECT COUNT(*) AS cnt FROM member WHERE mb_nick = '".$_POST['mb_nick']."'";
$result_member = mysqli_query($con, $sql_member);
$row_member = mysqli_fetch_assoc($result_member);

echo $row_member['cnt'];
?>