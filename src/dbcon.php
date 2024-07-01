<?php

// データベースと接続
// PDO
try {
	$dsn = 'mysql:dbname=testdb;host=db';
	$db = new PDO($dsn, 'testuser', 'testpass');
	echo '接続成功<br>';

	// (2)テーブル作成のSQLを作成
	$sql = 'CREATE TABLE tbl_check (
		id INT(11) AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(20),
		create_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP
	) engine=innodb default charset=utf8';

	// (3)SQLを実行
	$res = $db->query($sql);
	echo 'テーブル作成成功<br>';
} catch (PDOException $e) {
	echo '接続失敗<br>';
	echo $e->getMessage();
}


/*
// mysqli
$mysqli = new mysqli( 'db', 'testuser', 'testpass', 'testdb');

if( $mysqli->connect_errno ) {
	echo $mysqli->connect_errno . ' : ' . $mysqli->connect_error;
}else{
    echo '接続成功1';
}

// データベースとの接続解除
$mysqli->close();
*/
