<?php
	
	$result = array_flip( $Caption_Transition );
	$slides = $wpdb->get_results
				(
					$wpdb->prepare
						(
							"SELECT * FROM " .JssorSliderPlugin::jssor_slides() . " WHERE slider_id = %d ORDER BY sorting_order ASC ",
							$slider_id
						)
				);

	$slider = $wpdb->get_row
				(
					$wpdb->prepare
						(
							"SELECT * FROM " .JssorSliderPlugin::jssor_sliders() . " WHERE slider_id = %d",
							$slider_id
						)
				);
		
	if ( !$slider ) {
		
		_e( "<-- jssor slider id=".$slider_id." not found -->", jssor_slider );
		return;
	}
		
	$settings = unserialize( $slider->slider_settings );
	$sliderW = ( $settings['slider_width' ]) ? ( $settings['slider_width'] ) : '600';
	$sliderH = ( $settings['slider_height'] ) ? ( $settings['slider_height'] ) : '300';	
	$fillmode = ( $settings['aspect_ratio'] )? ( $settings['aspect_ratio'] ) : '0';
	$slideD = ( $settings['slide_duration'] ) ? ( $settings['slide_duration'] ) : '500';
	$aPlay = ( $settings['auto_play'] ) ? 'true' : 'false';
	$aPlay_Int = ( $settings['auto_interval'] ) ? ( $settings['auto_interval'] ) : '3000';
	$auto_Steps = ( $settings['auto_steps'] ) ? ( $settings['auto_steps'] ) : '1';
	$play_Orient = ( $settings['play_orient'] ) ? ( $settings['play_orient'] ) : '1';
	$pauseH = ( $settings['pause_hover'] ) ? ( $settings['pause_hover'] ):	'1';
	$responsive = ( $settings['responsive'] );
	$swipe = ( $settings['swipe'] ) ? ( $settings['swipe'] ) : '0';
	$cursor =  ( $settings['swipe'] ) ? 'move' : 'default';
	$descH = $sliderH - 50;

	$use_arrows = $settings['use_arrows'];
	$arrow = $settings['arrow_skin'];
	$arrow_show = ( $settings['arrow_show' ]) ? ( $settings['arrow_show'] ) : '1';
	$arrowSkin = JssorSliderHelper::arrowSkin( $arrow )[0];
	$arrowWidth = JssorSliderHelper::arrowSkin( $arrow )[1];
	$arrowHeight = JssorSliderHelper::arrowSkin( $arrow )[2];
	$arrowBorder = ( isset( JssorSliderHelper::arrowSKin ( $arrow )[3] ) ) ? '0' : '8';
	$arrowL = 'jssor' . $arrow . 'l';
	$arrowR = 'jssor' . $arrow . 'r';

	$use_bullets = $settings['use_bullets'];
	$bullet_show = ( $settings['bullet_show'] ) ? ( $settings['bullet_show'] ) : '1' ;
	$bullet_action = ( $settings['bullet_action'] ) ? ( $settings['bullet_action'] ) : '1';
	$bullet_spacing = ( $settings['bullet_spacing'] ) ? ( $settings['bullet_spacing'] ) : '10';
	$bullet = $settings['bullet_skin'];
	$bulletStyle1 = JssorSliderHelper::bulletSkin( $bullet )[0];
	$bulletStyle2 = JssorSliderHelper::bulletSkin( $bullet )[1];
	$bulletNT = JssorSliderHelper::bulletSkin( $bullet )[2];
	$bulletCl = 'jssor' . $bullet;

	$slide_trans = JssorSliderHelper::getslide_trans( $slides );

	$captionIn_trans = JssorSliderHelper::getcaption_trans( $slides, $result, $string_id = 'caption_in' );
	$captionOut_trans = JssorSliderHelper::getcaption_trans( $slides, $result, $string_id = 'caption_out' );
	$decriptionIn_trans = JssorSliderHelper::getcaption_trans( $slides, $result, $string_id = 'description_in' );
	$decriptionOut_trans = JssorSliderHelper::getcaption_trans( $slides, $result, $string_id = 'description_out' );
	
	$caption_trans = $captionIn_trans.$captionOut_trans.$decriptionIn_trans.$decriptionOut_trans;
	
	$result2 = JssorSliderHelper::format_R( $result );

