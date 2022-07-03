<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/infochange.css">
    <title>登録情報変更</title>
</head>

<?php
session_start();
include("funcs.php");  //funcs.phpを読み込む（関数群）
sschk();
?>

<body>
<form class = "form" name="form2" action="infochange_act.php" method="post">
<div class="item">
  <label class="label_left">
    お名前:<input type="text" name="name" value=<?= $_SESSION["name"] ?>></label><br>
</div>
<div class="item">
  <label class="label_left">
    ご住所:<input type="text" name="address" value=<?= $_SESSION["address"] ?>></label><br>
</div>
<div class="item">
<label class="label_left">
    emailアドレス:<input type="text" name="email" value=<?= $_SESSION["email"] ?>></label><br>
</div>
<div class="item">
<label class="label_left">
    連絡先（携帯）:<input type="text" name="phonenumber" value=<?= $_SESSION["phonenumber"] ?>></label><br>
</div>
<div class="item">
  <label class="label_left">
    ID:<?= $_SESSION['lid'] ?></label><br>
</div>
<div class="item">
  <label class="label_left">
    パスワード:<input type="text" name="lpw" value=<?= $_SESSION["lpw"] ?>></label><br>
</div>

<br>
<button type="submit" id="button">登録変更</button>
</form>

</body>

</html>