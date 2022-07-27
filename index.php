

<?php

// 関数読み込み
require_once __DIR__ . '/functions.php';

// データベースに接続
$dbh = connect_db();
// echo '接続に成功しました！<br>';

$all_select_animals = all_select_animals();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet_shop</title>
</head>
<body>
    <h1>本日のご紹介ペット！</h1>
    <form action="" >
        <ul style='list-style-type: none; padding-left: 0;'>
            <?php for ($idx = 0; $idx < count($all_select_animals); $idx++): ?>
                <li><?= $all_select_animals[$idx]['type'] .
                    'の' .
                    $all_select_animals[$idx]['classification'] .
                    'ちゃん' ?></li>
                <li><?= $all_select_animals[$idx]['description'] ?></li>
                <li><?= $all_select_animals[$idx]['birthday'] . ' 生まれ' ?></li>
                <li><?= '出身地 ' . $all_select_animals[$idx]['birthplace'] ?></li>
                <hr>
            <?php endfor; ?>
        </ul>
        
    </form>
</body>
</html>

