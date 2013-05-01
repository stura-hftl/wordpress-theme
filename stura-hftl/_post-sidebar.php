			<?php foreach(get_the_category() as $category): ?>
			 	<a href="<?php echo get_category_link($category->cat_ID) ?>" class="bg-cat bg-cat-<?php echo $group_name ?>">
			 		<p>
			 			<?php echo $category->name; ?>
		 			</p>
		 		</a>
			<?php endforeach; ?>
			
			<p class="bg-cat bg-cat-<?php echo $group_name ?>">Menü</p>
			<?php stura_print_menu($post) ?>
			
			<ul id="sidebar">
				<?php dynamic_sidebar('sidebar'); ?>
			</ul>
			
