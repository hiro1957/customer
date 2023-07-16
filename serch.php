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

<?php session_start();?></br>
<?php $username = $_SESSION['email'] ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>test</title>
</head>
<body>
<center>
    <div><h1>顧客名検索</h1></div>
    <form action="" method="POST">
        <label>顧客名：</label>
        <input type="text" name="word" />　<input type="submit" value="検索" />
    </form>
    <?php
    $dsn = 'mysql:host=localhost;dbname=customer';
    $username = 'root';
    $password = '';
    if ($_POST) {
        try {
            $dbh = new PDO($dsn, $username, $password);
            $search_word = $_POST['word'];
            if($search_word==""){
              echo "入力してください";
            }
            else{
                $sql ="select * from customertable where name , user ='$username' like'".$search_word."%'";
                $sth = $dbh->prepare($sql);
                $sth->execute();
                $result = $sth->fetchAll();
                if($result){
                    foreach ($result as $row) {

                         echo "<tr>";
                         echo "<th>";
                         echo $row['name']."　　　　　 ";
                         echo $row['adress']."　　　　　 ";
                         echo $row['company']."　　　　　 ";
                         echo $row['tell']."　　　　　 ";
                         echo $row['mail']." 　　　　　";
                         echo $row['action']."　　　　　 ";
                         echo "</th>";
                         echo " </tr>";
                         echo "<br/>";

                    }
                }
                else{
                    echo "見つかりませんでした";
                }
            }
        }catch (PDOException $e) {
            echo  "<p>Failed : " . $e->getMessage()."</p>";
            exit();
        }
    }
    

    ?>
<center>
</body>
</html>