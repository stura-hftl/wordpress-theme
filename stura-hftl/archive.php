<?php get_header(); ?>
		
<div id="body">
	<div id="news-grid" class="grid-row">
		<?php while ( have_posts() ) : the_post(); ?>
			<a class="grid-tile grid-tile-5 <?php stura_print_bg_class($post); ?> <?php echo $post->is_last?"grid-tile-last":''; ?>"
				 href="<?php echo get_permalink($post->ID); ?>">
				<p>
					<? echo the_title(); ?>
				</p>
			</a>
		
		<?php endwhile; ?>
	</div>

</div>

<?php get_footer(); ?>
