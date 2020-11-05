<?php
// 0. SESSION開始！！
session_start();
//１．関数群の読み込み
include("funcs.php");
sessionCheck();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>s登録</title>
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
                <!-- <div class="navbar-header"><a class="navbar-brand" href="select_book.php">データ一覧</a></div> -->
                <div class="navbar-header"><a class="navbar-brand" href="menu.php">｜メニューに戻る｜</a></div>
                <!-- <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div> -->
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->

    <form method="POST" action="insert_book.php">
        <div class="jumbotron">
            <fieldset>
                <legend>新規登録</legend>
                <label>本の名前：<input type="text" name="name"></label><br>
                <label>リンク先URL：<input type="text" name="url"></label><br>
                <label>感想コメント：<input type="text" name="text"></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>

    <!-- Main[End] -->
</body>

</html>
