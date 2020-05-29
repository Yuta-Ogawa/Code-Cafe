

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>カフェ一覧</title>
  <link rel="stylesheet" href="kanri.css">
</head>
<body>
<header>
    <h1>Code Cafe</h1>
  </header>
    <h1>操作メニュー</h1>
  <?php
  try {
    $dsn='mysql:dbname=ogacon_codecafe;host=mysql8042.xserver.jp;charset=utf8';
    $user='ogacon_wp1';
    $password='yuta0114';
    $dbh=new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql= 'SELECT id,place FROM posts WHERE 1';
    
    $stmt=$dbh->prepare($sql);
    $stmt->execute();

    $dbh=null;

    

    print'<form method="post" action="cafe_branch.php">';
    print'<input type="submit" name="add" value="新規カフェ追加">';
    print'<br><br>';
    print'登録カフェ一覧<br>';
    while(true) {
      $rec=$stmt->fetch(PDO::FETCH_ASSOC);
      if($rec==false){
      break;
      }
      print'<input type="radio" name="placeid" value="'.$rec['id'].'">';
      print$rec['place'];
      print'<br>';
    }
    print'<br>';
    print'<input type="submit" name="disp" value="参照"><span><br>詳細を確認できます</span><br><br>';
    
    print'<input type="submit" name="edit" value="修正"><span><br>詳細の修正ができます</span><br><br>';
    print'<input type="submit" name="delete" value="削除"><br><span class="kome">※他の人が登録したカフェも<br>削除できてしまうので注意してください</span><br><br>';
    print'</form>';
  } catch (Exception $e) {
    print'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
  }

  ?>

<a href="../codecafe_login/cafe_top.php">トップメニューへ</a>

</body>
</html>
<br><br>
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