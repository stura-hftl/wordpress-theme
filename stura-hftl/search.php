<?php

$i = 0;

get_header(); ?>
		
<div id="body">
		<div class="bg-cat bg-cat-uncategorized">
			<h1>Suche: <?php print get_search_query() ?></h1>
		</div>
		
		<?php if ( have_posts() ) : ?>
			<div class="hbar-style">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="item item-color-<?php echo stura_group_name($post); ?>">
						<a href="<?php echo get_permalink($post->ID); ?>"><h4>
							<?php echo the_title(); ?>
						</h4></a>
						<?php /* <p class="meta"><?php echo "$comment->comment_date" ?></p> */?>
						<p class="text"><?php echo the_excerpt(); ?></p>
					</div>
				<?php endwhile; ?>
			</div>
			
		<?php else: ?>
			
			<div class="bg-cat bg-cat-uncategorized">
				<h1>Keine Suchergebnisse vorhanden.</h1>
			</div>
	
	<?php endif; ?>

</div>

<?php get_footer(); ?>
