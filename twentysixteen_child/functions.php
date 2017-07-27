<?php
/**
 * Custom Child Theme Functions
 *
 * This file's parent directory can be moved to the wp-content/themes directory 
 * to allow this Child theme to be activated in the Appearance - Themes section of the WP-Admin.
 *
 * Included is a basic theme setup that will add the reponsive stylesheet. 
 *
 * More ideas can be found in the community documentation
 * @link http://docs.com
 *
 * @package twentysixteen_child
 * @subpackage ThemeInit
 */

// add parent style

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

// add font family url

add_filter( 'twentysixteen_fonts_url', 'twentysixteen_child_fonts_url' );

function twentysixteen_child_fonts_url(){
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Open Sans';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}