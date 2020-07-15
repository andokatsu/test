<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHPclass課題</title>
</head>
<body>

<?php
class Cat {

    //プロパティ
    public $name;
    public $price;
    public $catType;

    //コンストラクタ
    public function __construct($name,$price,$catType,$age) {
        $this->name = $name;
        $this->price = $price;
        $this->catType = $catType;
        $this->age = $age;
    }

    //メソッド
    function meow() {
        echo "なく<br/>";
    }

    function eat() {
        echo "エサをたべる<br/>";
    }

    function pur() {
        echo "のどをならす<br/>";
    }

    function showData() {
        echo $this->name;
    }

    function BirthDay() {
        echo $this->age++;
        echo "歳<br/>";
    }
    
}

class Domestic_Cat extends Cat {

    function sleep() {
        echo "zzz...<br/>";
    }
}
//Catクラスのオブジェクトが生成され、コンストラクタが呼び出される
//$catには初期化されたCatclassのオブジェクトが代入される
$myCat = new Cat('mimi',70000,'mike',1);
$myCat -> meow();
echo $myCat->name;
echo '<br/>';
$myCat -> showData();
echo '<br/>';
$val = 1;
echo gettype($myCat);
echo '<br/>';
$myCat -> BirthDay();
$myCat -> BirthDay();
$myCat -> BirthDay();

$Cat = new Domestic_Cat('tama',80000,'Persian',4);
$Cat -> showData();
$Cat -> sleep();
$Cat -> eat();
?>

</body>
</html>