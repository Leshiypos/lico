<?php

get_header();

$category = get_queried_object();

$posts = [

	'post_type' => LICO_CPT,
	'tax_query' => [
		[
			'taxonomy' => LICO_TAX,
			'field' => 'term_id',
			'terms' => $category->term_id,
		]
	],

];

$posts = get_posts($posts);

foreach ($posts as $post) {
	
	$post->photo = get_the_post_thumbnail_url($post->ID);
	$post->url = get_permalink($post->ID);
	
}

?>
	<section class="catalog">
		<div class="container">
			<h1><?php echo $category->name; ?></h1>
			<div class="items">
				<?php
				
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
	</section>
<?php

get_footer();

?>