<?php
//Инициализируем Сайдбар
function lico_widgets_init() {

	// Получаем список категорий CPT lico
	register_sidebar( array(
		'name'          =>  'Для всех категорий',
		'id'            => 'sidebar-public',
		'description'   => 'Виджеты для всех категорий',
		'before_widget' => '<div id="%1$s" class="widget subscr %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="public-widjet"><svg width="19" height="19"><use xlink:href="#mail"></use></svg>',
		'after_title'   => '</div>',
	) );
	
	global $wpdb;
	$lico_cat_tax = $wpdb->get_results("SELECT name,taxonomy,term_taxonomy_id,slug FROM wp_terms,wp_term_taxonomy WHERE wp_terms.term_id=wp_term_taxonomy.term_id AND wp_term_taxonomy.taxonomy='lico_cat'");

	//Создаем сайдюары в сообветствии с количесвтом категорий
	foreach ($lico_cat_tax as $tax){
    register_sidebar( array(
        'name'          =>  $tax->name,
        'id'            => 'sidebar-'.$tax->term_taxonomy_id,
        'description'   => 'Виджеты для категории '.$tax->name,
        'before_widget' => '<div id="%1$s" class="widget subscr %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="'.$tax->slug.'"><svg width="19" height="19"><use xlink:href="#mail"></use></svg>',
        'after_title'   => '</div>',
    ) );
	}
	
}
add_action( 'widgets_init', 'lico_widgets_init' );