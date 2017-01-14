<?php
/**
 * Template Name: Full width Child
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); 
global $slider_mb;
$slider_mb->the_meta();
?>
<?php dynamic_sidebar('header-text');?>
<!-- Video Player Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-embed-code='<?php $slider_mb->the_value('video_code'); ?>'>
  <div class="modal-dialog po-modal-lg">
    <div class="modal-content">
      <div class="modal-body video-container" id="yt-player">
      
    </div>
     
    </div>
  </div>
</div>

	<?php 
    
    if ( 'show' == $slider_mb->get_the_value( 'cb_single' ) ) {
    ?>	
    
    <?php if ( 'show' == $slider_mb->get_the_value( 'anchor_button' ) ) {
    ?>
    
    	<?php if ( 'show' == $slider_mb->get_the_value( 'video_modal' ) ) { ?>	
			<?php get_template_part( 'searchform-slide', 'page' ); ?>
            <?php echo do_shortcode("
            
            [slider_details logo='".get_theme_mod( 'logo_upload')."' detailsdelay='".$slider_mb->get_the_value('buttons_delay')."' logodelay='".$slider_mb->get_the_value('logo_delay')."']
				[slider_column width='3' offset='3']
                    [slider_button type='anchor-video']".$slider_mb->get_the_value('button')."[/slider_button]
                [/slider_column]
				[slider_column width='3']
                    [slider_button type='video']".$slider_mb->get_the_value('button_video')."[/slider_button]
                [/slider_column]
            [/slider_details]
            [slider_text delay='".$slider_mb->get_the_value('text_delay')."']
                [slider_titles category='".$slider_mb->get_the_value('description')."' orderby='".$slider_mb->get_the_value('title_orderby')."' order='".$slider_mb->get_the_value('title_order')."']
            [/slider_text]
            [slider_gallery shade='green' overlay='".$slider_mb->get_the_value('slider_overlay_show')."']
                [slider_images category='".$slider_mb->get_the_value('title')."' orderby='".$slider_mb->get_the_value('orderby')."' order='".$slider_mb->get_the_value('order')."']
            [/slider_gallery]
            [nav_bar slider='display']
            
            "); ?>
            <div class="po-page">
         <?php } 
		 
		 else { ?>
         	<?php get_template_part( 'searchform-slide', 'page' ); ?>
            <?php echo do_shortcode("
            
            [slider_details logo='".get_theme_mod( 'logo_upload')."' detailsdelay='".$slider_mb->get_the_value('buttons_delay')."' logodelay='".$slider_mb->get_the_value('logo_delay')."']
                [slider_column width='12']
                    [slider_button type='anchor']".$slider_mb->get_the_value('button')."[/slider_button]
                [/slider_column]
            [/slider_details]
            [slider_text delay='".$slider_mb->get_the_value('text_delay')."']
                [slider_titles category='".$slider_mb->get_the_value('description')."' orderby='".$slider_mb->get_the_value('title_orderby')."' order='".$slider_mb->get_the_value('title_order')."']
            [/slider_text]
            [slider_gallery shade='green' overlay='".$slider_mb->get_the_value('slider_overlay_show')."']
                [slider_images category='".$slider_mb->get_the_value('title')."' orderby='".$slider_mb->get_the_value('orderby')."' order='".$slider_mb->get_the_value('order')."']
            [/slider_gallery]
            [nav_bar slider='display']
            
            "); ?>
            <div class="po-page">
         <?php } ?>	
         
    <?php } 	 
	else { ?>   
    
    	<?php if ( 'show' == $slider_mb->get_the_value( 'video_modal' ) ) { ?>	
			<?php get_template_part( 'searchform-slide', 'page' ); ?>
            <?php echo do_shortcode("
            
            [slider_details logo='".get_theme_mod( 'logo_upload')."' detailsdelay='".$slider_mb->get_the_value('buttons_delay')."' logodelay='".$slider_mb->get_the_value('logo_delay')."']
				[slider_column width='12']
                    [slider_button type='video-noanchor']".$slider_mb->get_the_value('button_video')."[/slider_button]
                [/slider_column]
            [/slider_details]
            [slider_text delay='".$slider_mb->get_the_value('text_delay')."']
                [slider_titles category='".$slider_mb->get_the_value('description')."' orderby='".$slider_mb->get_the_value('title_orderby')."' order='".$slider_mb->get_the_value('title_order')."']
            [/slider_text]
            [slider_gallery shade='green' overlay='".$slider_mb->get_the_value('slider_overlay_show')."']
                [slider_images category='".$slider_mb->get_the_value('title')."' orderby='".$slider_mb->get_the_value('orderby')."' order='".$slider_mb->get_the_value('order')."']
            [/slider_gallery]
            [nav_bar slider='display']
            
            "); ?>
            <div class="po-page">
         <?php } 
		 
		 else { ?>
         	<?php get_template_part( 'searchform-slide', 'page' ); ?>
            <?php echo do_shortcode("
            
            [slider_details logo='".get_theme_mod( 'logo_upload')."' detailsdelay='".$slider_mb->get_the_value('buttons_delay')."' logodelay='".$slider_mb->get_the_value('logo_delay')."']
                [slider_column width='12']
                    
                [/slider_column]
            [/slider_details]
            [slider_text delay='".$slider_mb->get_the_value('text_delay')."']
                [slider_titles category='".$slider_mb->get_the_value('description')."' orderby='".$slider_mb->get_the_value('title_orderby')."' order='".$slider_mb->get_the_value('title_order')."']
            [/slider_text]
            [slider_gallery shade='green' overlay='".$slider_mb->get_the_value('slider_overlay_show')."']
                [slider_images category='".$slider_mb->get_the_value('title')."' orderby='".$slider_mb->get_the_value('orderby')."' order='".$slider_mb->get_the_value('order')."']
            [/slider_gallery]
            [nav_bar slider='display']
            
            "); ?>
            <div class="po-page">
         <?php } ?>	
    
    <?php } ?>	
    
    
    
            
	<?php } else { ?>	
	<?php get_template_part( 'searchform-noslide', 'page' ); ?>
 	<?php echo do_shortcode("[nav_bar_noslide slider='none']"); ?>
    
    <div class="po-page">
	
	<?php 
	}
	?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if ( !is_front_page() ) : ?>
            <?php 
			global $page_mb;
			if ( 'hide' == $page_mb->get_the_value( 'cb_single' ) ) {
			?>	
			<?php 
            } else { ?>
			<div class="entry-header po-page-header">
                <div class="container">
                	<div class="row">
                    	<div class="col-sm-6">
                    <h3 class="entry-title"><?php the_title(); ?></h3>
                    </div>
                    <div class="col-sm-6 hidden-xs">
                    <div class="text-right" style="margin-top:26px;"><?php if (function_exists('po_breadcrumbs')) po_breadcrumbs(); ?></div>
                    </div>
                    </div>
                </div>
            </div><!-- .entry-header -->
            <?php 
			}
            ?>
            <?php endif; ?>

            
        
            	<?php
				if ( 'hide' == $page_mb->get_the_value( 'page_padding' ) ) {
				?>	
            	
                <?php 
            	} else { ?>
                <div class="container page-padding po-container-section">
                	<div class="row">
                		<div class="col-sm-12">
                <?php 
				}
				?>
                    
                        	<div class="entry-content entry_home">
								<?php the_content(); ?>
                                <div class="container-fluid">
                                    <div class="row">
                                        <?php for ($i=1; $i<=4; $i++){?>
                                        <div class="col-sm-3">
                                            <div class="innner_container">
                                                <h3><?php echo rwmb_meta( 'dd_homebox_title_'.$i); ?></h3>
                                                <div class="header-line" style="margin-top:px; padding-bottom:px;"></div>
                                                <p><?php echo rwmb_meta( 'dd_homebox_description_'.$i); ?></p>
                                                <?php if (rwmb_meta( 'dd_homebox_link_'.$i)) {?>
                                                <a href="<?php echo rwmb_meta( 'dd_homebox_link_'.$i);?>">LEARN MORE</a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
            				</div><!-- .entry-content -->
                            
                            
                            
                            <?php
							if ( 'hide' == $page_mb->get_the_value( 'page_padding' ) ) {
							?>	
                            	<?php if ( comments_open() || '0' != get_comments_number() ) { ?>
                                <div class="container page-padding po-container-section" style="margin-top:-1px; padding-bottom:100px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="page-comments po-blog">
                                            	</div>
                                                <?php comments_template(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php } ?>
                      	 <?php } else { ?>
                         
                         		<?php if ( comments_open() || '0' != get_comments_number() ) { ?>
                                        <div class="page-comments po-blog">
                                            <?php  comments_template(); ?>
                                        </div>
                         		 <?php } ?>
                          <?php } ?>
                        
                    <?php
				if ( 'hide' == $page_mb->get_the_value( 'page_padding' ) ) {
				?>	
            	
                <?php 
            	} else { ?>
                </div>
                </div>
                </div>
                <?php 
				}
				?>
        </article><!-- #post-## -->
<?php endwhile; // end of the loop. ?>   
<!--
<script type="text/javascript">
/**
 * See: http://www.css-101.org/articles/ken-burns_effect/css-transition.php
 */

