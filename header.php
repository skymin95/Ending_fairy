<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?></title>
  <link rel="stylesheet" href="<?=$base_URL?>skin/reset.css" type="text/css">
  <link rel="stylesheet" href="<?=$base_URL?>skin/base.css" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" type="text/css">
  <link rel="shortcut icon" href="<?=$base_URL?>images/favicon.png" type="image/x-icon">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

  <?php
  
  if(basename($_SERVER['PHP_SELF']) == 'index.php'){
  }
  if($title == "로그인"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."member/login.css' type='text/css'>";
  }
  if($title == "회원가입"){
    echo "<link rel='stylesheet' href='".$base_skin_URL."member/register.css' type='text/css'>";
    echo "<script src='".$base_skin_URL."member/register.js' defer></script>";
  }

  ?>
</head>
<body>
<header>

</header>