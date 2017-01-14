<?php
/**
 * Template Name: Search
 */

get_header(); 
get_template_part( 'searchform-noslide', 'page' );

echo do_shortcode("[nav_bar_noslide slider='none']");
	?>
    <div class="light-page">
    <div class="po-page-middle-plain">

            <article id="post-<?php the_ID(); ?>" <?php post_class('po-article'); ?>>
            	<div class="po-search-middle">
                    <form role="search" method="get" class="search-page-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input type="search" class="search-page-field" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" >	
                    </form>
                </div>
            </article><!-- #post-## -->  
    </div>
	</div>
    
<?php get_footer(); ?>