<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css" />
<link href="css/registration.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>新規登録</title>
</head>
<body>

<header>
  <h1>新規登録</h1>
</header>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form class = "form" name="form2" action="registration_act.php" method="post">
<div class="item">
  <label class="label_left">
    お名前:<input type="text" name="name"></label><br>
</div>
<div class="item">
  <label class="label_left">
    ご住所:<input type="text" name="address"></label><br>
</div>
<div class="item">
<label class="label_left">
    emailアドレス:<input type="text" name="email"></label><br>
</div>
<div class="item">
<label class="label_left">
    連絡先（携帯）:<input type="text" name="phonenumber"></label><br>
</div>
<div class="item">
  <label class="label_left">
    ID:<br><input type="text" name="lid"></label><br>
</div>
<div class="item">
  <label class="label_left">
    パスワード:<input type="text" name="lpw"></label><br>
</div>

<br>
<button type="submit" id="button">登録</button>
</form>


</body>
</html>