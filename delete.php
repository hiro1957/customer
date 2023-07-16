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
<a href="search.php">顧客検索検索</a>
<a href="yoteiinput.php">予定入力</a>
<a href="yotei.php">予定確認</a>
<a href="logout.php">ログアウト</a>
</p>
</div>
</body>
</html>


 
 
 <?php
     if (isset($_GET['id']))
     
    
     {
         try {

             // 接続処理
             $dsn = 'mysql:host=localhost;dbname=customer';
             $user = 'root';
             $password = '';
             $dbh = new PDO($dsn, $user, $password);
  
             // DELETE文を発行
  
             $id = $_GET['id']; // DELETEするレコードのID
  
             $sql = "DELETE FROM customertable WHERE id = :id";
             $stmt = $dbh->prepare($sql);
  
             $stmt->bindValue(":id", $id); // 削除したいIDでバインド
             $stmt->execute(); // DELETE文実行
  
?>

             <div class="alert alert-success" role="alert">
             <h4 class="alert-heading">削除完了</h4>
             ユーザ登録の削除が完了しました
           </div>
<?php
  
             // 接続切断
             $dbh = null;
  
  
         } catch (PDOException $e) {
             print $e->getMessage() . "<br/>";
             die();
         }
     }

    
 


