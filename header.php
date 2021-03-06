<!doctype html>
<!--[if lt IE 7]>	  <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>		 <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>		 <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title(' | ',TRUE,'right'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="apple-touch-icon" href="apple-touch-icon.png">
		<!-- Hotjar Tracking Code for http://bohemiaamsterdam.com -->
		<script>
			(function(h,o,t,j,a,r){
				h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
				h._hjSettings={hjid:207300,hjsv:5};
				a=o.getElementsByTagName('head')[0];
				r=o.createElement('script');r.async=1;
				r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
				a.appendChild(r);
			})(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
		</script>
		<?php wp_head();?>
		
		<!-- Hfreflang etc. -->
		<?php
			$thispost = get_the_ID();
			$thispostlink = get_permalink( $thispost );
			if(strpos($thispostlink,'nl')>0)
			{
				$thislanguage = 'nl';
				$thatlanguage = 'en';
			} else {
				$thislanguage = 'en';
				$thatlanguage = 'nl';
			}
			$thatpostlink = get_field('language_switch', $thispost);
		?>
		<link rel="alternate" href="<?php echo $thispostlink; ?>" hreflang="x-default" />
		<link rel="alternate" href="<?php echo $thispostlink; ?>" hreflang="<?php echo $thislanguage; ?>" />
		<?php if($thatpostlink != ''){ ?>
		<link rel="alternate" href="<?php echo $thatpostlink; ?>" hreflang="<?php echo $thatlanguage; ?>" />	
		<?php } ?>
		
		<style>
			@import url('https://fonts.googleapis.com/css?family=Alegreya:400,400i,700,700i');
			@import url('https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,700');
		</style>
	</head>
	<?php
		$posttype = get_post_type();
		$pagefile = get_page_template_slug();
		if ( is_front_page() ) :
		    echo '<body class="front-page">';
		elseif ( $pagefile == 'page-contact.php' || is_404() || ($posttype == 'post' && !is_home() && !is_tag() ) ) :
		     echo '<body class="single-blog">';
		elseif ( is_home() || is_tag() ) :
		     echo '<body class="overview-blog">';
		elseif ( $posttype == 'work' && !is_tax('label') ) :
		     echo '<body class="single-work">';
		elseif ( $posttype == 'team_members' ) :
		     echo '<body class="single-about">';
		elseif ( $pagefile == 'page-work.php' || $posttype == 'clients' || is_tax('label') ) :
		     echo '<body class="overview-work">';
		elseif ( $pagefile == 'page-about.php' ) :
		     echo '<body class="overview-about">';
		elseif ( $pagefile == 'page-clients.php' ) :
		     echo '<body class="overview-clients">';
		elseif ( $pagefile == '' && !is_home() && !is_404() && !is_tag() && !is_tax('label') && $posttype != 'post' && $posttype != 'work' && $posttype != 'team_members' && $posttype != 'clients' || $pagefile == 'page-jobs.php' ) :
			echo '<body class="single-work">';
		else : echo '<body>';
		endif;
	?>
		  		 		 		
 		<!-- Clipping SVG for the Footer -->
		<svg class="clip-svg">
		  <defs>
			<clippath id="clip-polygon-footer" clipPathUnits="objectBoundingBox">
				<polygon points="0 1, 0 0.55, 1 0, 1 1"></polygon>
			  <!-- When changing these, also change the _post-item.scss -->
			</clippath>
		  </defs>
		</svg>
  		
<!-- 	The hidden menu -->
	   	<nav class="menu-wrapper"> 
			<div class="menu-container">
				<?php
				wp_nav_menu( array( 
					'theme_location' => 'my-custom-menu', 
					'container_class' => 'menu-content',
					'items_wrap' => my_nav_wrap()) ); 
				?>
			</div>
			<div class="veil"></div>
		</nav> 
		
<!-- 	The fixed header -->	
		<header id="header">
			<div class="gradient"></div>
			<div class="container-full">
				<div class="row between-xs">
					<div class="col-xs-4 col-md-3">
						<button id="ham"><span></span><span></span><span></span><span></span></button>
					</div>
					<div class="col-md-6">
						<a id="logo" href="<?php echo get_home_url(); ?>"><strong>Bohemia</strong> Amsterdam<br><span>Creative Digital Agency</span></a>
					</div>
					<div class="col-xs-8 col-md-3">
						<a href="tel:0031204233555" id="phone">&#43;31 (0)20 42 33 555</a>
					</div>
				</div>
			</div>			
		</header>