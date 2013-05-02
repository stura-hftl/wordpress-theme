<?php
	$comment_args = array('post_id'=>$post->ID);
?>
<h1 class="bg-cat group-tile bg-cat-<?php echo $group_name ?>">
	Kommentare
</h1>

<div id="comments">
	<div class="text-tile">
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