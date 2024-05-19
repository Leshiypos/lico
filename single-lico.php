<?php

get_header();

$post_id = get_the_ID();
$post = get_post($post_id);
$terms = wp_get_post_terms($post_id, LICO_TAX);
$category = $terms[0]->term_id;

$photo = get_the_post_thumbnail_url($post_id);

$was = get_post_meta($post_id, 'was', true);
$birth = get_post_meta($post_id, 'birth', true);
$death = get_post_meta($post_id, 'death', true);
$birth_place = get_post_meta($post_id, 'birth_place', true);
$death_place = get_post_meta($post_id, 'death_place', true);
$zodiac = get_post_meta($post_id, 'zodiac', true);
$telegr_soc = get_post_meta($post_id, 'telegr_soc', true);
$inst_soc = get_post_meta($post_id, 'inst_soc', true);
$twit_soc = get_post_meta($post_id, 'twit_soc', true);
$fb_soc = get_post_meta($post_id, 'fb_soc', true);
$vk_soc = get_post_meta($post_id, 'vk_soc', true);
$ok_soc = get_post_meta($post_id, 'ok_soc', true);

$site_link = get_post_meta($post_id, 'site_link', true);

$bio_tab = get_post_meta($post_id, 'bio_tab', true);
$photo_tab = get_post_meta($post_id, 'photo_tab', true);
$video_tab = get_post_meta($post_id, 'video_tab', true);
$rev_tab = get_post_meta($post_id, 'rev_tab', true);

/* Фото */
$photos = [];

// часть id для карусели

$car_id=array();

$pa = [

	'post_type' => LICO_PHOTO_CPT,
	'numberposts' => -1,

];

$pa = get_posts($pa);

foreach ($pa as $pp) {
	
	$this_parent = (int)get_post_meta($pp->ID, 'bio_id', true);
	if ($this_parent !== $post_id) {
		continue;
	}
	
	$this_ph = get_the_post_thumbnail_url($pp->ID);
	$photos[] = $this_ph;
	
}

?>
	<section class="catalog">
		<div class="container">
			<h1 class="author_title"><?php echo get_the_title(); ?></h1>
			<p class="was"><?php echo $was; ?></p>
			<br />
