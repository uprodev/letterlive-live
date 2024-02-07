<?php 

// show_admin_bar( false );

add_action('wp_enqueue_scripts', 'load_style_script');
function load_style_script(){
	wp_enqueue_style('my-normalize', get_stylesheet_directory_uri() . '/css/normalize.css');
	wp_enqueue_style('my-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');
	wp_enqueue_style('my-fancybox', get_stylesheet_directory_uri() . '/css/jquery.fancybox.min.css');
	wp_enqueue_style('my-nice-select', get_stylesheet_directory_uri() . '/css/nice-select.css');
	wp_enqueue_style('my-swiper', get_stylesheet_directory_uri() . '/css/swiper.min.css');
	wp_enqueue_style('my-styles', get_stylesheet_directory_uri() . '/css/styles.css', array(), time());
	wp_enqueue_style('my-responsive', get_stylesheet_directory_uri() . '/css/responsive.css', array(), time());
	wp_enqueue_style('my-style-main', get_stylesheet_directory_uri() . '/style.css', array(), time());

	wp_enqueue_script('jquery');
	wp_enqueue_script('my-swiper', get_stylesheet_directory_uri() . '/js/swiper.js', array(), false, true);
	wp_enqueue_script('my-fancybox', get_stylesheet_directory_uri() . '/js/jquery.fancybox.min.js', array(), false, true);
	wp_enqueue_script('my-nice-select', get_stylesheet_directory_uri() . '/js/jquery.nice-select.min.js', array(), false, true);
	wp_enqueue_script('my-cuttr', get_stylesheet_directory_uri() . '/js/cuttr.min.js', array(), false, true);
	wp_enqueue_script('my-sticky', get_stylesheet_directory_uri() . '/js/jquery.sticky.js', array(), false, true);
	wp_enqueue_script('my-script', get_stylesheet_directory_uri() . '/js/script.js', array(), time(), true);
	wp_enqueue_script('my-add', get_stylesheet_directory_uri() . '/js/add.js', array(), time(), true);

	$my_script = array(
		'copied_text' => get_field('copied_p', 'option'),
	);
	wp_localize_script('my-script', 'php_vars_script', $my_script);

}


add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'header' => 'Header menu',
		'footer' => 'Footer menu'
	) );
});


add_theme_support( 'title-tag' );
add_theme_support('html5');
add_theme_support( 'post-thumbnails' ); 


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Main settings',
		'menu_title'	=> 'Theme options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


add_filter('wpcf7_autop_or_not', '__return_false');


function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyDiyT05YehIdz2LrV-QOeRa5M18WfKtlnY');
}
add_action('acf/init', 'my_acf_init');


add_filter('tiny_mce_before_init', 'override_mce_options');
function override_mce_options($initArray) {
	$opts = '*[*]';
	$initArray['valid_elements'] = $opts;
	$initArray['extended_valid_elements'] = $opts;
	return $initArray;
}


function custom_language_switcher_mob(){
	$languages = icl_get_languages('skip_missing=0&orderby=id&order=desc');
	if(!empty($languages)){

		echo '<ul>';

		foreach($languages as $index => $language){

			$li_class = '';
			if($language['active'] === '1') $li_class = ' class="active"';

			echo '<li' . $li_class . '><a href="' . $language['url'] . '">' . $language['native_name'] . '</a></li>';

		}

		echo '</ul>';

	}
}


function custom_language_switcher(){
	$languages = icl_get_languages('skip_missing=0&orderby=id&order=desc');
	if(!empty($languages)){

		echo '<div class="lang-wrap">';
		foreach ($languages as $index => $language) {
			if($language['active'] === '1') echo '<a href="#">' . $language['native_name'] . '</a>';
		}
		echo '<ul>';

		foreach($languages as $index => $language){

			if($language['active'] !== '1') echo '<li><a href="' . $language['url'] . '">' . $language['native_name'] . '</a></li>';

		}

		echo '</ul>';
		echo '</div>';

	}
}


function reading_time() {
	$content = get_post_field( 'post_content', $post->ID );
	$word_count = str_word_count( strip_tags( $content ) );
	$readingtime = ceil($word_count / 200);

	return $readingtime;
}


remove_filter('the_excerpt', 'wpautop');


add_filter('bcn_breadcrumb_title', 'my_breadcrumb_title_swapper', 3, 10);
function my_breadcrumb_title_swapper($title, $type, $id)
{
	if(in_array('home', $type))
	{
		$title = __('Home', 'Letterlife');
	}
	return $title;
}


add_action('wp_ajax_loadmore', 'load_posts');
add_action('wp_ajax_nopriv_loadmore', 'load_posts');
function load_posts () {
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1; 
	$args['post_status'] = 'publish'; 

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) { 
			$query->the_post(); ?>

			<div class="item post-<?= get_the_ID() ?>">

				<?php get_template_part('parts/content', 'post') ?>

			</div>

		<?php }
		die();
	}
}


add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type(array(
            'name'              => 'my_white_plate',
            'title'             => __('White Plate'),
            'description'       => __('Add White Plate'),
            'render_template'   => 'parts/blocks/white_plate.php',
            'category'          => 'common',
            'post_types'        => array('post'),
        ));
    }
}

add_filter('body_class', function (array $classes) {
    if (in_array('blog', $classes)) {
      unset( $classes[array_search('class_name', $classes)] );
    }
  return $classes;
});


require 'inc/Customer_IO.php';