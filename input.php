<!DOCTYPE html>
<html>
<head>
	<title>文章上传</title>
	<meta charset="utf-8">
</head>
<body>
<?php
if(isset($_POST['add']))
{
	$dbhost = 'localhost:3306';
	$dbuser = 'root';
	$dbpass = 'root';
	$conn = new mysqli($dbhost, $dbuser, $dbpass);
	if(! $conn){
		die('connect error:' . mysqli_error($conn));
	}
	echo "connect success!";	

	$title = $_POST['title'];
	$content = $_POST['htmlsource'];
	$now = date('y-m-d', time());


	$sql = 'INSERT INTO article_tb1'.
			'(title,content,now)'.
			'VALUES'.
			"('$title', '$content', '$now')";
	mysqli_select_db($conn, "article");
	$retval = mysqli_query($conn, $sql, MYSQLI_USE_RESULT);
	if (! $retval) {
		die("error" . mysqli_error($conn));
	}
	echo "success!";
	mysqli_close($conn);
}else
{
	?>
	<form method="post" action="<?php $_PHP_SELF ?>">
	<div>Title:<input name="title" id="title" type="text"></input></div>
	<h1>content:</h1>
	<div id="editArea" contenteditable style="height: 600px;width: 1200px;border:1px solid #000;">
		<h1>标题写在这里</h1>
		<p>正文写在这里</p>
		</div>
	<div>
		<input type="button" value="↓" onclick="htmlsource.value = editArea.innerHTML;"></input>
		<input type="button" value="↑" onclick="editArea.innerHTML = htmlsource.value;"></input>
	</div>
	<div>
		<textarea id="htmlsource" name="htmlsource" cols="70" rows="10" >请在这里写下来</textarea>
	</div>
	<input name="add" id="add" type="submit" value="Add"></input>
	</form>
	<?php
	}
	?>
</body>
</html>