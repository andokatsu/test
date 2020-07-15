<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>コンビニando</title>
</head>
<body>

<?php

require_once('../common/common.php');

$post = sanitize($_POST);
$name=$post['name'];
$price=$post['price'];
$contents=$post['contents'];
$comment=$post['comment'];

if($name=='')
{
    print'商品名が入力されていません<br/>';
}
else
{
    print'商品名:';
    print $name;
    print'<br/>';
}

if(preg_match('/\A[0-9]+\z/',$price)==0)
{
    print'価格をきちんと入力してください。<br/>';
}
else
{
    print $price;
    print '円';
    print'<br/>';
}

//コンテンツが入力されている場合とされていない場合の分岐
if($contents !== "")
{
    print 'コンテンツは「'.$contents.'」、';
}
else
{
    print 'コンテンツは空欄、';
}

//コメントが入力されている場合とされていない場合の分岐
if($_POST['comment'] !== "")
{
    print 'コメントは「'.$comment.'」<br/>';
}
else
{
    print 'コメントは空欄です。<br/>';
}

if($name==''||preg_match('/\A[0-9]+\z/',$price)==0)
{
    print'<form>';
    print'<input type="button" onclick="history.back()"value="戻る">';
    print'</form>';
    exit();
}

?>

上記の商品を追加します<br/>
<form method="post" action="register_disp.php">
<input type="hidden" name="name" value="<?=$name; ?>">
<input type="hidden" name="price" value="<?=$price; ?>">
<input type="hidden" name="contents" value="<?=$contents; ?>">
<input type="hidden" name="comment" value="<?=$comment; ?>">
<input type="button" onclick="history.back()"value="戻る">
<input type="submit" value="OK">
</form>


<br/>

</form>




</body>
</html>