<?php global $lico_option; ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body>
	<header class="header">
		<div class="container">
			<div class="mobile_header" >
				<a href="/" class="logo"><img src="<?php if (wp_is_mobile()) {echo get_template_directory_uri().'/assets/images/logo_white.svg'; } else {echo get_template_directory_uri().'/assets/images/logo.svg';} ?>" /></a>
				<svg id="but_menu" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M28.125 13.125H1.875C0.839473 13.125 0 13.9645 0 15C0 16.0355 0.839473 16.875 1.875 16.875H28.125C29.1605 16.875 30 16.0355 30 15C30 13.9645 29.1605 13.125 28.125 13.125Z" fill="white"/>
					<path d="M1.875 8.12503H28.125C29.1605 8.12503 30 7.28556 30 6.25003C30 5.2145 29.1605 4.37503 28.125 4.37503H1.875C0.839473 4.37503 0 5.2145 0 6.25003C0 7.28556 0.839473 8.12503 1.875 8.12503Z" fill="white"/>
					<path d="M28.125 21.875H1.875C0.839473 21.875 0 22.7145 0 23.75C0 24.7855 0.839473 25.625 1.875 25.625H28.125C29.1605 25.625 30 24.7855 30 23.75C30 22.7145 29.1605 21.875 28.125 21.875Z" fill="white"/>
				</svg>
			</div>
			<nav id="nav_main_menu">
				<?php wp_nav_menu(); ?>
				<a href="/add" class="btn">Разместить биографию</a>
				<a href="/contact" class="btn btn_small">Связаться с нами</a>
				<div class="search_icon">
					<svg id="search_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 513.749 513.749" style="enable-background:new 0 0 513.749 513.749;" xml:space="preserve"><g><path d="M504.352,459.061l-99.435-99.477c74.402-99.427,54.115-240.344-45.312-314.746S119.261-9.277,44.859,90.15   S-9.256,330.494,90.171,404.896c79.868,59.766,189.565,59.766,269.434,0l99.477,99.477c12.501,12.501,32.769,12.501,45.269,0   c12.501-12.501,12.501-32.769,0-45.269L504.352,459.061z M225.717,385.696c-88.366,0-160-71.634-160-160s71.634-160,160-160   s160,71.634,160,160C385.623,314.022,314.044,385.602,225.717,385.696z"/></g></svg>
					<form id="search_header" action="<?php echo home_url("/");?>" method="GET">
						<input type="text" name="s" placeholder="Чью биографию изучим?" />
					</form>
				</div>

				<ul class="social">
                <?php if ($lico_option['facebook']){ ?>
                    <li><a href="<?php echo esc_html($lico_option['facebook']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.svg" alt=""></a></li>
                <?php }; ?>

                <?php if ($lico_option['instagramm']){ ?>    
                    <li><a href="<?php echo esc_html($lico_option['instagramm']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.svg" alt=""></a></li>
                <?php }; ?>

                <?php if ($lico_option['twitter']){ ?>
                    <li><a href="<?php echo esc_html($lico_option['twitter']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter.svg" alt=""></a></li>
                <?php }; ?>

                <?php if ($lico_option['vk']){ ?>
                    <li><a href="<?php echo esc_html($lico_option['vk']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/vk.svg" alt=""></a></li>
                <?php }; ?>

                <?php if ($lico_option['telegram']){ ?>
                    <li><a href="<?php echo esc_html($lico_option['telegram']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/telegram.svg" alt=""></a></li>
                <?php }; ?>

            </ul>




			</nav>
		</div>
	</header>
	<main class="wrapper">
		