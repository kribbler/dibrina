<?php
/**
 * The template for displaying the Portfolio page.
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
                <h3 class="entry-title"><?php echo get_theme_mod( 'portfolio_title','Portfolio'); ?></h3>
                </div>
                <div class="col-sm-6 hidden-xs">
                    <div class="text-right" style="margin-top:26px;"><?php if (function_exists('po_breadcrumbs')) po_breadcrumbs(); ?></div>
                </div>
                
                </div>
            </div>
        </div><!-- .entry-header -->
		<?php if ( have_posts() ) : ?>
        <!--[if !IE]><!-->
        <div class="po-page-portfolio-filter">
        <div class="container">
        <div class="row">
        <div class="col-lg-12" style="text-align: center;">

	    <?php   
					

			// Setup the arguments to pass in
			$args = array(
					'order'        => 'ASC',
					'orderby'      => 'menu_order'
			);
								
								
			
			
			$terms = get_terms("portfolio_categories"); // get all categories, but you can use any taxonomy
			$count = count($terms); //How many are they?
			$countpost = count($posts);
			
			
			if ( $count > 0 ){
			echo "<div id='filters' class='button-group btn-group' data-toggle='buttons'><span class='btn btn-default filter-button active' style='margin-left: -1px;' data-filter-value='*'><input type='radio' name='options'>All <span class='filter-button-count'>" . $countpost . "</span></span>";
				foreach ( $terms as $term ) {
					echo "<span class='btn btn-default filter-button' data-filter-value='." . $term->slug . "'><input type='radio' name='options'>" . $term->name . " <span class='filter-button-count'>" . $term->count . "</span></span>";
				 }
			echo "</div>";
			} ?>
         
         </div>
         </div>
         </div>
         </div>
 
		<div id="container" class="row po-full-width"><!--<![endif]-->
        <!--[if IE]><div id="" class="row po-full-width"><![endif]-->
			<?php while ( have_posts() ) : the_post(); 
					
				global $post, $portfolio_mb;
				$portfolio_mb->the_meta();
				$terms = get_the_term_list( $post->ID, 'portfolio_categories', '', ' <span class="cat-sep"></span> ', '' );
				
				$termsArray = get_the_terms( $post->ID, "portfolio_categories" );  //Get the terms for this particular item
				$termsString = ""; //initialize the string that will contain the terms
					foreach ( $termsArray as $term ) { // for each term 
						$termsString .= $term->slug.' '; //create a string that has all the slugs 
					}
				
				?>
	
				<!--[if !IE]><!--><div class="portfolio-item filter-item column-4 item <?php echo $termsString; ?>"><!--<![endif]-->
                <!--[if IE]><div class="portfolio-item col-sm-4 column-4 item <?php echo $termsString; ?>"><![endif]-->
					<a href="<?php the_permalink(); ?>">
						<div class="portfolio-details <?php echo get_theme_mod( 'portfolio_overlay' ); ?>">
							<div class="item-description">
							<div class="description-cell">
								<h5 class="item-title"><?php the_title(); ?></h5>
								<div class="subtitle"><?php echo strip_tags($terms, '<span>'); ?></div>
							</div>
							</div>
						</div>
						<div class="liquid-container">
							<?php 
							if ( '' == $portfolio_mb->get_the_value('image') ) {
								the_post_thumbnail('full'); 
							} else { ?>
							<img class="img-responsive" src="<?php echo $portfolio_mb->get_the_value('image'); ?>" alt="<?php the_title(); ?>"/>
							<?php }
							?>	
						</div>
					</a>
				</div>

			<?php endwhile; ?>
            
            
        <div class="col-sm-12">
        <div class="po-page-portfolio-paginate">
        <div style="text-align: center;">
   			<?php po_paginate(); ?>
        </div>
        </div>
        </div>         
         </div>
                  
        
        </div>


		<?php else : ?>
        
            <div class="container">
                <div class="row" style="padding-top:105px;">
                    <div class="col-sm-6">
                        <h4>There are currently no portfolio items.</h4>
                    </div>
                </div>
            </div>

        <?php endif; ?>	
            
<?php get_footer(); ?>
