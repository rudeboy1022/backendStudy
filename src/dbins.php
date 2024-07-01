<?php
// データベースと接続
try{
    $dsn='mysql:dbname=testdb;host=db';
    $db = new PDO($dsn,'testuser','testpass');
    echo '接続成功<br>';

	// (2)テーブル作成のSQLを作成
	$sql = 'INSERT INTO tbl_check (name)
            VALUES ("HideT")';

	// (3)SQLを実行
	$res = $db->query($sql);
    echo 'データ追加成功<br>';
} catch(PDOException $e){
    echo '接続失敗';
    echo $e->getMessage();
}
?>