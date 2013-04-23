<!DOCTYPE html>
<html>
	<head>
		<title><?php echo wp_title('::', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		
		<meta charset="<?php bloginfo('charset'); ?>" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>">
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/styles/mensaplan.css">
		<link rel="icon" href="<?php echo get_bloginfo('template_directory'); ?>/img/favicon.ico" type="image/x-icon">
		 
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans" type="text/css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300" type="text/css">
		
		<?php wp_head(); ?>
	</head>
	<body class="page-cat-<?php echo stura_group_name($post) ?>">
		<div id="header">
			<?php require "_header-banner.php" ?>
			<?php require "_header-nav.php" ?>
			<?php require "_header-big-picture.php" ?>
		</div>
