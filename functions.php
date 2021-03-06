<?php

// Include Scripts and CSS

function hired_theme_styles() {

	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'font_awesome', get_template_directory_uri() . '/font-awesome-4.6.3/css/font-awesome.min.css' );
}

add_action( 'wp_enqueue_scripts', 'hired_theme_styles');

function hired_theme_js() {

	global $wp_scripts;

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', 'false' );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', 'false' );

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9');
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9');
}

add_action( 'wp_enqueue_scripts', 'hired_theme_js');

// Add WP Basic Features Support

if ( ! function_exists( 'hired_setup' ) ) :

	function hired_setup() {

	// Add Support for Feed Links
	
	add_theme_support( 'automatic-feed-links' );
	
	// Add Menu Support
	
	add_theme_support ( 'menus' );
	
	// Add Thumbnails Support
	
	add_theme_support( 'post-thumbnails' );
	
	// Add Support for Flexible Title Tag
	
	add_theme_support( 'title-tag' );
	
	}
endif;

add_action( 'after_setup_theme', 'hired_setup' );

// Check for Front Page being used

function hired_filter_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'hired_filter_front_page_template' );

// Add Support for Google Fonts

function hired_google_fonts() {
  $query_args = array(
    'family' => 'Cabin:400,400i,600,600i,700,700i|Cormorant:400,400i,600,600i,700,700i|Josefin+Sans:400,400i,600,600i,700,700i|Josefin+Slab:400,400i,600,600i,700,700i|Lato:400,400i,700,700i|Libre+Baskerville:400,400i,700|Libre+Franklin:400,400i,600,600i,700,700i|Lora:400,400i,700,700i|Merriweather:400,400i,700,700i|Muli:400,400i,600,600i,700,700i|Nunito+Sans:400,400i,600,600i,700,700i|Nunito:400,400i,600,600i,700,700i|Open+Sans:400,400i,600,600i,700,700i|Prompt:400,400i,600,600i,700,700i|Proza+Libre:400,400i,600,600i,700,700i|Raleway:400,400i,600,600i,700,700i|Roboto:400,400i,500,500i,700,700i|Source+Sans+Pro:400,400i,600,600i,700,700i|Titillium+Web:400,400i,600,600i,700,700i|Trirong:400,400i,600,600i,700,700i|Ubuntu:400,400i,500,500i,700,700i',
    'subset' => 'latin,latin-ext',
  );
  wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}
            
add_action('wp_enqueue_scripts', 'hired_google_fonts');

// Content Width Requirement

function hired_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hired_content_width', 800 );
}
add_action( 'after_setup_theme', 'hired_content_width', 0 );

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
require_once get_template_directory() . '/inc/quotes-widget.php';

// THEME CUSTOMIZER!

require_once get_template_directory() . '/inc/wp-customize-image-reloaded.php';
require_once get_template_directory() . '/inc/theme-customizer.php';


// Adjust Wordpress Excerpt

function hired_new_excerpt($text) {
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
add_filter('get_the_excerpt', 'hired_new_excerpt');

?>