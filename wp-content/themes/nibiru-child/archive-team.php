<?php
/**
 * The template for displaying the Team page.
 */

get_header(); 
get_template_part( 'searchform-noslide', 'page' ); 

echo do_shortcode("[nav_bar_noslide slider='none']");
    ?>
    
    <div class="po-page">

        <div class="entry-header po-portfolio-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                <h3 class="entry-title"><?php echo get_theme_mod( 'team_title','Meet the team'); ?></h3>
                </div>
                <div class="col-sm-6 visible-lg hidden-xs">
                    <div class="text-right" style="margin-top:26px;"><?php if (function_exists('po_breadcrumbs')) po_breadcrumbs(); ?></div>
                </div>
                
                </div>
            </div>
        </div><!-- .entry-header -->
  
        <div class="container">
            <div class="row" style="padding-top:40px;">
                <div class="col-sm-6 col-sm-offset-3">
                    <h4 class="text-center"><?php echo get_theme_mod( 'team_subtitle'); ?></h4>
                </div>
            </div>
        </div>
        <?php if ( have_posts() ) : ?>
        
        <div class="container" style="padding-top:50px;">

            <?php /* Start the Loop */ ?>
            
            <?php 
            $category = get_theme_mod( 'team_category');
            $order = get_theme_mod( 'team_order','DESC');
            $orderby = get_theme_mod( 'team_orderby','date');
            $args = array( 
                'post_type' => 'team', 
                'team_categories' => $category, 
                'order' => $order, 
                'orderby' => $orderby,
                'posts_per_page' => '30'
             );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); 
            global $post;
            $terms = wp_get_object_terms( $post->ID, 'team_categories');
			$subtitle = ($terms && $terms[0])?$terms[0]->name:'';
            ?>

            <div class="po-column portfolio-item col-sm-<?php echo get_theme_mod( 'team_columns','3'); ?> column-<?php echo get_theme_mod( 'team_columns','3'); ?>" data-delay="0" data-animation="fade-in">
                <a href="<?php the_permalink(); ?>" target="_blank">
                    <div class="portfolio-details">
                        <div class="item-description">
                            <div class="description-cell">
                                <h5 class="item-title"><?php the_title(); ?></h5>
                                <div class="subtitle"><?php echo $subtitle; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="liquid-container">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                </a>
                </div>

            <?php endwhile; ?>
            <div class="clear-float"></div>
          </div>
          
          <div style="padding:30px 0; display: none">
            <div class="container">
                <div class="row">
                <div style="text-align: center;">
                    <?php po_paginate(); ?>
                </div>
            </div>
           </div>
</div>
</div>


<?php else : ?>

    <div class="container">
        <div class="row" style="padding-top:55px;">
            <div class="col-sm-6">
                <h4>There are currently no team members.</h4>
            </div>
        </div>
    </div>

<?php endif; ?>
            
<?php get_footer(); ?>
