<?php /* Template Name: About*/ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- 	The hero image. echo the url instead of: http://lorempixel.com/1920/1080-->
		<div class="hero container-full" style="background-image: url(<?php echo the_post_thumbnail_url( 'full' ); ?>);">
			<div class="row middle-xs">
				<div class="col-xs col-sm-6 col-md-5 col-md-offset-1 col-lg-4">
					<h1><?php the_title(); ?></h1>
					<div class="white-bg"><?php the_content(); ?></div>
				</div>
			</div>
		</div>

<!-- 	The main content -->
		<main class="container-full work-bg">
			<?php
					$tm_args = array(
						'post_type' => 'team_members',
						'posts_per_page' => 100
					);
					$tm_query = new WP_Query( $tm_args );
				?>
				<?php if( $tm_query->have_posts() ): ?>
			<div class="row" id="show-posts">
				
				<?php while( $tm_query->have_posts() ) : $tm_query->the_post(); ?>
				<?php 
					$figm = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
				?>
				<a href="<?php the_permalink(); ?>" class="col-xs-12 col-md-6 post-item">
					<span></span>
					<img src="<?php echo $figm[0]; ?>" alt="<?php the_title(); ?>">	
					<div class="row post-item-inner">
						<div class="col-xs col-sm-11">
							<h3><?php the_title(); ?></h3>
							<div class="quote">
								<?php if( get_field('quote') ): ?>
									&ldquo;<?php the_field('quote'); ?>&rdquo;
								<?php endif; ?>
							</div>
							<div class="position"><?php the_field('job_title'); ?></div>
						</div>
					</div>
				</a>
				<?php endwhile; ?>
    		    				
			</div>
			<?php endif; ?>
		    <?php wp_reset_query(); ?>	
			<div class="tree">
				<img src="<?php bloginfo('template_directory');?>/img/tree.jpg" alt="">
			</div>
		</main>

<?php endwhile; endif; ?>
<?php get_footer(); ?>