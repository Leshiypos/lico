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
				<div class="search_icon">
					<svg id="search_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 513.749 513.749" style="enable-background:new 0 0 513.749 513.749;" xml:space="preserve"><g><path d="M504.352,459.061l-99.435-99.477c74.402-99.427,54.115-240.344-45.312-314.746S119.261-9.277,44.859,90.15   S-9.256,330.494,90.171,404.896c79.868,59.766,189.565,59.766,269.434,0l99.477,99.477c12.501,12.501,32.769,12.501,45.269,0   c12.501-12.501,12.501-32.769,0-45.269L504.352,459.061z M225.717,385.696c-88.366,0-160-71.634-160-160s71.634-160,160-160   s160,71.634,160,160C385.623,314.022,314.044,385.602,225.717,385.696z"/></g></svg>
					<form id="search_header" action="<?php echo home_url("/");?>" method="GET">
						<input type="text" name="s" placeholder="Чью биографию изучим?" />
					</form>
				</div>
			</nav>
		</div>
	</header>
	<main class="wrapper">
		