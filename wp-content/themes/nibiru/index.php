<?php
/**
 * The main template file.
 */

get_header(); 
get_template_part( 'searchform-noslide', 'page' ); 

echo do_shortcode("[nav_bar_noslide slider='none']");
	?>
    
    <div class="light-page-image">
    	<div class="po-bg-image">
            <div class="bg-image-ani">
                <div class="non-immediate-parent-container-b">
                    <img src="<?php echo get_theme_mod( 'blog_image_upload'); ?>" alt="blog"/>
                <?php if( get_theme_mod( 'blog_image_overlay_hide' ) == '1') { ?>
                <?php } else {  ?>
                <figure>
                    <figcaption></figcaption>
                </figure>
                <?php } // end if ?>
                </div>
            </div>
        </div>
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
            
                        <?php if ( have_posts() ) : ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                
                                <?php
                                    get_template_part( 'content', get_post_format() );
                                ?>
        
                            <?php endwhile; ?>
                            <?php else : ?>
                            <article class="po-article">
                                <div class="po-search-middle">
                                <header class="entry-header blog-header">
                                    <h4>There are currently no posts.</h4>
                                    </header><!-- .entry-header -->
                                </div>
                            </article><!-- #post-## -->
        
                        <?php endif; ?>
                        
                        <article <?php post_class('po-article'); ?>>
                        <?php po_paginate(); ?>
                        </article>
        
            </div>
        </div>
        </div>
<?php get_footer(); ?>