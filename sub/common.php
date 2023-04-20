<?php
session_start();

$base_URL = (!empty($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://');
$base_URL .= ($_SERVER['SERVER_PORT'] != '80') ? $_SERVER['HTTP_HOST'].':'.$_SERVER['SERVER_PORT'] : $_SERVER['HTTP_HOST'];
$base_URL = $base_URL.'/Ending_fairy/';
// echo $base_URL; // href, src 등등 경로 전용
$base_skin_URL = $base_URL.'skin/';

empty($title)&&($title = "캐논 아카데미"); // 타이틀 없는경우 임시 할당

//$_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/' : include시 사용할 path
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/db/db_con.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/header.php');
?>