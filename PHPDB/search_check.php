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
$min_price=$post['entry_price_min'];
$max_price=$post['entry_price_max'];

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

if(preg_match('/\A[0-9]+\z/',$min_price)==0)
{
    print'価格をきちんと入力してください。<br/>';
}

if(preg_match('/\A[0-9]+\z/',$max_price)==0)
{
    print'価格をきちんと入力してください。<br/>';
}


if($name==''||preg_match('/\A[0-9]+\z/',$min_price)==0||preg_match('/\A[0-9]+\z/',$max_price)==0)
{
    print'<form>';
    print'<input type="button" onclick="history.back()"value="戻る">';
    print'</form>';
}
else
{
    print'検索結果を表示します。<br/>';
    print'<form method="post" action="search_result.php">';
    print'<input type="hidden" name="name" value="'.$name.'">';
    print'<input type="hidden" name="price" value="'.$min_price.'">';
    print'<input type="hidden" name="price" value="'.$max_price.'">';
    print'<br/>';
    print'<input type="button" onclick="history.back()"value="戻る">';
    print'<input type="submit" value="OK">';
    print'</form>';

}
?>

<br/>
<br/>
</body>
</html>