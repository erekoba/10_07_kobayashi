<?php
// セッションのスタート
session_start();

//0.外部ファイル読み込み
include('functions.php');

// ログイン状態のチェック
chk_ssid();

$menu = menu();

// getで送信されたidを取得
$lid = $_SESSION["lid"];
$id = $_GET['id'];
$a = $_SESSION["a"];
$send_lid = $_GET["send_lid"];
$recieve_lid = $_GET["recieve_lid"];
$trash_lid = $_GET["trash_lid"];

//1.  DB接続します
$pdo = db_conn();


//２．データ登録SQL作成
$sql = "";
if ($send_lid) {
    $sql = 'SELECT * FROM php02_table WHERE send =:lid AND trash=1';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
    $status = $stmt->execute();

    //３．データ表示
    $view = '';
    if ($status == false) {
        errorMsg($stmt);
    } else {
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $view .= '<li class="list-group-item">';
            $view .= '<p>' . $result['deadline'] . '-' . $result['task'] . '</p>';
            $view .= '<img src="' . $result['image'] . '" alt="" height="150px">';
            $view .= '<a href="select.php?send_lid=' . $send_lid . '&id=' . $result['id'] . '"class="badge badge-primary">Edit</a>';
            $view .= '<a href="delete.php?id=' . $result['id'] . '"class="badge badge-danger">Delete</a>';
            $view .= '</li>';
        }
    }
} elseif ($recieve_lid) {
    $sql = 'SELECT * FROM php02_table WHERE recieve =:lid AND trash=1';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
    $status = $stmt->execute();

    //３．データ表示
    $view = '';
    if ($status == false) {
        errorMsg($stmt);
    } else {
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $view .= '<li class="list-group-item">';
            $view .= '<p>' . $result['deadline'] . '-' . $result['task'] . '</p>';
            $view .= '<img src="' . $result['image'] . '" alt="" height="150px">';
            $view .= '<a href="select.php?recieve_lid=' . $recieve_lid . '&id=' . $result['id'] . '"class="badge badge-primary">Edit</a>';
            $view .= '<a href="delete.php?id=' . $result['id'] . '"class="badge badge-danger">Delete</a>';
            $view .= '</li>';
        }
    }
} elseif ($trash_lid) {
    $sql = 'SELECT * FROM php02_table WHERE trash=0';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
    $status = $stmt->execute();

    //３．データ表示
    $view = '';
    if ($status == false) {
        errorMsg($stmt);
    } else {
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $view .= '<li class="list-group-item">';
            $view .= '<p>' . $result['deadline'] . '-' . $result['task'] . '</p>';
            $view .= '<img src="' . $result['image'] . '" alt="" height="150px">';
            $view .= '<a href="select.php?trash_lid=' . $trash_lid . '&id=' . $result['id'] . '"class="badge badge-primary">Edit</a>';
            $view .= '<a href="realdelete.php?id=' . $result['id'] . '"class="badge badge-danger">Delete</a>';
            $view .= '</li>';
        }
    }
} else {
    $sql = 'SELECT * FROM php02_table WHERE recieve =1';
}


?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>todoリスト表示</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }

        .box {
            display: flex;
        }

        .list-group {
            width: 100%;
            overflow-y: scroll;
            height: 500px;
        }

        #folder {
            width: 50%;
        }

        #content {
            height: 500px;
        }

        #list {
            border: 1px solid #DDDDDD;
            border-radius: 4px;
            height: 500px;
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

    <div class=box>
        <ul id=folder class="list-group">
            <li class="list-group-item"><a href="select.php?recieve_lid=<?= $lid ?>">受信BOX</a></li>
            <li class="list-group-item"><a href="select.php?send_lid=<?= $lid ?>">送信BOX</a></li>
            <li class="list-group-item"><a href="select.php?trash_lid=<?= $lid ?>">ゴミ箱</a></li>
        </ul>
        <ul id=list class="list-group">
            <?= $view ?>
        </ul>
        <ul class="list-group">
            <iframe id=content class="list-group-item" src="detail.php?recieve_lid=<?= $recieve_lid ?>&id=<?= $id ?>"></iframe></ul>
    </div>

</body>
<script>
</script>

</html>