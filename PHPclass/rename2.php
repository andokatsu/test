<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHPclass課題</title>
</head>
<body>

<?php

if ( rename( "C:/xampp/htdocs/PHPclass/rename.php", "C:/xampp/htdocs/PHPclass/rename2.php" )) {
        echo "ファイル名変更成功！！";
    }
    else
    {
        echo "ファイル名変更失敗！！";
    }

?>

</body>
</html>