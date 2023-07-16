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
<?php session_start(); echo $_SESSION['email']; ?></br>
<a href="input.php">顧客登録</a>
<a href="total.php">顧客一覧</a>
<a href="yoteiinput.php">予定入力</a>
<a href="yotei.php">予定確認</a>
<a href="logout.php">ログアウト</a>
<?php $username = $_SESSION['email'] ?>
</p>
</div>
</body>
</html>



</p>
</div>


</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    
  </body>
</html>



<?php
// DB接続情報
$user = 'root';
$pass = '';
$dbnm = 'customer';
$host = 'localhost';
// 接続先DBリンク
$connect = "mysql:host={$host};dbname={$dbnm}";
 

try {
  // DB接続
  $pdo = new PDO($connect, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
  // SQL実行
  $sql = "SELECT user,id,name, adress,company,tell,mail,action,created_at FROM customertable where user ='$username'" ;
  $stmt = $pdo->prepare($sql);
  $stmt->execute();




  // 結果の取得
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  $sql2 = "SELECT * FROM customertable where user = '$username'";
  $sth = $pdo -> query($sql2);
  $count = $sth -> rowCount();
  $pagination = ceil($count / 10);
  
  
 
  
  //var_dump($result);
} catch (Exception $e) {
  echo "<p>DB接続エラー</p>";
  echo $e->getMessage();
  exit();
}
?>

<center>
 <div><h1>顧客名一覧</h1></div>
 
 総件数：　<?php echo $count.'件';?>

<table >
  <tr>
    <th>　　　　　顧客名</th>
    <th>　　　　　住所</th>
    <th>　　　　　会社</th>
    <th>　　　　　電話番号</th>
    <th>　　　　　メールアドレス</th>
    <th>　　　　　内容</th>
   

    
  </tr>
  <?php foreach ($result as $row) {?>
    
    <td>　　　　　<?php echo $row['name']; ?></td>
    <td>　　　　　<?php echo $row['adress']; ?></td>
    <td>　　　　　<?php echo $row['company']; ?></td>
    <td>　　　　　<?php echo $row['tell']; ?></td>
    <td>　　　　　<?php echo $row['mail']; ?></td>
    <td>　　　　　<?php echo $row['action']; ?></td>
    
    <td>　　　　　<a href="edit.php?id=<?php print($row['id']) ?>">更新</a></td>
    <td>　　　　　<a href="delete.php?id=<?php print($row['id']) ?>">削除</a></td>
    
    
  </tr>
  <?php } ?>
</table>



  </center>

<?php 
// ページネーション
for ($x=1; $x <= $pagination ; $x++) { ?>
	<a href="?page=<?php echo $x ?>"><?php echo $x; ?></a>
<?php } // End of for ?>

