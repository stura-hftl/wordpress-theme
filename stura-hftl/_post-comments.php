<?php
	$comment_args = array('post_id'=>$post->ID, 'order'=>'ASC',);
?>

<?php if(!is_page()): ?>
	<div id="comments">
		<?php if(have_comments()): ?>
		<div class="text-tile">
			<h1><?php echo $post->comment_count . _n(" Kommentar", " Kommentare", $post->comment_count); ?></h1>
		</div>
		
		<div class="hbar-style">
			<?php foreach( get_comments($comment_args) as $comment ): ?>
				<div class="item">
					<h4><?php echo $comment->comment_author ?></h4>
					<p class="meta"><?php echo strftime("%d.%m.%Y %H:%M", strtotime($comment->comment_date)) ?></p>
					<p class="text"><?php echo $comment->comment_content ?></p>
				</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
		<div class="text-tile">
			<h1>Kommentar schreiben</h1>
			<?php comment_form(); ?>
		</div>
		
	</div>
<?php endif; ?>
