<?php
/**
 * 
 * this file is designed to provide specific functions for the child theme
 *
 * @package    clea-base
 * @subpackage Functions
 * @version    1.0.0
 * @since      0.1.0
 * @author     Anne-Laure Delpech <ald.kerity@gmail.com>  
 * @copyright  Copyright (c) 2015 Anne-Laure Delpech
 * @link       
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* load functions for HMS testimonial display */
 require_once( get_stylesheet_directory() . '/ac-testimonials-functions.php' );
 
/* Register and load scripts. */
add_action( 'wp_enqueue_scripts', 'clea_atout_c_enqueue_scripts' );

/* Register and load styles. */
add_action( 'wp_enqueue_scripts', 'clea_atout_c_enqueue_styles', 4 ); 

/* add parent page slug to body_class */
add_filter('body_class','dbdb_body_classes');

/* Register and load scripts for tests homepages. */
/* add_action( 'wp_enqueue_scripts', 'clea_atout_c_tests_script' ); */

/* Register and load styles for tests homepages. */
add_action( 'wp_enqueue_scripts', 'clea_atout_c_tests_style', 4 );

/* register new menus */
add_action( 'init', 'clea_atout_c_register_my_menu' );

/* add custom colors to the editor */
add_filter('tiny_mce_before_init', 'clea_atout_c_mce4_options');

/* add-on for contact form 7 */
add_action( 'wp_enqueue_scripts', 'clea_atout_c_add_on_contact_form_7' );
 
function clea_atout_c_enqueue_styles() {

	wp_enqueue_style( 'print', get_stylesheet_directory_uri() . '/css/print.css', array(), false, 'print' );

	if ( is_page_template( 'page/ac-test1-template.php' )  ) { 
		wp_enqueue_style( 'parent-home-test', get_stylesheet_directory_uri() . '/css/home-test-parent.css' );
	}


	if ( is_page_template( 'page/ac-front-page-template.php' ) ) {
		wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' , array( '25px' ) );
	}
}
	
function clea_atout_c_enqueue_scripts() {

	/* Enqueue the 'flexslider' script. */
	if ( is_page_template( 'page/ac-front-page-template.php' ) ) {
		wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/flexslider/flexslider.min.js' , array( 'jquery' ), '20120713', true );
	}
}

function clea_atout_c_tests_style() {
	global $post ;
	if ( is_page_template( 'page/ac-front-page-template.php' ) ) {
		wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' , array( '25px' ) );
	}
}

/*
function clea_atout_c_tests_script() {
	global $post ;
	if ( $post->post_parent == '892' ) {
		wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/flexslider/flexslider.min.js' , array( 'jquery' ), '20120713', true );
	}
}
*/

/**
 * Custom class for the WP 'body_class()' function
 * updated: 4/15/10
 */
function dbdb_body_classes($classes) {
    // source http://darrinb.com/notes/2010/customizing-the-wordpress-body_class-function/
	
	global $post;
	global $wp_query;
    
    // if there is no parent ID and it's not a single post page, category page, or 404 page, give it
    // a class of "parent-page"
    if( $post->post_parent < 1  && !is_single() && !is_archive() && !is_404() ) {
        $classes[] = 'parent-page';
    };
    
    // if the page/post has a parent, it's a child, give it a class of its parent name
    if( $post->post_parent > 0 ) {
        /* $parent_title = get_the_title($wp_query->post->post_parent);
        $parent_title = preg_replace('#\s#','-', $parent_title);
        $parent_title = strtolower($parent_title);
        $classes[] = 'parent-pagename-'.$parent_title; */
		$parent_id = wp_get_post_parent_id( $wp_query->post );
		// $parent_id = get_the_ID($wp_query->post->post_parent);
		echo "PARENT ID : " . $parent_id ;
        // $parent_id = preg_replace('#\s#','-', $parent_id);
        $parent_id = strtolower($parent_id);
        $classes[] = 'parent-id-'. $parent_id;
    };
    
    // add a class = to the name of post or page
    $classes[] = $wp_query->queried_object->post_name;
    
    return array_unique($classes);
};

function clea_atout_c_register_my_menu() {
register_nav_menu('menu-test1',__( 'Menu Test 1' ));
}

/* color picker for the editor  */
function clea_atout_c_mce4_options($init) {

	$default_colours = '
		 "000000", "Black",
		 "993300", "Burnt orange",
		 "333300", "Dark olive",
		 "003300", "Dark green",
		 "003366", "Dark azure",
		 "000080", "Navy Blue",
		 "333399", "Indigo",
		 "333333", "Very dark gray",
		 "800000", "Maroon",
		 "FF6600", "Orange",
		 "808000", "Olive",
		 "008000", "Green",
		 "008080", "Teal",
		 "0000FF", "Blue",
		 "666699", "Grayish blue",
		 "808080", "Gray",
		 "FF0000", "Red",
		 "FF9900", "Amber",
		 "99CC00", "Yellow green",
		 "339966", "Sea green",
		 "33CCCC", "Turquoise",
		 "3366FF", "Royal blue",
		 "800080", "Purple",
		 "999999", "Medium gray",
		 "FF00FF", "Magenta",
		 "FFCC00", "Gold",
		 "FFFF00", "Yellow",
		 "00FF00", "Lime",
		 "00FFFF", "Aqua",
		 "00CCFF", "Sky blue",
		 "993366", "Brown",
		 "C0C0C0", "Silver",
		 "FF99CC", "Pink",
		 "FFCC99", "Peach",
		 "FFFF99", "Light yellow",
		 "CCFFCC", "Pale green",
		 "CCFFFF", "Pale cyan",
		 "99CCFF", "Light sky blue",
		 "CC99FF", "Plum",
		 "FFFFFF", "White"
	 ';

	$custom_colours =  '
		"bc101a", "Rouge AC",
		"555", "Gris foncé AC"
	';

	// build colour grid default+custom colors
	$init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';

	// enable 6th row for custom colours in grid
	$init['textcolor_rows'] = 6;

	return $init;
}

function clea_atout_c_add_on_contact_form_7() {

		// disable load js and load css for wpcf7
		add_filter( 'wpcf7_load_js', '__return_false' );
		add_filter( 'wpcf7_load_css', '__return_false' );
		
		
		// enable cf7 js and css on specific pages
		// wpcf7_enqueue_scripts() and wpcf7_enqueue_styles() must be called before wp_head()
				// only on the contact form page
		
		if ( is_page( 'contactez-nous' ) ){
			
			if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
				wpcf7_enqueue_scripts();
			}
		 
			if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
				wpcf7_enqueue_styles();
			}
			
			if ( function_exists( 'wpcf7_support_html5_fallback' ) ) {
				add_filter( 'wpcf7_support_html5_fallback', '__return_true' );
			}
			
		} 	
		

}


?>