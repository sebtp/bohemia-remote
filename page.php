<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
<!-- 	The hero image. echo the url at PHPHERE-->
		<div class="hero clip-svg-hero" style="
			background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');
			background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>'), -webkit-linear-gradient(45deg,#0046b4,#46beaf);
			background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>'), -moz-linear-gradient(45deg,#0046b4,#46beaf);
			background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>'), -o-linear-gradient(45deg,#0046b4,#46beaf);
			background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>'), -ms-linear-gradient(45deg,#0046b4,#46beaf);
			background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>'), linear-gradient(45deg,#0046b4,#46beaf);
			">
				<div class="svg-container">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 4" class="svg-single">
						<polygon style="fill:#fff" points="36 0 0 4 36 4 36 0"/>
					</svg>
				</div>
			</div>
  		
<!-- 	The main content -->
		<main class="container-fluid relative">
			<div class="row">
				<article class="col-xs-12"> 
					
				<!-- Header -->
					<header class="col-xs col-sm-7 col-md-offset-1 ">
						<div class="row">
							<div class="title"><?php the_field('big_title'); ?></div>
						</div>
						<div class="row">
							<div class="meta">
								<h1><?php the_title(); ?></h1>
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

				<!-- Content Footer -->
					<footer class="col-xs col-sm-8 col-md-offset-1 col-md-7">
						<div class="tags row">
						<?php
						   $posttags = get_the_tags();
						   if ($posttags) {
							  echo '<ul>'; 
							  foreach($posttags as $tag) {
								echo '<li><a href="' . get_tag_link($tag->term_id) . '">&#35;' . $tag->name . '</a></li>'; 
							  }
							  echo '</ul>';
						   }
						?>
						</div>						
					</footer>
				</article>
			
				
		<!-- 	Sidebar -->
				<?php get_sidebar(); ?>

			</div>
		</main>
		
<!-- 	Prev/Next -->
		<section class="container-full">
			<div class="tree">
				<img src="<?php bloginfo('template_directory');?>/img/tree.jpg" alt="">
			</div>
		</section> 

<?php endwhile; else : ?>
	<?php _e( 'Damn. Something went wrong. Maybe hit refresh?' ); ?>
<?php endif; ?>
<?php get_footer(); ?>