?>	

	<script type='text/javascript'>
		jQuery(document).ready(function ($) {
			var _SlideshowTransitions = [<?php echo $slide_trans; ?>];
			var _CaptionTransitions = [];<?php echo $caption_trans; ?>
			var options = {
				$FillMode: <?php echo $fillmode; ?>,
				$AutoPlay: <?php echo $aPlay; ?>,																		
				$AutoPlaySteps: <?php echo $auto_Steps; ?>,																	
				$AutoPlayInterval: <?php echo $aPlay_Int; ?>,														
				$PauseOnHover: <?php echo $pauseH; ?>,															 
				$ArrowKeyNavigation: true,	 								 
				$SlideDuration: <?php echo $slideD; ?>,																
				$MinDragOffsetToSlide: 20,													
				$SlideSpacing: 0, 													
				$DisplayPieces: 1,																	
				$ParkingPosition: 0,																
				$UISearchMode: 1,																	 
				$PlayOrientation: <?php echo $play_Orient; ?>,																
				$DragOrientation: <?php echo $swipe; ?>,																
				$SlideshowOptions: {																
					$Class: $JssorSlideshowRunner$,								
					$Transitions: _SlideshowTransitions,
					$TransitionsOrder: 1,													 
					$ShowLink: true																		
				},
				$CaptionSliderOptions: {														
					$Class: $JssorCaptionSlider$,									 
					$CaptionTransitions: _CaptionTransitions,			 
					$PlayInMode: 1,																 
					$PlayOutMode: 3																 
				},
				$BulletNavigatorOptions: {															 
					$Class: $JssorBulletNavigator$,											
					$ChanceToShow: <?php echo $bullet_show; ?>,															 
					$AutoCenter: 1,
					$ActionMode: <?php echo $bullet_action; ?>,																 
					$Lanes: 1,																			
					$SpacingX: <?php echo $bullet_spacing; ?>,																	
					$SpacingY: 10																		
				},
				$ArrowNavigatorOptions: {
					$Class: $JssorArrowNavigator$,							
					$ChanceToShow: <?php echo $arrow_show; ?>																
				},
				$ThumbnailNavigatorOptions: {
					$Class: $JssorThumbnailNavigator$,						 
					$ChanceToShow: 2,															 
					$ActionMode: 0,																 
					$DisableDrag: true,														 
					$Orientation: 2																 
				}
			};
			var jssor_slider<?php echo $slider_id; ?> = new $JssorSlider$("slider_container_<?php echo $slider_id; ?>", options);
				<?php if ( $responsive ) : ?>
				function ScaleSlider() {
					var parentWidth = jssor_slider<?php echo $slider_id; ?>.$Elmt.parentNode.clientWidth;
					if (parentWidth)
						jssor_slider<?php echo $slider_id; ?>.$SetScaleWidth(Math.min(parentWidth,<?php echo $sliderW; ?>))
					else
					window.setTimeout(ScaleSlider, 30);
				}
				ScaleSlider();
				if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
					jQuery(window).bind('resize', ScaleSlider);
				}<?php endif; ?>
		});
	</script>

	<div id="slider_container_<?php echo $slider_id; ?>" class="jssor_slider_outer_container" style="width:<?php echo $sliderW; ?>px; height:<?php echo $sliderH; ?>px;">
		<!-- Slides Container -->
		<div u="slides" class="jssor_slider_slides" style="width:<?php echo $sliderW; ?>px; height:<?php echo $sliderH; ?>px ;cursor:<?php echo $cursor; ?>;">
			<!-- Slide -->
			<?php for ( $flag = 0;$flag < count($slides); $flag++ ) : ?>	
			<div>
				<?php 
					if ( $slides[$flag]->url ) : 
						$target = ( $slides[$flag]->new_window ) ? '_blank': '_self';
				?>
					<a target="<?php echo $target; ?>" u="image" href="<?php echo html_entity_decode( stripcslashes( htmlspecialchars( $slides[$flag]->url ) ) ); ?>"><img  src="<?php echo stripcslashes(JSSOR_SL_THUMB_URL . $slides[$flag]->thumbnail_url); ?>" /></a>
				<?php else : ?>
					<img  u="image" src="<?php echo stripcslashes(JSSOR_SL_THUMB_URL . $slides[$flag]->thumbnail_url); ?>" />
					<div u="thumb">
	                <img class="i" src="<?php echo stripcslashes(JSSOR_SL_THUMB_URL . $slides[$flag]->thumbnail_url); ?>" /><div class="t">Themes</div>
   	             <div class="c">30+ professional themems + growing</div>
      	      </div>
				<?php
					endif;
					if ( $fillmode == '0' ) :
						if ( $slides[$flag]->title ) : 
							if ( $slides[$flag]->url ) :	
				?>
					<a target="<?php echo $target; ?>" href="<?php echo html_entity_decode( stripcslashes( htmlspecialchars( $slides[$flag]->url ) ) ); ?>"><div u="caption" t="<?php echo $result2[$slides[$flag]->caption_in]; ?>" t2="<?php echo $result2[$slides[$flag]->caption_out]; ?>" class="jssor_slider_caption"><?php echo html_entity_decode( stripcslashes( htmlspecialchars( $slides[$flag]->title ) ) ); ?></div></a>
				<?php else : ?>	
					<div u="caption" t="<?php echo $result2[$slides[$flag]->caption_in]; ?>" t2="<?php echo $result2[$slides[$flag]->caption_out]; ?>" class="jssor_slider_caption"><?php echo html_entity_decode( stripcslashes( htmlspecialchars( $slides[$flag]->title ) ) ); ?></div>
				<?php 	
							endif;
						endif;
						if ( $slides[$flag]->description ) :
				?>
				<div u="caption" t="<?php echo $result2[$slides[$flag]->description_in]; ?>" t2="<?php echo $result2[$slides[$flag]->description_out]; ?>" class="jssor_slider_desc_outer_div" style="top: <?php echo $descH; ?>px;width:<?php echo $sliderW; ?>px;">
					<div class="jssor_slider_desc_inner_div" style="width: <?php echo $sliderW; ?>px;"></div>
					<div class="jssor_slider_desc_text_div" style="width: <?php echo $sliderW; ?>px;">
						<?php if ( $slides[$flag]->url ) : ?>
							<a target="<?php echo $target; ?>" href="<?php echo html_entity_decode( stripcslashes( htmlspecialchars( $slides[$flag]->url ) ) ); ?>"><?php echo html_entity_decode( stripcslashes( htmlspecialchars( $slides[$flag]->description ) ) ); ?></a>
						<?php else : ?>
							<?php echo html_entity_decode( stripcslashes( htmlspecialchars( $slides[$flag]->description ) ) ); ?>
						<?php endif; ?>		
					</div>
				</div>
				<?php 	
						endif; 
					endif;
				?>
			</div>
			<!-- Slide -->
			<?php endfor; ?>			
		</div>
		
		<div u="thumbnavigator" class="jssort11">
        		<!-- Thumbnail Item Skin Begin -->
        		<div u="slides" style="cursor: default;">
            	<div u="prototype" class="p" style="top: 0; left: 0;">
                		<div u="thumbnailtemplate" class="tp"></div>
            	</div>
        		</div>
        		<!-- Thumbnail Item Skin End -->
    	</div>
			
				
	</div>
