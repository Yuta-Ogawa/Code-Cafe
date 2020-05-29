

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>削除実行画面</title>
  <link rel="stylesheet" href="kanri.css">
</head>
<body>
<header>
    <h1>Code Cafe</h1>
  </header>
  <?php
  try {
    $cafe_id=$_POST['placeid'];
   
    $dsn='mysql:dbname=ogacon_codecafe;host=mysql8042.xserver.jp;charset=utf8';
    $user='ogacon_wp1';
    $password='yuta0114';
    $dbh=new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql='DELETE FROM posts WHERE id=?';
    $stmt=$dbh->prepare($sql);
    $data[]=$cafe_id;
    $stmt->execute($data);
    $dbh=null;


  } catch (Exception $e) {
    print'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
  }
  ?>
  削除しました。<br>

  
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