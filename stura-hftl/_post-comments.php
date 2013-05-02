<?php
	$comment_args = array('post_id'=>$post->ID);
?>

<?php if(have_comments()): ?>
	<div id="comments">
		<div class="text-tile">
			<h1>Kommentare</h1>
			<?php comment_form(); ?>
		</div>
		
		<div class="hbar-style">
			<?php foreach( get_comments($comment_args) as $comment ): ?>
				<div class="item">
					<h4><?php echo $comment->comment_author ?></h4>
					<p class="meta"><?php echo $comment->comment_date ?></p>
					<p class="text"><?php echo $comment->comment_content ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>