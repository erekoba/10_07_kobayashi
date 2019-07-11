<?php
// セッションのスタート
session_start();

//0.外部ファイル読み込み
include('functions.php');

// ログイン状態のチェック
chk_ssid();
$menu = menu();

//DB接続します
$pdo = db_conn();
// var_dump($select);

//2. データ表示SQL作成
$sql = 'SELECT*FROM user_table';
// var_dump($sql);
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//3. データ表示

$view = '';
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //http://php.net/manual/ja/pdostatement.fetch.php

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<tr id=list>';
        $view .= '<td><a href="user_detail.php?id=' . $result['id'] . '" class="badge badge-primary">Edit</a>';
        $view .= '<a href="user_delete.php?id=' . $result['id'] . '" class="badge badge-danger">Delete</a></td>';
        $view .= '<td>' . $result["id"] . '</td>';
        $view .= '<td>' . $result["name"] . '</td>';
        $view .= '<td>' . $result["lid"] . '</td>';
        $view .= '<td>' . $result["lpw"] . '</td>';
        $view .= '<td>' . $result["kanri_flg"] . '</td>';
        $view .= '<td>' . $result["life_flg"] . '</td>';
        $view .= '</tr>';
    }
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>score</title>
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <!-- Bootstrapcssの読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="js/bootstrap.min.js"></script>
    <!-- fontの読みこみ -->
    <link href="css/all.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->
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
            <a class="navbar-brand" href="#">user管理</a>
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
                <th>id</th>
                <th>name</th>
                <th>ログインID</th>
                <th>パスワード</th>
                <th>管理者</th>
                <th>アクティブ</th>
            </tr>
        </thead>
        <tbody id="selected">
            <?= $view ?>
        </tbody>
    </table>
</body>
<script>

</script>

</html>