<?php
/**
 * The template for displaying all team members.
 */

get_header(); 
get_template_part( 'searchform-noslide', 'page' ); 

echo do_shortcode("[nav_bar_noslide slider='none']");
	?>
    
    <div class="po-page">
    	<?php 
		global $page_mb;
		if ( 'show' == $page_mb->get_the_value( 'cb_single' ) ) {
		?>	                             
        <div class="entry-header po-portfolio-header">
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
		<div class="hidden-xs po-arrows-container">
        	<?php next_post_link( '%link', '<div class="arrow-next"></div><h2 class="titlea">%title</h2>' ); ?>
            <div class="banner2"></div>
            <?php next_post_link( '<div class="next-b"></div>' ); ?>
                
            
            <?php previous_post_link( '%link', '<div class="arrow"></div><h2 class="titleb">%title</h2>' ); ?>
            <div class="banner"></div>
            <?php previous_post_link( '<div class="prev-b"></div>' ); ?>     
        </div>
        
        
        
        <div class="row po-full-width">
    		<div class="portfolio-page col-sm-6 column-6">
            <div class="liquid-container-page">
                <a href="<?php echo get_post_type_archive_link( 'team' ); ?>"><?php the_post_thumbnail('full'); ?></a>
            </div>
        </div>
    	<div class="po-column col-sm-6" data-delay="0" data-animation="fade-in" style="padding-top:0;">
            <div class="row" style="padding-top:30px;">
            <div class="col-sm-10 col-sm-offset-1 mobile-container team-content">
				<?php 
                while ( have_posts() ) : the_post();
                global $post;
                $terms = get_the_term_list( $post->ID, 'team_categories', '', ' <span class"cat-sep"></span> ', '' );
                ?>
                <h3 class="team-role"><?php echo strip_tags($terms, '<span>'); ?></h3>
                <?php the_content(); ?>
                <?php endwhile; // end of the loop. ?>

        </div>
        </div>
        </div>
        </div>
        </div>
			
    
<?php get_footer(); ?>