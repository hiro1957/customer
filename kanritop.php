<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rakus</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php  session_start();?>
<?echo $_SESSION['email'];  ?>

<!--bootstrapによるレイアウト作成 -->
<div class="alert alert-info" role="alert">
顧客管理システム
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  


</body>
</html>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ログイン</title>

</head>
<body>
    <center>
<h1>メニュー</h1>
<h1><a href="kanritotal.php">全顧客一覧</a></h1>
<h1><a href="kanrisearch.php">全顧客検索画面</a></h1>
<h1><a href="logout.php">ログアウト</a></h1>
<center>
</body>