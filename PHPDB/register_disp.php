<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>コンビニando</title>
</head>
<body>

<?php

try
{

    require_once('../common/common.php');

    $post = sanitize($_POST);
    $name = $_POST['name'];
    $price = $_POST['price'];
    if($_POST['contents'] !== '')
    {
        $contents=$_POST['contents'];
    }
    if($_POST['comment'] !== '')
    {
        $comment=$_POST['comment'];
    }

    $dsn = 'mysql:dbname=ando;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //プリアードステートメメント(サニタイズ手法)
    $sql ='INSERT INTO menu(name,price,contents,comment) VALUES (?,?,?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $name;
    $data[] = $price;
    if($_POST['contents'] !=='')
    {
        $data[]=$contents;
    }

    if($_POST['comment'] !=='')
    {
        $data[]=$comment;
    }
    
    $stmt->execute($data);

    $dbh = null;
}
catch(Exception $e)
{
    print'ただいま障害により大変ご迷惑お掛けしております。';
    echo $e;
    exit();
    
}
?>

<p>商品名「<?php echo $name; ?></p>

<p>価格「<?php echo $price; ?>円</p>

<p>コンテンツ「<?php echo $contents; ?></p>

<p>コメント「<?php echo $comment; ?></p>

<a href="top.html">トップへ戻る</a>


<br/>
<br/>
</body>
</html>