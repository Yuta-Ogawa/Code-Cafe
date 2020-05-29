

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>投稿画面</title>
  <link rel="stylesheet" href="kanri.css">
</head>
<body>
<header>
    <h1>Code Cafe</h1>
  </header>
  <h1>投稿画面</h1>
  <form method="post" action="cafe_add_check.php">
    カフェの名前を記入してください <span class="care">必須</span><br>
    <input type="text" name="place" style="width:200px" placeholder="スタバ渋谷マークシティ店"><br><br>
    行った日を選択してください 任意<br>
    <input type="date" name="date"><br><br>
    Wi-Fiのありなしを記入してください 任意<br>
    <input type="text" name="wifi" style="width:200px" placeholder="あり"><br><br>
    電源数を記入してください 任意<br>
    <input type="text" name="power" style="width:200px" placeholder="10口程度"><br><br>
    座席数を記入してください 任意<br>
    <input type="text" name="seat" style="width:200px" placeholder="50席程度"><br><br>
    混雑具合を記入してください 任意<br>
    <input type="text" name="congestion" style="width:200px" placeholder="常に混んでる"><br><br>
    駐車場のありなしを記入してください 任意<br>
    <input type="text" name="parking" style="width:200px" placeholder="なし"><br><br>
    喫煙所のありなしを記入してください 任意<br>
    <input type="text" name="smoking" style="width:200px"  placeholder="なし"><br><br>
    自由コメント欄 任意<br>
    <textarea name="comment" style="width:200px"  placeholder="〇〇がおいしい"></textarea><br><br>
    <a href="cafe_list.php">戻る</a>
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