<?php
/**
 * Template Name: Archives
 */

get_header(); 
get_template_part( 'searchform-noslide', 'page' );

echo do_shortcode("[nav_bar_noslide slider='none']");
	?>
    <div class="light-page">
    <div class="po-page-middle-plain">
		<?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('po-article'); ?>>
                <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                <div class="po-content-middle">
                <header class="entry-header blog-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->
            
                <div class="entry-content blog-content">
                    <?php the_content(); ?>
                </div><!-- .entry-content -->
                
                <h4 class="archive-header">Last 10 posts</h4>
                <ul class="archive-list">
                    <?php wp_get_archives('type=postbypost&limit=10'); ?>
                </ul>
                
                <h4 class="archive-header">Archives by month</h4>
                <ul class="archive-list">
					<?php wp_get_archives('type=monthly&limit=10'); ?>
                </ul>
                
                <h4 class="archive-header">Archives by year</h4>
                <ul class="archive-list">
					<?php wp_get_archives('type=yearly&limit=10'); ?>
                </ul>
                    
                <h4 class="archive-header">Categories</h4>
                <ul class="archive-list">
					 <?php wp_list_categories('title_li=') ?> 
                </ul>
                </div>
            </article><!-- #post-## -->
		<?php endwhile; // end of the loop. ?>       
    </div>
	</div>
    
<?php get_footer(); ?>