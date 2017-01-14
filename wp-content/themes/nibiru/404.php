<?php
/**
 * The template for displaying 404 pages (Not Found).
 */

get_header(); 
get_template_part( 'searchform-noslide', 'page' ); 

echo do_shortcode("[nav_bar_noslide slider='none']");
	?>
    <div class="light-page">
    <div class="po-page-middle-plain">
    
        <article class="po-article">
            
            <div class="po-content-middle">
            
                <header class="entry-header blog-header">
                    <h1 class="entry-title">Sorry, that page isn&rsquo;t here.</h1>
                </header><!-- .entry-header -->
                <div class="entry-content blog-content">
                    <p>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help?</p>
                </div><!-- .entry-content -->
            
            </div>
        </article><!-- #post-## -->
    </div>
    </div>
<?php get_footer(); ?>