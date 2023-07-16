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

</div>
</body>
</html>



<!DOCTYPE html>
<html>
<head>
<center>
    <title>ログイン</title>
</head>
<body>
    <h1>ログイン</h1>
    <form action="login.php" method="post">
        <p>
       
            <label>メールアドレス</label></br>
           
            <input type="text" id="inputmail"  name="email" required name="required">
        </p>

            <label>パスワード</label></br>
            <input type="password" id="inputpassword" name="password" required name="required" maxlength="10"></br>
            (※10文字以内で入力してください)
        </p>

        <button type="submit"name="submit" class="btn btn-primary">ログイン</button>
    </form>

</center>
</body>
</html>