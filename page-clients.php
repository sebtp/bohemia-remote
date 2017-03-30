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
		<main class="container-full work-bg">
			<?php
					$work_args = array(
						'post_type' => 'work',
						'posts_per_page' => 8
					);
					$work_query = new WP_Query( $work_args );
				?>
				<?php if( $work_query->have_posts() ): ?>
			<div class="row" id="show-posts">
				
				<?php while( $work_query->have_posts() ) : $work_query->the_post(); ?>
				<?php 
					$figm = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
				?>
				<a href="<?php the_permalink(); ?>" class="col-xs-12 col-md-6 post-item">
					<img src="<?php echo $figm[0]; ?>" alt="<?php the_title(); ?>">	
					<div class="row post-item-inner">
						<div class="col-xs-11">
							<h2 class="col-xs" ><?php the_title(); ?></h2>
							<div class="tags col-xs-9">
								    <?php
									   $posttags = get_the_tags();
									   if ($posttags) {
										  echo '<ul>'; 
										  foreach($posttags as $tag) {
											echo '<li>&#35;' . $tag->name . '</li>'; 
										  }
										  echo '</ul>';
									   }
									?>
							</div>
							<div class="client col-xs-9">
								<?php 
									$client = get_field('client_name');
									if( $client ): 
									foreach( $client as $client ):
										echo get_the_title( $client->ID );
									endforeach;
									endif; 
								?>
							</div>
						</div>
					</div>
				</a>
				<?php endwhile; ?>
    		    				
			</div>
			<div class="row center-xs">
				<div class="col-xs" id="load-more">
					<?php load_more_button(); ?>
				</div>
			</div>
			<?php endif; ?>
		    <?php wp_reset_query(); ?>	
			<div class="tree">
				<img src="<?php bloginfo('template_directory');?>/img/tree.jpg" alt="">
			</div>
		</main>

<?php endwhile; endif; ?>
<?php get_footer(); ?>