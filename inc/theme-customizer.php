<?php

function youre_hired_customize_register( $wp_customize ) {


  // Customize title and tagline sections and labels

  $wp_customize->get_section('title_tagline')->title = __('Site Name and Description', 'youre-hired');  
  $wp_customize->get_control('display_header_text')->section = 'title_tagline'; 
  $wp_customize->get_control('blogname')->label = __('Site Name', 'youre-hired');  
  $wp_customize->get_control('blogdescription')->label = __('Site Description', 'youre-hired');  
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
  $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
  $wp_customize->get_control('header_textcolor')->section = 'header_text_styles'; 
  $wp_customize->get_control('header_textcolor')->label = __('Site Title Color', 'youre-hired');
  $wp_customize->get_setting('header_textcolor')->transport = 'postMessage'; 

  // Customize the Front Page Settings

  $wp_customize->get_section('static_front_page')->title = __('Homepage Preferences', 'youre-hired');
  $wp_customize->get_section('static_front_page')->priority = 20;
  $wp_customize->get_control('show_on_front')->label = __('Choose Homepage Preference', 'youre-hired');  
  $wp_customize->get_control('page_on_front')->label = __('Select Homepage', 'youre-hired');  
  $wp_customize->get_control('page_for_posts')->label = __('Select Blog Homepage', 'youre-hired');  


  // Customize Background Settings

  $wp_customize->get_section('background_image')->title = __('Background Styles', 'youre-hired');  
  $wp_customize->get_control('background_color')->section = 'background_image'; 

  $wp_customize->remove_control('header_image');

// Create custom panels

  $wp_customize->add_panel( 'general_settings', array(
      'priority' => 10,
      'theme_supports' => '',
      'title' => __( 'General Settings', 'youre-hired' ),
      'description' => __( 'Controls the basic settings for the theme.', 'youre-hired' ),
  ) );
  $wp_customize->add_panel( 'color_choices', array(
      'priority' => 30,
      'theme_supports' => '',
      'title' => __( 'Color Choices', 'youre-hired' ),
      'description' => __( 'Controls the color settings for the theme.', 'youre-hired' ),
  ) ); 
  $wp_customize->add_panel( 'typography_settings', array(
      'priority' => 40,
      'theme_supports' => '',
      'title' => __( 'Typography', 'youre-hired' ),
      'description' => __( 'Controls the fonts for the theme.', 'youre-hired' ),
  ) ); 

  // Assign sections to panels

  $wp_customize->get_section('title_tagline')->panel = 'general_settings';      
  $wp_customize->get_section('static_front_page')->panel = 'general_settings';
  $wp_customize->get_section('background_image')->panel = 'design_settings';
  $wp_customize->get_section('background_image')->priority = 1000;


// GENERAL SETTINGS PANEL ........................................ //


// COLOR CHOICES PANEL ........................................ //

// Accent Color

  $wp_customize->add_section( 'accent_color' , array(
    'title'      => __('Accent Color','youre-hired'), 
    'panel'      => 'color_choices',
    'priority'   => 100    
  ) );

  $wp_customize->add_setting(
      'youre_hired_accent_color',
      array(
          'default'         => '#CCEA9B',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'custom_accent_color',
           array(
               'label'      => __( 'Accent color throughout the theme', 'youre-hired' ),
               'section'    => 'accent_color',
               'settings'   => 'youre_hired_accent_color' 
           )
       )
   ); 


// TYPOGRAPHY PANEL ........................................ //

// Font

   $wp_customize->add_section( 'custom_font' , array(
    'title'      => __('Font Choice', 'youre-hired'), 
    'panel'      => 'typography_settings',
    'priority'   => 100    
  ) );  

   $wp_customize->add_setting(
      'youre_hired_font_type',
      array(
          'default'         => 'Noto Sans',
          'transport'       => 'postMessage',
          'sanitize_callback' => 'sanitize_text'
      )
  );

   $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_font_type',
            array(
                'label'          => __( 'Font', 'youre-hired' ),
                'section'        => 'custom_font',
                'settings'       => 'youre_hired_font_type',
                'type'           => 'select',
                'choices'        => array(
                  'Noto Sans'    => 'Noto Sans',
                  'Open Sans'    => 'Open Sans',
                  'Lato'         => 'Lato',
                  'Source Sans Pro'   => 'Source Sans Pro',
                  'Lora'         => 'Lora',
                  'Ubuntu'   => 'Ubuntu',
                  'Libre Baskerville'      => 'Libre Baskerville',
                  'Roboto'    => 'Roboto'
                )
            )
        )       
   );

  
  // Add Custom CSS Textfield

  $wp_customize->add_section( 'custom_css_field' , array(
    'title'      => __('Custom CSS','youre-hired'), 
    'panel'      => 'design_settings',
    'priority'   => 2000    
  ) );  
  $wp_customize->add_setting(
      'youre_hired_custom_css',
      array(          
          'sanitize_callback' => 'sanitize_textarea'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_css',
            array(
                'label'          => __( 'Add custom CSS here', 'youre-hired' ),
                'section'        => 'custom_css_field',
                'settings'       => 'youre_hired_custom_css',
                'type'           => 'textarea'
            )
        )
   );

}
  
add_action( 'customize_register', 'youre_hired_customize_register' );


// Call the custom css into the header

$defaults = array(
  'wp-head-callback'       => 'youre_hired_style_header'
);
add_theme_support( 'custom-header', $defaults );

// Callback function for updating styles

function youre_hired_style_header() {

   ?>

<style type="text/css">

body,
button,
input,
select,
textarea {
  font-family: <?php echo get_theme_mod('youre_hired_font_type') . ', sans-serif'; ?>;
}

.floating-icons,
.contact .fa,
a .fa,
a:visited .fa,
button:hover,
html input[type="button"]:hover,
input[type="reset"]:hover,
input[type="submit"]:hover {
  color: <?php echo get_theme_mod('youre_hired_accent_color'); ?>;
}

.contact img,
.recommendations img,
.about h3,
.experience-title h3,
.education-title h3,
.languages-title h3,
.recommendations-title h3,
.projects-title h3,
.download-resume {
  border-color: <?php echo get_theme_mod('youre_hired_accent_color'); ?>;
}

.name,
.skills h3,
footer {
  background-color: <?php echo get_theme_mod('youre_hired_accent_color'); ?>;
}

footer button:hover,
footer html input[type="button"]:hover,
footer input[type="reset"]:hover,
footer input[type="submit"]:hover {
  color: <?php echo get_theme_mod('youre_hired_accent_color'); ?>;
}


  <?php if( get_theme_mod('youre_hired_custom_css') != '' ) {
    echo get_theme_mod('youre_hired_custom_css');
  } ?>

  </style>

<?php 

}

// Add theme support for Custom Backgrounds

$defaults = array(
  'default-color' => '#ffffff',
);
add_theme_support( 'custom-background', $defaults );


// Sanitize text 

function sanitize_text( $text ) {
    
    return sanitize_text_field( $text );

}

// Sanitize textarea 

function sanitize_textarea( $text ) {
    
    return esc_textarea( $text );

}

// Custom js for theme customizer

function youre_hired_customizer_js() {
  wp_enqueue_script(
    'youre_hired_theme_customizer',
    get_template_directory_uri() . '/js/theme-customizer.js',
    array( 'jquery', 'customize-preview' ),
    '',
    true
);
}
add_action( 'customize_preview_init', 'youre_hired_customizer_js' );

?>