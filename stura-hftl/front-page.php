<?php

$news = get_posts(array(
	'numberposts' => 5,
	'post_type' => 'post',
	'post_status' => 'publish'
));

// mark last post
end($news)->is_last = true;
reset($news);

//----------------------------------

get_header();

?>


<div id="body">
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

	<div id="landing-grid" class="grid-row">
		<div class="grid-tile grid-tile-4">
			<a class="bg-cat bg-cat-studentenrat" href="<?php echo home_url() ?>/studentenrat/"><h3>Studentenrat</h3></a>
				<div class="text-tile">
				<p>
					<?php echo get_option("stura-frontpage-teaser-studentenrat"); ?>
				</p>
				<?php wp_nav_menu( array( 'theme_location' => 'studentenrat-menu' ) ); ?>
			</div>
		</div>
		<div class="grid-tile grid-tile-4">
			<a class="bg-cat bg-cat-service" href=""><h3>Service</h3></a>
				<div class="text-tile">
				<p>
					<?php echo get_option("stura-frontpage-teaser-service"); ?>
				</p>
				<?php wp_nav_menu( array( 'theme_location' => 'service-menu' ) ); ?>
			</div>
		</div>
		<div class="grid-tile grid-tile-4">
			<a class="bg-cat bg-cat-club" href=""><h3>HfTL-Club</h3></a>
			<div class="text-tile">
				<p>
					<?php echo get_option("stura-frontpage-teaser-club"); ?>
				</p>
				<?php wp_nav_menu( array( 'theme_location' => 'club-menu' ) ); ?>
			</div>
		</div>
		<div class="grid-tile grid-tile-4 grid-tile-last">
			<a class="bg-cat bg-cat-sport" href=""><h3>Sport</h3></a>
			<div class="text-tile">
				<p>
					<?php echo get_option("stura-frontpage-teaser-sport"); ?>
				</p>
				<?php wp_nav_menu( array( 'theme_location' => 'sport-menu' ) ); ?>
			</div>
		</div>
	</div>

</div>
<?php get_footer(); ?>