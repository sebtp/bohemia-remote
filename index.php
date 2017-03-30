<?php get_header(); ?>

<?php 
	$posts_page = get_option( 'page_for_posts' );
	$posts_page_img = wp_get_attachment_image_src( get_post_thumbnail_id( $posts_page), 'full'); 
	$posts_page_txt = get_field('intro_text', $posts_page);
?>

<!-- 	The main content -->
		<main class="container-full">
			<div class="row">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php $figm = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
				<a href="<?php the_permalink(); ?>" class="col-xs-12 col-md-6 post-item">
					<span></span>
					<img src="<?php echo $figm[0]; ?>" alt="<?php the_title(); ?>">						
					<div class="row post-item-inner">
						<div class="col-xs col-sm-11">
							<h2><?php the_title(); ?></h2>
							<div class="tags">
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
							<?php
								$authorid = get_field('blog_author');
							?>
							<?php if( $authorid ): ?>
							<?php foreach( $authorid as $authorid ): ?>
							<?php $authorimg = wp_get_attachment_image_src( get_post_thumbnail_id( $authorid->ID), 'thumbnail'); ?>
							<div class="author col-xs">
								<div class="author-wrapper row middle-xs">
									<img src="<?php echo $authorimg[0]; ?>" alt="<?php echo get_the_title( $authorid->ID ); ?>">			
									<div class="author-inner">
										<div class="row"><?php echo get_the_title( $authorid->ID ); ?></div>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
				</a>
				<?php endwhile; else : ?>
					<?php _e( 'Damn. Something went wrong. Maybe hit refresh?' ); ?>
				<?php endif; ?>					
			</div>
			<div class="row center-xs">
				<div class="col-xs">
					<button class="outline-green"><?php load_more_button(); ?></button>
				</div>
			</div>
			<div class="tree">
				<img src="<?php bloginfo('template_directory');?>/img/tree.jpg" alt="">
			</div>
		</main>
<?php get_footer(); ?>