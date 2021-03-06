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

/***************************contact form******************************/
// function add_contact_form_shortcode( $atts) {
// if (isset($_REQUEST['email']) && $_REQUEST['email'] != '' )  {
                
//                 $admin_email = "a3k.11051991@gmail.com";
//                 $name = $_REQUEST['name'];
//                 $email = $_REQUEST['email'];
//                 $message = $_REQUEST['msg'];
//                 $subject = "GainStarts";
                
//                 $headers  = 'MIME-Version: 1.0' . "\r\n";
//                 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//                 $headers .= "From: $email" . "\r\n";
                

//                 $comment = '<html><body>';
//                 $comment .= '<table rules="all" style="border:1px solid #666;" cellpadding="10">';
//                 $comment .= "<tr><td style='background: #eee;'><strong>First Name</strong> </td><td>" .$_REQUEST['name']. "</td></tr>";
//                 $comment .= "<tr><td style='background: #eee;'><strong>Email number</strong> </td><td>" .$_REQUEST['email']. "</td></tr>";
//                 $comment .= "<tr><td style='background: #eee;'><strong>Messsage</strong> </td><td>" .$_REQUEST['msg']. "</td></tr>";
//                 $comment .= "</table>";
//                 $comment .= "</body></html>";
                
//                 //establish connection
// 								$con = mysqli_connect("localhost","gain5_wp1","E.lcb[u074R]Ub*szf.11[(2')","gains_db_wp1"); 
// 								//on connection failure, throw an error
// 								if(!$con) {  
// 								die('Could not connect: '.mysql_error()); 
// 								} 
// 								$sql = "INSERT INTO `gains_db_wp1`.`messages` ( `name` , `email`, `message` ) VALUES ( '$name','$email','$message')"; 
// 								mysqli_query($con,$sql); 

//                 mail($admin_email, $subject, $comment, $headers);
                
//                 echo "<p><span class='glyphicon glyphicon-thumbs-up'></span> <strong>Thank you for contacting us!</strong></p>";
//                 }              
// }
// add_shortcode( 'contact_form', 'add_contact_form_shortcode' );


remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );