<!DOCTYPE html>
<html>
	<head>
		<title><?php echo wp_title('::', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		
		<meta charset="<?php bloginfo('charset'); ?>" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>">
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/styles/mensaplan.css">
		<link rel="icon" href="<?php echo get_bloginfo('template_directory'); ?>/img/favicon.ico" type="image/x-icon">
		 
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300|Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
		
		<?php wp_head(); ?>
	</head>
	<body class="<?php if(is_singular()) echo "page-cat-".stura_group_name($post); ?>">
		<div id="header">
		<div id="birthday">
			<img src="http://stura.hft-leipzig.de/wp-content/uploads/2013/09/grafik_900x600_neu_07.jpg"><br />
			<p>Der erste Geburtstag des neuen sächsischen Hochschul"freiheits"gesetzes. Auch die Studierenden unserer privaten Hochschule sind von dieser Gesetzesänderung direkt betroffen, darum "feiern" auch wir mit! <br />Mehr Infos unter <a href="http://www.kss-sachsen.de/uploads/media/PM_17_2013_1_Jahr_SaechsHSFG_01.pdf" target="_blank">www.kss-sachsen.de/uploads/media/PM_17_2013_1_Jahr_SaechsHSFG_01.pdf</a><br /><br /></p>
		</div>
			<?php require "_header-banner.php" ?>
			<?php require "_header-nav.php" ?>
			<?php require "_header-big-picture.php" ?>
		</div>
