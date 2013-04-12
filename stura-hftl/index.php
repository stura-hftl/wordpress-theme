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

$group_name = stura_group_name($post);

//----------------------------------

get_header();

?>



<div id="body">
	<div class="grid-row">
		<div id="post" class="grid-tile grid-col-content">
			<?php require "_post-content.php" ?>
			<?php //require "_post-comments.php" ?>
		</div>
		<div id="sidebar" class="grid-tile grid-col-sidebar">
			<?php require "_post-sidebar.php" ?>
		</div>
	</div>
	<?php if(stura_is_grouppage($post)): ?>
		<div id="news-grid" class="grid-row">
			<?php foreach($news as $post): ?>
				<a class="grid-tile grid-tile-5 bg-cat bg-cat-<? echo $group_name ?> <?php echo $post->is_last?"grid-tile-last":''; ?>"
					 href="<?php echo get_permalink($post->ID); ?>">
					<p>
						<? echo $post->post_title; ?>
					</p>
				</a>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
