<?php


if ( strstr( $_SERVER['REQUEST_URI'], 'wp-admin/post-new.php' ) || strstr( $_SERVER['REQUEST_URI'], 'wp-admin/post.php' ) ) {
	
// ADD STYLE & SCRIPT
	add_action( 'admin_head', 'ewic_editor_add_init' );
		function ewic_editor_add_init() {
			
			if ( get_post_type( get_the_ID() ) != 'easyimageslider' ) {
				
				wp_enqueue_style( 'ewic-tinymcecss' );
				wp_enqueue_script( 'ewic-tinymcejs' );

		?>
        <?php
			}
			
		}
	
// ADD MEDIA BUTOON	
	add_action( 'media_buttons_context', 'ewic_shortcode_button', 1 );
		function ewic_shortcode_button($context) {
			$img = plugins_url( 'images/ewic-32x32.png' , __FILE__ );
			$container_id = 'ewicmodal';
			$title = 'Shortcode Generator';
			$context .= '
			<a class="thickbox button" id="ewic_shortcode_button" title="'.$title.'" style="outline: medium none !important; cursor: pointer;" >
			<img src="'.$img.'" alt="Easy Slider Lite" width="20" height="20" style="position:relative; top:-1px"/>Easy Slider Lite</a>';
			return $context;
		}	
}


// GENERATE POPUP CONTENT
add_action('admin_footer', 'ewic_popup_content');	
function ewic_popup_content() {

if ( strstr( $_SERVER['REQUEST_URI'], 'wp-admin/post-new.php' ) || strstr( $_SERVER['REQUEST_URI'], 'wp-admin/post.php' ) ) {

if ( get_post_type( get_the_ID() ) != 'easyimageslider' ) {
// START GENERATE POPUP CONTENT

?>
<div id="ewicmodal" style="display:none;">
<div id="tinyform" style="width: 550px;">
<form method="post">

<div class="ewic_input" id="ewictinymce_select_slider_div">
<label class="label_option" for="ewictinymce_select_slider">Slider</label>
	<select class="ewic_select" name="ewictinymce_select_slider" id="ewictinymce_select_slider">
    <option id="selectslider" type="text" value="select">- Select Slider -</option>
</select>
<div class="clearfix"></div>
</div>

<div class="ewic_button">
<input type="button" value="Insert Shortcode" name="ewic_insert_scrt" id="ewic_insert_scrt" class="button-secondary" />	
<div class="clearfix"></div>
</div>

</form>
</div>
</div>
<?php 
	}
  } //END
}

?>