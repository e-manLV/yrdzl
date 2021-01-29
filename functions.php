<?php
/**
 * Child Theme functions and definitions
 */
define( 'OVERLAYCHILD_GRID_THEME_VERSION' , '1.0.4' );

/**
 * Enqueue parent theme style
 */
function overlaychild_grid_child_enqueue_styles() {
    $customizer_library = Customizer_Library::Instance();
    $customizer_library->options['overlay-remove-topbar']['default'] = 1;
    $customizer_library->options['overlay-body-font']['default'] = 'Poppins';
    $customizer_library->options['overlay-primary-color']['default'] = '#663c01';
    $customizer_library->options['overlay-secondary-color']['default'] = '#441c00';
    // Blog Settings
    $customizer_library->options['overlay-blog-layout']['default'] = 'overlay-blog-fw';
    $customizer_library->options['overlay-blog-list-layout']['default'] = 'overlay-blog-tile';
    $customizer_library->options['overlay-blog-top-center']['default'] = 1;
    $customizer_library->options['overlay-blog-tile-anim']['default'] = 'overlay-tile-grow';
    // Footer Settings
    $customizer_library->options['overlay-footer-layout']['default'] = 'footer-social-two';
    
    wp_enqueue_style( 'overlay-style', get_template_directory_uri() . '/style.css', array(), OVERLAYCHILD_GRID_THEME_VERSION );
    
    wp_enqueue_style( 'overlaychild-grid-style', get_stylesheet_uri(), array( 'overlay-style' ), OVERLAYCHILD_GRID_THEME_VERSION );
    wp_enqueue_style( 'overlaychild-grid-header-style', get_stylesheet_directory_uri() . '/templates/header/header-style.css', array( 'overlay-style', 'overlay-header-style' ), OVERLAYCHILD_GRID_THEME_VERSION );

    // Load Responsive Stylesheets
	if ( !get_theme_mod( 'overlay-responsive-disable', customizer_library_get_default( 'overlay-responsive-disable' ) ) ) :
		$overlay_resp_mobile = get_theme_mod( 'overlay-mobile-breakat', customizer_library_get_default( 'overlay-mobile-breakat' ) );
		wp_enqueue_style( 'overlaychild-grid-resp-mobile', get_stylesheet_directory_uri()."/includes/css/responsive-mobile.css", array( 'overlay-style', 'overlay-resp-mobile' ), OVERLAYCHILD_GRID_THEME_VERSION, '(max-width: '.esc_attr( $overlay_resp_mobile ).'px)' );
	endif;
}
add_action( 'wp_enqueue_scripts', 'overlaychild_grid_child_enqueue_styles' );

/**
 * Enqueue Overlay custom customizer styling.
 */
function overlaychild_grid_load_customizer_script() {
	wp_enqueue_script( 'overlaychild-grid-customizer-js', get_stylesheet_directory_uri() . "/includes/js/customizer-custom.js", array( 'jquery', 'overlay-customizer-js' ), OVERLAYCHILD_GRID_THEME_VERSION, true );
    wp_enqueue_style( 'overlaychild-grid-customizer-css', get_stylesheet_directory_uri() . "/includes/css/customizer.css", array( 'overlay-customizer-css' ), OVERLAYCHILD_GRID_THEME_VERSION );
}
add_action( 'customize_controls_enqueue_scripts', 'overlaychild_grid_load_customizer_script' );

/**
 * Enqueue Child Theme custom customizer styling.
 */
function overlaychild_grid_load_customizer_settings() {
    global $wp_customize;
    $wp_customize->get_setting( 'overlay-remove-topbar' )->default = 1;
    $wp_customize->get_setting( 'overlay-body-font' )->default = 'Poppins';
    $wp_customize->get_setting( 'overlay-primary-color' )->default = '#663c01';
    $wp_customize->get_setting( 'overlay-secondary-color' )->default = '#441c00';
    // Blog Settings
    $wp_customize->get_setting( 'overlay-blog-layout' )->default = 'overlay-blog-fw';
    $wp_customize->get_setting( 'overlay-blog-list-layout' )->default = 'overlay-blog-tile';
    $wp_customize->get_setting( 'overlay-blog-top-center' )->default = 1;
    $wp_customize->get_setting( 'overlay-blog-tile-anim' )->default = 'overlay-tile-grow';
    // Footer Settings
    $wp_customize->get_setting( 'overlay-footer-layout' )->default = 'footer-social-two';
}
add_action( 'customize_controls_init', 'overlaychild_grid_load_customizer_settings' );
add_action( 'customize_preview_init', 'overlaychild_grid_load_customizer_settings' );
