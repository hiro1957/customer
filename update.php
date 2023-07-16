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


<?php
    if (isset($_POST['id'])) {
        try {
 
            // 接続処理
            $dsn = 'mysql:host=localhost;dbname=customer';
            $user = 'root';
            $password = '';
            $dbh = new PDO($dsn, $user, $password);
 
            // UPDATE文を発行
            $id = $_POST['id']; // UPDATEするレコードのID
 
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $company = isset($_POST['company']) ? $_POST['company'] : 0;
            $adress = isset($_POST['adress']) ? $_POST['adress'] : '';
            $tell = isset($_POST['tell']) ? $_POST['tell'] : '';
            $mail = isset($_POST['mail']) ? $_POST['mail'] : '';
            $action = isset($_POST['action']) ? $_POST['action'] : '';
           
 
 
            $sql = "UPDATE customertable SET name = :name, company = :company, adress = :adress,tell = :tell,mail = :mail,action = :action WHERE id = :id";
            $stmt = $dbh->prepare($sql);
 
            $stmt->execute([":name" => $name, ":company" => $company, ":adress" => $adress,":tell" => $tell,":mail" => $mail,":action" => $action, ":id" => $id ]); // 連想配列でバインド
 
?>

            <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">登録完了</h4>
            ユーザ登録が完了しました
          </div>
 <?php
            // 接続切断
            $dbh = null;
 
 
        } catch (PDOException $e) {
            print $e->getMessage() . "<br/>";
            die();
        }
    }
?>