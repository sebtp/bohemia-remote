<?php /* Template Name: Homepage */ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
Homepage

<?php endwhile; endif; ?>
<?php get_footer(); ?>
