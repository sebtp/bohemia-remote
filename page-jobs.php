<?php /* Template Name: Jobs*/ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- 	The hero image. echo the url at PHPHERE-->
		<div class="hero" style="
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>');
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), -webkit-linear-gradient(45deg,#0046b4,#46beaf);
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), -moz-linear-gradient(45deg,#0046b4,#46beaf);
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), -o-linear-gradient(45deg,#0046b4,#46beaf);
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), -ms-linear-gradient(45deg,#0046b4,#46beaf);
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), linear-gradient(45deg,#0046b4,#46beaf);
			">
		</div>

<!-- 	The main content -->
		<main class="container-fluid relative">
			<div class="row">
				<div class="svg-overview"></div>
			</div>
			<div class="row">
				<article class="col-xs-12"> 
					
				<!-- Header -->
					<header class="col-xs col-sm-7 col-md-offset-1">
						<div class="row">
							<div class="title"><?php the_title(); ?></div>
						</div>					
					</header>

				<!-- Intro -->
					<section class="intro col-xs col-sm-7 col-md-offset-1">
						<?php the_content(); ?>
					</section>

				<!-- Content -->
					<section class="content">
						<?php
							$tm_args = array(
								'post_type' => 'jobs',
								'posts_per_page' => 100
							);
							$tm_query = new WP_Query( $tm_args );
						?>
						<?php if( $tm_query->have_posts() ): ?>
						<?php while( $tm_query->have_posts() ) : $tm_query->the_post(); ?>
						<article>
							<h1><?php the_title(); ?></h1>
							<section>
								<?php the_content(); ?>
								<?php
									$thispost = get_the_ID();
									$thispostlink = get_permalink( $thispost );
									if(strpos($thispostlink,'nl')>0){
										$languagebutton = 'Solliciteer';
									} else {
										$languagebutton = 'Apply';
									}
								?>
								<a href="mailto:<?php the_field('mailto'); ?>?SUBJECT=<?php the_title(); ?>"><?php echo $languagebutton ?></a>
							</section>
						</article>
						<?php endwhile; ?>
						<?php endif; ?>
		    			<?php wp_reset_query(); ?>	
					</section>							

				</article>
			
		<!-- 	Sidebar -->
				<?php get_sidebar(); ?>

				
			</div>
			
		</main>
		<div class="tree">
					<img src="<?php bloginfo('template_directory');?>/img/tree.jpg" alt="">
				</div>





<?php endwhile; endif; ?>
<?php get_footer(); ?>