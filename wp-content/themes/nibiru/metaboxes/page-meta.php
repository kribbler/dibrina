<div class="my_meta_control">

	<label>Hide breadcrumbs</label><br/>
	<?php $mb->the_field('cb_single'); ?>
	<input type="checkbox" name="<?php $mb->the_name(); ?>" value="hide"<?php $mb->the_checkbox_state('hide'); ?> />
    
    <label>Remove page padding</label><br/>
	<?php $mb->the_field('page_padding'); ?>
	<input type="checkbox" name="<?php $mb->the_name(); ?>" value="hide"<?php $mb->the_checkbox_state('hide'); ?> />
   
   
</div>