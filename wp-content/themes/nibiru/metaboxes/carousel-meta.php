<?php global $wpalchemy_media_access; ?>
<div class="my_meta_control metabox">
 
    <?php $mb->the_field('image'); ?>
    <?php $wpalchemy_media_access->setGroupName('nn2')->setInsertButtonLabel('Insert')->setTab('type'); ?>
 	
    <label>Carousel thumbnail image</label><br/>
    <p>
        <?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
        <?php echo $wpalchemy_media_access->getButton(array('label' => 'Add Image')); ?>
    </p>
 
</div>