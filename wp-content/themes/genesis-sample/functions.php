<?php

update_option('siteurl','http://localhost/genesis/');
update_option('home','http://localhost/genesis/');

//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.1.2' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );
	wp_enqueue_script( 'bower-jquery', get_stylesheet_directory() . '/bower_components/jquery/dist/jquery.min.js', array(), CHILD_THEME_VERSION );
}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );




add_filter('stylesheet_uri','wpi_stylesheet_uri',10,2);

function wpi_stylesheet_uri($stylesheet_uri, $stylesheet_dir_uri){

    return get_stylesheet_directory_uri().'/assets/css/style.css';
}

add_filter( 'genesis_search_text', 'sp_search_text' );
function sp_search_text( $text ) {
       return esc_attr( 'Search Plunkett\'s Pest Control' );

}
add_filter( 'genesis_search_button_text', 'sp_search_button_text' );
function sp_search_button_text( $text ) {
       return esc_attr( 'Go' );
}



