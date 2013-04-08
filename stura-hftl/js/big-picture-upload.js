
jQuery(document).ready(function() {
	
	jQuery('.js-bigpicture-button').click(function() {
		var button = jQuery(this);
		var row = button.parents(".js-bigpicture-upload");
		var input = row.find(".js-bigpicture-input");
		
		formfield = input.attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		
		console.log(input);

		window.send_to_editor = function(html) {
		 	imgurl = jQuery('img',html).attr('src');
		 	input.val(imgurl);
		 	tb_remove();
		}
		
 		return false;
	});
});