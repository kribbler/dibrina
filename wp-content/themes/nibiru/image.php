<?php
/**
 * The template for displaying image attachments.
 */

get_header(); 
get_template_part( 'searchform-noslide', 'page' ); 

echo do_shortcode("[nav_bar slider='none']");

	?>
    <div class="light-page">
		<div class="po-page-middle-plain">

				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('po-article'); ?>>
                    	<div class="po-content-middle">
						<header class="entry-header blog-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header><!-- .entry-header -->

						<div class="entry-content blog-content">
							<div class="entry-attachment">
								<div class="attachment">
									<?php pixelobject_the_attached_image(); ?>
								</div><!-- .attachment -->

								<?php if ( has_excerpt() ) : ?>
								<div class="entry-caption">
									<?php the_excerpt(); ?>
								</div><!-- .entry-caption -->
								<?php endif; ?>
							</div><!-- .entry-attachment -->

							<?php
								the_content();
							?>
						</div><!-- .entry-content -->

						<?php edit_post_link( __( 'Edit', 'pixelobject' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                        <?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() )
							comments_template();
					?>
                        </div>
					</article><!-- #post-## -->

					

				<?php endwhile; // end of the loop. ?>

			
		</div>
	</div>

<?php get_footer(); ?>
