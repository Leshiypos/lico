<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body>
	<header class="header">
		<div class="container">
			<a href="/" class="logo">Лого<span>Сюда</span></a>
			<nav>
				<?php wp_nav_menu(); ?>
				<a href="/add" class="btn">Разместить биографию</a>
				<a href="/contact" class="btn btn_small">Связаться с нами</a>
			</nav>
		</div>
	</header>
	<main class="wrapper">
		