<?php


$id = $_GET["id"]; //?id~**を受け取る
include("funcs.php");

// 1. ログインチェック処理！
// 以下、セッションID持ってたら、ok
// 持ってなければ、閲覧できない処理にする。



$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ更新</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select_book_open.php">｜ブックマーク一覧に戻る｜</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="update_book.php">
        <div class="jumbotron">
            <fieldset>
                <legend>[ゲスト用閲覧モード]</legend>
                <label>本の名前：<p> 　<?= $row["name"] ?> </p></label><br>
                <label>リンク先URL：<p> 　<?= $row["url"] ?> </p></label><br>
                <label>感想コメント： <p>　<?= $row["text"] ?> </p></label><br>
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
