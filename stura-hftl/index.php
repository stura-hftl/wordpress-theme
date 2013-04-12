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
			<h1 class="bg-cat bg-cat-<?php echo $group_name ?>">
				<?php echo $post->post_title ?>
			</h1>
			<div class="text-tile">
				<?php the_content(); ?>
			</div>
		</div>
		<div id="sidebar" class="grid-tile grid-col-sidebar">
			<?php if(!is_page()): ?>
				<p class="bg-cat bg-cat-<?php echo $group_name ?>">
					<?php the_date() ?>
				</p>
			<?php endif; ?>

			<?php foreach(get_the_category() as $category): ?>
			 	<a href="<?php echo get_category_link($category->cat_ID) ?>" class="bg-cat bg-cat-<?php echo $group_name ?>">
			 		<p>
			 			<?php echo $category->name; ?>
		 			</p>
		 		</a>
			<?php endforeach; ?>
			
			<p class="bg-cat bg-cat-<?php echo $group_name ?>">Menü</p>
			<?php stura_print_menu($post) ?>
			
			<ul id="sidebar">
				<?php dynamic_sidebar('sidebar'); ?>
			</ul>
			
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
