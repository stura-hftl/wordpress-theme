<?php

$i = 0;

get_header(); ?>

<div id="body">
	<div class="bg-cat bg-cat-uncategorized">
		<h1>
			<?php if ( is_day() ) : ?>
				Archiv: <?php echo get_the_date(); ?>
			<?php elseif ( is_month() ) : ?>
				Archiv: <?php echo get_the_date("F Y"); ?>
			<?php elseif ( is_year() ) : ?>
				Archiv: <?php echo get_the_date("Y"); ?>
			<?php else : ?>
				Blog Archiv
			<?php endif; ?>
		</h1>
	</div>


	<div id="news-grid" class="grid-row">
		<?php while ( have_posts() ) : the_post(); ?>
			<a class="grid-tile grid-tile-5 <?php stura_print_bg_class($post); ?> <?php echo (++$i%5==0)?"grid-tile-last":''; ?>"
				 href="<?php echo get_permalink($post->ID); ?>">
				<p>
					<?php echo the_title(); ?>
				</p>
			</a>

		<?php endwhile; ?>
	</div>

</div>

<?php get_footer(); ?>
