
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>スタッフログイン</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Code Cafe</h1>
  </header>
  <h1>トップメニュー</h1>
  <a href="../codecafe/cafe_list.php"> カフェ管理</a><br>
  <br>
  <a href="cafe_logout.php">ログアウト</a><br>
</body>
</html>
<br>
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