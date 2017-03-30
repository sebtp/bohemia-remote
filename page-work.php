<?php /* Template Name: Work*/ ?>
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
					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
					$work_args = array(
						'post_type' => 'work',
						'posts_per_page' => 2,
						'paged' => $paged
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
									$terms = wp_get_object_terms( $post->ID, 'label' );
									echo '<ul>';
									foreach( $terms as $term ):
										echo '<li>&#35;' . $term->name . '</li>';
									endforeach;
									echo '</ul>';
								?>
							</div>
							<div class="client col-xs-9">
								<?php 
									$clients = get_field('client_name');
									foreach( $clients as $post ):
										setup_postdata($post);
										the_title();
									endforeach;
									wp_reset_postdata();
								?>
							</div>
						</div>
					</div>
				</a>
				<?php endwhile; ?>
			</div>
			<div class="row center-xs">
				<div class="col-xs" id="load-more">
					<?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>

						  <?php echo get_previous_posts_link( 'Previous Page' ); ?>

					<?php } ?>
					<!--<button class="outline-white"></button>-->
				</div>
			</div>
			<?php endif; ?>
		    <?php /*wp_reset_postdata();*/ ?>
			<div class="tree">
				<img src="<?php bloginfo('template_directory');?>/img/tree.jpg" alt="">
			</div>
		</main>

<?php endwhile; endif; ?>
<?php get_footer(); ?>