<?php
// セッションのスタート
session_start();
$lid = $_SESSION["lid"];

//0.外部ファイル読み込み
include('functions.php');

// ログイン状態のチェック
chk_ssid();

$menu = menu();

//DB接続します
$pdo = db_conn();

//データ登録SQL作成，指定したidのみ表示する
$sql = 'SELECT * FROM user_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//データ表示
$view = '';
if ($status == false) {
    errorMsg($stmt);
} else {
    while ($result = $stmt->fetch()) {
        $view .= '<option value=' . $result["lid"] . '>' . $result["lid"] . '</option>';
    }
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>todo登録</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }

        #select {
            height: 38px;
        }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">todo登録</a>
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

    <form method="post" action="insert.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="task">Task</label>
            <input type="text" class="form-control" id="task" name="task" placeholder="Enter task">
        </div>
        <div class="form-group">
            <label for="who">Who</label>
            <select id=select class="form-control" size=1 id="who" name="who">
                <?= $view ?>
            </select>
        </div>
        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="date" class="form-control" id="deadline" name="deadline">

        </div>
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="upfile">Image</label>
            <!-- inputを追加 -->
            <input type="file" name="upfile" accept="image/*" capture="camera">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <input type="hidden" name="lid" value="<?= $lid ?>">
    </form>

</body>

</html>