<?php get_header(); ?>

<!-- 	The hero image -->
		<div class="hero container-full" style="background-image: url(<?php bloginfo('template_directory');?>/img/hero_work.jpg)">
			<div class="row middle-xs">
				<div class="col-xs col-sm-6 col-md-5 col-md-offset-1 col-lg-4">
					<h1><?php single_term_title(); ?></h1>
					<div class="white-bg"><?php echo term_description(); ?></div>
				</div>
			</div>
		</div>

<!-- 	The main content -->
		<main class="container-full">
			<div class="row">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php $figm = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>
				<a href="<?php the_permalink(); ?>" class="col-xs-12 col-md-6 post-item">
					<img src="<?php echo $figm[0]; ?>" alt="<?php the_title(); ?>">	
					<div class="row post-item-inner">
						<div class="col-sm-11">
							<h2 class="col-xs" ><?php the_title(); ?></h2>
							<div class="tags col-xs col-xlg-9">
								<?php
									$terms = wp_get_object_terms( $post->ID, 'label' );
									echo '<ul>';
									foreach( $terms as $term ):
										echo '<li>' . $term->name . '</li>';
									endforeach;
									echo '</ul>';
								?>
							</div>
							<div class="client col-xs col-xlg-9">
								<?php 
									$clients = get_field('client_name');
									foreach( $clients as $post ):
										setup_postdata($post);
										the_title();
									endforeach;
									wp_reset_postdata();
								?>
							</div>
						</div>
					</div>
				</a>
				<?php endwhile; ?>
				<?php endif; ?>
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
			<div class="tree">
				<img src="<?php bloginfo('template_directory');?>/img/tree.jpg" alt="">
			</div>
		</main>
<?php get_footer(); ?>