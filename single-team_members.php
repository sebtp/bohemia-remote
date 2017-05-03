<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
<!-- 	The hero image. echo the url at PHPHERE-->
		<div class="hero" style="
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>');
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), -webkit-linear-gradient(45deg,#0046b4,#f85f69);
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), -moz-linear-gradient(45deg,#0046b4,#f85f69);
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), -o-linear-gradient(45deg,#0046b4,#f85f69);
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), -ms-linear-gradient(45deg,#0046b4,#f85f69);
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), linear-gradient(45deg,#0046b4,#f85f69);
			">	
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
								<?php the_field('job_title'); ?>
							</div>
						</div>						
					</header>

				<!-- Intro -->
					<section class="intro col-xs col-sm-7 col-md-offset-1">
						&ldquo;<?php the_field('quote'); ?>&rdquo;
					</section>

				<!-- Content -->
					<section class="content">
						<?php the_content(); ?>
					</section>							

				</article>

			</div>
		</main>
		
<!-- 	Prev/Next -->
		<section class="container-full work-bg">
			<div class="row">
				<div class="svg-overview"></div>
			</div>
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
						<div class="col-xs-12">
						
							<div class="row">
								<h2 class="col-xs-12 col-xlg-11 col-xxlg-10 col-xxxlg-9"><?php the_title(); ?></h2>
							</div>
							<?php if( get_field('quote') ): ?>
							<div class="row">
								<div class="quote col-xs-12 col-lg-8">
									&ldquo;<?php the_field('quote'); ?>&rdquo;
								</div>
							</div>
							<?php endif; ?>
							<div class="row">
								<div class="position col-xs-12"><?php the_field('job_title'); ?></div>
							</div>							
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
		</section> 

<?php endwhile; else : ?>
	<?php _e( 'Damn. Something went wrong. Maybe hit refresh?' ); ?>
<?php endif; ?>
<?php get_footer(); ?>