<?php
try {
    $db = new PDO('mysql:dbname=ogacon_codecafe;host=mysql8042.xserver.jp;charset=utf8', 'ogacon_wp1', 'yuta0114');
} catch (PDOException $e) {
    echo 'DB接続エラー: ' . $e->getMessage();
}

?>
