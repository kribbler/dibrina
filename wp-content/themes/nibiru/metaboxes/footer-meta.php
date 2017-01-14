<div class="my_meta_control">

	<label>Show call-to-action button</label><br/>
	<?php $mb->the_field('footer_button'); ?>
	<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show"<?php $mb->the_checkbox_state('show'); ?>/>
    
    <label>Hide main footer section</label><br/>
	<?php $mb->the_field('footer_top_hide'); ?>
	<input type="checkbox" name="<?php $mb->the_name(); ?>" value="hide"<?php $mb->the_checkbox_state('hide'); ?>/>
    
    <label>Hide bottom footer section</label><br/>
	<?php $mb->the_field('footer_bottom_hide'); ?>
	<input type="checkbox" name="<?php $mb->the_name(); ?>" value="hide"<?php $mb->the_checkbox_state('hide'); ?>/>
    
    
  
</div>