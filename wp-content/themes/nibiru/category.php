<?php
/**
 * The template for displaying categories.
 */

get_header(); 
get_template_part( 'searchform-noslide', 'page' ); 

echo do_shortcode("[nav_bar_noslide slider='none']");
	?>
    <div class="light-page">
    	<div class="po-page-middle-plain">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						
						<?php
							get_template_part( 'content-search', get_post_format() );
						?>

					<?php endwhile; ?>
                    <?php else : ?>
					<article class="po-article">
						<div class="po-search-middle">
                            <header class="entry-header blog-header">
                                <h4>There are no posts in this category.</h4>
                            </header><!-- .entry-header -->
						</div>
					</article><!-- #post-## -->

				<?php endif; ?>
                
                <article <?php post_class('po-article'); ?>>
                <?php po_paginate(); ?>
                </article>

    </div>
    </div>
<?php get_footer(); ?>