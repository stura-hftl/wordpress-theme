<?php

$i = 0;

get_header(); ?>
		
<div id="body">
		<div class="bg-cat bg-cat-uncategorized">
			<h1>Suche: <?php print get_search_query() ?></h1>
		</div>
		
		<?php if ( have_posts() ) : ?>
			<div id="news-grid" class="grid-row">
				<?php while ( have_posts() ) : the_post(); ?>
					<a class="grid-tile grid-tile-2 <?php stura_print_bg_class($post); ?> <?php echo (++$i%2==0)?"grid-tile-last":''; ?>"
						 href="<?php echo get_permalink($post->ID); ?>">
						<p>
							<? echo the_title(); ?>
						</p>
					</a>
				
				<?php endwhile; ?>
			</div>
		<?php else: ?>
			
			<div class="bg-cat bg-cat-uncategorized">
				<h1>Keine Suchergebnisse vorhanden.</h1>
			</div>
	
	<?php endif; ?>

</div>

<?php get_footer(); ?>
