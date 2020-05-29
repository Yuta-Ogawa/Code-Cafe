<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Code Cafe</h1>
  </header>
</body>
</html>
<?php

try {

  $cafe_code=$_POST['id'];
  $cafe_pass=$_POST['pass'];

  $cafe_code=htmlspecialchars($cafe_code,ENT_QUOTES,'UTF-8');
  $cafe_pass=htmlspecialchars($cafe_pass,ENT_QUOTES,'UTF-8');

  $cafe_pass=md5($cafe_pass);

  $dsn='mysql:dbname=ogacon_codecafe;host=mysql8042.xserver.jp;charset=utf8';
  $user='ogacon_wp1';
  $password='yuta0114';
  $dbh=new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $sql='SELECT name FROM members WHERE id=? AND password=?';
  $stmt=$dbh->prepare($sql);
  $data[]=$cafe_code;
  $data[]=$cafe_pass;
  $stmt->execute($data);

  $dbh=null;

  $rec=$stmt->fetch(PDO::FETCH_ASSOC);

  if($rec==false) {
    print'会員IDかパスワードが間違っています。<br>';
    print'<a href="cafe_login.html">戻る</a>';
  } else {
    session_start();
    $_SESSION['login']=1;
    $_SESSION['cafe_code']=$cafe_code;
    $_SESSION['cafe_name']=$rec['name'];
    header('Location:cafe_top.php');
    exit();

  }

} catch (Exception $e) {
    print'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}
?>
