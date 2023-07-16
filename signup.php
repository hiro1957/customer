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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>顧客情報一覧</title>

      
</head>
<body>


<?php
//フォームから受け取った値を変数に代入
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

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

//メールアドレスがすでに登録されていないかチェック
$sql = 'SELECT * FROM users WHERE email = :email';
$sth = $dbh->prepare($sql);
$sth->bindValue(':email', $email);
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);
$emailresult = isset($result['email']);

//登録されている場合
if ($emailresult  == $email) { ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<center>
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">会員登録が重複しています</h4>
  <p>このメールアドレスは既に会員登録されているため、ご確認をお願いします。</p>
  <a href="loginform.php">ログイン</a>
  
</div>
</center>



  
  <?php
  
  //登録されていない場合
} else {
  $sql = 'INSERT INTO users (email, password) VALUES (:email, :password)';
  $sth = $dbh->prepare($sql);
  $sth->bindValue(':email', $email);
  $sth->bindValue(':password', $password);
  $sth->execute();
?>
  <center>
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">登録完了</h4>
    ユーザ登録が完了しました

    <a href="loginform.php">ログイン</a>
  </div>
  </center>
  

<?php
}?>





?>