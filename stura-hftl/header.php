<!DOCTYPE html>
<html>
	<head>
		<title><?php echo wp_title('::', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		
		<meta charset="<?php bloginfo('charset'); ?>" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="Stylesheet" type="text/css">

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
					<a href="">Kontakt</a>
					<a href="https://www.facebook.com/stura.hftl">Facebook</a>
					<?php echo get_search_form( false ); ?>
				</div>
			</div>
			<?php if(is_front_page()): ?>
				<div id="header-picture">
				</div>
			<?php else: ?>
				<div id="header-nav" class="grid-row">
					<a class="grid-tile grid-tile-4 bg-cat-stura" href="<?php echo home_url(); ?>/studentenrat/">
						<p>Studentenrat</p>						
					</a>
					<a class="grid-tile grid-tile-4 bg-cat-service" href="<?php echo home_url(); ?>/service/">
						<p>Service</p>						
					</a>
					<a class="grid-tile grid-tile-4 bg-cat-club" href="<?php echo home_url(); ?>/club/">
						<p>HfTL-Club</p>						
					</a>
					<a class="grid-tile grid-tile-4 grid-tile-last bg-cat-sport" href="<?php echo home_url(); ?>/sport/">
						<p>Sport</p>						
					</a>
					
				</div>
			<?php endif; ?>
		</div>