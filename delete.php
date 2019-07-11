<?php
// 関数ファイルの読み込み
include("functions.php");

//1. GETデータ取得
$id   = $_GET['id'];

//2. DB接続します(エラー処理追加)
$pdo = db_conn();
$trash = 0;
//3．データ登録SQL作成
$sql = 'UPDATE php02_table SET trash=:a1 WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':a1', $trash, PDO::PARAM_STR);
$status = $stmt->execute();

//4．データ登録処理後
if ($status == false) {
    errorMsg($stmt);
} else {
    //select.phpへリダイレクト
    header('Location:select.php');
    exit;
}
