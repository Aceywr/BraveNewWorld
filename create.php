<!DOCTYPE html>
<html>
<head>
	<title>create database</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	$dbhost = 'localhost:3306';
	$dbuser = 'root';
	$dbpass = 'root';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn){
		die('连接失败 error :' . mysql_error());
	}
	echo '连接成功！';
	$sql = 'CREATE DATABASE article';
	$retval = mysql_query($sql, $conn);
	if(! $retval){
		die('创建失败 error :' . mysql_error());
	}
	echo '创建成功！';
	$sqllist = 'CREATE TABLE article_tb1('.
				'id INT NOT NULL AUTO_INCREMENT,'.
				'title VARCHAR(100) NOT NULL,'.
				'content LONGTEXT NOT NULL,'.
				'now DATE,'.
				'PRIMARY KEY( id ));';
	mysql_select_db('article');
	$retval1 = mysql_query($sqllist, $conn);
	if(! $retval1){
		die('创建数据表失败 error :' . mysql_error());
	}
	echo '创建数据表成功！';
	mysql_close($conn);
	?>
</body>
</html>