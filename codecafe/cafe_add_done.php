

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="kanri.css">
</head>
<body>
<header>
    <h1>Code Cafe</h1>
  </header>
  <?php
  try {
  $cafe_place=$_POST['place'];
  $cafe_date=$_POST['date'];
  $cafe_wifi=$_POST['wifi'];
  $cafe_power=$_POST['power'];
  $cafe_seat=$_POST['seat'];
  $cafe_congestion=$_POST['congestion'];
  $cafe_parking=$_POST['parking'];
  $cafe_smoking=$_POST['smoking'];
  $cafe_comment=$_POST['comment'];
  
  $cafe_place=htmlspecialchars($cafe_place,ENT_QUOTES,'UTF-8');
  $cafe_date=htmlspecialchars($cafe_date,ENT_QUOTES,'UTF-8');
  $cafe_wifi=htmlspecialchars($cafe_wifi,ENT_QUOTES,'UTF-8');
  $cafe_power=htmlspecialchars($cafe_power,ENT_QUOTES,'UTF-8');
  $cafe_seat=htmlspecialchars($cafe_seat,ENT_QUOTES,'UTF-8');
  $cafe_congestion=htmlspecialchars($cafe_congestion,ENT_QUOTES,'UTF-8');
  $cafe_parking=htmlspecialchars($cafe_parking,ENT_QUOTES,'UTF-8');
  $cafe_smoking=htmlspecialchars($cafe_smoking,ENT_QUOTES,'UTF-8');
  $cafe_comment=htmlspecialchars($cafe_comment,ENT_QUOTES,'UTF-8');

    $dsn='mysql:dbname=ogacon_codecafe;host=mysql8042.xserver.jp;charset=utf8';
    $user='ogacon_wp1';
    $password='yuta0114';
    $dbh=new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql='INSERT INTO posts(place,date,wifi,power,seat,congestion,parking,smoking,comment) VALUES (?,?,?,?,?,?,?,?,?)';
    $stmt=$dbh->prepare($sql);
    $data[]=$cafe_place;
    $data[]=$cafe_date;
    $data[]=$cafe_wifi;
    $data[]=$cafe_power;
    $data[]=$cafe_seat;
    $data[]=$cafe_congestion;
    $data[]=$cafe_parking;
    $data[]=$cafe_smoking;
    $data[]=$cafe_comment;
    $stmt->execute($data);
    $dbh=null;
    print'新しいカフェを追加しました。<br>';

  } catch (Exception $e) {
    print'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
  }

  ?>
<a href="cafe_list.php">戻る</a>

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