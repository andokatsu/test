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
<title>マリオカートツアー適正判断</title>

</head>
<body>
<!-- INSERT INTO course(course_list)
VALUES
(); -->
<p>あなたが最適正グライダーがないコースは</p>

<?php
    // var_dump($_POST);
    echo "<br/><br/>";

    $dsn = 'mysql:dbname=maricatsu_handan;host=mysql1.php.starfree.ne.jp;charset=utf8';
    $user = 'maricatsu_katsu';
    $password = '65300601a';
    $dbh = new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!is_null($_POST['glider_id'])) {
      $word = implode(',', $_POST['glider_id']);
      
    } else {
      // $word = ""；
      echo '所持グライダーにチェックを入れてください';
      exit();
    }

    $sql = 'SELECT * FROM
    
    course
    LEFT JOIN
    (
      SELECT
        course.id AS course_id
      FROM
        course
      LEFT JOIN
        glider_course
      ON
        glider_course.course_id = course.id
      WHERE
        -- special_course.chara_id = inplode()とsql IN()を組み合わせたものをここに書く。
        glider_course.glider IN(' . implode(',', $_POST['glider_id']) . ')
    ) AS selected_course
    ON selected_course.course_id = course.id
    WHERE
    selected_course.course_id IS NULL';

    $stmt = $dbh->prepare($sql);

    // vardump($stmt);
    $stmt->execute();

    $dbh = null;
    $rec = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($rec);
    // var_dump($sql);
    
    foreach ($rec as $item) {
      echo $item['course_list'];
      echo '</br>';
    }
    ?>


<p>です。</p>

<a href="glider.php">グライダー選択画面に戻る</><br>
<a href="top.html">トップページへ戻る</a>    
</body>
</html>