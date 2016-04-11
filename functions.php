<?php

// Include Scripts and CSS

function theme_styles() {

	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'font_awesome', get_template_directory_uri() . '/font-awesome-4.5.0/css/font-awesome.min.css' );

}

add_action( 'wp_enqueue_scripts', 'theme_styles');

function theme_js() {

	global $wp_scripts;

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', 'false' );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', 'false' );

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9');
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9');
}

add_action( 'wp_enqueue_scripts', 'theme_js');


// Hide or show the Admin Toolbar
show_admin_bar( false );


// Check for Front Page being used
function themeslug_filter_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'themeslug_filter_front_page_template' );


// Add Support for Flexible Title Tag
add_theme_support( 'title-tag' );


// Add Support for Google Fonts
function google_fonts() {
  $query_args = array(
    'family' => 'Noto+Sans:400,700,700italic,400italic|Open+Sans:400,700,700italic,400italic',
    'subset' => 'latin,latin-ext',
  );
  wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}
            
add_action('wp_enqueue_scripts', 'google_fonts');


// Add Menu Support
add_theme_support ( 'menus' );

// Add Thumbnails Support
add_theme_support( 'post-thumbnails' );


// Content Width Requirement
if ( ! isset( $content_width ) ) {
	$content_width = 800;
}

// Add Support for Feed Links
add_theme_support( 'automatic-feed-links' );


// MENUS!

function register_theme_menus() {

	register_nav_menus (
		array (
			'header-menu' => __( 'Header Menu', 'youre-hired-free')
	));
}

// Register Menus
add_action ( 'init', 'register_theme_menus');


// WIDGETS!

require_once get_template_directory() . '/inc/widgets.php';

// Include Resume Widgets
require_once get_template_directory() . '/inc/about-widget.php';
require_once get_template_directory() . '/inc/photo-contact-widget.php';
require_once get_template_directory() . '/inc/summary-widget.php';
require_once get_template_directory() . '/inc/experience-widget.php';
require_once get_template_directory() . '/inc/resume-download-widget.php';
require_once get_template_directory() . '/inc/skills-widget.php';
require_once get_template_directory() . '/inc/education-widget.php';
require_once get_template_directory() . '/inc/languages-widget.php';
require_once get_template_directory() . '/inc/recommendations-widget.php';

// THEME CUSTOMIZER!

require_once get_template_directory() . '/inc/wp-customize-image-reloaded.php';
require_once get_template_directory() . '/inc/theme-customizer.php';


// Adjust Wordpress Excerpt

function wp_new_excerpt($text) {
	if ($text == '') 	{
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$text = strip_tags($text);
		$text = nl2br($text);
		$excerpt_length = apply_filters('excerpt_length', 25);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, ' ... ');
			$text = implode(' ', $words);
		}
	}
	return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wp_new_excerpt');

?>