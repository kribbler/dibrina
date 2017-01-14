<?php global $wpalchemy_media_access; ?>
<div class="my_meta_control metabox">
 
    <label>Thumbnail delay</label><br/>
	<?php $mb->the_field('delay'); ?>
	<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	<span>In ms. E.g. 400</span>
 
</div>