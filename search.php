<?php

get_header();

?>
	<section class="catalog">
		<div class="container">
			<h1>Результаты поиска</h1>
			<p class="search">Вы искали "<?php echo get_search_query(); ?>"</p>
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