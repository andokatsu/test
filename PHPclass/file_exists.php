<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHPclass課題</title>
</head>
<body>

<?php

$filename = 'C:/xampp/htdocs/PHPclass/file_exists.php';

if (file_exists($filename)) {
    echo "$filename が存在します";
} else {
    echo "$filename は存在しません";
}

?>

</body>
</html>