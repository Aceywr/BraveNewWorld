<!DOCTYPE html>
<html>
<head>
	<title>delete database</title>
	<meta charset="utf-8">
</head>
<body>
<?php
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = 'root';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn){
	die('connect error:' . mysql_error());
}
echo "connect success!";
$sql = 'DROP DATABASE article';
$retval = mysql_query($sql, $conn);
if(! $retval){
	die('delete error' . mysql_error());
}
echo "delete success!";
mysql_close($conn);
?>
</body>
</html>