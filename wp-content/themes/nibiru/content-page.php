<?php
/**
 * The template used for displaying page content in page.php.
 */
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
				global $page_mb;
				if ( 'hide' == $page_mb->get_the_value( 'top_padding' ) ) {
				?>	
            	<div class="container" style="margin-top:-1px;">
                <?php 
            	} else { ?>
                <div class="container page-padding po-container-section">
                <?php 
				}
				?>
                    <div class="row">
                    	
                        <div class="col-sm-9">
                            <div class="entry-content">
                                <?php the_content(); ?>
                                <div class="clearfix"></div>
                                <?php edit_post_link( __( 'Edit', 'pixelobject' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                            </div><!-- .entry-content --> 
                            <div class="page-comments">
                                <?php // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template(); ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <?php get_sidebar(); ?>
                        </div>	
                        
                    </div>
                </div>
        </article><!-- #post-## -->
 