/**
 * The idea is to cycle through the images to apply the "fx" class to them every n seconds. 
 * We can't simply set and remove that class though, because that would make the previous image move back into its original position while the new one fades in. 
 * We need to keep the class on two images at a time (the two that are involved with the transition).
 */

(function(){

// we set the 'fx' class on the first image when the page loads
  document.getElementById('slideshow').getElementsByTagName('img')[0].className = "fx";
  
// this calls the kenBurns function every 4 seconds
// you can increase or decrease this value to get different effects
  window.setInterval(kenBurns, 16000);       
  
// the third variable is to keep track of where we are in the loop
// if it is set to 1 (instead of 0) it is because the first image is styled when the page loads
  var images          = document.getElementById('slideshow').getElementsByTagName('img'),
      numberOfImages  = images.length,
      i               = 1;

  function kenBurns() {
  if(i==numberOfImages){ i = 0;}
  images[i].className = "fx";

// we can't remove the class from the previous element or we'd get a bouncing effect so we clean up the one before last
// (there must be a smarter way to do this though)
  if(i===0){ images[numberOfImages-2].className = "";}
  if(i===1){ images[numberOfImages-1].className = "";}
  if(i>1){ images[i-2].className = "";}
  i++;

  }
})();

</script>
-->
<?php get_footer(); ?>
