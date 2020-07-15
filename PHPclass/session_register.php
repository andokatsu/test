<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHPclass課題</title>
</head>
<body>

<?php
//非推奨エラーがでる為、飛ばす
session_start();
session_register("Test_Regist");
$Test_Regist = "セッション変数の値";

?>

</body>
</html>