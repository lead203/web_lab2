<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Cook Book</title>
</head>
<body>
	<div id="wrapper">
		<header>
			<div class="logo">
				<img src="/img/logo.svg">
				<span>Cook Book</span>
			</div>
			<div class="exit">
				<a href="/logout.php"><img src="/img/exit.svg">Выход</a>
			</div>
		</header>
		<main>
			<div class="tabs">
				<a href="index.php"><img src="/img/book.svg">Мои рецепты</a>
				<a href="ingridients.php"><img src="/img/puzzle.svg">Ингредиенты</a>
			</div>
			<div class="content">
				<?php include 'elems/info.php'; ?>
				<?php echo $content ?>
			</div>
		</main>
	</div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>