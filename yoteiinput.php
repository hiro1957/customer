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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<center>

<form action="yoteiregister.php" method="post"> 

日付
<dd><input type="text" name="day" placeholder="日付" required><dd>

顧客名
<dd><input type="text" name="customer" placeholder="氏名" required><dd>
		
時間
<dd><input type="text" name="time" placeholder="何時何分" required><dd>

<input type="submit" name="submit" value="登録" >

</center>
</form>
</body>
</html>

