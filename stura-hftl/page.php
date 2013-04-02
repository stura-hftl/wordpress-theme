<?php get_header(); ?>

<div id="body">
	<div class="grid-row">
		
		<div id="post" class="grid-tile grid-col-content bg-cat bg-cat-<?php echo stura_tile_name($post);?>">
			<h1><?php echo $post->post_title ?></h1>
			<p><?php echo $post->post_content ?></p>
		</div>
		
		<div id="sidebar" class="grid-tile grid-col-sidebar">
		</div>
		
	</div>

</div>

<?php get_footer(); ?>
