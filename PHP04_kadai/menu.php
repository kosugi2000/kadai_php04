<?php
session_start();
include("funcs.php");

sessionCheck(); //funcs.phpにあるLogin認証チェック関数

//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
$pdo = db_conn();

if ($_GET['success']) {
  $success = $_GET['success'];
}
//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();
//ログイン画面でIDとパスワード空欄だと0でこの画面に飛んでくる。
print '<br>';
//$_SESSION["kanri_flg"]が、1の場合、以下４つのリンクが使える
if ($_SESSION["kanri_flg"]) {
   echo 'あなたは管理者権限でログインしています
         <div class="navbar-header"><a href="add_user.php">ユーザー登録</a> 
         <a href="select_user.php">ユーザー一覧</a>
         <a href="add_book.php">書籍登録</a> 
         <a href="select_book.php">書籍一覧</a>
         <a class="navbar-brand" href="logout.php">ログアウト</a></div>';
         
}
//$_SESSION["kanri_flg"]が、0の場合、以下２つのリンクが使える

if ($_SESSION["kanri_flg"]==0) {
   echo 'あなたは一般ユーザーでログインしています
         <div class="navbar-header"><a href="add_book.php">書籍登録</a>
         <a href="select_book.php">書籍一覧</a>
         <a class="navbar-brand" href="logout.php">ログアウト</a></div>';
}

print '<br>';
print '<br>';
print '<br>';
?>



