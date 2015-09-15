<?php
/**
 * Template Name: Labels & MSDS
 *
 */




//* Enqueue json scripts
add_action( 'wp_enqueue_scripts', 'get_json_data' );
function get_json_data() {

	wp_enqueue_script( 'json-ajax', '/wp-content/themes/genesis-sample/assets/js/get-json-plunkett.js', array(), CHILD_THEME_VERSION );
}

genesis();