<!-- config.php 세션정보를 유지하기 위한 문서 -->
<?php
//세션
session_start();

if(isset($_SESSION['mb_id'])) $mb_id = $_SESSION['mb_id'];
  else $mb_id='';  

?>