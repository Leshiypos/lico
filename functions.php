<?php

define('LICO_CPT', 'lico');
define('LICO_PHOTO_CPT', 'lico_photo');
define('LICO_VIDEO_CPT', 'lico_video');
define('LICO_TAX', 'lico_cat');

add_action('after_setup_theme', 'lico_setup');

function lico_setup() {

	add_theme_support('post-thumbnails');
	add_theme_support('title-tag');
	register_nav_menu('top_menu', 'Главное меню');

}

add_filter('comments_open', 'lico_comments', 10, 2);

function lico_comments( $open, $post_id ) {

	$post = get_post($post_id);

	if (LICO_CPT == $post->post_type)
		$open = true;

	return $open;
	
}

add_action('admin_menu', 'lico_menu');

function lico_menu() {
	
	add_menu_page('Настройки темы', 'Настройки темы', 'administrator', __FILE__, 'lico_settings_page');
	
}

function lico_settings_page() {

	echo '<div class="wrap">';
	echo '<h1>Настройки темы</h1>';
	
	echo '<table class="form-table">';
	
	echo '<tr valign="top">';
	
	echo '<th scope="row">Код "Поделиться"</th>';
	echo '<td>';
	echo '<textarea name="lico_social" style="width: 100%;"></textarea>';
	echo '</td>';
	
	echo '</tr>';
	
	echo '<tr valign="top">';
	
	echo '<th scope="row">Код блока рекламы</th>';
	echo '<td>';
	echo '<textarea name="lico_adv" style="width: 100%;"></textarea>';
	echo '</td>';
	
	echo '</tr>';
	
	echo '</table>';
	submit_button();
	
	echo '</div>';
	
}

add_action('init', 'lico_tax_cpt');

function lico_tax_cpt() {
	
	$labels = [
		
		'name' => 'Биографии',
		'singular_name' => 'Биография',
		'menu_name' => 'Биографии',
		'all_items' => 'Все биографии',
		'add_new' => 'Добавить биографию',
		'add_new_item' => 'Добавить биографию',
		'new_item' => 'Добавить биографию',
		'items_list' => 'Биографии',
	
	];
	
	$args = [
	
		'labels' => $labels,
		'public' => true,
		'capability_type' => 'post',
		'query_var' => true,
		'rewrite' => ['slug' => 'bio'],
		'supports' => ['title', 'editor', 'thumbnail', 'comments'],
		'show_in_nav_menus' => true,
	
	];
	
	register_post_type(LICO_CPT, $args);
	
	$labels = [
	
		'singular_name' => 'Категория',
		'menu_name' => 'Категории',
	
	];
	
	$args = [
	
		'labels' => $labels,
		'public' => true,
		'rewrite' => ['slug' => 'type'],
		'hierarchical' => true,
		'show_ui' => true,
		'show_admin_column' => true, 
		'show_in_nav_menus' => true,
	
	];
	
	register_taxonomy(LICO_TAX, LICO_CPT, $args);
	
}

add_action('add_meta_boxes', 'lico_meta_boxes');

function lico_meta_boxes() {
	
	add_meta_box('data', 'Общие данные', 'lico_mb_general', LICO_CPT);
	add_meta_box('tabs', 'Табы', 'lico_mb_tabs', LICO_CPT);
	add_meta_box('adv', 'Реклама', 'lico_mb_adv', LICO_CPT);
	
}

