<?php get_header(); ?>

<!-- 	The hero image. echo the url instead of: http://lorempixel.com/1920/1080-->
		<div class="hero container-full" style="background-image: url(<?php bloginfo('template_directory');?>/img/hero_blog.jpg)">
			<div class="row">
				<div class="col-xs col-sm-6 col-md-5 col-md-offset-1 col-lg-4">
					<h1><?php single_tag_title(); ?></h1>
					<div class="white-bg"><?php echo tag_description(); ?></div>
				</div>
			</div>
		</div>

<!-- 	The main content -->
		<main class="container-full">
			<div class="row">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php $figm = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
				<a href="<?php the_permalink(); ?>" class="col-xs-12 col-md-6 post-item">
					<span></span>
					<img src="<?php echo $figm[0]; ?>" alt="<?php the_title(); ?>">						
					<div class="row post-item-inner">
						<div class="col-sm-11">
							<h2 class="col-xs"><?php the_title(); ?></h2>
							<div class="tags col-xs col-xlg-9">
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
							<div class="author col-xs col-xlg-9">
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
				</a>
				<?php endwhile; ?>
				<?php endif; ?>	
			<div class="tree">
				<img src="<?php bloginfo('template_directory');?>/img/tree.jpg" alt="">
			</div>
		</main>
<?php get_footer(); ?>