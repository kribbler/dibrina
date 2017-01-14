<?php
/**
 * The template for displaying search results pages.
 */

get_header(); 
get_template_part( 'searchform-noslide', 'page' ); 

echo do_shortcode("[nav_bar slider='none']");
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
						<div class="po-content-middle">
                            <header class="entry-header blog-header">
                                <h1 class="entry-title">Sorry, no results found.</h1>
                            </header><!-- .entry-header -->
                            <div class="entry-content blog-content">
                                <p>Perhaps using a different search term can help?</p>
                            </div><!-- .entry-content -->
						</div>
					</article><!-- #post-## -->

				<?php endif; ?>
                
                <article <?php post_class('po-article'); ?>>
                <?php po_paginate(); ?>
                </article>

    	</div>
    </div>
<?php get_footer(); ?>