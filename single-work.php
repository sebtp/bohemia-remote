<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<!-- 	The hero image. echo the url at PHPHERE-->
		<div class="hero" style="
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>');
			background-size: cover;
			-o-background-size: cover;
			-moz-background-size: cover;
			-webkit-background-size: cover;
			background-position:center;
			-webkit-clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
  			clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);">
  		</div>
  		
<!-- 	The main content -->
		<main class="container-fluid">
			<div class="clearfix row">
				<article> 
					
				<!-- Header -->
					<header class="col-md-offset-1 col-md-7">
						<h1><?php the_title(); ?></h1>
						<div class="meta">
							<?php 
								$client = get_field('client_name');
								$countclients = 0;
								$work_args = array(
									'post_type' => 'work',
								);
								$work_query = new WP_Query( $work_args );
								if( $work_query->have_posts() ):
								while( $work_query->have_posts() ) : $work_query->the_post();
									$client2 = get_field('client_name');
									if ($client[0] == $client2[0] ){
										$countclients += 1;
									}
								?>
							<?php endwhile; endif; ?>
							<?php wp_reset_query();?>
								<?php 
									if($countclients >=2){
								?>
								<?php
									foreach( $client as $post ):
									setup_postdata($post);
								?>
								<a href="<?php echo get_permalink( $client->ID ); ?>" class="client"><?php echo get_the_title( $client->ID ); ?></a>
								<?	
									endforeach;
									wp_reset_postdata();	  
								?>
								<?php } else { ?>
									<span class="client">
									<?php
										foreach( $client as $post ):
										setup_postdata($post);
										the_title();
										endforeach;
										wp_reset_postdata();	  
									?>
									</span>
								<?php } ?>
							<time class="year"><?php the_field('year'); ?></time>
						</div>
					</header>

				<!-- Intro -->
					<section class="col-md-offset-1 col-md-7">
						<?php the_field('intro_text'); ?>
					</section>

				<!-- Content -->
					<section class="content col-xs-12">
						<?php the_content(); ?>
					</section>							

				<!-- Content Footer -->
					<?php echo get_the_term_list( $post->ID, 'label', '<footer><li>&#35;', '</li><li>&#35;', '</li></footer>' ); ?>
				</article>
			
				
		<!-- 	Sidebar -->

				<aside class="col-md-4">
					<h4>aside</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor. Etiam ullamcorper lorem dapibus velit suscipit ultrices.</p>
				</aside>


			</div>
		</main>
		
<!-- 	Prev/Next -->
		<section class="container-full work-bg">
			<div class="row">
				<?php
				$prev_post = get_previous_post();
				if (!empty( $prev_post )): ?>
				<?php 
				$prevpostid = $prev_post->ID;
				$previmg = wp_get_attachment_image_src( get_post_thumbnail_id($prevpostid), 'full');
				$prevclient = get_field('client_name', $prevpostid);
				?>
				<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="col-xs-12 col-md-6 post-item">
					<img src="<?php echo $previmg[0]; ?>" alt="<?php echo $prev_post->post_title; ?>">	
					<div class="row post-item-inner">
						<div class="col-xs-12">
							<h3 class="col-xs"><?php echo $prev_post->post_title; ?></h3>
							<div class="tags col-xs-9">
								<?php
									$terms = wp_get_object_terms( $prev_post->ID, 'label' );
									echo '<ul>';
									foreach( $terms as $term ):
										echo '<li>&#35;' . $term->name . '</li>';
									endforeach;
									echo '</ul>';
								?>
							</div>
							<div class="client col-xs-9">
							<?php 
								foreach( $prevclient as $post ):
									setup_postdata($post);
									the_title();
								endforeach;
								wp_reset_postdata();
							?>
							</div>
						</div>
					</div>
				</a>
				<?php endif; ?>					
				<?php
				$next_post = get_next_post();
				if (!empty( $next_post )): ?>
				<?php 
				$nextpostid = $next_post->ID;
				$nextimg = wp_get_attachment_image_src( get_post_thumbnail_id($nextpostid), 'full');
				$nextclient = get_field('client_name', $nextpostid);
				?>
				<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="col-xs-12 col-md-6 post-item">
					<img src="<?php echo $nextimg[0]; ?>" alt="<?php echo $next_post->post_title; ?>">	
					<div class="row post-item-inner">
						<div class="col-xs-12">
							<h3 class="col-xs"><?php echo $next_post->post_title; ?></h3>
							<div class="tags col-xs-9">
								<?php
									$terms = wp_get_object_terms( $next_post->ID, 'label' );
									echo '<ul>';
									foreach( $terms as $term ):
										echo '<li>&#35;' . $term->name . '</li>';
									endforeach;
									echo '</ul>';
								?>
							</div>
							<div class="client col-xs-9">
							<?php 
								foreach( $nextclient as $post ):
									setup_postdata($post);
									the_title();
								endforeach;
								wp_reset_postdata();
							?>
							</div>
						</div>
					</div>
				</a>
				<?php endif; ?>
			</div>
			<div class="tree">
				<img src="<?php bloginfo('template_directory');?>/img/tree.jpg" alt="">
			</div>
		</section> 

<?php endwhile; else : ?>
	<?php _e( 'Damn. Something went wrong. Maybe hit refresh?' ); ?>
<?php endif; ?>
<?php get_footer(); ?>