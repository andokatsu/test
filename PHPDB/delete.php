<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>コンビニando</title>
</head>
<body>

<?php

//dbアクセス
$dsn = 'mysql:dbname=ando;host=localhost;charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//変数sqlにSQL文を代入
//where文はお尻につける

//sql作成
// $sql = "DELETE FROM menu WHERE id = ?";

//論理削除バージョン
$sql = "UPDATE menu SET del_flg = 1 WHERE id = ?";

//実行準備
$stmt = $dbh->prepare($sql);

$stmt->bindParam(1,$_POST['id']); 

// var_dump($_POST['id']);
$statement = $stmt->execute();

//切断
$dbh = null;

?>

削除を完了しました<br/>
<a href="top.html">トップへ戻る</a>

</body>
</html>