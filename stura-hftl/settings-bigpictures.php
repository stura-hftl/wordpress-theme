    <div class="wrap">
        <?php screen_icon('themes'); ?> <h2>Frontpage-Teaser</h2>

        <form method="POST" action="">
            <table class="form-table">
            	<tr valign="top">
            		<th scope="row"></th>
            		<td>Breite: 960px, Höhe: 300px bzw 150px, Richtige Größe auswählen.</td>
            	</tr>
            	<?php foreach($pictures as $slug => $label): ?>
	            	<tr valign="top" class="js-bigpicture-upload">
						<th scope="row"><?php echo $label ?> Picture</th>
						<td><label for="upload_picture_<?php echo $slug ?>">
							<input class="js-bigpicture-input" id="upload_picture_<?php echo $slug ?>"
								type="text" name="upload_picture_<?php echo $slug ?>"
								value="<?php echo get_option("stura-bigpicture-" . $slug); ?>" />
							<input class="js-bigpicture-button" type="button" value="Upload Image" />
							<br />Enter an URL or upload an image for the banner.
						</label></td>
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