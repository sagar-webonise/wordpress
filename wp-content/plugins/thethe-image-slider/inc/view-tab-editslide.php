<?php
include 'inc.boxes.php';
include 'inc.fields.sliderfields.php';
$post = get_post($_GET['id']);
$slide = ($_GET['sid']);
$strSlides = get_post_meta($post->ID, 'slides', true);
$arrSlides = (is_array($arrSlides = @unserialize($strSlides))) ? $arrSlides : array();
$arrSlide = isset($arrSlides[$slide]) ? $arrSlides[$slide] : array();
if($_GET['update']){?>
	<?php if ($_GET['added']){?>
		<div class="updated" id="message"><p><?php _e('Slide published.'); ?></p></div>
	<?php }else{?>
		<div class="updated" id="message"><p><?php _e('Slide updated.'); ?></p></div>
	<?php }?>
<?php }?>
<fieldset class="allwidth">
	<div class="thethe-slider-slide">
		
	</div>
	<div class="addform" id="thethe-slider-slideform">
		<input type="hidden" name="action" value="editslide" /> 
		<input type="hidden" name="id" value="<?php echo $_GET['id']?>" /> 
		<input type="hidden" name="sid" value="<?php echo $_GET['sid']?>" />
		<?php
		foreach ($g_arrSliderProperties as $title => $properties){?>
			<h3><?php echo $title?></h3>
			<?php foreach ($properties as $propery){
			echo sp_field_start();
			echo field_html( $propery, $arrSlide );
			echo sp_field_end();
			}?>
		<?php }?>
	</div>
</fieldset>
