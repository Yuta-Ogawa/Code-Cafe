

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>削除画面</title>
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
    $sql= 'SELECT date,place,wifi,power,seat,congestion,parking,smoking comment FROM posts WHERE id=?';
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

  <h1>カフェ削除</h1>
  <br>
  カフェの名前：
  <?php print $cafe_place; ?>
  <br>
  このカフェを削除してよろしいですか<br>
  <form method="post" action="cafe_delete_done.php">
    <input type="hidden" name="placeid" value="<?php print $cafe_id; ?>">
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