<?php
// セッションのスタート
session_start();

//0.外部ファイル読み込み
include('functions.php');

// ログイン状態のチェック
chk_ssid();
$menu = menu();

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
    <!-- <link href="css/all.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }

        /* .fiveStar {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }

        .fiveStar input[type='radio'] {
            display: none;
        }

        .fiveStar label {
            position: relative;
            padding: 10px 10px 0;
            color: gray;
            cursor: pointer;
            font-size: 50px;
        }

        .fiveStar label .text {
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            text-align: center;
            font-size: 12px;
            color: gray;
        }

        .fiveStar label:hover,
        .fiveStar label:hover~label,
        .fiveStar input[type='radio']:checked~label {
            color: #ffcc00;
        } */
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">user登録</a>
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

    <form action="insert.php" method="post">
        <div class="form-group">
            <label id=name_name for="name">ユーザー名</label>
            <input type="text" class="form-control" id="name" name=name>
        </div>
        <div class="form-group">
            <label id=date_name for="lid">ログインID</label>
            <input type="text" class="form-control" id="name" name=lid>
        </div>
        <div class="form-group">
            <label id=date_name for="lpw">パスワード</label>
            <input type="text" class="form-control" id="name" name=lpw>
        </div>
        <div class="form-group">
            <div class=>
                <input id="kanri" type="radio" value=0 name="kanri_flg">
                <label>一般</label>
                <input id="kanri" type="radio" value=1 name="kanri_flg">
                <label>管理者</label>
            </div>
        </div>
        <div class="form-group">
            <div class=>
                <input id="life" type="radio" value=0 name="life_flg">
                <label>アクティブ</label>
                <input id="life" type="radio" value=1 name="life_flg">
                <label>非アクティブ</label>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</body>
<script>

</script>

</html>