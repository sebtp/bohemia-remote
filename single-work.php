<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<!-- 	The hero image. echo the url at PHPHERE-->
		<div class="hero" style="background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>');">
			<div class="svg-container">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 4" class="svg-single">
					<polygon style="fill:#fff" points="36 0 0 4 36 4 36 0"/>
				</svg>
			</div>
 		</div>
  		
<!-- 	The main content -->
		<main class="container-fluid">
			<div class="row relative">
				<article class="col-xs-12"> 
					
				<!-- Header -->
					<header class="col-xs col-sm-7 col-md-offset-1">
						<div class="row">
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="row">
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
						</div>
					</header>

				<!-- Intro -->
					<section class="intro col-xs col-sm-8 col-md-7 col-md-offset-1">
						<?php the_field('intro_text'); ?>
					</section>

				<!-- Content -->
					<section class="content">
						<?php the_content(); ?>
					</section>							

				<!-- Content Footer -->
					<?php echo get_the_term_list( $post->ID, 'label', '<footer class="tags col-xs"><div class="row"><ul><li>', '</li><li>', '</li></ul></div></footer>' ); ?>
				</article>
			
				
		<!-- 	Sidebar -->
			<?php get_sidebar(); ?>
		
			</div>
		</main>
		
<!-- 	Prev/Next -->
		<section class="container-full work-bg">
			<div class="row">
				<div class="svg-overview"></div>
			</div>
			<div class="row">
				<?php
				if( get_adjacent_post(false, '', false) ) {
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
						
							<div class="row">
								<h3 class="col-xs-12 col-xlg-11 col-xxlg-10 col-xxxlg-9"><?php echo $next_post->post_title; ?></h3>
							</div>
							
							<div class="row">
								<div class="tags col-xs-12 col-xxxlg-9">
									<?php
										$terms = wp_get_object_terms( $next_post->ID, 'label' );
										echo '<ul>';
										foreach( $terms as $term ):
											echo '<li>' . $term->name . '</li>';
										endforeach;
										echo '</ul>';
									?>
								</div>
							</div>
							
							<div class="row">
								<div class="client col-xs-12 col-xxxlg-9">
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
					</div>
				</a>
				<?php 
					endif; 
				} else {
					$last = new WP_Query('post_type=work&posts_per_page=1&order=DESC'); $last->the_post();
					$nextimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
					$nextclient = get_field('client_name');
				?>
				<a href="<?php echo get_permalink(); ?>" class="col-xs-12 col-md-6 post-item">
					<img src="<?php echo $nextimg[0]; ?>" alt="<?php the_title(); ?>">	
					<div class="row post-item-inner">
						<div class="col-xs-12">
							<div class="row">
								<h3 class="col-xs-12 col-xlg-11 col-xxlg-10 col-xxxlg-9"><?php the_title(); ?></h3>
							</div>
							
							<div class="row">
								<div class="tags col-xs-12 col-xxxlg-9">
									<?php
										$terms = wp_get_object_terms( $post->ID, 'label' );
										echo '<ul>';
										foreach( $terms as $term ):
											echo '<li>' . $term->name . '</li>';
										endforeach;
										echo '</ul>';
									?>
								</div>
							</div>
							
							<div class="row">
								<div class="client col-xs-12 col-xxxlg-9">
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
					</div>
				</a>
				<?php wp_reset_query(); } ?>
				<?php
				if( get_adjacent_post(false, '', true) ) { 
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
						
							<div class="row">
								<h3 class="col-xs-12 col-xlg-11 col-xxlg-10 col-xxxlg-9"><?php echo $prev_post->post_title; ?></h3>
							</div>
							
							<div class="row">
								<div class="tags col-xs-12 col-xxxlg-9">
									<?php
										$terms = wp_get_object_terms( $prev_post->ID, 'label' );
										echo '<ul>';
										foreach( $terms as $term ):
											echo '<li>' . $term->name . '</li>';
										endforeach;
										echo '</ul>';
									?>
								</div>
							</div>
							
							<div class="row">
								<div class="client col-xs-12 col-xxxlg-9">
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
					</div>
				</a>
				<?php 
					endif; 
				} else {
					$first = new WP_Query('post_type=work&posts_per_page=1&order=ASC'); $first->the_post();
					$previmg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
					$prevclient = get_field('client_name');
				?>
				<a href="<?php the_permalink(); ?>" class="col-xs-12 col-md-6 post-item">
					<img src="<?php echo $previmg[0]; ?>" alt="<?php the_title(); ?>">	
					<div class="row post-item-inner">
						<div class="col-xs-12">
						
							<div class="row">
								<h3 class="col-xs-12 col-xlg-11 col-xxlg-10 col-xxxlg-9"><?php the_title(); ?></h3>
							</div>
							
							<div class="row">
								<div class="tags col-xs-12 col-xxxlg-9">
									<?php
										$terms = wp_get_object_terms( $post->ID, 'label' );
										echo '<ul>';
										foreach( $terms as $term ):
											echo '<li>' . $term->name . '</li>';
										endforeach;
										echo '</ul>';
									?>
								</div>
							</div>
							
							<div class="row">
								<div class="client col-xs-12 col-xxxlg-9">
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
					</div>
				</a>
				<?php wp_reset_query(); } ?>				
				
			</div>
			<div class="tree">
				<img src="<?php bloginfo('template_directory');?>/img/tree.jpg" alt="">
			</div>
		</section> 

<?php endwhile; else : ?>
	<?php _e( 'Damn. Something went wrong. Maybe hit refresh?' ); ?>
<?php endif; ?>
<?php get_footer(); ?>