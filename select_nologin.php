<?php
// セッションのスタート
session_start();

//0.外部ファイル読み込み
include('functions.php');

// ログイン状態のチェック

$menu = menu();

//1.  DB接続します
$pdo = db_conn();

//２．データ登録SQL作成
$sql = 'SELECT * FROM php02_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status == false) {
    errorMsg($stmt);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<tr id=list>';
        $view .= '<td><a href="detail_nologin.php?id=' . $result['id'] . '"class="badge badge-primary">detail</a></td>';
        $view .= '<td>' . $result["deadline"] . '</td>';
        $view .= '<td>' . $result["task"] . '</td>';
        $view .= '<td>' . $result["recieve"] . '</td>';
        $view .= '<td>' . $result["comment"] . '</td>';
        $view .= '</tr>';
    }
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>todoリスト表示</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">todo一覧</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?= $menu ?>
                </ul>
            </div>
        </nav>
    </header>
    <table class="table">
        <thead>
            <tr>
                <th>button</th>
                <th>deadline</th>
                <th>task</th>
                <th>Who</th>
                <th>coment</th>
            </tr>
        </thead>
        <tbody id="selected">
            <?= $view ?>
        </tbody>
    </table>

</body>

</html>