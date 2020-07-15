<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>コンビニando</title>
</head>
<body>


<?php
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$contents = $_POST['contents'];
$comment = $_POST['comment'];
try
{
//updateディスプにsql文＋updateも3画面つくる。
//入力、確認、完了で構成する。

//dbアクセス
$dsn = 'mysql:dbname=ando;host=localhost;charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// var_dump($_GET['id']);

$sql = "UPDATE menu SET name = ?,price = ?,contents = ?,comment =? WHERE id = ?";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(1,$name); 
$stmt->bindParam(2,$price); 
$stmt->bindParam(3,$contents); 
$stmt->bindParam(4,$comment); 
$stmt->bindParam(5,$id); 

$stmt->execute();
$statement = $stmt->execute();
// var_dump($statement);
// $stmt->debugDumpParams();
//切断
$dbh = null;
}
catch(Exception $e)
{
    print'ただいま障害により大変ご迷惑お掛けしております。';
    echo $e;
    exit();
}

?>

<strong>更新が完了しました</strong><br/>
<br/>
<br/>

<a href="top.html">トップへ戻る</a>

</body>
</html>