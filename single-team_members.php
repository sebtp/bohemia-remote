<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
<!-- 	The hero image. echo the url at PHPHERE-->
		<div class="hero clip-svg-hero" style="
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>');
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), -webkit-linear-gradient(45deg,#0046b4,#f85f69);
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), -moz-linear-gradient(45deg,#0046b4,#f85f69);
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), -o-linear-gradient(45deg,#0046b4,#f85f69);
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), -ms-linear-gradient(45deg,#0046b4,#f85f69);
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), linear-gradient(45deg,#0046b4,#f85f69);
			"></div>
  		
<!-- 	The main content -->
		<main class="container-fluid relative">
			<div class="row">
				<article class="col-xs-12"> 
					
				<!-- Header -->
					<header class="col-xs col-sm-7 col-md-offset-1">
						<div class="row">
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="row">
							<div class="meta">
								<?php the_field('job_title'); ?>
							</div>
						</div>						
					</header>

				<!-- Intro -->
					<section class="intro col-xs col-sm-7 col-md-offset-1">
						<?php the_field('intro_text'); ?>
					</section>

				<!-- Content -->
					<section class="content">
						<?php the_content(); ?>
					</section>							

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

				?>
				<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="col-xs-12 col-md-6 post-item">
					<span></span>
					<img src="<?php echo $previmg[0]; ?>" alt="<?php echo $prev_post->post_title; ?>">	
					<div class="row post-item-inner">
						<div class="col-xs col-sm-11">
							<h2><?php echo $prev_post->post_title; ?></h2>
							<div class="quote">
								<?php if( get_field('quote', $prevpostid) ): ?>
									&ldquo;<?php the_field('quote', $prevpostid); ?>&rdquo;
								<?php endif; ?>
							</div>
							<div class="position"><?php the_field('job_title', $prevpostid); ?></div>
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

				?>
				<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="col-xs-12 col-md-6 post-item">
					<span></span>
					<img src="<?php echo $nextimg[0]; ?>" alt="<?php echo $next_post->post_title; ?>">	
					<div class="row post-item-inner">
						<div class="col-xs col-sm-11">
							<h2><?php echo $next_post->post_title; ?></h2>
							<div class="quote">
								<?php if( get_field('quote', $nextpostid) ): ?>
									&ldquo;<?php the_field('quote', $nextpostid); ?>&rdquo;
								<?php endif; ?>
							</div>
							<div class="position"><?php the_field('job_title', $nextpostid); ?></div>
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