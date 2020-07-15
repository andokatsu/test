<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHPclass課題</title>
</head>
<body>

<?php

session_start();
$_SESSION['username'] = '安藤克利';
unset($_SESSION['username']);


?>

</body>
</html>