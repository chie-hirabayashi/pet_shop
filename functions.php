<?php

// ファイルの読み込み
require_once __DIR__ . '/config.php';

// 接続する関数を作る
function connect_db()
{
    try {
        return new PDO(DSN, USER, PASSWORD, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage(); #本来はこの書き方はしない。セキュリティー上、危険な書き方。
        exit();
    }
}

// エスケープ処理を行う関数
function h($str)
{
    // ENT_QUOTES: シングルクオートとダブルクオートを共に変換する。
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// 全データ読み込み
function all_select_animals()
{
    // データベースに接続
    $dbh = connect_db();

    // animalsテーブルを選択
    $sql = <<<EOM
SELECT
    *
FROM
    animals
EOM;

    //準備
    $stmt = $dbh->prepare($sql);

    // 実行
    $stmt->execute();

    // 連想配列でデータベースからデータを取得する
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
