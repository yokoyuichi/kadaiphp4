<?php
//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//2. データ入手SQL作成
$stmt = $pdo->prepare("select * from userdata"); 
// $stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
// $stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $pw = password_hash($res['lpw'], PASSWORD_DEFAULT);
    $stmt_ = $pdo->prepare("UPDATE userdata SET lpw=:lpw WHERE lid=:lid");
    $stmt_->bindValue(':lpw', $pw, PDO::PARAM_STR);
    $stmt_->bindValue(':lid', $res['lid'], PDO::PARAM_STR);
    $status_ = $stmt_->execute();
}
?>