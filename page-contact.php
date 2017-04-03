<?php /* Template Name: Contact*/ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- 	The hero image. echo the url at PHPHERE-->
		<div class="hero clip-svg-hero" style="
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>');
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), -webkit-linear-gradient(45deg,#0046b4,#46beaf);
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), -moz-linear-gradient(45deg,#0046b4,#46beaf);
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), -o-linear-gradient(45deg,#0046b4,#46beaf);
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), -ms-linear-gradient(45deg,#0046b4,#46beaf);
			background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>'), linear-gradient(45deg,#0046b4,#46beaf);
			"></div>
  		
<!-- 	The main content -->
		<main class="container-fluid relative">
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
						<?php the_field('intro_text'); ?>
					</section>

				<!-- Content -->
					<section class="content">
						<?php the_content(); ?>
						<?php the_field('google_maps'); ?>
					</section>							

				</article>
			
				
		<!-- 	Sidebar -->

				<aside class="col-xs col-sm-4 col-md-3">
					<div>
						<h4>Free download</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
						<button class="green-btn">Download Case-study</button>
					</div>
				</aside>


			</div>
		</main>
		
<!-- 	Contact form -->
		<section class="contact-form container-full">
			<div class="row center-xs">
				<h2><?php the_field('formulier_titel'); ?></h2>
			</div>
			<div class="row center-xs">				
				<?php the_field('contactformulier'); ?>
			</div>
			<div class="tree">
				<img src="<?php bloginfo('template_directory');?>/img/tree.jpg" alt="">
			</div>
		</section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>