<?php /* Template Name: Clients*/ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



<!-- 	The hero image. echo the url instead of: http://lorempixel.com/1920/1080-->

		<div class="hero container-full" style="background-image: url(<?php echo the_post_thumbnail_url( 'full' ); ?>)">

			<div class="row middle-xs">

				<div class="col-xs col-sm-6 col-md-5 col-md-offset-1 col-lg-4">

					<h1><?php the_title(); ?></h1>

					<div class="white-bg"><?php the_content(); ?></div>

				</div>

			</div>

		</div>



<!-- 	The main content -->

		<main class="container-fluid">

			<div class="row center-xs">

				<?php

					$temp_query = $wp_query;  // store it

					$args = array(

					'post_type' => 'clients',

					'posts_per_page' => 200

					);

					$wp_query = new WP_Query($args);

					while ($wp_query->have_posts()) : $wp_query->the_post();

						$figm = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');

						$clientlink = get_the_permalink();

						$clientid = get_the_ID();

						$countwork = 0;

						global $post; // required

						$args = array('post_type' => 'work'); // exclude category 9

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

				<?php } else { ?>

				<div class="col-xs-6 col-sm-4 col-lg-3"><a href="<?php echo $clientlink; ?>"><img src="<?php echo $figm[0]; ?>" alt="<?php the_title(); ?>"></a></div>			

				<?php

								}

					endwhile;

					if (isset($wp_query)) {$wp_query = $temp_query;} // restore loop

				



				?>







				

			</div>

		</main>



<?php endwhile; endif; ?>

<?php get_footer(); ?>