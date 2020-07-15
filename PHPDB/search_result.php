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

//search.htmlで入力された値の受け取り
$name=$post['name'];
$min_price=$post['entry_price_min'];
$max_price=$post['entry_price_max'];

//何が入力されているかチェックする
// var_dump($name);
// var_dump($min_price);
// var_dump($max_price);

try
{
    //dbアクセス
    $dsn = 'mysql:dbname=ando;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //変数sqlにSQL文を代入
    //WHERE１じゃないのを論理削除では書く。
    $sql = 'SELECT * FROM menu WHERE del_flg = 0';

    //商品名の検索条件
    if($name !== "")
    {
        $sql.=" AND name LIKE ?";
    }

    //最低価格の条件
    if($min_price !=="")
    {
        $sql.=" AND price >= ?";
    }

    //最高価格の条件
    if($max_price !=="")
    {
        $sql.=" AND price <= ?";
    }

    //bindValueで記述する。
    // var_dump($sql);

    $stmt = $dbh->prepare($sql);
    if($name  !== "")
    {
        $stmt->bindValue(1,$name2,PDO::PARAM_STR);
    }
    
    if($min_price !=="")
    {
        $stmt->bindValue(2,$min_price,PDO::PARAM_INT); 
    }
    
    if($max_price !=="")
    {
        $stmt->bindValue(3,$max_price,PDO::PARAM_INT); 
    }
    
    $stmt->execute();

    $dbh = null;

    print '<strong>検索結果</strong><br/><br/>';
    print '<table border="1" cellspacing="0">';

    print '<th align="center">';
    print '商品名';
    print '</th>';

    print '<th align="center">';
    print '価格';
    print '</th>';

    //論理削除　del_flgが1の商品は表示しない仕様にする
    while(true)
    {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            if($rec==false)
            {
                break;
            }
        
        
        print "<tr>";
        print '<td align="center">';
        print $rec['name'];
        print '</td>';
        

        print '<td align="center">';
        print $rec['price'];
        print '円';
        print '</td>';

        print '<td>';
        
        //GETで送る
        print '<a href="http://localhost/PHPDB/update.php?id='.$rec['id'].'"><button>更新</button></a>';
        
        print '<a href="http://localhost/PHPDB/delete_check.php?id='.$rec['id'].'"><button>削除</button></a>';

        print '</td>';
        print '</tr>';
        
    }
    print "</table>";
}
catch(Exception $e)
{
    print'ただいま障害により大変ご迷惑お掛けしております。';
    echo $e;
    exit();
}
?>
<br/>
<a href="top.html">トップへ戻る</a>

<br/>



</form>
<br/>
<br/>
</body>
</html>