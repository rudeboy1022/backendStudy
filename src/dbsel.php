<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tbl_check確認ページ</title>
</head>
<body>
<?php
// データベースと接続
try{
    $dsn='mysql:dbname=testdb;host=db';
    $db = new PDO($dsn,'testuser','testpass');
    echo '接続成功<br>';

	// (2)テーブル作成のSQLを作成
	$sql = 'SELECT * FROM tbl_check';

	// (3)SQLを実行
	$res = $db->query($sql);

    // foreach文で配列の中身を一行ずつ出力
    foreach ($res as $row) {
        // データベースのフィールド名で出力
        echo $row['name'].'：'.$row['create_datetime'];
        // 改行を入れる
        echo '<br>';
    }
    echo 'データ追加成功<br>';
} catch(PDOException $e){
    echo '接続失敗<br>';
    echo $e->getMessage();
}
?> 
</body>
</html>