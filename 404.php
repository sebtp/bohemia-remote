<?php get_header(); ?>

	
<!-- 	The hero image. echo the url at PHPHERE-->
		<div class="hero clip-svg-hero" style="
			background-image: url('<?php bloginfo('template_directory');?>/img/404.jpg');
			background-image: url('<?php bloginfo('template_directory');?>/img/404.jpg'), -webkit-linear-gradient(45deg,#0046b4,#46beaf);
			background-image: url('<?php bloginfo('template_directory');?>/img/404.jpg'), -moz-linear-gradient(45deg,#0046b4,#46beaf);
			background-image: url('<?php bloginfo('template_directory');?>/img/404.jpg'), -o-linear-gradient(45deg,#0046b4,#46beaf);
			background-image: url('<?php bloginfo('template_directory');?>/img/404.jpg'), -ms-linear-gradient(45deg,#0046b4,#46beaf);
			background-image: url('<?php bloginfo('template_directory');?>/img/404.jpg'), linear-gradient(45deg,#0046b4,#46beaf);
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
							<div class="title">Oops</div>
						</div>
						<div class="row">
							<div class="meta">
								<h1>Something went wrong.</h1>
							</div>
						</div>						
					</header>

				<!-- Intro -->
					<section class="intro col-xs col-sm-7 col-md-offset-1">
						Sorry, so sorry. Maybe try clicking back or use the navigation to go somewhere else?
					</section>						
				</article>

			</div>
		</main>
		
<!-- 	Prev/Next -->
		<section class="container-full">
			<div class="tree">
				<img src="<?php bloginfo('template_directory');?>/img/tree.jpg" alt="">
			</div>
		</section> 


<?php get_footer(); ?>