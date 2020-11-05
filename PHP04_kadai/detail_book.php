<?php
// 0. SESSION開始！！
session_start();

$id = $_GET["id"]; //?id~**を受け取る
include("funcs.php");

// 1. ログインチェック処理！
// 以下、セッションID持ってたら、ok
// 持ってなければ、閲覧できない処理にする。
sessionCheck();



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
                <div class="navbar-header"><a class="navbar-brand" href="select_book.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="update_book.php">
        <div class="jumbotron">
            <fieldset>
                <legend>[編集]</legend>
                <label>本の名前：<input type="text" name="name" value="<?= $row["name"] ?>"></label><br>
                <label>リンク先URL：<input type="text" name="url" value="<?= $row["url"] ?>"></label><br>
                <label>感想コメント：<input type="text" name="text" value="<?= $row["text"] ?>"></label><br>
                <input type="submit" value="送信">
                <input type="hidden" name="id" value="<?= $id ?>">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->
<?=
    var_dump($id)
?>

</body>

</html>
