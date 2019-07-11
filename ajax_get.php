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
        $res = [];
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $res[] = $result;
        }
        echo json_encode($res);
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
        $res = [];
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $res[] = $result;
        }
        echo json_encode($res);
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
        $res = [];
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $res[] = $result;
        }
        echo json_encode($res);
    }
} else {
    $sql = 'SELECT * FROM php02_table WHERE recieve =1';
}
