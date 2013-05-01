			<h1 class="bg-cat bg-cat-<?php echo $group_name ?>">
				<?php echo $post->post_title ?>
			</h1>
			<div class="text-tile">
				<?php the_content(); ?>
			</div>
			<div class="post-meta">
					<?php the_date() ?>,&nbsp;
					<?php substr(get_the_author_meta( 'first_name', $post->post_author ),0,1); ?>
					<?php substr(get_the_author_meta( 'last_name', $post->post_author ),0,1); ?>
			</div>
