<?php get_header(); ?>

<?php 
	$posts_page = get_option( 'page_for_posts' );
	$posts_title = get_the_title($posts_page);
	$posts_page_img = wp_get_attachment_image_src( get_post_thumbnail_id( $posts_page), 'full'); 
	$posts_page_txt = get_field('intro_text', $posts_page);
	$thispost = get_the_ID();
	$thispostlink = get_permalink( $thispost );
?>

<!-- 	The hero image. -->
		
		<div class="hero container-full" style="background-image: url(<?php echo $posts_page_img[0]; ?>)">
			<div class="row middle-xs">
				<div class="col-xs col-sm-11 col-md-9 col-md-offset-1">
					<div class="row">
						<h1 class="col-xs">
							<?php echo $posts_title; ?>
						</h1>
					</div>
					<div class="row">
						<div class="white-bg col-xs-12 col-sm-7 col-lg-6 col-xlg-5">
							<?php echo $posts_page_txt; ?>
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
		<main class="container-full">
			<div class="row" id="show-posts">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php $figm = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
				<a href="<?php the_permalink(); ?>" class="col-xs-12 col-md-6 post-item">
					<span></span>
					<img src="<?php echo $figm[0]; ?>" alt="<?php the_title(); ?>">						
					<div class="row post-item-inner">
						<div class="col-xs-12">
						
							<div class="row">
								<h2 class="col-xs-12 col-xlg-11 col-xxlg-10 col-xxxlg-9"><?php the_field('big_title'); ?></h2>
							</div>
							
							<div class="row">
								<div class="tags col-xs-12 col-xxxlg-9">
									<?php
									   $posttags = get_the_tags();
									   if ($posttags) {
										  echo '<ul>'; 
										  foreach($posttags as $tag) {
											echo '<li>' . $tag->name . '</li>'; 
										  }
										  echo '</ul>';
									   }
									?>
								</div>
							</div>
							
							<div class="row">
								<?php
									$authorid = get_field('blog_author');
								?>
								<?php if( $authorid ): ?>
								<?php foreach( $authorid as $authorid ): ?>
								<?php $authorimg = wp_get_attachment_image_src( get_post_thumbnail_id( $authorid->ID), 'thumbnail'); ?>
								<div class="author col-xs-12 col-xxxlg-9">
									<div class="author-wrapper row middle-xs">
										<img src="<?php echo $authorimg[0]; ?>" alt="<?php echo get_the_title( $authorid->ID ); ?>">			
										<div class="author-inner">
											<div class="row"><?php echo get_the_title( $authorid->ID ); ?></div>
											<div class="row">
												<?php
													if ( get_field( 'gast_author', $authorid->ID ) ):
														if(strpos($thispostlink,'nl')>0)
														{
															echo 'Gast';
														} else {
															echo 'Guest';
														}
													endif;
												?>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
								<?php endif; ?>
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
			<div class="tree">
				<img src="<?php bloginfo('template_directory');?>/img/tree.jpg" alt="">
			</div>
		</main>
<?php get_footer(); ?>