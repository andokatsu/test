<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>コンビニando</title>
</head>
<body>

<strong>更新確認画面</strong><br/>

<?php

//updateディスプにsql文＋updateも3画面つくる。
//入力、確認、完了という内訳。

require_once('../common/common.php');
$get = sanitize($_GET);

//update.phpから受け取り
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$contents = $_POST['contents'];
$comment = $_POST['comment'];


if($name =='')
{
    print'商品名が入力されていません<br/>';
}
else
{
    print '更新する商品名は「'.$name.'」<br/>';
}

if(preg_match('/\A[0-9]+\z/',$price)==0)
{
    print'価格をきちんと入力してください。<br/>';
}
else
{
    print '価格は「'.$price.'円」<br/>';
}

//コンテンツが入力されている場合とされていない場合の分岐
if($contents !== "")
{
    print 'コンテンツは「'.$contents.'」<br/>';
}
else
{
    print 'コンテンツは空欄、';
}

//コメントが入力されている場合とされていない場合の分岐
if($comment !== "")
{
    print 'コメントは「'.$comment.'」<br/>';
}
else
{
    print 'コメントは空欄です。<br/>';
}


if($name == ''||preg_match('/\A[0-9]+\z/',$price) == 0)
{
    print '<form>';
    print '<input type="button" onclick="history.back()"value="戻る">';
    print '</form>';
    exit();
}

?>

更新してよろしいですか？<br/>
<form method="post" action="update_disp.php">
<input type="hidden" name="id" value="<?=$id; ?>">
<input type="hidden" name="name" value="<?=$name; ?>">
<input type="hidden" name="price" value="<?=$price; ?>">
<input type="hidden" name="contents" value="<?=$contents; ?>">
<input type="hidden" name="comment" value="<?=$comment; ?>">
<input type="button" onclick="history.back()"value="戻る">
<input type="submit" value="OK">
</form>
    

</body>
</html>