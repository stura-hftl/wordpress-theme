<!DOCTYPE html>
<html>
	<head>
		<title><?php echo wp_title('::', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		
		<meta charset="<?php bloginfo('charset'); ?>" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>">
		<link rel="icon" href="<?php echo get_bloginfo('template_directory'); ?>/img/favicon.ico" type="image/x-icon"> 
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans" type="text/css">

		<?php wp_head(); ?>
	</head>
	<body>
		<div id="header">
			<div id="header-banner">
				<div class="left">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo get_bloginfo('template_directory'); ?>/img/stura_logo.png">
					</a>
				</div>
				<div class="right">
					<a href="<?php echo home_url(); ?>">Startseite</a>
					<a href="kontakt/">Kontakt</a>
					<a href="https://www.facebook.com/stura.hftl">Facebook</a>
					<?php echo get_search_form( false ); ?>
				</div>
			</div>
			<?php if(!is_front_page()): ?>
				<div id="header-nav" class="grid-row">
					<a class="grid-tile grid-tile-4 bg-cat bg-cat-studentenrat" href="<?php echo home_url(); ?>/studentenrat/">
						<p>Studentenrat</p>						
					</a>
					<a class="grid-tile grid-tile-4 bg-cat bg-cat-service" href="<?php echo home_url(); ?>/service/">
						<p>Service</p>						
					</a>
					<a class="grid-tile grid-tile-4 bg-cat bg-cat-club" href="<?php echo home_url(); ?>/club/">
						<p>HfTL-Club</p>						
					</a>
					<a class="grid-tile grid-tile-4 grid-tile-last bg-cat bg-cat-sport" href="<?php echo home_url(); ?>/sport/">
						<p>Sport</p>						
					</a>
				</div>
			<?php endif; ?>
			
			<?php if(is_front_page()): ?>
				<div id="header-picture" class="frontpage"
					style="background-image: url(<?php echo get_option("stura-bigpicture-frontpage"); ?>)">
				</div>
			<?php elseif(is_single() || is_page()): ?>
				<div id="header-picture" class="grouppage"
					style="background-image: url(<?php echo get_option("stura-bigpicture-".stura_group_name($post)); ?>)">
				</div>
			<?php else: ?>
				<div id="header-picture" class="grouppage"
					style="background-image: url(<?php echo get_option("stura-bigpicture-uncategorized"); ?>)">
				</div>
			<?php endif; ?>
		</div>