<script src="https://yastatic.net/share2/share.js"></script>
<div class="ya-share2" data-curtain data-services="messenger,vkontakte,telegram,twitter,viber,whatsapp"></div>
			<div class="card_cols">
				<div class="card_left">
					<div class="author_photo descop" style="background-image: url(<?php echo $photo; ?>);"></div>
					<div class="author_info descop">
						<ul>
							<li>
								<h6>Имя</h6>
								<p><?php echo $post->post_title; ?></p>
							</li>
							<?php
							
							if (!empty($birth)) {
								
							?>
							<li>
								<h6>Дата рождения</h6>
								<p><?php echo $birth; ?></p>
							</li>
							<?php
							
							}
							if (!empty($birth_place)) {
								
							?>
							<li>
								<h6>Место рождения</h6>
								<p><?php echo $birth_place; ?></p>
							</li>
							<?php
							
							}
							if (!empty($death)) {
								
							?>
							<li>
								<h6>Дата смерти</h6>
								<p><?php echo $death; ?></p>
							</li>
							<?php
							
							}
							if (!empty($death_place)) {
								
							?>
							<li>
								<h6>Место смерти</h6>
								<p><?php echo $death_place; ?></p>
							</li>
							<?php
							
							}
							if (!empty($zodiac)) {
								
							?>
							<li>
								<h6>По зодиаку</h6>
								<p><?php echo $zodiac; ?></p>
							</li>
							<?php
							
							}
							
							?>
							<?php
							
							if (!empty($telegr_soc) || !empty($inst_soc) || !empty($twit_soc) || !empty($fb_soc) || !empty($vk_soc) || !empty($ok_soc)) {
							?>
							<li class="social_link">
								<!-- Начало иконки социальных сетей -->
								<?php 
									if (!empty($telegr_soc)){ 
								?>
									<a href="<?php echo $telegr_soc; ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="25" height="25"><g id="Artboard"><path style="fill-rule:evenodd;clip-rule:evenodd;" d="M12,0C5.373,0,0,5.373,0,12s5.373,12,12,12s12-5.373,12-12S18.627,0,12,0z    M17.562,8.161c-0.18,1.897-0.962,6.502-1.359,8.627c-0.168,0.9-0.5,1.201-0.82,1.23c-0.697,0.064-1.226-0.461-1.901-0.903   c-1.056-0.692-1.653-1.123-2.678-1.799c-1.185-0.781-0.417-1.21,0.258-1.911c0.177-0.184,3.247-2.977,3.307-3.23   c0.007-0.032,0.015-0.15-0.056-0.212s-0.174-0.041-0.248-0.024c-0.106,0.024-1.793,1.139-5.062,3.345   c-0.479,0.329-0.913,0.489-1.302,0.481c-0.428-0.009-1.252-0.242-1.865-0.442c-0.751-0.244-1.349-0.374-1.297-0.788   c0.027-0.216,0.324-0.437,0.892-0.663c3.498-1.524,5.831-2.529,6.998-3.015c3.333-1.386,4.025-1.627,4.477-1.635   C17.472,7.214,17.608,7.681,17.562,8.161z"/></g></svg></a>
								<?php 
									}	
								?>							
								<!-- Конец иконки социальных сетей -->

							 	<!-- Начало иконки социальных сетей -->
																<?php 
									if (!empty($inst_soc)){ 
								?>
									<a href="<?php echo $inst_soc; ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="25" height="25"><g><path d="M12,2.162c3.204,0,3.584,0.012,4.849,0.07c1.308,0.06,2.655,0.358,3.608,1.311c0.962,0.962,1.251,2.296,1.311,3.608   c0.058,1.265,0.07,1.645,0.07,4.849c0,3.204-0.012,3.584-0.07,4.849c-0.059,1.301-0.364,2.661-1.311,3.608   c-0.962,0.962-2.295,1.251-3.608,1.311c-1.265,0.058-1.645,0.07-4.849,0.07s-3.584-0.012-4.849-0.07   c-1.291-0.059-2.669-0.371-3.608-1.311c-0.957-0.957-1.251-2.304-1.311-3.608c-0.058-1.265-0.07-1.645-0.07-4.849   c0-3.204,0.012-3.584,0.07-4.849c0.059-1.296,0.367-2.664,1.311-3.608c0.96-0.96,2.299-1.251,3.608-1.311   C8.416,2.174,8.796,2.162,12,2.162 M12,0C8.741,0,8.332,0.014,7.052,0.072C5.197,0.157,3.355,0.673,2.014,2.014   C0.668,3.36,0.157,5.198,0.072,7.052C0.014,8.332,0,8.741,0,12c0,3.259,0.014,3.668,0.072,4.948c0.085,1.853,0.603,3.7,1.942,5.038   c1.345,1.345,3.186,1.857,5.038,1.942C8.332,23.986,8.741,24,12,24c3.259,0,3.668-0.014,4.948-0.072   c1.854-0.085,3.698-0.602,5.038-1.942c1.347-1.347,1.857-3.184,1.942-5.038C23.986,15.668,24,15.259,24,12   c0-3.259-0.014-3.668-0.072-4.948c-0.085-1.855-0.602-3.698-1.942-5.038c-1.343-1.343-3.189-1.858-5.038-1.942   C15.668,0.014,15.259,0,12,0z"/><path d="M12,5.838c-3.403,0-6.162,2.759-6.162,6.162c0,3.403,2.759,6.162,6.162,6.162s6.162-2.759,6.162-6.162   C18.162,8.597,15.403,5.838,12,5.838z M12,16c-2.209,0-4-1.791-4-4s1.791-4,4-4s4,1.791,4,4S14.209,16,12,16z"/><circle cx="18.406" cy="5.594" r="1.44"/></g></svg></a>
								<?php 
									}	
								?>							
								<!-- Конец иконки социальных сетей -->

								<!-- Начало иконки социальных сетей -->
																 <?php 
									if (!empty($twit_soc)){ 
								?>
									<a href="<?php echo $twit_soc; ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="25" height="25"><path id="Logo_00000038394049246713568260000012923108920998390947_" d="M21.543,7.104c0.014,0.211,0.014,0.423,0.014,0.636  c0,6.507-4.954,14.01-14.01,14.01v-0.004C4.872,21.75,2.252,20.984,0,19.539c0.389,0.047,0.78,0.07,1.172,0.071  c2.218,0.002,4.372-0.742,6.115-2.112c-2.107-0.04-3.955-1.414-4.6-3.42c0.738,0.142,1.498,0.113,2.223-0.084  c-2.298-0.464-3.95-2.483-3.95-4.827c0-0.021,0-0.042,0-0.062c0.685,0.382,1.451,0.593,2.235,0.616  C1.031,8.276,0.363,5.398,1.67,3.148c2.5,3.076,6.189,4.946,10.148,5.145c-0.397-1.71,0.146-3.502,1.424-4.705  c1.983-1.865,5.102-1.769,6.967,0.214c1.103-0.217,2.16-0.622,3.127-1.195c-0.368,1.14-1.137,2.108-2.165,2.724  C22.148,5.214,23.101,4.953,24,4.555C23.339,5.544,22.507,6.407,21.543,7.104z"/></svg></a>
								<?php 
									}	
								?>							
								<!-- Конец иконки социальных сетей -->

															 	<!-- Начало иконки социальных сетей -->
																 <?php 
									if (!empty($fb_soc)){ 
								?>
									<a href="<?php echo $fb_soc; ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="25" height="25"><g>	<path d="M24,12.073c0,5.989-4.394,10.954-10.13,11.855v-8.363h2.789l0.531-3.46H13.87V9.86c0-0.947,0.464-1.869,1.95-1.869h1.509   V5.045c0,0-1.37-0.234-2.679-0.234c-2.734,0-4.52,1.657-4.52,4.656v2.637H7.091v3.46h3.039v8.363C4.395,23.025,0,18.061,0,12.073   c0-6.627,5.373-12,12-12S24,5.445,24,12.073z"/></g></svg></a>
								<?php 
									}	
								?>							
								<!-- Конец иконки социальных сетей -->

															 	<!-- Начало иконки социальных сетей -->
																 <?php 
									if (!empty($vk_soc)){ 
								?>
									<a href="<?php echo $vk_soc; ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="25" height="25"><g><path d="M22.316,1.684C20.632,0,17.921,0,12.5,0h-1C6.079,0,3.368,0,1.684,1.684C0,3.368,0,6.079,0,11.5v1   c0,5.421,0,8.131,1.684,9.816S6.079,24,11.5,24h1c5.421,0,8.131,0,9.816-1.684C24,20.632,24,17.921,24,12.5v-1   C24,6.079,24,3.368,22.316,1.684z M19.503,17h-1.75c-0.667,0-0.863-0.532-2.05-1.719c-1.039-1.001-1.484-1.131-1.743-1.131   c-0.353,0-0.458,0.1-0.458,0.6v1.569c0,0.43-0.137,0.681-1.25,0.681c-1.854,0-3.892-1.126-5.339-3.202   c-2.17-3.041-2.763-5.34-2.763-5.803c0-0.26,0.1-0.495,0.6-0.495h1.751c0.447,0,0.615,0.196,0.783,0.68   c0.856,2.493,2.3,4.672,2.893,4.672c0.222,0,0.324-0.103,0.324-0.667V9.608c-0.065-1.186-0.696-1.284-0.696-1.706   c0-0.195,0.167-0.402,0.445-0.402h2.751c0.371,0,0.5,0.198,0.5,0.643v3.467c0,0.37,0.161,0.5,0.272,0.5   c0.223,0,0.408-0.13,0.816-0.538c1.261-1.409,2.151-3.578,2.151-3.578c0.112-0.26,0.316-0.495,0.762-0.495h1.75   c0.529,0,0.641,0.272,0.529,0.643c-0.223,1.02-2.355,4.023-2.355,4.023c-0.186,0.297-0.26,0.445,0,0.779   c0.186,0.26,0.797,0.779,1.205,1.261c0.752,0.846,1.319,1.559,1.477,2.051C20.254,16.75,20.003,17,19.503,17z"/></g></svg></a>
								<?php 
									}	
								?>							
								<!-- Конец иконки социальных сетей -->

															 	<!-- Начало иконки социальных сетей -->
																 <?php 
									if (!empty($ok_soc)){ 
								?>
									<a href="<?php echo $ok_soc; ?>"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="25px" height="25px" viewBox="0 0 389.404 387.417" enable-background="new 0 0 389.404 387.417" xml:space="preserve"><g><path fill="#FAAB62" d="M389.404,330.724c0,31.312-25.383,56.693-56.693,56.693H56.693C25.382,387.417,0,362.036,0,330.724V56.693	C0,25.382,25.382,0,56.693,0h276.018c31.311,0,56.693,25.382,56.693,56.693V330.724z"/><path fill="#000" d="M387.404,329.317c0,30.989-25.122,56.11-56.111,56.11H58.11c-30.989,0-56.11-25.121-56.11-56.11V58.1 C2,27.111,27.122,1.99,58.11,1.99h273.183c30.989,0,56.111,25.122,56.111,56.11V329.317z"/><path fill="#FFFFFF" d="M194.485,57.901c-38.593,0-69.878,31.286-69.878,69.878c0,38.593,31.285,69.881,69.878,69.881 s69.878-31.288,69.878-69.881C264.363,89.187,233.078,57.901,194.485,57.901z M194.485,156.667 c-15.953,0-28.886-12.934-28.886-28.887s12.933-28.886,28.886-28.886s28.886,12.933,28.886,28.886S210.438,156.667,194.485,156.667 z"/><g><path fill="#FFFFFF" d="M219.155,253.262c27.975-5.699,44.739-18.947,45.626-19.658c8.186-6.565,9.501-18.523,2.936-26.71 c-6.564-8.186-18.521-9.501-26.709-2.937c-0.173,0.14-18.053,13.856-47.472,13.876c-29.418-0.02-47.676-13.736-47.849-13.876 c-8.188-6.564-20.145-5.249-26.709,2.937c-6.565,8.187-5.25,20.145,2.936,26.71c0.899,0.721,18.355,14.314,47.114,19.879 l-40.081,41.888c-7.284,7.554-7.065,19.582,0.489,26.866c3.687,3.555,8.439,5.322,13.187,5.322c4.978,0,9.951-1.945,13.679-5.812 l37.235-39.665l40.996,39.922c7.428,7.416,19.456,7.404,26.87-0.021c7.414-7.426,7.405-19.456-0.021-26.87L219.155,253.262z"/><path fill="#FFFFFF" d="M193.536,217.832c-0.047,0,0.046,0.001,0,0.002C193.49,217.833,193.583,217.832,193.536,217.832z"/></g></g></svg></a>
								<?php 
									}	
								?>							
								<!-- Конец иконки социальных сетей -->
							</li>
							<?php
							}
							?>

							<?php
							if (!empty($site_link)){ ?>
							<li>
								<a href="<?php echo $site_link; ?>" class="site_link"><svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="25" height="25"><path d="M12,0A12,12,0,1,0,24,12,12.013,12.013,0,0,0,12,0Zm8.647,7H17.426a19.676,19.676,0,0,0-2.821-4.644A10.031,10.031,0,0,1,20.647,7ZM16.5,12a10.211,10.211,0,0,1-.476,3H7.976A10.211,10.211,0,0,1,7.5,12a10.211,10.211,0,0,1,.476-3h8.048A10.211,10.211,0,0,1,16.5,12ZM8.778,17h6.444A19.614,19.614,0,0,1,12,21.588,19.57,19.57,0,0,1,8.778,17Zm0-10A19.614,19.614,0,0,1,12,2.412,19.57,19.57,0,0,1,15.222,7ZM9.4,2.356A19.676,19.676,0,0,0,6.574,7H3.353A10.031,10.031,0,0,1,9.4,2.356ZM2.461,9H5.9a12.016,12.016,0,0,0-.4,3,12.016,12.016,0,0,0,.4,3H2.461a9.992,9.992,0,0,1,0-6Zm.892,8H6.574A19.676,19.676,0,0,0,9.4,21.644,10.031,10.031,0,0,1,3.353,17Zm11.252,4.644A19.676,19.676,0,0,0,17.426,17h3.221A10.031,10.031,0,0,1,14.605,21.644ZM21.539,15H18.1a12.016,12.016,0,0,0,.4-3,12.016,12.016,0,0,0-.4-3h3.437a9.992,9.992,0,0,1,0,6Z"/></svg>  Сайт личности</a>
							</li>
							<?php 
							}
							?>
						</ul>
					</div>
						<?php
						?>
					<!-- Блок рекламы -->
					<?php
						$adv_field = "";
						$adv_field = get_field('adv_field'); 
						$but_adv_off = get_field('but_adv_off');
						if ($adv_field and $but_adv_off){ 
					?>
					<div class="adv_block">
					<div class="f-carousel" id="myCarousel">
						<!-- Начала слайда -->
						<?php foreach ($adv_field as $adv_single){ ?>
							<div class="f-carousel__slide">
								<a href="<?php if ($adv_single['adv_link']) { echo $adv_single['adv_link']; } else {echo '#';} ?>">
									<figure>
										<img src="<?php echo wp_get_attachment_image_url($adv_single['adv_img'], 'advertising_thumb', false); ?>" />
										<?php if ($adv_single['adv_title']) { ?>
											<figcaption><?php echo $adv_single['adv_title']; ?></figcaption>
										<?php } ?>
									</figure>
								</a>
							</div>
						<?php } ?>
						<!-- КОНЕЦ слайда -->

					</div>
					</div>
				<?php } ?>
					<!-- КОНЕЦ Блок рекламы -->

					<!-- Персонализированный Блок рекламы -->
					<?php 
						$gallery_pers = $lico_option['advertising-block-pablic']; 
						$but_adv_publ_off = get_field('but_adv_publ_off'); 
						
						if ($but_adv_publ_off) {
					?>
					<div class="adv_block">
					<div class="f-carousel" id="adverPubl">
						<!-- Начала слайда -->
						<?php foreach ($gallery_pers as $adv_single){ ?>
							<div class="f-carousel__slide">
								<a href="<?php if ($adv_single['url']) { echo $adv_single['url']; } else {echo '#';} ?>">
									<figure>
										<img src="<?php echo wp_get_attachment_image_url($adv_single['attachment_id'], 'advertising_thumb', false); ?>" />
										<?php if ($adv_single['title']) { ?>
											<figcaption><?php echo $adv_single['title']; ?></figcaption>
										<?php } ?>
									</figure>
								</a>
							</div>
						<?php } ?>
						<!-- КОНЕЦ слайда -->

					</div>
					</div>
					<?php 
						}
					?>
					<!-- КОНЕЦ Персонализированный Блок рекламы -->

					<!-- Персонализированный виджет -->
					<?php  
						$but_perswidget_off = get_field('but_perswidget_off'); //Тригер отключения персонализированного виджета
						$html_code = get_field('html_code'); //HTML персонализированного виджета

						if ($but_perswidget_off){ ?>
							<div class="adv_block_pers">
								<?php echo $html_code; ?>
							</div>
						<?php
						}
					?>
					<!-- КОНЕЦ Персонализированный виджет -->

					<!-- Общий сайдбар -->
					<?php
					$but_widgetpubl_off = get_field('but_widgetpubl_off'); //Тригер включения и отключения доп. виджетов
					
					if ($but_widgetpubl_off){		//ПРоверка на активацию общих виджетов в настройках личности
						if ( is_active_sidebar( 'sidebar-public') ) { ?>
							<aside class="sidebar">
							<?php dynamic_sidebar( 'sidebar-public'); ?>
							</aside>
					<?php }
					}
					?>
					<!-- КОНЕЦ Общий сайдбар -->

					<!-- Сайдбар -->
					<?php
					$but_widget_off = get_field('but_widget_off'); //Тригер включения и отключения доп. виджетов
					
					if ($but_widget_off){		//ПРоверка на активацию общих виджетов в настройках личности
						if ( is_active_sidebar( 'sidebar-'.$category ) ) { ?>
							<aside class="sidebar">
							<?php dynamic_sidebar( 'sidebar-'.$category); ?>
							</aside>
					<?php }
					}
					?>
				












					<!-- Начало цикла Рекламы-->
					<?php  
                                        // параметры по умолчанию
										$my_posts = get_posts( array(
											'numberposts' => 10,
											'orderby'     => 'date',
											'order'       => 'DESC',
											'post_type'   => 'advertising',
											'location_goods' => 'banner',
											'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
											) );

											global $post;
                    foreach( $my_posts as $post ){
						setup_postdata( $post );
						?>
							
									<!-- Блок рекламы -->
							<?php
								$adv_field_cpt = "";
								$adv_field_cpt = get_field('adv_field_cpt'); 
								$adv_off_cpt = get_field('adv_status');
								
								if ($adv_field and $adv_off_cpt){ 
							?>
							<?php 
								$car_id[]=$post->ID; //Вносим в массив id поста
							?>
							<div class="adv_block">
							<div class="f-carousel" id="myCarousel-<?php echo $post->ID; ?>">
								<!-- Начала слайда -->
								<?php foreach ($adv_field_cpt as $adv_single){ ?>
									<div class="f-carousel__slide">
										<a href="<?php if ($adv_single['adv_link_cpt']) { echo $adv_single['adv_link_cpt']; } else {echo '#';} ?>">
											<figure>
												<img src="<?php echo wp_get_attachment_image_url($adv_single['adv_img_cpt'], 'advertising_thumb', false); ?>" />
												<?php if ($adv_single['adv_title_cpt']) { ?>
													<figcaption><?php echo $adv_single['adv_title_cpt']; ?></figcaption>
												<?php } ?>
											</figure>
										</a>
									</div>
								<?php } ?>
								<!-- КОНЕЦ слайда -->

							</div>
							</div>
						<?php } ?>
							<!-- КОНЕЦ Блок рекламы -->

                    <?php
                    }
                    wp_reset_postdata(); // сброс 
					?> 
                <!-- Окончание цикла Рекламы-->





















				
			<!-- КОНЕЦ Сайдбар -->	
			</div>
				
				<div class="card_right">

					<ul class="tabs">
						<?php
						
						if ($bio_tab == 'y' or empty($bio_tab)) {
							
						?>
						<li>
							<a href="#" data-tab="bio" class="tab active">Биография</a>
						</li>
						<?php
						
						}
						if ($photo_tab == 'y' or empty($photo_tab)) {
							
						?>
						<li>
							<a href="#" data-tab="photo" class="tab">Фото</a>
						</li>
						<?php
						
						}
						if ($video_tab == 'y' or empty($video_tab)) {
							
						?>
						<li>
							<a href="#" data-tab="video" class="tab">Видео</a>
						</li>
						<?php
						
						}
						if ($rev_tab == 'y' or empty($rev_tab)) {
							
						?>
						<li>
							<a href="#" data-tab="revs" class="tab">Мнения</a>
						</li>
						<?php
						
						}
						
						?>
					</ul>

					<div class="tab_content">
						<div class="tab tab_active tab_bio">
							<?php echo apply_filters('the_content', get_the_content()); ?>
							<!-- Блок Биографии -->
							<?php
								$biography = get_field('biography');
								
								// Вывод ссылок навигации
								if ($biography){
									echo '<div class="nav_link_bio">';
									foreach ($biography as $bio_single){ ?>
										<a href="#<?php echo $bio_single['title']; ?>"><?php echo $bio_single['title']; ?></a>
							<?php		
									}
									echo '</div>';
								}
							?>
							
							<?php 
							// Вывод контента биографии
							if ($biography){
								foreach ($biography as $bio_single){ ?>
									<div id="<?php echo $bio_single['title']; ?>"> <?php  echo $bio_single['content'];?> </div>
							<?php		
									}
								}
							?>
							<!-- КОНЕЦ Блок Биографии -->
						</div>
						<div class="tab tab_photo" style="display: none;">
							<div class="items_photos">
								<?php
								$photo_gallery = "";
								$photo_gallery = get_field('photo_gallery');
								
								if ($photo_gallery) {
									foreach ($photo_gallery as $photo_link) { ?>
										<a href="<?php echo wp_get_attachment_image_url($photo_link, 'full', false); ?>" data-fancybox="gallery " data-caption="<?php echo wp_get_attachment_caption($photo_link); ?>">
										<img src="<?php echo wp_get_attachment_image_url($photo_link, 'gallery_thumb' , false); ?>" />
										</a>
								<?php		
									}
								}
								?>
							</div>
						</div>
						<div class="tab tab_video" style="display: none;">
							<?php
								$video_gallery = '';
								$video_gallery = get_field("video_gallery");

								if($video_gallery){
									foreach ($video_gallery as $single_vigeo){ ?>
										<video width="<?php $single_vigeo['width']; ?>" height="<?php $single_vigeo['height']; ?>" controls>
											<source src="<?php echo $single_vigeo['url']; ?>" type="<?php echo $$single_vigeo['mime-type']; ?>">
										</video>
							<?php 
									}
								}
							?>
						<?php 
							$youtube_link = '';
							$youtube_link = get_field('youtube_link'); 
							if ($youtube_link){
								foreach ($youtube_link as $video){
									foreach ($video as $single){
										echo $single;
									}
								}
							}
						?>
						</div>
						<div class="tab tab_revs" style="display: none;">
							<?php comments_template(); ?>
						</div>
					</div>
				</div>

				
			<!-- мобильная колонка -->
			<div class="card_left mobile">
					<div class="author_photo" style="background-image: url(<?php echo $photo; ?>);"></div>
					<div class="author_info">
						<ul>
							<li>
								<h6>Имя</h6>
								<p><?php echo $post->post_title; ?></p>
							</li>
							<?php
							
							if (!empty($birth)) {
								
							?>
							<li>
								<h6>Дата рождения</h6>
								<p><?php echo $birth; ?></p>
							</li>
							<?php
							
							}
							if (!empty($birth_place)) {
								
							?>
							<li>
								<h6>Место рождения</h6>
								<p><?php echo $birth_place; ?></p>
							</li>
							<?php
							
							}
							if (!empty($death)) {
								
							?>
							<li>
								<h6>Дата смерти</h6>
								<p><?php echo $death; ?></p>
							</li>
							<?php
							
							}
							if (!empty($death_place)) {
								
							?>
							<li>
								<h6>Место смерти</h6>
								<p><?php echo $death_place; ?></p>
							</li>
							<?php
							
							}
							if (!empty($zodiac)) {
								
							?>
							<li>
								<h6>По зодиаку</h6>
								<p><?php echo $zodiac; ?></p>
							</li>
							<?php
							
							}
							
							?>
							<?php
							
							if (!empty($telegr_soc) || !empty($inst_soc) || !empty($twit_soc) || !empty($fb_soc) || !empty($vk_soc) || !empty($ok_soc)) {
							?>
							<li class="social_link">
								<!-- Начало иконки социальных сетей -->
								<?php 
									if (!empty($telegr_soc)){ 
								?>
									<a href="<?php echo $telegr_soc; ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="25" height="25"><g id="Artboard"><path style="fill-rule:evenodd;clip-rule:evenodd;" d="M12,0C5.373,0,0,5.373,0,12s5.373,12,12,12s12-5.373,12-12S18.627,0,12,0z    M17.562,8.161c-0.18,1.897-0.962,6.502-1.359,8.627c-0.168,0.9-0.5,1.201-0.82,1.23c-0.697,0.064-1.226-0.461-1.901-0.903   c-1.056-0.692-1.653-1.123-2.678-1.799c-1.185-0.781-0.417-1.21,0.258-1.911c0.177-0.184,3.247-2.977,3.307-3.23   c0.007-0.032,0.015-0.15-0.056-0.212s-0.174-0.041-0.248-0.024c-0.106,0.024-1.793,1.139-5.062,3.345   c-0.479,0.329-0.913,0.489-1.302,0.481c-0.428-0.009-1.252-0.242-1.865-0.442c-0.751-0.244-1.349-0.374-1.297-0.788   c0.027-0.216,0.324-0.437,0.892-0.663c3.498-1.524,5.831-2.529,6.998-3.015c3.333-1.386,4.025-1.627,4.477-1.635   C17.472,7.214,17.608,7.681,17.562,8.161z"/></g></svg></a>
								<?php 
									}	
								?>							
								<!-- Конец иконки социальных сетей -->

							 	<!-- Начало иконки социальных сетей -->
																<?php 
									if (!empty($inst_soc)){ 
								?>
									<a href="<?php echo $inst_soc; ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="25" height="25"><g><path d="M12,2.162c3.204,0,3.584,0.012,4.849,0.07c1.308,0.06,2.655,0.358,3.608,1.311c0.962,0.962,1.251,2.296,1.311,3.608   c0.058,1.265,0.07,1.645,0.07,4.849c0,3.204-0.012,3.584-0.07,4.849c-0.059,1.301-0.364,2.661-1.311,3.608   c-0.962,0.962-2.295,1.251-3.608,1.311c-1.265,0.058-1.645,0.07-4.849,0.07s-3.584-0.012-4.849-0.07   c-1.291-0.059-2.669-0.371-3.608-1.311c-0.957-0.957-1.251-2.304-1.311-3.608c-0.058-1.265-0.07-1.645-0.07-4.849   c0-3.204,0.012-3.584,0.07-4.849c0.059-1.296,0.367-2.664,1.311-3.608c0.96-0.96,2.299-1.251,3.608-1.311   C8.416,2.174,8.796,2.162,12,2.162 M12,0C8.741,0,8.332,0.014,7.052,0.072C5.197,0.157,3.355,0.673,2.014,2.014   C0.668,3.36,0.157,5.198,0.072,7.052C0.014,8.332,0,8.741,0,12c0,3.259,0.014,3.668,0.072,4.948c0.085,1.853,0.603,3.7,1.942,5.038   c1.345,1.345,3.186,1.857,5.038,1.942C8.332,23.986,8.741,24,12,24c3.259,0,3.668-0.014,4.948-0.072   c1.854-0.085,3.698-0.602,5.038-1.942c1.347-1.347,1.857-3.184,1.942-5.038C23.986,15.668,24,15.259,24,12   c0-3.259-0.014-3.668-0.072-4.948c-0.085-1.855-0.602-3.698-1.942-5.038c-1.343-1.343-3.189-1.858-5.038-1.942   C15.668,0.014,15.259,0,12,0z"/><path d="M12,5.838c-3.403,0-6.162,2.759-6.162,6.162c0,3.403,2.759,6.162,6.162,6.162s6.162-2.759,6.162-6.162   C18.162,8.597,15.403,5.838,12,5.838z M12,16c-2.209,0-4-1.791-4-4s1.791-4,4-4s4,1.791,4,4S14.209,16,12,16z"/><circle cx="18.406" cy="5.594" r="1.44"/></g></svg></a>
								<?php 
									}	
								?>							
								<!-- Конец иконки социальных сетей -->

								<!-- Начало иконки социальных сетей -->
																 <?php 
									if (!empty($twit_soc)){ 
								?>
									<a href="<?php echo $twit_soc; ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="25" height="25"><path id="Logo_00000038394049246713568260000012923108920998390947_" d="M21.543,7.104c0.014,0.211,0.014,0.423,0.014,0.636  c0,6.507-4.954,14.01-14.01,14.01v-0.004C4.872,21.75,2.252,20.984,0,19.539c0.389,0.047,0.78,0.07,1.172,0.071  c2.218,0.002,4.372-0.742,6.115-2.112c-2.107-0.04-3.955-1.414-4.6-3.42c0.738,0.142,1.498,0.113,2.223-0.084  c-2.298-0.464-3.95-2.483-3.95-4.827c0-0.021,0-0.042,0-0.062c0.685,0.382,1.451,0.593,2.235,0.616  C1.031,8.276,0.363,5.398,1.67,3.148c2.5,3.076,6.189,4.946,10.148,5.145c-0.397-1.71,0.146-3.502,1.424-4.705  c1.983-1.865,5.102-1.769,6.967,0.214c1.103-0.217,2.16-0.622,3.127-1.195c-0.368,1.14-1.137,2.108-2.165,2.724  C22.148,5.214,23.101,4.953,24,4.555C23.339,5.544,22.507,6.407,21.543,7.104z"/></svg></a>
								<?php 
									}	
								?>							
								<!-- Конец иконки социальных сетей -->

															 	<!-- Начало иконки социальных сетей -->
																 <?php 
									if (!empty($fb_soc)){ 
								?>
									<a href="<?php echo $fb_soc; ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="25" height="25"><g>	<path d="M24,12.073c0,5.989-4.394,10.954-10.13,11.855v-8.363h2.789l0.531-3.46H13.87V9.86c0-0.947,0.464-1.869,1.95-1.869h1.509   V5.045c0,0-1.37-0.234-2.679-0.234c-2.734,0-4.52,1.657-4.52,4.656v2.637H7.091v3.46h3.039v8.363C4.395,23.025,0,18.061,0,12.073   c0-6.627,5.373-12,12-12S24,5.445,24,12.073z"/></g></svg></a>
								<?php 
									}	
								?>							
								<!-- Конец иконки социальных сетей -->

															 	<!-- Начало иконки социальных сетей -->
																 <?php 
									if (!empty($vk_soc)){ 
								?>
									<a href="<?php echo $vk_soc; ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" width="25" height="25"><g><path d="M22.316,1.684C20.632,0,17.921,0,12.5,0h-1C6.079,0,3.368,0,1.684,1.684C0,3.368,0,6.079,0,11.5v1   c0,5.421,0,8.131,1.684,9.816S6.079,24,11.5,24h1c5.421,0,8.131,0,9.816-1.684C24,20.632,24,17.921,24,12.5v-1   C24,6.079,24,3.368,22.316,1.684z M19.503,17h-1.75c-0.667,0-0.863-0.532-2.05-1.719c-1.039-1.001-1.484-1.131-1.743-1.131   c-0.353,0-0.458,0.1-0.458,0.6v1.569c0,0.43-0.137,0.681-1.25,0.681c-1.854,0-3.892-1.126-5.339-3.202   c-2.17-3.041-2.763-5.34-2.763-5.803c0-0.26,0.1-0.495,0.6-0.495h1.751c0.447,0,0.615,0.196,0.783,0.68   c0.856,2.493,2.3,4.672,2.893,4.672c0.222,0,0.324-0.103,0.324-0.667V9.608c-0.065-1.186-0.696-1.284-0.696-1.706   c0-0.195,0.167-0.402,0.445-0.402h2.751c0.371,0,0.5,0.198,0.5,0.643v3.467c0,0.37,0.161,0.5,0.272,0.5   c0.223,0,0.408-0.13,0.816-0.538c1.261-1.409,2.151-3.578,2.151-3.578c0.112-0.26,0.316-0.495,0.762-0.495h1.75   c0.529,0,0.641,0.272,0.529,0.643c-0.223,1.02-2.355,4.023-2.355,4.023c-0.186,0.297-0.26,0.445,0,0.779   c0.186,0.26,0.797,0.779,1.205,1.261c0.752,0.846,1.319,1.559,1.477,2.051C20.254,16.75,20.003,17,19.503,17z"/></g></svg></a>
								<?php 
									}	
								?>							
								<!-- Конец иконки социальных сетей -->

															 	<!-- Начало иконки социальных сетей -->
																 <?php 
									if (!empty($ok_soc)){ 
								?>
									<a href="<?php echo $ok_soc; ?>"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="25px" height="25px" viewBox="0 0 389.404 387.417" enable-background="new 0 0 389.404 387.417" xml:space="preserve"><g><path fill="#FAAB62" d="M389.404,330.724c0,31.312-25.383,56.693-56.693,56.693H56.693C25.382,387.417,0,362.036,0,330.724V56.693	C0,25.382,25.382,0,56.693,0h276.018c31.311,0,56.693,25.382,56.693,56.693V330.724z"/><path fill="#000" d="M387.404,329.317c0,30.989-25.122,56.11-56.111,56.11H58.11c-30.989,0-56.11-25.121-56.11-56.11V58.1 C2,27.111,27.122,1.99,58.11,1.99h273.183c30.989,0,56.111,25.122,56.111,56.11V329.317z"/><path fill="#FFFFFF" d="M194.485,57.901c-38.593,0-69.878,31.286-69.878,69.878c0,38.593,31.285,69.881,69.878,69.881 s69.878-31.288,69.878-69.881C264.363,89.187,233.078,57.901,194.485,57.901z M194.485,156.667 c-15.953,0-28.886-12.934-28.886-28.887s12.933-28.886,28.886-28.886s28.886,12.933,28.886,28.886S210.438,156.667,194.485,156.667 z"/><g><path fill="#FFFFFF" d="M219.155,253.262c27.975-5.699,44.739-18.947,45.626-19.658c8.186-6.565,9.501-18.523,2.936-26.71 c-6.564-8.186-18.521-9.501-26.709-2.937c-0.173,0.14-18.053,13.856-47.472,13.876c-29.418-0.02-47.676-13.736-47.849-13.876 c-8.188-6.564-20.145-5.249-26.709,2.937c-6.565,8.187-5.25,20.145,2.936,26.71c0.899,0.721,18.355,14.314,47.114,19.879 l-40.081,41.888c-7.284,7.554-7.065,19.582,0.489,26.866c3.687,3.555,8.439,5.322,13.187,5.322c4.978,0,9.951-1.945,13.679-5.812 l37.235-39.665l40.996,39.922c7.428,7.416,19.456,7.404,26.87-0.021c7.414-7.426,7.405-19.456-0.021-26.87L219.155,253.262z"/><path fill="#FFFFFF" d="M193.536,217.832c-0.047,0,0.046,0.001,0,0.002C193.49,217.833,193.583,217.832,193.536,217.832z"/></g></g></svg></a>
								<?php 
									}	
								?>							
								<!-- Конец иконки социальных сетей -->
							</li>
							<?php
							}
							?>

							<?php
							if (!empty($site_link)){ ?>
							<li>
								<a href="<?php echo $site_link; ?>" class="site_link"><svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="25" height="25"><path d="M12,0A12,12,0,1,0,24,12,12.013,12.013,0,0,0,12,0Zm8.647,7H17.426a19.676,19.676,0,0,0-2.821-4.644A10.031,10.031,0,0,1,20.647,7ZM16.5,12a10.211,10.211,0,0,1-.476,3H7.976A10.211,10.211,0,0,1,7.5,12a10.211,10.211,0,0,1,.476-3h8.048A10.211,10.211,0,0,1,16.5,12ZM8.778,17h6.444A19.614,19.614,0,0,1,12,21.588,19.57,19.57,0,0,1,8.778,17Zm0-10A19.614,19.614,0,0,1,12,2.412,19.57,19.57,0,0,1,15.222,7ZM9.4,2.356A19.676,19.676,0,0,0,6.574,7H3.353A10.031,10.031,0,0,1,9.4,2.356ZM2.461,9H5.9a12.016,12.016,0,0,0-.4,3,12.016,12.016,0,0,0,.4,3H2.461a9.992,9.992,0,0,1,0-6Zm.892,8H6.574A19.676,19.676,0,0,0,9.4,21.644,10.031,10.031,0,0,1,3.353,17Zm11.252,4.644A19.676,19.676,0,0,0,17.426,17h3.221A10.031,10.031,0,0,1,14.605,21.644ZM21.539,15H18.1a12.016,12.016,0,0,0,.4-3,12.016,12.016,0,0,0-.4-3h3.437a9.992,9.992,0,0,1,0,6Z"/></svg>  Сайт личности</a>
							</li>
							<?php 
							}
							?>
						</ul>
					</div>
				</div>
