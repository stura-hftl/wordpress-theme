<?php get_header(); ?>

<div id="body">
	<div class="grid-row">
		
		<div id="post" class="grid-tile grid-col-content">
			<h1>
				<?php echo $post->post_title ?>
			</h1>
			<p><?php echo $post->post_content ?></p>
		</div>
		
		<div id="sidebar" class="grid-tile grid-col-sidebar">
			 <h3 class="bg-cat bg-cat-<?php echo stura_group_name($post);?>">Foo</h3>
			 <?php stura_print_menu($post) ?>
		</div>
		
	</div>

</div>

<?php get_footer(); ?>
