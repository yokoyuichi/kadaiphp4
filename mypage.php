<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link href="css/mypage.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>マイページ</title>
</head>
<body>

<header>
  <h1>マイページ</h1>
</header>

<?php
session_start();
include("funcs.php");  //funcs.phpを読み込む（関数群）
?>

<div class="item">
  <label class="label_left">
    ID: <?= $_SESSION["lid"] ?>
</div>
<div class="item">
  <label class="label_left">
    パスワード: <?= $_SESSION["lpw"] ?>
</div>
<br>
<div class="item">
  <label class="label_left">
    名前: <?= $_SESSION["name"] ?>
</div>
<br>
<div class="item">
  <label class="label_left">
    住所: <?= $_SESSION["address"] ?>
</div>
<br>
<div class="item">
  <label class="label_left">
    メールアドレス: <?= $_SESSION["email"] ?>
</div>
<br>
<div class="item">
  <label class="label_left">
    電話番号: <?= $_SESSION["phonenumber"] ?>
</div>
<br>

<button type="submit" id="button"><a href="infochange.php">変更</a></button>
<p><a href="user.php">戻る</a></p>


</body>
</html>