<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>コンビニando</title>
</head>
<body>

<strong>削除確認</strong><br/><br/>

<?php

$id = $_GET['id'];
//search_result.phpから値の受け取り
//delete_checkでsqlで表示
$dsn = 'mysql:dbname=ando;host=localhost;charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//id 検索でヒットしない場合はエラーでも吐くとよい。
// または取得したレコードの削除フラグが立っていたならばエラーを吐くという処理にすること。
$sql = "SELECT * FROM menu WHERE id = ?";

//実行準備
$stmt = $dbh->prepare($sql);

$stmt->bindParam(1,$_GET['id']);
$stmt->execute();

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($rec);

//切断
$dbh = null;

?>

<!-- delete.phpへ値の受け渡し -->
<form method="post" action="delete.php"enctype="multipart/form-data">

<p>商品名「<?=$rec['name']; ?>」</p>

<p>価格「<?=$rec['price']; ?>」円</p>

<p>コンテンツ「<?=$rec['contents']; ?>」</p>

<p>コメント「<?=$rec['comment']; ?>」</p>

を削除してよろしいですか<br/>

<input type="hidden" name="del" value="<?=$del;?>">
<input type="hidden" name="id" value="<?=$id;?>">
<input type="hidden" name="name" value="<?=$name;?>">
<input type="hidden" name="price" value="<?=$price;?>">
<input type="hidden" name="contents" value="<?=$contents;?>">
<input type="hidden" name="comment" value="<?=$commnet;?>">
<input type="button" onclick="history.back()"value="戻る">
<input type="submit" value="OK">

</form>

</body>
</html>