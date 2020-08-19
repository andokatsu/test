<?php

//dbアクセス
$dsn = 'mysql:dbname=maricatsu_handan;host=mysql1.php.starfree.ne.jp;charset=utf8';
$user = 'maricatsu_katsu';
$password = '65300601a';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT id,glider FROM glider";

$stmt = $dbh->prepare($sql);

// vardump($stmt);
$stmt->execute();

$dbh = null;

?>


<!DOCTYPE html>
<html>
<head>
<script data-ad-client="ca-pub-1188653658586187" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174232376-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174232376-1');
</script>

<meta charset="UTF-8">
<link rel="stylesheet" href="mc.css" type="text/css">


<title>マリオカートツアー適正判断</title>

</head>
<body>
   
<h2>あなたが所持しているグライダーを選んでください</h2>
<br/><br/>

<form action="glider_course.php" method="post">




<ul>

<?php
$rec = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rec as $item) {
    

    
    if($rec==false)
    {
        break;
    }
   
    print '<li>';
    print '<label>';
    print '<input type="checkbox" name="glider_id[]" value="'.$item['id'].'">';
    print $item['glider'];
    print '<img src="img/'.$item['glider'].'.png">';
    print '</label>';
    print '</li>';
    
}

?>
<li class="ghost"></li>
<li class="ghost"></li>
<li class="ghost"></li>
<li class="ghost"></li>
<li class="ghost"></li>
<li class="ghost"></li>
</ul>

    <p>
        <h3>
            <input type="submit" value="結果判定画面へ" style="border:none;background-color:transparent;color:blue;text-decoration:underline;">
        </h3>
    </p>

</form>
<a href="top.html">トップページへ戻る</a>    
<script type="text/javascript" src="js/jquery-3.5.0.min.js"></script>
<script type="text/javascript" src="mc.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</body>
</html>