<?php
/**
 * The template for displaying all single posts.
 */

get_header(); 
get_template_part( 'searchform-noslide', 'page' ); 

echo do_shortcode("[nav_bar_noslide slider='none']");

	?>
    <div class="light-page-image">
		<?php while ( have_posts() ) : the_post(); ?>
            <div class="po-bg-image">
                <div class="bg-image-ani">
                    <div class="non-immediate-parent-container-b">
                        <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                    <?php if( get_theme_mod( 'blog_image_overlay_hide' ) == '1') { ?>
                     <?php } else {  ?>
                    <figure>
                        <figcaption></figcaption>
                    </figure>
                    <?php } // end if ?>
                    </div>
                </div>
            </div>
        <?php endwhile; // end of the loop. ?>
    
        <div class="po-page-structure">
        
        <div class="po-page-middle">
        
    		<div class="logo-blog-container">
            <?php if( get_theme_mod( 'blog_logo_hide' ) == '1') { ?>
            <?php } else { ?>
            
            <?php 
				if ( '' == get_theme_mod( 'blog_logo_upload') ) { ?>
                <a href="<?php echo get_theme_mod( 'logo_url'); ?>">
					<img class="logo-blog center-block" src="<?php echo get_theme_mod( 'logo_upload'); ?>" alt="logo"/> 
				</a>
				<?php
				} else { ?>
                <a href="<?php echo get_theme_mod( 'logo_url'); ?>">
					<img class="logo-blog center-block" src="<?php echo get_theme_mod( 'blog_logo_upload'); ?>" alt="logo"/>
                </a>
				<?php }
				?>	
            
            <?php } ?>
            </div>
            <?php while ( have_posts() ) : the_post(); ?>
    			<?php get_template_part( 'content', 'single' ); ?>
            <?php endwhile; // end of the loop. ?>
        </div>
        </div>
       </div>
<?php get_footer(); ?>