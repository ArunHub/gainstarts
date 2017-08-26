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

/*******************************************add parent style **************************/

add_action( 'wp_enqueue_scripts', 'twentysixteen_child_scripts' );

function twentysixteen_child_scripts()
{
	wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );

	wp_enqueue_script( 'twentysixteen-script', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollToFixed/1.0.8/jquery-scrolltofixed-min.js', array( 'jquery' ), '20160816', true );
	
	// added extra ie9 css classes
	wp_enqueue_style( 'twentysixteen-ie', get_stylesheet_directory_uri() . '/css/ie.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie', 'conditional', 'lt IE 10' );
}

/*******************************************add font family url **************************/ 

function twentysixteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'off', 'Merriweather font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

		/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Open Sans:300,400,600,700';
	}

	if ( 'off' !== _x( 'on', 'Patua One: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Patua One';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/***************************upload svg like security restricted function ******************************/
function custom_upload_mimes( $existing_mimes=array() ) {
	// add svg to the list of mime types
	$existing_mimes['svg'] = 'image/svg';

	// return the array back to the function with our added mime type
	return $existing_mimes;
}
add_filter( 'upload_mimes', 'custom_upload_mimes' );

/***************************display content for registered users******************************/
function show_reg_users_shortcode( $atts, $content = null ) {
	if ( is_user_logged_in() ) {
	  return do_shortcode($content);
	} else {
	  return 'Welcome, visitor! Please login to view the content'.'<a href="http://localhost/veltrade/wp-login.php">Log in</a>';
	};
}
add_shortcode( 'show_users', 'show_reg_users_shortcode' );


remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );