			
			<?php if(is_front_page()): ?>
				<div id="header-picture" class="frontpage"
					style="background-image: url(<?php echo get_option("stura-bigpicture-frontpage"); ?>); cursor: pointer;" onClick="location.href='/wahl2015'">
				</div>
			<?php elseif(is_404()): ?>
				<div id="header-picture" class="errorpage"
					style="background-image: url(<?php echo get_option("stura-bigpicture-error404"); ?>)">
				</div>
			<?php elseif(is_single() || is_page()): ?>
				<div id="header-picture" class="grouppage"
					style="background-image: url(<?php echo get_option("stura-bigpicture-".stura_alias_name($post)); ?>)">
				</div>
			<?php else: ?>
				<div id="header-picture" class="grouppage"
					style="background-image: url(<?php echo get_option("stura-bigpicture-uncategorized"); ?>)">
				</div>
			<?php endif; ?>
