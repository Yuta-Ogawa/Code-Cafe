
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

    $cafe_id=$_GET['placeid'];

    $dsn='mysql:dbname=ogacon_codecafe;host=mysql8042.xserver.jp;charset=utf8';
    $user='ogacon_wp1';
    $password='yuta0114';
    $dbh=new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql= 'SELECT date,place,wifi,power,seat,congestion,parking,smoking,comment FROM posts WHERE id=?';
    $stmt=$dbh->prepare($sql);
    $data[]=$cafe_id;
    $stmt->execute($data);

    $rec=$stmt->fetch(PDO::FETCH_ASSOC);

    $cafe_date=$rec['date'];
    $cafe_place=$rec['place'];
    $cafe_wifi=$rec['wifi'];
    $cafe_power=$rec['power'];
    $cafe_seat=$rec['seat'];
    $cafe_congestion=$rec['congestion'];
    $cafe_parking=$rec['parking'];
    $cafe_smoking=$rec['smoking'];
    $cafe_comment=$rec['comment'];

    $dbh=null;

  } catch (Exception $e) {
    print'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
  }

  ?>

  <h1>カフェ修正</h1>
  <br>
  <form method="post" action="cafe_edit_check.php">
    登録番号 <span class="kome">※変更しないでください</span><br>
  <input type="text" name="placeid" style="width:300px" value="<?php print $cafe_id; ?>"><br><br>
    カフェの名前を記入してください <span class="care">必須</span><br>
    <input type="text" name="place" style="width:300px" value="<?php print $cafe_place; ?>"><br><br>
    行った日を選択してください 任意<br>
    <input type="date" name="date" value="<?php print $cafe_date; ?>"><br><br>
    WI-Fiのありなしを記入してください 任意<br>
    <input type="text" name="wifi" style="width:300px" value="<?php print $cafe_wifi; ?>"><br><br>
    電源数を記入してください 任意<br>
    <input type="text" name="power" style="width:300px" value="<?php print $cafe_power; ?>"><br><br>
    座席数を記入してください 任意<br>
    <input type="text" name="seat" style="width:300px" value="<?php print $cafe_seat; ?>"><br><br>
    混雑具合を記入してください 任意<br>
    <input type="text" name="congestion" style="width:300px" value="<?php print $cafe_congestion; ?>"><br><br>
    駐車場のありなしを記入してください 任意<br>
    <input type="text" name="parking" style="width:300px" value="<?php print $cafe_parking; ?>"><br><br>
    喫煙所のありなしを記入してください 任意<br>
    <input type="text" name="smoking" style="width:300px" value="<?php print $cafe_smoking; ?>"><br><br>
    自由コメント欄 任意<br>
    <textarea name="comment" style="width:300px"><?php print $cafe_comment; ?></textarea><br><br>
    <br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
  </form>


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
