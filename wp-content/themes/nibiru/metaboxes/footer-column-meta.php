<div class="my_meta_control">

	<label>Column width</label><br/>
	
	<?php $mb->the_field('width'); ?>
	<select name="<?php $mb->the_name(); ?>">
		<option value="3"<?php $mb->the_select_state('3'); ?>>3</option>
		<option value="4"<?php $mb->the_select_state('4'); ?>>4</option>
		<option value="6"<?php $mb->the_select_state('6'); ?>>6</option>
        <option value="12"<?php $mb->the_select_state('12'); ?>>12</option>
	</select>
    
    <label>Last column in row?</label><br/>
	<?php $mb->the_field('last_column'); ?>
	<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show"<?php $mb->the_checkbox_state('show'); ?>/>
    
    
  
</div>