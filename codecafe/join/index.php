<?php
session_start();

if(!empty($_POST)) {
  if($_POST['name'] == '') {
    $error['name'] = 'blank';
  }
  if($_POST['id'] == '') {
    $error['id'] = 'blank';
  }
  if(strlen($_POST['password']) < 4) {
    $error['password'] = 'length';
  }
  if($_POST['password'] == '') {
    $error['password'] = 'blank';
  }
  if (empty($error)) {
    $_SESSION['join'] =$_POST;
    header('Location: check.php');
    exit();
  }
}

//書き直し
if ($_REQUEST['action'] == 'rewrite') {
  $_POST = $_SESSION['join'];
  $error['rewrite'] = true;
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
    <p>次のフォームに必要事項を記入してください</p>
    <form action="" method="post" enctype="multipart/form-data">
    <ul>
      <li>ニックネーム <span class="required">必須</span> ログイン時に表示されます<br><input type="text" name="name" size="35" maxlength="255" value="<?php echo htmlspecialchars($_POST['name'], ENT_QUOTES); ?>">
      <?php if ($error['name'] == 'blank'): ?>
      <p class="error">* ニックネームを入力してください</p>
      <?php endif; ?>
      </li>
      <li>会員ID <span class="required">必須</span> ログイン時に必要です<br><input type="" name="id" size="35" maxlength="255" value="<?php echo htmlspecialchars($_POST['id'], ENT_QUOTES); ?>">
      <?php if ($error['id'] == 'blank'): ?>
      <p class="error">* 会員IDを入力してください</p>
      <?php endif; ?></li>
      <li>パスワード <span class="required">必須</span> ログイン時に必要です<br>
      <input type="text" name="password" size="35" placeholder="半角英数字・半角数字で4文字以上" maxlength="255" value="<?php echo htmlspecialchars($_POST['password'], ENT_QUOTES); ?>">
      <?php if ($error['password'] == 'blank'): ?>
      <p class="error">* パスワードを入力してください。</p>
      <?php endif; ?>
      <?php if ($error['password'] == 'length'): ?>
      <p class="error">* パスワードは4文字以上で入力してください</p>
      <?php endif; ?>
      </li>
      <br>
      <input  type="submit" value="入力内容を確認する"><br><br>
      <a href="../../codecafe_login/cafe_login.html">ログインはこちら</a>
    </ul>
    </div>
    <div class="corp">©2020 oga</div>
</form>

<script src="../script.js"></script>
</body>
</html>