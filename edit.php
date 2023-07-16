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
<a href="logout.php">ログアウト</a>
</p>
</div>
</body>
</html>


<?php
    if (isset($_GET['id'])) {
        try {
 
            // 接続処理
            $dsn = 'mysql:host=localhost;dbname=customer';
            $user = 'root';
            $password = '';
            $dbh = new PDO($dsn, $user, $password);
 
            // SELECT文を発行
            $sql = "SELECT * FROM customertable WHERE id = :id";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
            $stmt->execute();
            $member = $stmt->fetch(PDO::FETCH_OBJ); // 1件のレコードを取得
 
            // 接続切断
            $dbh = null;
 
        } catch (PDOException $e) {
            print $e->getMessage() . "<br/>";
            die();
        }
 
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<center>
    <meta charset="UTF-8">
    <title>変更画面</title>
</head>
<body>
<form action="./update.php" method="post">
        <input type="hidden" name="id" value="<?php print($member->id) ?>">
        <label for="name">顧客名</label></br>
        <input type="text" name="name" value="<?php print($member->name) ?>">
        <br>
        <label for="age">会社名</label></br>
        <input type="text" name="company" value="<?php print($member->company) ?>">
        <br>
        <label for="address">住所</label></br>
        <input type="text" name="adress" value="<?php print($member->adress) ?>">
        <br>
        <label for="tell">電話番号</label></br>
        <input type="text" name="tell" value="<?php print($member->tell) ?>">
        <br>
        <label for="mail">メールアドレス</label></br>
        <input type="text" name="mail" value="<?php print($member->mail) ?>">
        <br>
        <label for="mail">対応内容</label></br>
        <textarea class="form-control" name="action" id="exampleFormControlTextarea1" rows="3"　value="<?php print($member->action) ?>"></textarea>
        <br>
     
　　   <button type="submit">更新</button>
        <br>
</center>
 
</form>
</body>
</html>