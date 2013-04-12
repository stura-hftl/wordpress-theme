    <div class="wrap">
        <?php screen_icon('themes'); ?> <h2>Pictures</h2>

        <form method="POST" action="">
            <table class="form-table">
            	<?php foreach($pictures as $slug => $info): list($label, $hint) = $info; ?>
	            	<tr valign="top" class="js-bigpicture-upload">
						<th scope="row"><?php echo $label ?> Picture</th>
						<td><label for="upload_picture_<?php echo $slug ?>">
							<input class="js-bigpicture-input" id="upload_picture_<?php echo $slug ?>"
								type="text" name="upload_picture_<?php echo $slug ?>"
								value="<?php echo get_option("stura-bigpicture-" . $slug); ?>" />
							<input class="js-bigpicture-button" type="button" value="Upload Image" />
						</label><?php echo $hint ?></td>
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