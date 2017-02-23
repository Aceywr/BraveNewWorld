<!DOCTYPE html>
<html>
<head>
	<title>Brave New World</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<script type="text/javascript">
		var xmlHttp
		function show(str){
			xmlHttp = new XMLHttpRequest();
			var url = "ajax.php";
			url =url + "?q="+str;
			url=url+"&sid="+Math.random();
			xmlHttp.onreadystatechange = function(){
				if (xmlHttp.readyState==4 && xmlHttp.status==200) {
					document.getElementById('content').innerHTML = xmlHttp.responseText;
				}
			};
			xmlHttp.open("GET", url, true);
			xmlHttp.send(null);

		
		
		}
	</script>
</head>
<body>
	<div id="header">
		<h1>Brave New World</h1>
		<h2>I code therefore I am</h2>
	</div>
	<div id="navigation">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">Blog</a></li>
			<li><a href="#">Project</a></li>
			<li><a href="#">About</a></li>
		</ul>
	</div>
	<div id="content">
			<?php
				$dbhost = 'localhost:3306';
				$dbuser = 'root';
				$dbpass = 'root';
				$conn = new mysqli($dbhost, $dbuser, $dbpass);
				if(! $conn){
					die('connect error:' . mysqli_error($conn));
				}


				$sql = "SELECT id, title, content, now
						FROM article_tb1";
				mysqli_select_db($conn, "article");
				$retval = mysqli_query($conn, $sql, MYSQLI_USE_RESULT);
				if(! $retval){
					die('Get data error' . mysqli_error($conn));
				}
				while ($row = mysqli_fetch_array($retval, MYSQL_NUM)) 
				{	
					$constract = mb_substr($row[2], 0, 200) . "[......]";
					echo "<h1>{$row[1]}</h1>".
					"<p>{$constract}</p>".
					"<button type='button' onclick='show(this.value)' value='{$row[0]}'>more</button>";
				}
				mysqli_close($conn);
				?>
	</div>
	<div id="footer">
		<p>Copyright &copy;2016</p>
	</div>
</body>
</html>