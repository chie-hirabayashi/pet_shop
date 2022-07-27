<?php

// 関数読み込み
require_once __DIR__ . '/functions.php';

// データベースに接続
$dbh = connect_db();
// echo '接続に成功しました！<br>';

// 初期化
$keyword = '';

// 入力を取得
$keyword = filter_input(INPUT_GET, 'keyword');
// 確認
// var_dump($keyword);
// キーワードを含むanimalを取得
$select_animals = select_animals($keyword);

// var_dump($select_animals);
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
    <form action="" method="GET">
        <label for="">キーワード:</label>
        <input type="text" name="keyword" placeholder="キーワードの入力" >
        <input type="submit" value="検索">
        <ul style='list-style-type: none; padding-left: 0;'>
            <?php for ($idx = 0; $idx < count($select_animals); $idx++): ?>
                <li><?= $select_animals[$idx]['type'] .
                    'の' .
                    $select_animals[$idx]['classification'] .
                    'ちゃん' ?></li>
                <li><?= $select_animals[$idx]['description'] ?></li>
                <li><?= $select_animals[$idx]['birthday'] . ' 生まれ' ?></li>
                <li><?= '出身地 ' . $select_animals[$idx]['birthplace'] ?></li>
                <hr>
            <?php endfor; ?>
        </ul>
        
    </form>
</body>
</html>
