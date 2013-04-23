    <div class="wrap">
        <?php screen_icon('themes'); ?> <h2>Frontpage-Teaser</h2>

        <form method="POST" action="">
            <table class="form-table">
            	<?php foreach($groups as $key => $label): ?>
	                <tr valign="top">
	                    <th scope="row">
	                        <label for="id-<?php echo $key ?>-teaser">
	                            <?php echo $label ?>-Teaser
	                        </label> 
	                    </th>
	                    <td>
	                        <textarea name="<?php echo $key ?>-teaser" id="id-<?php echo $key ?>-teaser" rows="10" cols="50" class="large-text code"><?php echo htmlspecialchars(get_option("stura-frontpage-teaser-" . $key)); ?></textarea>
	                    </td>
	                </tr>
                <?php endforeach; ?>
                <tr valign="top">
                	<th scope="row"> </th>
                    <td>
                        <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
                    </td>
                </tr>
            </table>
        </form>
    </div>