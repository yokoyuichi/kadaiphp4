<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css" />
<link href="css/login.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>ログイン</title>
</head>
<body>

<header>
  <h1>ログイン画面</h1>
</header>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form class = "form" name="form1" action="login_act.php" method="post">
<div class="item">
  <label class="label_left">
    ID:<br><input type="text" name="lid"></label><br>
</div>
<div class="item">
  <label class="label_left">
    パスワード:<input type="text" name="lpw"></label><br>
</div>
<br>
<button type="submit" id="button">ログイン</button>
<p><a href="registration.php">新規登録はこちらから</a></p>
</form>


</body>
</html>