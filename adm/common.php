<?php
$base_URL = (!empty($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://');
$base_URL .= ($_SERVER['SERVER_PORT'] != '80') ? $_SERVER['HTTP_HOST'].':'.$_SERVER['SERVER_PORT'] : $_SERVER['HTTP_HOST'];
$base_URL = $base_URL.'/Ending_fairy/'; // href, src 등등 경로 전용
$base_admin_URL = $base_URL.'adm/';  // href, src 등등 경로 전용 (admin)

empty($title)&&($title = "관리자 페이지"); // 타이틀 없는경우 임시 할당

//$_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/' : include시 사용할 path (admin)
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/adm/header.php');
?>