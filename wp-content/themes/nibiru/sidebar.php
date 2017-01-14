<?php
/**
 * The Sidebar containing the main widget area
 */
?>
<div id="secondary">
	<?php if ( is_active_sidebar( 'po-sidebar' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'po-sidebar' ); ?>
	</div><!-- #primary-sidebar -->
	<?php endif; ?>
</div><!-- #secondary -->
