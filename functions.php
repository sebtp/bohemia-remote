<?php
//Load CSS and scripts
function theme_styles() { 
	wp_enqueue_style( 'theme-styles', get_template_directory_uri() . '/style.css', array(), false, 'all' );
	wp_enqueue_script( 'isotope-layout', 'https://unpkg.com/isotope-layout@3.0.3/dist/isotope.pkgd.min.js', array('jquery'), '3.0.3', true );
	wp_enqueue_script( 'imagesloaded', 'https://unpkg.com/imagesloaded@4.1.1/imagesloaded.pkgd.min.js', array('jquery'), '4.1.1', true );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/main.js', array ( 'jquery' ), true);
	wp_enqueue_script( 'rellax', get_template_directory_uri() . '/js/rellax.min.js', true); 
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

add_theme_support('post-thumbnails');
add_theme_support( 'menus' );

function wpb_custom_new_menu() {
  register_nav_menu('my-custom-menu',__( 'Main site navigation' ));
}
add_action( 'init', 'wpb_custom_new_menu' );

function my_nav_wrap() {
  $thispost = get_the_ID();
  $thispostlink = get_permalink( $thispost );
			if(strpos($thispostlink,'nl')>0)
			{
				$thislanguage = 'Nederlands';
				$thatlanguage = 'English';
			} else {
				$thislanguage = 'English';
				$thatlanguage = 'Nederlands';
			}
			$thatpostlink = get_field('language_switch', $thispost);
  // default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
  // open the <ul>, set 'menu_class' and 'menu_id' values
  $wrap  = '<ul id="%1$s" class="%2$s">';
  // get nav items as configured in /wp-admin/
  $wrap .= '%3$s';
  // the static link 
  if($thatpostlink != ''){
  	$wrap .= '<li class=""><a href="' . $thatpostlink .'">'. $thatlanguage . '</a></li>';
  } else if ($thislanguage == 'Nederlands'){
	$wrap .= '<li class=""><a href="https://bohemiaamsterdam.com/en">'. $thatlanguage . '</a></li>';  
  } else if ($thislanguage == 'English'){
	$wrap .= '<li class=""><a href="https://bohemiaamsterdam.com/nl">'. $thatlanguage . '</a></li>';  
  }
  // close the <ul>
  $wrap .= '</ul>';
  // return the result
  return $wrap;
}

// Images
function html5_insert_image( $html, $id, $caption, $title, $align, $url, $size, $alt ) {
  $src  = wp_get_attachment_image_src( $id, $size, false );
  $html5 = "<figure>";
  if ( $url ) {
    $html5 .= "<a href=\"$url\"><img src=\"$src[0]\" alt=\"$alt\" /></a>";
  } else {
    $html5 .= "<img src=\"$src[0]\" alt=\"$alt\" />";
  }
  if ( $caption ) {
    $html5 .= "<figcaption>$caption</figcaption>";
  }
  $html5 .= "</figure>";
  return $html5;
}

add_filter( 'image_send_to_editor', 'html5_insert_image', 10, 9 );

// To check for the blog page
function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

// Gallery format
// Remove default gallery style
add_filter( 'use_default_gallery_style', '__return_false' );

// Allow SVG uploads
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// add classes to links for next and prev posts pagination
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="button-load-more"';
}

// Blockquote shortcode
function quote_showcase($atts) {
   extract(shortcode_atts(array(
      'imgid' => quote,
      'text' => quote,
	  'name' => quote,
	  'info' => quote
   ), $atts));
	$nameimg = wp_get_attachment_image_src( $imgid, 'thumbnail');
return '<blockquote class="col-lg-10"><div class="row">' . $text . '</div><div class="author-wrapper row middle-xs"><img src="' . $nameimg[0] . '" alt="' . $name . ' width="54" height="54"><div class="author-inner"><div class="row">' . $name . '</div><div class="row">' . $info . '</div></div></div></blockquote>';
}

add_shortcode('quote', 'quote_showcase');

// title tag
add_theme_support( 'title-tag' );

//speed up Contact form 7 by loading associated javascript files ONLY on the contact form itself.
add_action( 'wp_print_scripts', 'my_deregister_javascript', 100 );
function my_deregister_javascript() {
	if ( !is_front_page() && !is_page('Contact') ) {wp_deregister_script( 'contact-form-7' );}}
add_action( 'wp_print_styles', 'my_deregister_styles', 100 );
function my_deregister_styles() {
	if ( !is_front_page() && !is_page('Contact') ) {wp_deregister_style( 'contact-form-7' );}}

?>