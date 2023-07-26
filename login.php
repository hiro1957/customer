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


<?php
//セッションの開始
session_start();

//フォームから受け取った値を変数に代入
$email = $_POST['email'];;
$password = $_POST['password'];;

//データベース接続情報
$dbuser = 'root';
$dbpass = '';
$dsn = 'mysql:host=localhost;dbname=accounts;';

//MySQL接続
try {
  $dbh = new PDO($dsn, $dbuser, $dbpass);
} catch (PDOException $e) {
  exit('データベース接続失敗: ' . $e->getMessage());
}

//DBからユーザ情報を取得
$sql = 'SELECT * FROM users WHERE email = :email; ';
$sth = $dbh->prepare($sql);
$sth->bindParam(':email', $email);
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);


//パスワードが正しいかチェック
//パスワードが正しい場合
if (password_verify($password,$result['password']) && isset($password) !== null) {
  //情報をセッション変数に登録
  $_SESSION['email'] = $result['email'];
  header('Location: top.php');
} else {
  //パスワードが間違っている場合
  ?>
<div class="alert alert-success" role="alert">
<h4 class="alert-heading">間違っています</h4>
アドレスが間違っています。
</div>

<?php
}


?>

<a href="loginform.php">ログイン</a>


