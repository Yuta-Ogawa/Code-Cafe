

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NG画面</title>
  <link rel="stylesheet" href="kanri.css">
</head>
<body>
<header>
    <h1>Code Cafe</h1>
  </header>
  カフェが選択されていません。<br>
  <a href="cafe_list.php">戻る</a><br><br>
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