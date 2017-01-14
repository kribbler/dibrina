<div class="my_meta_control">
	
    <label>Video embed code</label><br/>
	<?php $mb->the_field('video_embed'); ?>
	<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	<span>Enter the Youtube/Vimeo embed code.</span>
    
    
    <label>Quote text</label><br/>
	<?php $metabox->the_field('quote_text'); ?>
    <textarea name="<?php $metabox->the_name(); ?>" rows="3"><?php $metabox->the_value(); ?></textarea>
    <span>Enter the quote text.</span>
   
</div>