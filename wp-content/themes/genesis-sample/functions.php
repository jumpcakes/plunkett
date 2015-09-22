<?php


//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.1.2' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {

	wp_enqueue_script( 'bower-jquery', '/wp-content/themes/genesis-sample/assets/js/bower_components/jquery/dist/jquery.min.js', array(), CHILD_THEME_VERSION );
}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

add_filter( 'genesis_breadcrumb_args', 'sp_breadcrumb_args' );
function sp_breadcrumb_args( $args ) {
	$args['sep'] = '<img src="'.get_stylesheet_directory_uri().'/assets/css/images/bug-breadcrumb.jpg">';
	$args['labels']['prefix'] = '';
return $args;
}


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



//* Remove Title from Homepage
add_action( 'get_header', 'remove_titles_from_pages' );
function remove_titles_from_pages() {
    if ( is_page(array(home) ) ) {
        remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
    }
}




//* Remove the site footer
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

//* Customize the site footer
add_action( 'genesis_footer', 'bg_custom_footer' );
function bg_custom_footer() { ?>

	<div class="site-footer">
		<div class="wrap">		
			<ul class="social-footer">
				<li><a href="https://www.facebook.com/pages/Plunketts-Pest-Control/173200970941" target="_blank"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://twitter.com/plunkettspest" target="_blank"><i class="fa fa-twitter"></i></a></li>
				<li><a href="https://twitter.com/plunkettspest" target="_blank"><i class="fa fa-google-plus"></i></a></li>
			</ul>	
			<p class="copyright-text">Copyright 2015. All Rights Reserved.</p>
		</div>
	</div>

<?php
}


// Add Edit Featured Image Size
add_image_size( 'blog-sidebar-thumbnails', 280, 170 );

function custom_excerpt($text) {  // custom 'read more' link
   if (strpos($text, '[...]')) {
      $excerpt = strip_tags(str_replace('[...]', '... <a href="'.get_permalink().'">read more...</a>', $text), "<a>");
   } else {
      $excerpt = '<p>' . $text . '&nbsp;&nbsp;<a href="'.get_permalink().'">read more...</a></p>';
   }
   return $excerpt;
}
add_filter('the_excerpt', 'custom_excerpt');



// Add CTA Shortcode
function gruen_cta_shortcode() {
	
	$cta = '<a href="#" target="_blank" class="cta-quote-btn">';
	$cta .= '<div class="cta-shortcode" role="alert">';
	$cta .= '<i class="fa fa-envelope"></i>';
	$cta .= '<h2>Request a Quote</h2>';
	$cta .= '</div>';
	$cta .= '</a>';
	return $cta;
	
};
add_shortcode( 'cta', 'gruen_cta_shortcode' );

//repsonsive menu
add_filter('genesis_header','responsive_menu',9);
function responsive_menu() {
	?>
	<div class="mobile-logo">

	</div>
	<div class="toggle-container">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</div>
	<div class="mobile-number">
		800-434-6117
	</div>

	<?php
}

add_action('genesis_before_content','mobile_after_nav');
function mobile_after_nav() {
	?>
	<div class="mobile-after-nav">
		<div class="mobile-request-quote">
			<?php echo do_shortcode('[cta]'); ?>
		</div>
	</div>
	<?php
}



