<?php
/**
 * The template for displaying all portfolio items.
 */

get_header(); 
get_template_part( 'searchform-noslide', 'page' ); 

echo do_shortcode("[nav_bar_noslide slider='none']");	?>
    
    <div class="po-page">
        <?php 
		global $page_mb;
		$page_mb->the_meta();
		
		if ( 'hide' == $page_mb->get_the_value( 'cb_single' ) ) { } else {
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
		<div class="hidden-xs hidden-sm" style="width:100%; position:absolute; z-index:99; margin-top:50px;">
        	<?php next_post_link( '%link', '<div class="arrow-next"></div><h2 class="titlea">%title</h2>' ); ?>
            <div class="banner2"></div>
            <?php next_post_link( '<div class="next-b"></div>' ); ?>
                
            
            <?php previous_post_link( '%link', '<div class="arrow"></div><h2 class="titleb">%title</h2>' ); ?>
            <div class="banner"></div>
            <?php previous_post_link( '<div class="prev-b"></div>' ); ?>
        </div>
        
        <div class="share-links-container">
        <div class="container">
		<div class="row">
        	
            <div class="col-sm-6 col-sm-offset-6 text-right">
            	<div class="share-links">
                	<ul>
                    <li><a href="mailto:?subject=<?php the_title(); ?>&body=<?php echo strip_tags(get_the_excerpt()); ?><?php the_permalink(); ?>"><span class="next green"><i class="fa fa-envelope-o"></i></span></a></li>
                    
                    <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
				      '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span class="index goog"><i class="fa fa-google-plus"></i></span></a></li>
                    <li><a href="https://twitter.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
				      '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;"><span class="index twit"><i class="fa fa-twitter"></i></span></a></li>
                    <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
				      '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;"><span class="index fb"><i class="fa fa-facebook"></i></span></a></li>
                    <li>
                    	<div class="love green">
                    	<?php if (function_exists( 'lip_love_it_link' )) {
							echo lip_love_it_link(get_the_ID(), '<i class="fa fa-heart-o"></i>', '<i class="fa fa-heart-o"></i>', false);
						} ?>
                        </div>
                    </li>
                    </ul>
                </div>    
            	
            </div>
        </div>
        </div>
        </div>
        <div class="row po-full-width">
        <div class="portfolio-page col-sm-12 column-12">
            <div class="liquid-container-page">
                <a href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>"><?php the_post_thumbnail('full'); ?></a>
            </div>
        </div>
    	</div>
            
		<?php while ( have_posts() ) : the_post(); ?>
        <?php
				if ( 'hide' == $page_mb->get_the_value( 'page_padding' ) ) {
				?>	
            	
                <?php 
            	} else { ?>
                <div class="container page-padding po-container-section">
                	<div class="row">
                		<div class="col-sm-12">
                <?php 
				}
				?>
						
                        	<div class="entry-content">
								<?php the_content(); ?>
                                <div class="clearfix"></div>
                                <?php edit_post_link( __( 'Edit', 'pixelobject' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
            				</div><!-- .entry-content -->
                           <?php
							if ( 'hide' == $page_mb->get_the_value( 'page_padding' ) ) {
							?>	
                            	<?php if ( comments_open() || '0' != get_comments_number() ) { ?>
                                <div class="container page-padding po-container-section" style="margin-top:-1px; padding-bottom:100px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="page-comments po-blog">
                                            	</div>
                                                <?php comments_template(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php } ?>
                      	 <?php } else { ?>
                         
                         		<?php if ( comments_open() || '0' != get_comments_number() ) { ?>
                                        <div class="page-comments po-blog">
                                            <?php  comments_template(); ?>
                                        </div>
                         		 <?php } ?>
                          <?php } ?>
                        
                    <?php
				if ( 'hide' == $page_mb->get_the_value( 'page_padding' ) ) {
				?>	
            	
                <?php 
            	} else { ?>
                </div>
                </div>
                </div>
                <?php 
				}
				?>
        <div class="clearfix"></div>
        <?php 
        // get the custom post type's taxonomy terms
          
        $custom_taxterms = wp_get_object_terms( $post->ID, 'portfolio_categories', array('fields' => 'ids') );
        // arguments
        $args = array(
        'post_type' => 'portfolio',
        'post_status' => 'publish',
        'posts_per_page' => 3, // you may edit this number
        'orderby' => 'rand',
        'tax_query' => array(
            array(
                'taxonomy' => 'portfolio_categories',
                'field' => 'id',
                'terms' => $custom_taxterms
            )
        ),
        'post__not_in' => array ($post->ID),
        );
        $related_items = new WP_Query( $args );
        // loop over query
        if ($related_items->have_posts()) :
        echo '<div class="section-background-white section-" style="padding:50px 0 0px;">' . do_shortcode("[header paddingbottom='50']Related projects[/header]");
			while ( $related_items->have_posts() ) : $related_items->the_post();
			global $post, $portfolio_mb;
			$portfolio_mb->the_meta();
			?>
			
			<div class="portfolio-item col-sm-4 column-4">
				<a href="<?php the_permalink(); ?>">
					<div class="portfolio-details">
						<div class="item-description">
						<div class="description-cell">
							<h5 class="item-title"><?php the_title(); ?></h5>
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
			  
			<?php
			endwhile;
        echo '<div class="clear-float"></div></div></div>';
        endif;
        // Reset Post Data
        wp_reset_postdata();
        ?>
           
		<?php endwhile; // end of the loop. ?>
			
    <?php get_footer(); ?>
