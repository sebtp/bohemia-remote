<?php /* Template Name: Clients*/ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- 	The hero image. echo the url instead of: http://lorempixel.com/1920/1080-->
		<div class="hero container-full" style="background-image: url(<?php echo the_post_thumbnail_url( 'full' ); ?>)">
			<div class="row">
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
					'post_type' => 'clients'
					);
					$wp_query = new WP_Query($args);
					while ($wp_query->have_posts()) : $wp_query->the_post();
						$figm = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
						$clientid = get_the_ID();
						$countwork = 0;
						global $post;
						$my_query = get_posts('numberposts=100&post_type=work');
						foreach($my_query as $post) :
        					setup_postdata($post);
							$client = get_field('client_name');
							if ($client[0] == $clientid){
								$countwork += 1;
							}
						endforeach;
						wp_reset_postdata();
						the_title();
						echo $countwork . '<br>';
					endwhile;
					if (isset($wp_query)) {$wp_query = $temp_query;} // restore loop
				

				?>

								<?php global $post;
    $my_query = get_posts('numberposts=100&cat=XX');
  // numberposts is required with get_posts so I just set it to a large number
    foreach($my_query as $post) :
        setup_postdata($post);
        $link = get_post_meta($post->ID, 'site-url', true); ?>
        <li><a href="<php echo $link; ?>"><?php the_title(); ?></a></li>
<?php endforeach; ?>	
				
			</div>
		</main>

<?php endwhile; endif; ?>
<?php get_footer(); ?>