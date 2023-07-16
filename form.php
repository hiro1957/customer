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
    <title>会員登録</title>
</head>
<body>
<center>
    <h1>会員登録</h1>
    <form action="signup.php" method="post">
        <p>
            <label>メールアドレス</label><br>
            <input type="text" name="email" required name="required">
        </p>

        <p>
            <label>パスワード</label></br>
            <input type="password" name="password" required name="required">
        </p>

        <button type="submit"name="submit" class="btn btn-primary">会員登録</button>
    </form>
</center>
</body>
</html>