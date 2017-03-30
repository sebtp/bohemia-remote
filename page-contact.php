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
				<h2>Want to know more?</h2>
			</div>
			<div class="row center-xs">				
				<div id="mc_embed_signup">
					<form action="//bohemiaamsterdam.us2.list-manage.com/subscribe/post?u=ff7aa484f44598d638542407c&amp;id=00529f1a03" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
						<div id="mc_embed_signup_scroll">

							<div class="mc-field-group">
								<label for="mce-FNAME">First Name<span class="asterisk">*</span></label>
								<input type="text" value="" name="FNAME" class="required type" id="mce-FNAME">
							</div>
							<div class="mc-field-group">
								<label for="mce-LNAME">Last Name<span class="asterisk">*</span></label>
								<input type="text" value="" name="LNAME" class="required type" id="mce-LNAME">
							</div>
							<div class="mc-field-group">
								<label for="mce-EMAIL">Email Address<span class="asterisk">*</span></label>
								<input type="email" value="" name="EMAIL" class="required email type" id="mce-EMAIL">
							</div>
							<div class="mc-field-group input-group">
								<label>Which label fits you best?<span class="asterisk">*</span></label>
								<ul>
									<li>
										<input type="radio" value="1" name="group[16389]" id="mce-group[16389]-16389-0">
										<label for="mce-group[16389]-16389-0">Director</label>
									</li>
									<li>
										<input type="radio" value="2" name="group[16389]" id="mce-group[16389]-16389-1">
										<label for="mce-group[16389]-16389-1">Manager</label>
									</li>
									<li>
										<input type="radio" value="4" name="group[16389]" id="mce-group[16389]-16389-2">
										<label for="mce-group[16389]-16389-2">Creative</label>	</li>
								</ul>
							</div>
							<div id="mce-responses" class="clear">
								<div class="response" id="mce-error-response" style="display:none"></div>
								<div class="response" id="mce-success-response" style="display:none"></div>
							</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->

							<div class="clear"><input type="submit" value="sign up" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
						</div>
					</form>
				</div>
			</div>
			<div class="tree">
				<img src="<?php bloginfo('template_directory');?>/img/tree.jpg" alt="">
			</div>
		</section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>