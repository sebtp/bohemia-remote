<?php /* Template Name: Homepage */ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- 	The main content -->
		<main class="container-full">
			<div class="row">
				<img class="bg-img" src="<?php bloginfo('template_directory');?>/img/hero_clouds.jpg" alt=""> 
			</div>			
			<div class="row middle-xs">
				<div class="col-xs-12 col-lg-10">
				
				<!-- 5 Reasons to work with Bohemia -->
					<div class="zero row middle-xs center-xs">					
						
						<div class="col-xs-12">
							<div class="row center-xs"> 
								<p class="proposition col-xs-12 col-md-9"> 
									<?php the_field('proposition'); ?>
								</p>
							</div>
							<div class="row center-xs">
								<!--<div class="nr col-xs-12 col-md-2">
									<img src="<?php //bloginfo('template_directory');?>/img/num-all.png" alt="">
								</div>-->
								<h1 class="col-xs-12 center-xs col-md-7 start-md">
									<?php the_field('big_title'); ?>
								</h1>
							</div>
							<div class="row center-xs">
								<img class="arrow" src="<?php bloginfo('template_directory');?>/img/ic-arrow-down.svg" alt="">
							</div>							
						</div>
					</div>
				</div>
				
				<div class="col-xs-12 col-lg-10">	
				<!-- 1 -->
					<div class="one left row">
						<img class="bg-img" src="<?php bloginfo('template_directory');?>/img/hero_model.jpg" alt="">
						<div class="number">  <!-- col-xs-3 col-sm-4 -->
							<img class="outer" src="<?php bloginfo('template_directory');?>/img/num-1.png" alt="">
							<img class="inner" src="<?php bloginfo('template_directory');?>/img/num-1-inner.png" alt="">
						</div>
						<div class="col-xs-12 col-sm-10 col-sm-offset-2 col-lg-10 col-lg-offset-2">
							<div class="row">
								<div class="col-xs col-lg-10 col-xlg-8">
									<h2><?php the_field('reason_1_title'); ?></h2>
								</div>
							</div>
							<div class="row center-sm">
								<div class="desc col-xs col-sm-7 col-lg-7 col-xlg-6">
									<div class="row">
										<p><?php the_field('reason_1_text'); ?></p>
									</div>
									<?php 
										$ctavalue1 = get_field('reason_1_cta');
										if ($ctavalue1 != ''){ 
										?> 
										<div class="row end-xs">
											<a href="<?php the_field('reason_1_link'); ?>" class="green-btn">
												<?php the_field('reason_1_cta'); ?>
											</a>					
										</div>
									<?php } ?>
								</div>
							</div>
							
						</div>
						
					</div>
					
				<!-- 2 -->
					<div class="two right row">
						<img class="bg-img" src="<?php bloginfo('template_directory');?>/img/hero_work.jpg" alt="">
						<div class="number">  <!-- col-xs-3 col-sm-4 -->
							<img class="outer" src="<?php bloginfo('template_directory');?>/img/num-2.png" alt="">
							<img class="inner" src="<?php bloginfo('template_directory');?>/img/num-2-inner.png" alt="">
						</div>
						<div class="col-xs-12 col-sm-11 col-sm-offset-1 col-lg-10 col-lg-offset-2">
							<div class="row">
								<div class="col-xs col-lg-10">
									<h2><?php the_field('reason_2_title'); ?></h2>
								</div>
							</div>
							<div class="row center-sm">
								<div class="desc col-xs col-sm-7 col-lg-7 col-xlg-6">
									<div class="row">
										<p><?php the_field('reason_2_text'); ?></p>
									</div>									
									<?php 
										$ctavalue2 = get_field('reason_2_cta');
										if ($ctavalue2 != ''){ 
										?>
										<div class="row end-xs">
											<a href="<?php the_field('reason_2_link'); ?>" class="red-btn"><?php the_field('reason_2_cta'); ?></a>
										</div>						
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
					
				<!-- 3 -->
					<div class="three left row">
						<img class="bg-img" src="<?php bloginfo('template_directory');?>/img/hero_clients.jpg" alt="">
						<div class="number">  <!-- col-xs-3 col-sm-4 -->
							<img class="outer" src="<?php bloginfo('template_directory');?>/img/num-3.png" alt="">
							<img class="inner" src="<?php bloginfo('template_directory');?>/img/num-3-inner.png" alt="">
						</div>
						<div class="col-xs-12 col-sm-10 col-sm-offset-2"> 
							<div class="row">
								<div class="col-xs col-lg-10">
									<h2><?php the_field('reason_3_title'); ?></h2>
								</div>
							</div>
							<div class="row center-sm">
								<div class="desc-bg col-xs col-sm-7 col-lg-7 col-xlg-6"></div>
								<div class="desc col-xs col-sm-7 col-lg-7 col-xlg-6">
									<div class="row">
										<p><?php the_field('reason_3_text'); ?></p>
									</div>
									<?php 
										$ctavalue3 = get_field('reason_3_cta');
										if ($ctavalue3 != ''){ 
										?>
										<div class="row end-xs">
											<a href="<?php the_field('reason_3_link'); ?>" class="green-btn"><?php the_field('reason_3_cta'); ?></a>
										</div>						
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
					
				<!-- 4 -->
					<div class="four right row">
						<img class="bg-img" src="<?php bloginfo('template_directory');?>/img/hero_about.jpg" alt="">
						<div class="number">  <!-- col-xs-3 col-sm-4 -->
							<img class="outer" src="<?php bloginfo('template_directory');?>/img/num-4.png" alt="">
							<img class="inner" src="<?php bloginfo('template_directory');?>/img/num-4-inner.png" alt="">
						</div>
						<div class="col-xs-12 col-sm-11 col-sm-offset-1 col-lg-10 col-lg-offset-2">
							<div class="row">
								<div class="col-xs col-lg-10">
									<h2><?php the_field('reason_4_title'); ?></h2>
								</div>
							</div>
							<div class="row center-sm">
								<div class="desc col-xs col-sm-7 col-lg-7 col-xlg-6">
									<div class="row">
										<p><?php the_field('reason_4_text'); ?></p>
									</div>
									<?php 
									$ctavalue4 = get_field('reason_4_cta');
									if ($ctavalue4 != ''){ 
									?>
										<div class="row end-xs">
											<a href="<?php the_field('reason_4_link'); ?>" class="red-btn"><?php the_field('reason_4_cta'); ?></a>
										</div>
									<?php } ?>
								</div>
							</div>
							
						</div>
						
					</div>
					
				<!-- 5 -->
					<div class="five left row">
						<img class="bg-img-left" src="<?php bloginfo('template_directory');?>/img/hero_blog-2.jpg" alt="">
						<img class="bg-img" src="<?php bloginfo('template_directory');?>/img/hero_blog.jpg" alt="">
						<div class="number">  <!-- col-xs-3 col-sm-4 -->
							<img class="outer" src="<?php bloginfo('template_directory');?>/img/num-5.png" alt="">
							<img class="inner" src="<?php bloginfo('template_directory');?>/img/num-5-inner.png" alt=""> 
						</div>
						<div class="col-xs-12 col-sm-10 col-sm-offset-2 col-lg-10 col-lg-offset-2">
							<div class="row">
								<div class="col-xs col-lg-10">
									<h2><?php the_field('reason_5_title'); ?></h2>
								</div>
							</div>
							<div class="row center-sm">
								<div class="desc col-xs col-sm-7 col-lg-7 col-xlg-6">
									<div class="row">
										<p><?php the_field('reason_5_text'); ?></p>
									</div>
									<?php 
									$ctavalue5 = get_field('reason_5_cta');
									if ($ctavalue5 != ''){ 
									?>
										<div class="row end-xs">
											<a href="<?php the_field('reason_5_link'); ?>" class="green-btn"><?php the_field('reason_5_cta'); ?></a>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			
			<aside class="col-md-2">
				<div class="fixed-wrapper">
					<button class="up">
						<img src="<?php bloginfo('template_directory');?>/img/ic_arrow_up.svg" alt="Up">
					</button>
					<div class="scroll-wrapper">
						<?php

						// your taxonomy name
						$tax = 'label';

						// get the terms of taxonomy
						$terms = get_terms( $tax, $args = array(
						  	'hide_empty' => false // do not hide empty terms
						));
						echo '<ul>';
						// loop through all terms
						foreach( $terms as $term ) {

							// Get the term link
							$term_link = get_term_link( $term );

							if( $term->count > 0 )
								// display link to term archive
								echo '<li><a href="' . esc_url( $term_link ) . '">' . $term->name .'</a></li>';

							elseif( $term->count !== 0 )
								// display name
								echo '' . $term->name .'';
						}
						echo '</ul>';
						?>
					</div>
					<button class="down">
						<img src="<?php bloginfo('template_directory');?>/img/ic_arrow_down.svg" alt="Down">
					</button>
				</div>
			</aside>
		</main>
				
		<!-- 	Contact form -->
		<section class="contact-form container-full">
			<div class="row center-xs">
				<h3 class="col-xs-12"><?php the_field('formulier_titel'); ?></h3> 
			</div>
			<div class="row center-xs">				
				<div class="col-xs-12 col-sm-7 col-md-5 col-lg-4 col-xlg-3">
					<?php the_field('contactformulier'); ?>
				</div>
			</div>
			<div class="tree">
				<img src="<?php bloginfo('template_directory');?>/img/tree.jpg" alt="">
			</div>
		</section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>
