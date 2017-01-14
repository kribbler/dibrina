<?php
/**
 * Search content.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('po-article'); ?>>
	<a href="<?php the_permalink(); ?>">
	<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
    </a>
    <div class="po-search-middle">
   
	<header class="entry-header search-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header><!-- .entry-header -->
	
    </div>
</article><!-- #post-## -->