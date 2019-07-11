<?php
// 共通で使うものを別ファイルにしておきましょう。

// DB接続関数（PDO）
function db_conn()
{
    $dbname = 'gsf_d03_db07';
    $db = 'mysql:dbname=' . $dbname . ';charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = 'root';
    try {
        return new PDO($db, $user, $pwd);
    } catch (PDOException $e) {
        exit('dbError:' . $e->getMessage());
    }
}

// SQL処理エラー
function errorMsg($stmt)
{
    $error = $stmt->errorInfo();
    exit('ErrorQuery:' . $error[2]);
}

// SESSIONチェック＆リジェネレイト
function chk_ssid()
{
    if (!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()) {
        // ログイン失敗時の処理（ログイン画面に移動）
        header("Location:login.php");
    } else {
        // ログイン成功時の処理（一覧画面に移動）
        session_regenerate_id(true);
        $_SESSION["chk_ssid"] = session_id();
    }
}

// menuを決める
function menu()
{
    if ($_SESSION["kanri_flg"] == 1) {
        $menu = '<li class="nav-item"><a class="nav-link" href="index.php">todo登録</a></li><li class="nav-item"><a class="nav-link" href="select.php">todo一覧</a></li><li class="nav-item"><a class="nav-link" href="user_index.php">user登録</a></li><li class="nav-item"><a class="nav-link" href="user_select.php">user管理</a></li>';
        $menu .= '<li class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';
    } elseif ($_SESSION["chk_ssid"] != NULL) {
        $menu = '<li class="nav-item"><a class="nav-link" href="index.php">todo登録</a></li><li class="nav-item"><a class="nav-link" href="select.php">todo一覧</a></li>';
        $menu .= '<li class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';
    } else {
        $menu = '<li class="nav-item"><a class="nav-link" href="login.php">ログインページ</a></li><li class="nav-item"><a class="nav-link" href="select_nologin.php">todo一覧</a></li>';
    }
    return $menu;
}
