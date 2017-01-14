<?php
/**
 * Template Name: Holding
 */
get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>
<div class="po-column" data-animation="fade-in" data-delay="1500" style="padding:0;">
    <div style="position:absolute; width:100%; padding-top:50px;">
        <img class="logo center-block" src="<?php echo get_theme_mod( 'logo_upload'); ?>" alt="logo">
	</div>
</div>
<div class="po-column holding-text" data-delay="3000" data-animation="fade-in"><?php the_content(); ?></div>
	<?php 
    global $slider_mb;
    if ( 'show' == $slider_mb->get_the_value( 'cb_single' ) ) {
    ?>	
        <?php echo do_shortcode("
        
        
        [slider_text type='static']
            [slider_titles category='".$slider_mb->get_the_value('description')."']
        [/slider_text]
        [slider_gallery_no_controls type='static' shade='green']
            [slider_images category='".$slider_mb->get_the_value('title')."']
        [/slider_gallery_no_controls]
		
        
        "); ?>
        <div class="po-slider-display po-nav po-nav-slide">
         <?php 
	} else { ?>	
 	<div class="po-slider-display po-nav po-nav-slide">
    
	
	<?php 
	}
	?>


<?php endwhile; // end of the loop. ?>
  
<?php get_footer(); ?>