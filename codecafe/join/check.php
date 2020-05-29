<?php
session_start();
require('../dbconnect.php');

if (!isset($_SESSION['join'])) {
  header('Location: index.php');
  exit();
}

if (!empty($_POST)) {
  //登録処理をする
  $statement = $db->prepare('INSERT INTO members SET name=?,id=?, password=?, created=NOW()');
  echo $ret = $statement->execute(array(
    $_SESSION['join']['name'],
    $_SESSION['join']['id'],
    md5($_SESSION['join']['password'])
  ));
  unset($_SESSION['join']);

  header('Location: thanks.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>register</title>
  <link rel="stylesheet" href="../style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="top">
    <img src="../codecafe.jpg">
    <div class="title">Code Cafe</div>
    <div class="sub-title">あなたのお気に入りのカフェを共有しませんか</div>
    </div>
    <div class="form">
<h1>会員登録</h1>
<p>記入した内容を確認して、<br>「登録する」ボタンをクリックしてください</p>
<form action="" method="post">
<input type="hidden" name="action" value="submit">
<ul>
  <li>ニックネーム<br>
  <?php echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES); ?>
  </li>
  <li>会員ID<br>
  <?php echo htmlspecialchars($_SESSION['join']['id'], ENT_QUOTES); ?>
  </li>
  <li>パスワード<br>表示されません
  </li>
</ul>
<div><a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" value="登録する"></div>
</div>
</form>
<script src="../script.js"></script>
</body>
</html>

