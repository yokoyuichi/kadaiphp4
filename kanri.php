<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sample.css">
    <title>わなまっぷ</title>
</head>


<!-- データ取得
<?php
session_start();
include("funcs.php");  //funcs.phpを読み込む（関数群）
sschk();
 //1.  DB接続
 $pdo = db_conn();      //DB接続関数

 //２．データ取得SQL作成
 $stmt = $pdo->prepare("SELECT * FROM hunter_map");
 $status = $stmt->execute();

 //３．データ表示
 $view="";
 if($status==false) {
     //execute（SQL実行時にエラーがある場合）
   $error = $stmt->errorInfo();
   exit("SQL_ERROR:".$error[2]);

 }else{
   //Selectデータの数だけ自動でループしてくれる
   //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
   $view .= "<tr><th>ID<br>データ編集可</th><th>日付</th><th>動物</th><th>猟の種類</th><th>捕獲数</th><th>緯度</th><th>経度</th><th>削除欄</th></tr>";
   while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
     $view .= '<tr>';
     $view .= "<td><a href='detail.php?id={$res['id']}'>{$res['id']}</a></td><td>{$res['date']}</td><td>{$res['animal']}</td><td>{$res['trap']}</td><td>{$res['number']}</td><td>{$res['lat']}</td><td>{$res['lon']}</td>";
     $view .= "<td><a href='delete.php?id={$res['id']}'>[削除]</a></td>";
     $view .= "</tr>";

     $pin .= "let pin{$res['id']} = map.pinText({$res['lat']}, {$res['lon']}, '{$res['animal']}', '{$res['date']}', '{$res['id']}'); ";
   }
}
?> -->

<!-- jQuery&GoogleMapsAPI -->
<script src='https://code.jquery.com/jquery-2.1.4.min.js' type='text/javascript'></script>
<!-- javascript -->

 <!-- /jQuery&GoogleMapsAPI -->
<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=ApXo3--EVXEFu9rGcEVMM4EUg-v5AMG6vSaMpEq4Olb7pEKJuBdbjyemGeq3AFVd' async defer></script>
<script type='text/javascript' src="BmapQuery.js"></script>

<script type="text/javascript" defer>
//map表示
let map

function GetMap(){
     //------------------------------------------------------------------------
     //1. Instance
     //------------------------------------------------------------------------
     map = new Bmap("#myMap");
     //Main:位置情報を取得する処理 //getCurrentPosition :or: watchPosition
     
     navigator.geolocation.getCurrentPosition(mapsInit, mapsError, set);
 }
 function mapsInit(position) {
    //lat=緯度、lon=経度 を取得
    lat = position.coords.latitude;
    lon = position.coords.longitude;

        map.startMap(lat, lon, "load", 10); 
        let pin = map.pinText(lat, lon, "現在地","ここ","You");
        console.log(lat)
        console.log(lon)
    <?php echo $pin; ?>; // 過去の捕獲位置を表示
    }
      
  function mapsError(error){
    if(error.code==1){
      alert("位置情報の取得が許可されていない")
    }
    else if(error.code==2){
      alert("位置情報の取得が利用できない")
    }
    if(error.code==3){
      alert("タイムアウト")
    }
  }
  var set ={
    enableHighAccuracy: true, //より高精度な位置を求める
    maximumAge: 20000,        //最後の現在地情報取得が20秒以内であればその情報を再利用する設定
    timeout: 10000            //10秒以内に現在地情報を取得できなければ、処理を終了
  };

//ここまでMap

//ボタンを押したら…、
$(document).ready(function() {
$("#get").on("click", function(){
    // 位置情報の取得可否により分岐
    navigator.geolocation.getCurrentPosition(success, fail, set);

// 位置情報が取得できた場合
function success(position) {
            var dateoriginal = new Date(position.timestamp);
            let date = dateoriginal.toLocaleString()        // 日時
            let lat = position.coords.latitude              // 緯度
            let lon = position.coords.longitude             // 経度
            map.startMap(lat, lon, "load", 10); 
            let pin2 = map.pinText(lat, lon, "現在地","捕獲位置","You");
            $("#space").append(`<div class="item"><label class="label_left">日時：<input type='text' name='date' id='date' value = ${date}></label><br></div>`)
            $("#space").append(`<div class="item"><label class="label_left">緯度：<input type='text' name='lat' id='lat' value = ${lat}></label><br></div>`)
            $("#space").append(`<div class="item"><label class="label_left">経度：<input type='text' name='lon' id='lon' value = ${lon}></label><br></div>`)
            
        }

        // 位置情報が取得できなかった場合
        function fail(error) {
            if (error.code == 1) alert('位置情報を取得する時に許可がない')
            if (error.code == 2) alert('何らかのエラーが発生し位置情報が取得できなかった。')
            if (error.code == 3) alert('タイムアウト　制限時間内に位置情報が取得できなかった。')
        }
        var set ={
            enableHighAccuracy: true, //より高精度な位置を求める
            maximumAge: 20000,        //最後の現在地情報取得が20秒以内であればその情報を再利用する設定
            timeout: 10000            //10秒以内に現在地情報を取得できなければ、処理を終了
        };

    });
});

</script>

<body>
    
    <!-- Main[Start] -->

    <div class = "logout"><a href = "logout.php">ログアウト</a></div> 
    <h3>～管理画面～</h3>
    <table class="table"><?=$view?></table>
    <div id="myMap" style='width:70%;height:70%;'></div>
</body>


</html>