function lico_mb_tabs($post) {
		
	$options = [
	
		'bio_tab' => 'Биография',
		'photo_tab' => 'Фото',
		'video_tab' => 'Видео',
		'rev_tab' => 'Мнения',
			
	];
	
	$all_meta = get_post_meta($post->ID);
	$meta = [];
	
	foreach ($all_meta as $k => $m) {
		
		$meta[$k] = $m[0];
		
	}

	foreach ($options as $ok => $ov) {
		
		echo '<div class="form-group">';
		echo '<label for="show_'.$ok.'">Вкладка "'.$ov.'"</label><br />';
		echo '<select id="show_'.$ok.'" name="'.$ok.'">';
		
		$sel = '';
		if ($meta[$ok] == 'y') {
			$sel = ' selected';
		}
		echo '<option value="y"'.$sel.'>Отображать</option>';
		
		$sel = '';
		if ($meta[$ok] == 'n') {
			$sel = ' selected';
		}
		echo '<option value="n"'.$sel.'>Скрыть</option>';
		
		echo '</select>';
		echo '</div>';
		
	}
	
}

function lico_mb_adv($post) {
	
	$adv = get_post_meta($post->ID, 'adv', true);
	
	?>
	<div class="form-group">
		<label for="adv_code">Код рекламы:</label>
		<textarea id="adv_code" name="adv" style="width: 100%; height: 150px;"><?php echo $adv; ?></textarea>
	</div>
	<?php
	
}

function lico_mb_general($post) {
	
	$all_meta = get_post_meta($post->ID);
	$meta = [];
	
	foreach ($all_meta as $k => $m) {
		
		$meta[$k] = $m[0];
		
	}

	$fields = [
	
		'was' => 'Кем был',
		'birth' => 'Дата рождения',
		'birth_place' => 'Место рождения',
		'death' => 'Дата смерти',
		'death_place' => 'Место смерти',
		'zodiac' => 'Знак зодиака',
		'telegr_soc' => 'Telegram',
		'inst_soc' => 'Instagram',
		'twit_soc' => 'Twitter',
		'fb_soc' => 'Facebook',
		'vk_soc' => 'Вконтакте',
		'ok_soc' => 'Одноклассники'

	
	];
	
	foreach ($fields as $field_id => $field_title) {
	
		?>
		<div class="form-group">
			<label for="<?php echo $field_id; ?>"><?php echo $field_title; ?>:</label><br />
			<input id="<?php echo $field_id; ?>" type="text" name="<?php echo $field_id; ?>" value="<?php echo $meta[$field_id]; ?>" />
		</div>
		<?php
	
	}
	
}

add_action('save_post', 'lico_save');

function lico_save($post_id) {

	$fields = [
	
		'was',
		'birth',
		'birth_place',
		'death',
		'death_place',
		'zodiac',
		'adv',
		'bio_tab',
		'photo_tab',
		'video_tab',
		'rev_tab',
		'bio_id',
		
	];
	
	foreach ($fields as $field) {
		
		if (!isset($_POST[$field])) {
			continue;
		}
		
		update_post_meta($post_id, $field, $_POST[$field]);
		
	}
	
}

add_action('wp_enqueue_scripts', 'lico_scripts');

function lico_scripts() {
	
	wp_enqueue_style('lico-style', get_template_directory_uri().'/assets/css/style.css');
	wp_enqueue_script('lico-script', get_template_directory_uri().'/assets/js/scripts.js', ['jquery']);
	
}

function lico_latest($count = 4) {
	
	$args = [
	
		'post_type' => LICO_CPT,
		'numberposts' => $count,
	
	];
	
	$posts = get_posts($args);
	if (!$posts) {
		return false;
	}
	
	foreach ($posts as $post) {
		
		$thumb = get_the_post_thumbnail_url($post->ID);
		$post->photo = $thumb;
		
		$post->url = get_permalink($post->ID);
		
	}
	
	return $posts;
	
}

function lico_by_category($category_id, $count = 32) {
	
	$posts = [

		'post_type' => LICO_CPT,
		'tax_query' => [
			[
				'taxonomy' => LICO_TAX,
				'field' => 'term_id',
				'terms' => $category_id,
			]
		],
		'numberposts' => $count,

	];

	$posts = get_posts($posts);

	foreach ($posts as $post) {
		
		$post->photo = get_the_post_thumbnail_url($post->ID);
		$post->url = get_permalink($post->ID);
		
	}
	
	return $posts;

}