<!DOCTYPE html>
<html>
<head>
	<title>show</title>
	<meta charset="utf-8">
</head>
<body>
<?php
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = 'root';
$conn = new mysqli($dbhost, $dbuser, $dbpass);
if(! $conn){
	die('connect error:' . mysqli_error($conn));
}
echo "connect success!<br>";


$sql = "SELECT id, title, content, now
		FROM article_tb1";
mysqli_select_db($conn, "article");
$retval = mysqli_query($conn, $sql, MYSQLI_USE_RESULT);
if(! $retval){
	die('Get data error' . mysqli_error($conn));
}
while ($row = mysqli_fetch_array($retval, MYSQL_NUM)) 
{
	echo "ID : {$row[0]} <br>".
		 "Title : {$row[1]}<br>".
		 "Content : {$row[2]}<br>".
		 "Date : {$row[3]}<br>".
		 "--------------------------------<br>";
}
echo "success!";
mysqli_close($conn);
?>
</body>
</html>