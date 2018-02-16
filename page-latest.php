<?php 
/*
Template Name: Redirect to Latest
*/

$args = array(
    'posts_per_page' => '1',
    'post_type' => 'work'
);
$post = get_posts($args);
if($post){
    $url = get_permalink($post[0]->ID);
    wp_redirect( $url, 301 ); 
    exit;
}
?>