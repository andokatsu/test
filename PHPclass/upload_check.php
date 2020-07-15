<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHPclass課題</title>
</head>
<body>

<?php
$tempfile = $_FILES["datafile"]["tmp_name"];
$filename = $_FILES["datafile"]["name"];

if (is_uploaded_file($_FILES["datafile"]["tmp_name"])) {
    echo "ファイル". $_FILES["datafile"]["name"]."のアップロードに成功しました。<br/>";
}


?>

</body>
</html>