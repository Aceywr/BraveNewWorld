<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/home.css">
</head>
<body>
	<div class="liner"></div>
	<div class="wrap" id="wrap">
		<?php require("nav.html");?>
		<header class="head">
			<div class="bg" style="background-image: url('img/bg.jpg'); ">
			
			<div class="head_word">
				<h1 class="head_line">美丽新世界</h1>
				<h2 class="subhead_line">blablablablablbalba</h2>
			</div>
		</header>
		<div class="block"></div>
		<section class="lab content" id="content">
			<h2 class="vertical">LAB</h2>
			<div class="display">
				<div class="col" id="col_1">
					<div class="img">
						<img src="img/a.jpg" width="100%">
						<p class="title">作品名称</p>
					</div>
					<div class="panel" id="panel_1">
						<h1>作品名称</h1>
						<p>关于作品的一些简要介绍之类的乱七八糟的东西哈哈</p>
						<a href="">打开</a>
					</div>
				</div>
				<div class="col" id="col_2">
					<div class="img">
						<img src="img/a.jpg" width="100%">
						<p class="title">作品名称</p>
					</div>
					<div class="panel" id="panel_2">
						<h1>作品名称</h1>
						<p>关于作品的一些简要介绍之类的乱七八糟的东西哈哈</p>
						<a href="">打开</a>
					</div>
				</div>
				<div class="col" id="col_3">
					<div class="img">
						<img src="img/a.jpg" width="100%">
						<p class="title">作品名称</p>
					</div>
					<div class="panel" id="panel_3">
						<h1>作品名称</h1>
						<p>关于作品的一些简要介绍之类的乱七八糟的东西哈哈</p>
						<a href="">打开</a>
					</div>
				</div>
				<div class="col" id="col_4">
					<div class="img">
						<img src="img/a.jpg" width="100%">
						<p class="title">作品名称</p>
					</div>
					<div class="panel" id="panel_4">
						<h1>作品名称</h1>
						<p>关于作品的一些简要介绍之类的乱七八糟的东西哈哈</p>
						<a href="">打开</a>
					</div>
				</div>
			</div>
		</section>
		<section class="blog content">
			<h2 class="vertical">BLOG</h2>
			<div class="cover">
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
						echo "<div class='article'>".
						"<time>".
						"<span class='date'>{$date}</span>".
						"<span class='year'>{$year}</span>".
						"</time>".
						"<a href='Blog.php'>{$row[1]}</a>".
						"</div>";
					}
					mysqli_close($conn);
				?>
				
			</div>
		</section>
		<section class="about content">
			<h2 class="vertical">ABOUT</h2>
			<div class="intro"></div>
		</section>
		<?php
			include ('foot.html');
		?>
		</div>

	<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/home.js"></script>
</body>
</html>