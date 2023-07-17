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
<a href="logout.php">ログアウト</a>
</div>
</body>
</html>


<?php
 
try {
    // DB接続
    $pdo = new PDO(
        // ホスト名、データベース名
        'mysql:host=localhost;dbname=customer;',
        // ユーザー名
        'root',
        // パスワード
        '',
        // レコード列名をキーとして取得させる
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
 
   
    // SQL文をセット
    $stmt = $pdo->prepare('INSERT INTO customertable ( name, adress, company,tell,mail,action) VALUES(:name, :adress, :company,
    :tell,:mail, :action)');
 
    

    // 値をセット
    $stmt->bindValue(':name', $_POST['name']);
    $stmt->bindValue(':adress', $_POST['adress']);
    $stmt->bindValue(':company', $_POST['company']);
    $stmt->bindValue(':tell', $_POST['tell']);
    $stmt->bindValue(':mail', $_POST['mail']);
    $stmt->bindValue(':action', $_POST['action']);
 
   
    // SQL実行
    $stmt->execute();
 
} catch (PDOException $e) {
    // エラー発生
    echo $e->getMessage();
 
} finally {
    // DB接続を閉じる
    $pdo = null;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<div class="alert alert-success" role="alert">
            <h4 class="alert-heading">登録完了</h4>
            顧客情報の登録が完了しました
          </div>

</body>
</html>
