<!DOCTYPE html>
<html>
<head>
	<title>Blog page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/home.css">
	<script type="text/javascript">
		var xmlHttp
		function show(str){
			xmlHttp = new XMLHttpRequest();
			var url = "aj.php";
			url =url + "?q=" + str;
			url=url+"&sid="+Math.random();
			xmlHttp.onreadystatechange = function(){
				if (xmlHttp.readyState==4 && xmlHttp.status==200) {
					document.getElementById('cover').innerHTML = xmlHttp.responseText;
				}
			};
			xmlHttp.open("GET", url, true);
			xmlHttp.send(null);

		
		
		}
	</script>
</head>
<body>
	<?php require("nav.html");?>
	<header class="head">
		<div class="blog_bg" style="background-image: url('img/bg1.jpg');">
		<div class="head_word">
			<h1 class="head_line">Blog</h1>
			<h2 class="subhead_line">blablabla</h2>
		</div>
	</header>
	<div class="block"></div>
	<section class="content">
		<div class="blog_cover" id="cover">
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
						$date = substr($row[3], 5, 9);
						$year = substr($row[3], 0, 4);
						$constract = mb_substr($row[2], 0, 200) . "[......]" . "<button type='button' onclick='show(this.value)' value='{$row[0]}'>read more</button>";
						echo "<div class='blog_article'>".
						"<div class='top'>".
						"<time>".
						"<span class='date'>{$date}</span>".
						"<span class='year'>{$year}</span>".
						"</time>".
						"<div class='topic'>{$row[1]}</div>".
						"</div>".
						"<div class='detail'>{$constract}</div>".
						"</div>";
					}
					mysqli_close($conn);
				?>
		</div>
	</section>
	<?php
		include ('foot.html');
	?>
	<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/home.js"></script>
</body>
</html>