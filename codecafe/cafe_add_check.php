

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>カフェチェック</title>
  <link rel="stylesheet" href="kanri.css">
</head>
<body>
<header>
    <h1>Code Cafe</h1>
  </header>
  <?php
  $cafe_date=$_POST['date'];
  $cafe_place=$_POST['place'];
  $cafe_wifi=$_POST['wifi'];
  $cafe_power=$_POST['power'];
  $cafe_seat=$_POST['seat'];
  $cafe_congestion=$_POST['congestion'];
  $cafe_parking=$_POST['parking'];
  $cafe_smoking=$_POST['smoking'];
  $cafe_comment=$_POST['comment'];
  
  $cafe_date=htmlspecialchars($cafe_date,ENT_QUOTES,'UTF-8');
  $cafe_place=htmlspecialchars($cafe_place,ENT_QUOTES,'UTF-8');
  $cafe_wifi=htmlspecialchars($cafe_wifi,ENT_QUOTES,'UTF-8');
  $cafe_power=htmlspecialchars($cafe_power,ENT_QUOTES,'UTF-8');
  $cafe_seat=htmlspecialchars($cafe_seat,ENT_QUOTES,'UTF-8');
  $cafe_congestion=htmlspecialchars($cafe_congestion,ENT_QUOTES,'UTF-8');
  $cafe_parking=htmlspecialchars($cafe_parking,ENT_QUOTES,'UTF-8');
  $cafe_smoking=htmlspecialchars($cafe_smoking,ENT_QUOTES,'UTF-8');
  $cafe_comment=htmlspecialchars($cafe_comment,ENT_QUOTES,'UTF-8');

  if($cafe_place=='') {
    print'カフェの名前が未記入です。<br>';
  } else {
      print'カフェの名前：';
      print $cafe_place;
      print'<br>';
  }
  if($cafe_date=='') {
    
  } else {
      print'行った日：';
      print $cafe_date;
      print'<br>';
  }
  if($cafe_wifi=='') {
    
  } else {
      print'Wi-Fi：';
      print $cafe_wifi;
      print'<br>';
  }
  if($cafe_power=='') {
   
  } else {
      print'電源：';
      print $cafe_power;
      print'<br>';
  }
  if($cafe_seat=='') {
   
  } else {
      print'座席数：';
      print $cafe_seat;
      print'<br>';
  }
  if($cafe_congestion=='') {
   
  } else {
      print'混雑具合：';
      print $cafe_congestion;
      print'<br>';
  }
  if($cafe_parking=='') {
 
  } else {
      print'駐車場：';
      print $cafe_parking;
      print'<br>';
  }
  if($cafe_smoking=='') {
 
  } else {
      print'喫煙所：';
      print $cafe_smoking;
      print'<br>';
  }
  if($cafe_comment=='') {
 
  } else {
      print'自由コメント欄：';
      print $cafe_comment;
      print'<br>';
  }
  if($cafe_place=='') {
    print'<form>';
    print'<input type="button" onclick="history.back()" value="戻る">';
    print'</form>';
  }else {
    print'<form method="post" action="cafe_add_done.php">';
    print'<input type="hidden" name="place" value="'.$cafe_place.'">';
    print'<input type="hidden" name="date" value="'.$cafe_date.'">';
    print'<input type="hidden" name="wifi" value="'.$cafe_wifi.'">';
    print'<input type="hidden" name="power" value="'.$cafe_power.'">';
    print'<input type="hidden" name="seat" value="'.$cafe_seat.'">';
    print'<input type="hidden" name="congestion" value="'.$cafe_congestion.'">';
    print'<input type="hidden" name="parking" value="'.$cafe_parking.'">';
    print'<input type="hidden" name="smoking" value="'.$cafe_smoking.'">';
    print'<input type="hidden" name="comment" value="'.$cafe_comment.'">';
    print'<br>';
    print'<input type="button" onclick="history.back()" value="戻る">';
    print'<input type="submit" value="OK">';
    print'</form>';
  }


  ?>

</body>
</html>

<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false) {
  print'ログインされていません。<br>';
  print'<a href="../codecafe_login/cafe_login.html">ログイン画面へ</a>';
  exit();
} else {
  print $_SESSION['cafe_name'];
  print'さんログイン中<br>';
  print'<br>';
}
?>