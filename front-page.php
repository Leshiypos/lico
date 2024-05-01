<?php

get_header();

/* Новые лица сайта */
$latest = lico_latest();

?>
	<div class="first">
		<div class="container search">
			<h1>Поиск</h1>
			<p>Введите фамилию, имя интересующего человека</p>
			<form action="" method="GET">
				<input type="text" name="s" placeholder="Чью биографию изучим?" />
			</form>
		</div>
	</div>
	<section class="catalog">
		<div class="container">
			<h2 class="line">Новые лица сайта</h2>
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
			<div class="items_block">
				<h2 class="line">Знаменитости</h2>
				<div class="items">
					<?php
						
					$posts = lico_by_category(2, 4);
						
					foreach ($posts as $post) {
							
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
			<div class="items_block">
				<h2 class="line">Образование</h2>
				<div class="items">
					<?php
						
					$posts = lico_by_category(3, 4);
						
					foreach ($posts as $post) {
							
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
			<div class="items_block">
				<h2 class="line">Спорт</h2>
				<div class="items">
					<?php
						
					$posts = lico_by_category(4, 4);
						
					foreach ($posts as $post) {
							
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
		</div>
	</section>
<?php

get_footer();

?>