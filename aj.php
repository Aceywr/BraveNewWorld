<?php
if(isset($_GET["q"])){
$q = $_GET["q"];
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = 'root';
$conn = new mysqli($dbhost, $dbuser, $dbpass);
if(! $conn){
	die('connect error:' . mysqli_error($conn));
}

$sql = "SELECT id, title, content, now
		FROM article_tb1
		WHERE id = '".$q."'";
mysqli_select_db($conn, "article");
$retval = mysqli_query($conn, $sql, MYSQLI_USE_RESULT);
if(! $retval){
	die('Get data error' . mysqli_error($conn));
}
while ($row = mysqli_fetch_array($retval, MYSQL_NUM)) 
{	
	$date = substr($row[3], 5, 9);
	$year = substr($row[3], 0, 4);
	echo"<div class='article'>".
		"<div class='top'>".
		"<time>".
		"<span class='date'>{$date}</span>".
		"<span class='year'>{$year}</span>".
		"</time>".
		"<div class='topic'>{$row[1]}</div>".
		"</div>".
		"<div class='detail'>{$row[2]}</div>".
		"</div>";
}
mysqli_close($conn);
}
?>