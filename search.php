<?php

get_header();
global $wp_query;

$quantity = $wp_query->found_posts; //количество найденных статей в запросе
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
			<h1>Результаты поиска</h1>
			<?php 
			if ($quantity != 0){
			?>
			<p class="search">Всего найдено по запросу "<?php echo get_search_query(); ?>" статей : <?php echo $quantity; ?></p>
			<?php 
			} else { ?>
			<p class="search">По запросу "<?php echo get_search_query(); ?>" ничего не найдено. Пропробуйте вести новый запрос</p>
			<?php }
			?>
			<div class="items">
				<?php
				
				while (have_posts()) {
					
					the_post();
					
					$post = get_post(get_the_ID());
					$post->photo = get_the_post_thumbnail_url($post->ID);
					
					?>
					<div class="item">
						<a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo $post->post_title; ?>">
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

get_footer();

?>