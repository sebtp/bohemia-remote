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
			"></div>
  		
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
								<time><?php the_date(); ?></time>
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
								echo '<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>'; 
							  }
							  echo '</ul>';
						   }
						?>
						</div>
						<hr noshade="noshade" color="#eee" class="row">
						<?php
							$authorid = get_field('blog_author');
						?>
						<?php if( $authorid ): ?>
						<?php foreach( $authorid as $authorid ): ?>
						<?php $authorimg = wp_get_attachment_image_src( get_post_thumbnail_id( $authorid->ID), 'thumbnail'); ?>
						<div class="author-blog row">
							<div class="author-wrapper row middle-xs">
								<img src="<?php echo $authorimg[0]; ?>" alt="<?php echo get_the_title( $authorid->ID ); ?>">						
								<div class="author-inner">
									<div class="row"><?php echo get_the_title( $authorid->ID ); ?></div>
									<div class="row">
										<?php the_field('job_title', $authorid->ID ); ?><?php
											$company = get_field('company', $authorid->ID);
											if ($company != ''){
												echo '&comma;&nbsp;' . $company;
											}
										?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-8">
									<?php the_field('author_bio', $authorid->ID ); ?>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
						<?php endif; ?>						
					</footer>
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
		
<!-- 	Prev/Next -->
		<section class="container-full">
			<div class="row">
				<?php
				$prev_post = get_previous_post();
				if (!empty( $prev_post )): ?>
				<?php 
				$prevpostid = $prev_post->ID;
				$previmg = wp_get_attachment_image_src( get_post_thumbnail_id($prevpostid), 'full');
				$prevtitle = get_field('big_title', $prevpostid);
				$prevauthor = get_field('blog_author', $prevpostid);
				?>
				<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="col-xs-12 col-md-6 post-item">
					<span></span>
					<img src="<?php echo $previmg[0]; ?>" alt="<?php echo $prevtitle ?>">	
					<div class="row post-item-inner">
							<div class="col-xs col-sm-11">
							<h2><?php echo $prev_post->post_title; ?></h3>
							<div class="tags">
								<?php
									   $posttags = get_the_tags($prevpostid);
									   if ($posttags) {
										  echo '<ul>'; 
										  foreach($posttags as $tag) {
											echo '<li>' . $tag->name . '</li>'; 
										  }
										  echo '</ul>';
									   }
									?>
							</div>
							</div>
							<?php if( $prevauthor ): ?>
							<?php foreach( $prevauthor as $prevauthor ): ?>
							<?php $authorimg = wp_get_attachment_image_src( get_post_thumbnail_id( $prevauthor->ID), 'thumbnail'); ?>
							<div class="author col-xs">
								<div class="author-wrapper row middle-xs">
									<img src="<?php echo $authorimg[0]; ?>" alt="<?php echo get_the_title( $prevauthor->ID ); ?>">			
									<div class="author-inner">
										<div class="row"><?php echo get_the_title( $prevauthor->ID ); ?></div>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
							<?php endif; ?>
					</div>
				</a>
				<?php endif; ?>
				<?php
				$next_post = get_next_post();
				if (!empty( $next_post )): ?>
				<?php 
				$nextpostid = $next_post->ID;
				$nextimg = wp_get_attachment_image_src( get_post_thumbnail_id($nextpostid), 'full');
				$nexttitle = get_field('big_title', $nextpostid);
				$nextauthor = get_field('blog_author', $nextpostid);
				?>
				<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="col-xs-12 col-md-6 post-item">
					<span></span>
					<img src="<?php echo $nextimg[0]; ?>" alt="<?php echo $nexttitle ?>">	
					<div class="row post-item-inner">
							<div class="col-xs col-sm-11">
							<h2><?php echo $next_post->post_title; ?></h3>
							<div class="tags">
								<?php
									   $posttags = get_the_tags($nextpostid);
									   if ($posttags) {
										  echo '<ul>'; 
										  foreach($posttags as $tag) {
											echo '<li>' . $tag->name . '</li>'; 
										  }
										  echo '</ul>';
									   } 
									?>
							</div>
							</div>
							<?php if( $nextauthor ): ?>
							<?php foreach( $nextauthor as $nextauthor ): ?>
							<?php $authorimg2 = wp_get_attachment_image_src( get_post_thumbnail_id( $nextauthor->ID), 'thumbnail'); ?>
							<div class="author col-xs">
								<div class="author-wrapper row middle-xs">
									<img src="<?php echo $authorimg2[0]; ?>" alt="<?php echo get_the_title( $nextauthor->ID ); ?>">			
									<div class="author-inner">
										<div class="row"><?php echo get_the_title( $nextauthor->ID ); ?></div>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
							<?php endif; ?>
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