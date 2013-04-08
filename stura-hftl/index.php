<?php

$news = get_posts(array(
	'numberposts' => 5,
	'post_type' => 'post',
	'post_status' => 'publish',
	'category_name' => stura_group_name($post)
));

if(!empty($news))
{
	// mark last post
	end($news)->is_last = true;
	reset($news);
}


the_post(); // activates the post

//----------------------------------

get_header();

?>



<div id="body">
	<div class="grid-row">
		
		<div id="post" class="grid-tile grid-col-content">
			<h1>
				<?php echo $post->post_title ?>
			</h1>
			<?php the_content(); ?>
		</div>
		
		<div id="sidebar" class="grid-tile grid-col-sidebar">
			 <h3 class="bg-cat bg-cat-<?php echo stura_group_name($post);?>"><?php echo stura_group_label($post); ?></h3>
			 <?php stura_print_menu($post) ?>
		</div>
		
	</div>
	<div id="news-grid" class="grid-row">
		<?php foreach($news as $post): ?>
			<a class="grid-tile grid-tile-5 bg-cat bg-cat-<? echo stura_group_name($post); ?> <?php echo $post->is_last?"grid-tile-last":''; ?>"
				 href="<?php echo get_permalink($post->ID); ?>">
				<p>
					<? echo $post->post_title; ?>
				</p>
			</a>
		<?php endforeach; ?>
	</div>

</div>

<?php get_footer(); ?>
