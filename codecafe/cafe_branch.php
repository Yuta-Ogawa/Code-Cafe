<?php

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false) {
  print'ログインされていません。<br>';
  print'<a href="../codecafe_login/cafe_login.html">ログイン画面へ</a>';
  exit();
}

if (isset($_POST['disp'])==true) {
    if (isset($_POST['placeid'])==false) {
        header('Location:cafe_ng.php');
        exit();
    }
    
  $cafe_id=$_POST['placeid'];
  header('Location:cafe_disp.php?placeid='.$cafe_id);
exit();
}
if(isset($_POST['add'])==true) {
  header('Location:cafe_add.php');
  exit();
}
if(isset($_POST['edit'])==true) {
  if(isset($_POST['placeid'])==false) {
    header('Location:cafe_ng.php');
    exit();
  }
  $cafe_id=$_POST['placeid'];
  header('Location:cafe_edit.php?placeid='.$cafe_id);
  exit();
}
if(isset($_POST['delete'])==true) {
  if(isset($_POST['placeid'])==false) {
    header('Location:cafe_ng.php');
    exit();
  }
  $cafe_id=$_POST['placeid'];
  header('Location:cafe_delete.php?placeid='.$cafe_id);
  exit();
}
?>