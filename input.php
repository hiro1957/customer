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
<html>
<head>
<meta charset="utf-8">
<title>顧客情報一覧</title>

      
</head>
<body>
<center>

 	<form action="dbregister.php" method="post">
 		<h2>登録画面</h2>
	 	
		 顧客名　
		 <dd><input type="text" name="name" placeholder="氏名" required><dd>
		
		住所　
		<dd><input type="text" name="adress" placeholder="都道府県/区町村" required><dd>
	
		会社名
		<dd><input type="text" name="company" placeholder="都道府県/区町村" required><dd>
	
		電話番号
		<dd><input type="text" name="tell" placeholder="xxxx-xxxx-xxxx" required><dd>
	
		メールアドレス
		<dd><input type="text" name="mail" placeholder="xxxx@xx.xx.xx" required><dd>
		
	
        対応内容
  <textarea class="form-control" name="action" id="exampleFormControlTextarea1" rows="3"></textarea>
</div><dt>


        <input type="reset" name="reset" value="クリア" >
	 
	 	<input type="submit" name="submit" value="登録" >
	 	</div>
	</form>
</center>
</body>
</html>

