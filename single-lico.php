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

$bio_tab = get_post_meta($post_id, 'bio_tab', true);
$photo_tab = get_post_meta($post_id, 'photo_tab', true);
$video_tab = get_post_meta($post_id, 'video_tab', true);
$rev_tab = get_post_meta($post_id, 'rev_tab', true);

/* Фото */
$photos = [];

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
						</ul>
					</div>
					<div class="adv_block">
					
					</div>
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
						</div>
						<div class="tab tab_photo">
							<div class="items_photos">
								<?php
								
								if (sizeof($photos) > 0) {
									foreach ($photos as $photo) {
										
										echo '<div class="item_photo">';
										echo '<a href="javascript:void(0);" class="open_photo">';
										echo '<div class="item_photo_bg" style="background-image: url('.$photo.');"></div>';
										echo '</a>';
										echo '</div>';
										
									}
								}
								
								?>
							</div>
						</div>
						<div class="tab tab_video">
							1234
						</div>
						<div class="tab tab_revs">
							<?php comments_template(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		
		$latest = lico_by_category($category, 4);
		
		?>
		<div class="container">
			<h1 class="line">Другие лица</h1>
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

get_footer();

?>