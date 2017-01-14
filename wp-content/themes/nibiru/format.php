<?php
/**
 * The template for a standard post.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('po-article'); ?>>
	<a href="<?php the_permalink(); ?>">
	<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
    </a>
    <div class="po-content-middle">
        <header class="entry-header blog-header">
            <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        </header><!-- .entry-header -->
        <div class="entry-content blog-content">
            <?php the_content( __( 'Continue reading &rarr;', 'pixelobject' ) ); ?>
        </div><!-- .entry-content -->

        <footer class="entry-meta">
            <?php the_date('F j, Y', '<div class="post-meta">', '</div>'); ?>
    
            <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
            <div class="post-meta"><?php comments_popup_link( __( 'Leave a comment', 'pixelobject' ), __( '1 Comment', 'pixelobject' ), __( '% Comments', 'pixelobject' ) ); ?></div>
            <?php endif; ?>
            
            <div class="post-meta post-love">
				<?php if (function_exists( 'lip_love_it_link' )) {
                    echo lip_love_it_link(get_the_ID(), '<i class="fa fa-heart-o"></i>', '<i class="fa fa-heart-o"></i>', false);
                } ?>	
            </div>
            <div class="clear-float"></div>
            <?php edit_post_link( __( 'Edit', 'pixelobject' ), '<div class="edit-link">', '</div>' ); ?>
        </footer><!-- .entry-meta -->
    </div>
</article><!-- #post-## -->