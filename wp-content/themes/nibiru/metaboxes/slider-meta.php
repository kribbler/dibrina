<div class="my_meta_control">

	<label>Show slider</label><br/>
	<?php $mb->the_field('cb_single'); ?>
	<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show"<?php $mb->the_checkbox_state('show'); ?>/>
    
    <label>Show slider overlay</label><br/>
	<?php $mb->the_field('slider_overlay_show'); ?>
	<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show"<?php $mb->the_checkbox_state('show'); ?>/>
    
    <label>Gallery category</label><br/>
	<?php $mb->the_field('title'); ?>
	<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	<span>Enter a gallery category name.</span>
    
    <label>Gallery order by</label>
	<?php $selected = ' selected="selected"'; ?>
    <?php $metabox->the_field('orderby'); ?>
    <select name="<?php $metabox->the_name(); ?>">
    <option value="date"<?php if ($metabox->get_the_value() == 'date') echo $selected; ?>>Date</option>
    <option value="title"<?php if ($metabox->get_the_value() == 'title') echo $selected; ?>>Title</option>
    <option value="modified"<?php if ($metabox->get_the_value() == 'modified') echo $selected; ?>>Last modified</option>
    <option value="rand"<?php if ($metabox->get_the_value() == 'rand') echo $selected; ?>>Random</option>
    </select>
    
    <label>Gallery order</label>
	<?php $selected = ' selected="selected"'; ?>
    <?php $metabox->the_field('order'); ?>
    <select name="<?php $metabox->the_name(); ?>">
    <option value="DESC"<?php if ($metabox->get_the_value() == 'DESC') echo $selected; ?>>Descending</option>
    <option value="ASC"<?php if ($metabox->get_the_value() == 'ASC') echo $selected; ?>>Ascending</option>
    </select>
    
    <label>Hide logo</label><br/>
	<?php $mb->the_field('slider_logo'); ?>
	<input type="checkbox" name="<?php $mb->the_name(); ?>" value="hide"<?php $mb->the_checkbox_state('hide'); ?>/>
    
    <label>Logo delay (optional)</label><br/>
	<?php $mb->the_field('logo_delay'); ?>
	<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	<span>In milliseconds.</span>
     
    <label>Title category</label><br/>
	<?php $mb->the_field('description'); ?>
	<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	<span>Enter a title category name.</span>
    
    <label>Title order by</label>
	<?php $selected = ' selected="selected"'; ?>
    <?php $metabox->the_field('title_orderby'); ?>
    <select name="<?php $metabox->the_name(); ?>">
    <option value="date"<?php if ($metabox->get_the_value() == 'date') echo $selected; ?>>Date</option>
    <option value="title"<?php if ($metabox->get_the_value() == 'title') echo $selected; ?>>Title</option>
    <option value="modified"<?php if ($metabox->get_the_value() == 'modified') echo $selected; ?>>Last modified</option>
    <option value="rand"<?php if ($metabox->get_the_value() == 'rand') echo $selected; ?>>Random</option>
    </select>
    
    <label>Title order</label>
	<?php $selected = ' selected="selected"'; ?>
    <?php $metabox->the_field('title_order'); ?>
    <select name="<?php $metabox->the_name(); ?>">
    <option value="DESC"<?php if ($metabox->get_the_value() == 'DESC') echo $selected; ?>>Descending</option>
    <option value="ASC"<?php if ($metabox->get_the_value() == 'ASC') echo $selected; ?>>Ascending</option>
    </select>
    
    <label>Text delay (optional)</label><br/>
	<?php $mb->the_field('text_delay'); ?>
	<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	<span>In milliseconds. Default: 2500 (2.5 seconds).</span>
    
    <label>Show anchor button</label><br/>
	<?php $mb->the_field('anchor_button'); ?>
	<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show"<?php $mb->the_checkbox_state('show'); ?>/>
    
    <label>Anchor button text</label><br/>
	<?php $mb->the_field('button'); ?>
	<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	<span>Enter the anchor button text. E.g. "Learn more"</span>
    
    <label>Show video modal</label><br/>
	<?php $mb->the_field('video_modal'); ?>
	<input type="checkbox" name="<?php $mb->the_name(); ?>" value="show"<?php $mb->the_checkbox_state('show'); ?>/>
    
    <label>Vimeo/YouTube embed code</label><br/>
	<?php $mb->the_field('video_code'); ?>
	<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	<span><strong>Note:</strong> To make a YouTube video autoplay, add "?autoplay=1" right after the video ID.</span>
    
    <label>Video button text</label><br/>
	<?php $mb->the_field('button_video'); ?>
	<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	<span>Enter the video button text. E.g. "Watch video"</span>
    
    <label>Buttons delay (optional)</label><br/>
	<?php $mb->the_field('buttons_delay'); ?>
	<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	<span>In milliseconds. Default: 1500 (1.5 seconds).</span>
   
</div>