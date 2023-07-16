<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rakus</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!--bootstrapによるレイアウト作成 -->
<div class="alert alert-info" role="alert">
顧客管理システム
<p style="text-align: right">
<a href="input.php">顧客登録</a>
<a href="total.php">顧客一覧</a>
<a href="yoteiinput.php">予定入力</a>
<a href="yotei.php">予定確認</a>
<a href="logout.php">ログアウト</a>

</p>
</div>
</body>
</html>


<?php
session_start();
$_SESSION = array();
session_destroy();
?>

<div class="alert alert-success" role="alert">
             <h4 class="alert-heading">ログアウト</h4>
             ログアウトしました
           </div>
<a href="loginform.php">ログイン</a>


