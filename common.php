<?php
session_start();

$base_URL = (!empty($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://');
$base_URL .= ($_SERVER['SERVER_PORT'] != '80') ? $_SERVER['HTTP_HOST'].':'.$_SERVER['SERVER_PORT'] : $_SERVER['HTTP_HOST'];
$base_URL = $base_URL.'/Ending_fairy/';
// echo $base_URL; // href, src 등등 경로 전용

include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/db/db_con.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/Ending_fairy/header.php');
?>