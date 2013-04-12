<h1 class="bg-cat bg-cat-<?php echo $group_name ?>">
	Kommentare
</h1>



<?php comment_form(); ?>


<?php if ( have_comments() ) : ?>
		<ul>
			<?php wp_list_comments(); ?>
		</ul><!-- .commentlist -->
<?php endif; // have_comments() ?>