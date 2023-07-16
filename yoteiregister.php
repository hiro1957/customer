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

<?php
 
try {
    // DB接続
    $pdo = new PDO(
        // ホスト名、データベース名
        'mysql:host=localhost;dbname=yotei;',
        // ユーザー名
        'root',
        // パスワード
        '',
        // レコード列名をキーとして取得させる
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
 
   
    // SQL文をセット
    $stmt = $pdo->prepare('INSERT INTO yoteitable (day,customer, time ) VALUES(:day,:customer, :time)');
 
    

    // 値をセット
    $stmt->bindValue(':day', $_POST['day']);
    $stmt->bindValue(':customer', $_POST['customer']);
    $stmt->bindValue(':time', $_POST['time']);
 
   
    // SQL実行
    $stmt->execute();

    
 
} catch (PDOException $e) {
    // エラー発生
    echo $e->getMessage();
 
} finally {
    // DB接続を閉じる
    $pdo = null;
}
 
echo '勤怠の登録を完了しました。';
print('<a href="kintai_raw.php">一覧表示へ</a>')

?>
