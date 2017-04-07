<?php /* Template Name: Clients*/ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- 	The hero image. echo the url instead of: http://lorempixel.com/1920/1080-->
		<div class="hero container-full" style="background-image: url(<?php echo the_post_thumbnail_url( 'full' ); ?>)">
			<div class="row middle-xs">
				<div class="col-xs col-sm-11 col-md-9 col-md-offset-1">
					<div class="row">
						<h1 class="col-xs">
							<?php the_title(); ?>
						</h1>
					</div>
					<div class="row">
						<div class="white-bg col-xs col-sm-7 col-lg-6 col-xlg-5">
							<?php the_content(); ?>
						</div>
					</div>											
				</div>
			</div>
			<div class="row">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 4" class="svg-single">
					<polygon style="fill:#fff" points="36 0 0 4 36 4 36 0"/>
				</svg>
			</div>			
		</div>

<!-- 	The main content -->
		<main class="container-fluid">
			<div class="row center-xs">
				<?php
					$temp_query = $wp_query;  // store it
					$args = array(
					'post_type' => 'clients',
					'posts_per_page' => 500
					);
					$wp_query = new WP_Query($args);
					while ($wp_query->have_posts()) : $wp_query->the_post();
						$figm = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
						$clientlink = get_the_permalink();
						$clientid = get_the_ID();
						$countwork = 0;
						global $post; // required
						$args = array('post_type' => 'work', 'posts_per_page' => 300);
						$custom_posts = get_posts($args);
						$items = array();
						foreach($custom_posts as $post) : setup_postdata($post);
							$client2 = get_field('client_name');
							if ($clientid == $client2[0] ){
								$countwork += 1;
								$items[] = $post->ID;
							}
						endforeach;
						wp_reset_postdata();
						if ($countwork == 0){
				?>
				<div class="col-xs-6 col-sm-4 col-lg-3 translucent"><img src="<?php echo $figm[0]; ?>" alt="<?php the_title(); ?>"></div>	
				<?php
						} else if ($countwork == 1){
				?>
				<div class="col-xs-6 col-sm-4 col-lg-3"><a href="<?php echo get_permalink( $items[0] ) ?>"><img src="<?php echo $figm[0]; ?>" alt="<?php the_title(); ?>"></a></div>
				<?php } else if ($countwork >= 2) { ?>
				<div class="col-xs-6 col-sm-4 col-lg-3"><a href="<?php echo $clientlink; ?>"><img src="<?php echo $figm[0]; ?>" alt="<?php the_title(); ?>"></a></div>			
				<?php
					wp_reset_postdata(); } endwhile;
					if (isset($wp_query)) {$wp_query = $temp_query;} // restore loop
				?>
			</div>
		</main>
		<div class="tree">
			<img src="<?php bloginfo('template_directory');?>/img/tree.jpg" alt="">
		</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>