<!-- КОНЕЦ мобильная колонка -->
			</div>
		</div>
		<?php
			$latest = lico_by_category($category, 4);
		?>
		<div class="container">
			<h3 class="line">Другие лица</h3>
			<div class="items">
				<?php
				
				foreach ($latest as $post) {
					
					?>
					<div class="item">
						<a href="<?php echo $post->url; ?>" title="<?php echo $post->post_title; ?>">
							<div class="item_img" style="background-image: url(<?php echo $post->photo; ?>);"></div>
							<p><?php echo $post->post_title; ?></p>
						</a>
					</div>
					<?php
					
				}
				
				?>
			</div>
		</div>
	</section>
<?php
// Подключаем кастомные карусели
	if ($car_id){ ?>
		<script>
			const optionscar = { 
				infinite: true,
				Navigation: false,
				Dots : false,
				Autoplay: {
					timeout: 10000,
					autoStart : true,
				},
			};
			<?php foreach ($car_id as $id) {?>
				const container<?php echo $id; ?> = document.getElementById("myCarousel-<?php echo $id; ?>");
				if (container<?php echo $id; ?>){
					new Carousel(container<?php echo $id; ?>, optionscar, { Autoplay }); //Реклама для страницы личности
				}
			<?php 
			}
			?>
		</script>
<?php
	}
?>
<?php

get_footer();

?>