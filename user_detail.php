<?php
// セッションのスタート
session_start();

//0.外部ファイル読み込み
include('functions.php');

// ログイン状態のチェック
chk_ssid();
$menu = menu();

// getで送信されたidを取得
$id = $_GET["id"];
//DB接続します
$pdo = db_conn();

//データ登録SQL作成，指定したidのみ表示する
$sql = 'SELECT * FROM user_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();
$radio1 = "";
$radio2 = "";
//データ表示
if ($status == false) {
    // エラーのとき
    errorMsg($stmt);
} else {
    // エラーでないとき
    $rs = $stmt->fetch();
    // fetch()で1レコードを取得して$rsに入れる
    // $rsは配列で返ってくる．$rs["id"], $rs["task"]などで値をとれる
    // var_dump()で見てみ よう
    if ($rs["kanri_flg"] == 0) {
        $radio1 = '<div class="form-group"><input id="kanri" type="radio" value=0 checked name="kanri_flg"><label>一般</label><input id="kanri" type="radio" value=1 name="kanri_flg"><label>管理者</label></div>';
    } else {
        $radio1 = '<div class="form-group"><input id="kanri" type="radio" value=0 name="kanri_flg"><label>一般</label><input id="kanri" type="radio" value=1 checked name="kanri_flg"><label>管理者</label></div>';
    };
    if ($rs["life_flg"] == 0) {
        $radio2 = '<div class="form-group"><input id="life" type="radio" value=0 checked name="life_flg"><label>アクティブ</label><input id="life" type="radio" value=1 name="life_flg"><label>非アクティブ</label></div>';
    } else {
        $radio2 = '<div class="form-group"><input id="life" type="radio" value=0 name="life_flg"><label>アクティブ</label><input id="life" type="radio" value=1 checked name="life_flg"><label>非アクティブ</label></div>';
    };
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>todo更新ページ</title>
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

    <form action="user_update.php" method="post">
        <div class="form-group">
            <label id=name_name for="name">ユーザー名</label>
            <input type="text" class="form-control" id="name" name=name value=<?= $rs["name"] ?>>
        </div>
        <div class="form-group">
            <label id=date_name for="lid">ログインID</label>
            <input type="text" class="form-control" id="name" name=lid value=<?= $rs["lid"] ?>>
        </div>
        <div class="form-group">
            <label id=date_name for="lpw">パスワード</label>
            <input type="text" class="form-control" id="name" name=lpw value=<?= $rs["lpw"] ?>>
        </div>
        <?= $radio1 ?>
        <?= $radio2 ?>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        <input type="hidden" name="id" value=<?= $id ?>>
    </form>
</body>

</html>