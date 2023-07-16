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


<style>
table.calender_column{
    width: 100%;
}

table.calender_column td{
    padding: 5px;
    border: 1px solid #CCC;
}

/* 日曜日 */
table.calender_column tr.week0{
    background-color: #ffefef;
    color: #FF0000;
}

/* 土曜日 */
table.calender_column tr.week6{
    background-color: #ededff;
    color: #0000FF;
}

/* 今日 */
table.calender_column tr.today{
    background-color: #fbffa3;
    font-weight: bold;
}

table.calender_column td:first-child{
    width: 20%;
    text-align: center;
}

table.calender_column td:last-child{
    width: 80%;
    color: #111111;
}

</style>


<?php
// DB接続情報
$user = 'root';
$pass = '';
$dbnm = 'yotei';
$host = 'localhost';
// 接続先DBリンク
$connect = "mysql:host={$host};dbname={$dbnm}";
 

try {
  // DB接続
  $pdo = new PDO($connect, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
  // SQL実行
  $sql = "SELECT day,customer,time FROM yoteitable";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  
  // 結果の取得
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch (Exception $e) {
    echo "<p>DB接続エラー</p>";
    echo $e->getMessage();
    exit();
  }
?>


<?php
//タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

echo date('m') ,'月';
//表示させる年月を設定　↓これは現在の月
$year = date('Y');
$month = date('m');

//月末日を取得
$end_month = date('t', strtotime($year.$month.'01'));

//スケジュール設定 日付をキーに


$arySchedule = [];

 foreach ($result as $row2) {
$row3=$row2['day'];
$arySchedule[$row3] = $row2['customer'].":".$row2['time'];

 } 

$aryCalendar = [];

//1日から月末日まで出勤時間ループ
for ($i = 1; $i <= $end_month; $i++){
    $aryCalendar[$i]['day'] = $i;
    $aryCalendar[$i]['week'] = date('w', strtotime($year.$month.sprintf('%02d', $i)));
    if(isset($arySchedule[$i])){
        $aryCalendar[$i]['text'] = $arySchedule[$i];
    }else{
        $aryCalendar[$i]['text'] = '';
    }
}

$aryWeek = ['日', '月', '火', '水', '木', '金', '土'];
?>


<table class="calender_column">
<?php foreach($aryCalendar as $value){ ?>
    <?php if($value['day'] != date('j')){ ?>
    <tr class="week<?php echo $value['week'] ?>">
    <?php }else{ ?>
    <tr class="today">
    <?php } ?>
        <td>
            <?php echo $value['day'] ?>(<?php echo $aryWeek[$value['week']] ?>)
        </td>
        <td>
            <?php echo $value['text'] ?>
        </td>
    </tr>
<?php } ?>

</table>