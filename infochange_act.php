<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$name = $_POST['name'];
$address = $_POST['address'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];

//2. DB接続します
include("funcs.php");  //funcs.phpを読み込む（関数群）
 //1.  DB接続
 $pdo = db_conn();      //DB接続関数


//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE userdata SET name=:name, address=:address, phonenumber=:phonenumber, email=:email, lpw=:lpw where lid=:lid");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':address', $address, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':phonenumber', $phonenumber, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

 //４．データ登録処理後
 if($status==false){
   //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
   $error = $stmt->errorInfo();
   exit("SQL_ERROR:".$error[2]);
 }else{
   //５．index.phpへリダイレクト
   header("Location: complete_infochange.php");
   exit();
 }
?>