<!DOCTYPE html>
<html lang="en" class="gt-ie9" xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php wp_title(' &mdash; ',true,'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/img/favicon-16x16.png">
	<link rel="manifest" href="<?php bloginfo('template_directory'); ?>/img/manifest.json">
	<link rel="mask-icon" href="<?php bloginfo('template_directory'); ?>/img/safari-pinned-tab.svg" color="#ffffff">
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico?v=1">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?>">
	<meta name="application-name" content="<?php bloginfo('name'); ?>">
	<meta name="msapplication-config" content="<?php bloginfo('template_directory'); ?>/img/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="wrapper">
		<header class="bg-blue-medium bold vert-center">
			<a href="<?php echo get_site_url(); ?>#home" data-section="home" class="logo header-logo nav-link"><?php bloginfo('name'); ?></a>
			<?php set_query_var('menu_context', 'header'); ?>
			<div class="header-nav-mobile-wrapper">
				<?php get_template_part('templates/partials/menu'); ?>
			</div>
			<a href="javascript:void(0)" class="navicon">
		    	<div class="top all-transition"></div>
		    	<div class="middle all-transition"></div>
		    	<div class="bottom bottom-row all-transition"></div>
			</a>
			<div class="clear"></div>
		</header>