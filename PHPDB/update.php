<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>コンビニando</title>
</head>
<body>

<strong>更新画面</strong><br/>
<br/>
<br/>

<?php

//dbアクセス
$dsn = 'mysql:dbname=ando;host=localhost;charset=utf8';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//id 検索でヒットしない場合はエラーでも吐くとよい。
// または取得したレコードの削除フラグが立っていたならばエラーを吐くという処理にすること。
//結果件数を見る（if文で画面遷移
    //0件の場合、エラーを表示
    //データが存在しないか削除済みです。
$sql = "SELECT * FROM menu WHERE id = ?";


//実行準備
$stmt = $dbh->prepare($sql);

$stmt->bindParam(1,$_GET['id']);
$stmt->execute();

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($rec);

//切断
$dbh = null;
if(!$rec)
{
    echo 'データが存在しないか削除済みです<br/>';
    echo '<a href="top.html">トップへ戻る</a>';
    exit();
}

?>

<form method="post" action="update_check.php">
更新する商品名を修正・確認してください<br/>
<input type="hidden" value="<?=$rec['id']; ?>" name="id">
<input type="text" value="<?=$rec['name']; ?>" name="name" style="width:200px"><br/>
更新価格を修正・確認してください<br/>
<input type="text" value="<?=$rec['price']; ?>" name="price" style="width:50px"><br/><br/>
更新するコンテンツを修正・確認してください<br/>
<textarea name="contents" rows="4" cols="40"><?=$rec['contents']; ?></textarea><br/>
更新するコメントを修正・確認してください<br/>
<input type="text" value="<?=$rec['comment']; ?>" name="comment" style="width:200px"><br/>
<input type="button" onclick="history.back()"value="戻る">
<input type="submit" value="OK">

</form>

</body>
</html>