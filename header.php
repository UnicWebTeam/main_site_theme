<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<!--[if IE]>
	<script src="<?php bloginfo('template_url'); ?>/js/plugins/html5shiv.js"></script>
<![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="en" ><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<!--[if gte IE 9]>
  <style type="text/css">
	.gradient {filter: none;}
  </style>
<![endif]-->

<head>
	<!-- Set up Meta -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" charset="<?php bloginfo('charset'); ?>" />


	<!-- Add Favicon -->
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<link type="image/png" href="<?php bloginfo('template_url'); ?>/favicon.png" rel="icon">
	<link type="image/png" href="<?php bloginfo('template_url'); ?>/favicon.png" rel="shortcut icon">
	<link type="image/png" href="<?php bloginfo('template_url'); ?>/favicon.png" rel="apple-touch-icon">

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

	<!-- Add Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic&subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
	
	<link href="<?php echo get_template_directory_uri() ?>/css/inc/ihover-gh-pages/src/ihover.min.css" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="container">
	<header class="header">
		<div class="row large-uncollapse medium-uncollapse small-collapse">
			<div class="large-4 medium-4 small-12 columns">
				<div class="logo small-only-text-center">
					<a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_header_image(); ?>" alt="<?php bloginfo('name'); ?>"/></a>
				</div><!--end of .logo -->
			</div><!--end of .columns -->
			<div class="large-8 medium-8 small-12 columns">
				<nav class="top-bar" data-topbar="" role="navigation" data-options="{is_hover: false, mobile_show_parent_link: true}">

					<ul class="title-area">
						<li class="name"></li>
						<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
					</ul><!-- END of .top-bar -->
					<section class="top-bar-section">
						<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'fallback_cb' => 'foundation_page_menu', 'walker' => new foundation_navigation() ) ); ?>
						<!-- <span class="small button radius" data-reveal-id="myModal"><a href="#">Get Site</a></span> -->
					</section><!-- END of .top-bar-section -->
				</nav>
			</div><!-- END of .columns -->
		</div><!-- END of .row -->
	</header><!--END of header -->
