<?php get_header(); ?>

<div id="body">
	<div class="grid-row">
		
		<div id="post" class="grid-tile grid-col-content">
			<h1><?php echo $post->post_title ?></h1>
			<?php echo $post->post_content ?>
		</div>
		
		<div id="sidebar" class="grid-tile grid-col-sidebar">
		</div>
		
	</div>

</div>

<?php get_footer(); ?>
