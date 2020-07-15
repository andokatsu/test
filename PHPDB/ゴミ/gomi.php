<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>コンビニando</title>
</head>
<body>


<?php

//updateディスプにsql文＋updateも3画面つくる。
//入力、確認、完了という内訳。


print '<strong>削除画面</strong><br/>';
print '<br/>';
print '<br/>';
print '<form method="post" action="delete_check.php"enctype="multipart/form-data">';
print '<input type="hidden" name="id" value="'.$_POST['id'].'">';
print '削除する商品名<br/>';
print '<input type="text" value="'.$_POST['name'].'" name="name" style="width:200px"><br/>';
print '削除価格<br/>';
print '<input type="text" value="'.$_POST['price'].'" name="price" style="width:50px"><br/><br/>';
print '<textarea name="contents" rows="4" cols="40">'.$_POST['contents'].'</textarea><br/>';
print 'コメント<br/>';
print '<input type="text" value="'.$_POST['comment'].'" name="comment" style="width:200px"><br/>';
print '<input type="button" onclick="history.back()"value="戻る">';
print '<input type="submit" value="OK">';


?>
</body>
</html>