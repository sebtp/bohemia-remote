<?php

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

add_filter('post_gallery','customFormatGallery',10,2);



function customFormatGallery($string,$attr){



    $output = "<section class=\"gallery\">";

    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment'));

    foreach($posts as $imagePost){

        $output .= "<img src='".wp_get_attachment_image_src($imagePost->ID, 'full')[0]."'>";

    }

    $output .= "</section>";



    return $output;

}



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

    return 'class="load-more-button"';

}

?>