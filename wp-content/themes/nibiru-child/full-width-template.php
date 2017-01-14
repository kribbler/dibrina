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
                    
                        	<div class="entry-content">
								<?php the_content(); ?>
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
<?php get_footer(); ?>
