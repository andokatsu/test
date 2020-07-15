<?php setcookie("username","michele",time()-360); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHPclass課題</title>
</head>
<body>

<?php

echo $_COOKIE["username"];

?>

</body>
</html>