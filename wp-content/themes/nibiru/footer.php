<?php
/**
 * The template for displaying the footer.
 */
?>



<?php 
    global $footer_mb;
    if ( 'show' == $footer_mb->get_the_value( 'footer_button' ) ) {
   		echo do_shortcode("[button animation='true' style='banner' color='".get_theme_mod( 'footer_button_color_type','dark' )."' icon='".get_theme_mod( 'footer_button_icon','fa-credit-card' )."' link='".get_theme_mod( 'footer_button_link' )."']".get_theme_mod( 'footer_button_text','Call-To-Action Button Text' )."[/button]"); 
	}
?>

<?php 
    global $footer_mb;
    if ( 'hide' == $footer_mb->get_the_value( 'footer_top_hide' ) ) { 
	} else {
	?>
    
<div class="footer-container">
<div class="footer-inner-container"> 
<div class="container">
	<div class="row">
    	<?php
	
		$args = array( 'post_type' => 'footer_column', 'footer_column_categories' => '', 'posts_per_page' => '', 'order' => '', 'orderby' => '' );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); 
		global $post;
		global $footer_column_mb;
		$footer_column_mb->the_meta();
		
		?>
    	<div class="po-column col-md-<?php $footer_column_mb->the_value('width'); ?>" data-delay="0" data-animation="fade-in">
        	<h6 class="header-small" style="margin-bottom:20px;"><?php the_title() ?></h6>
        	<?php the_content(); ?>
        </div>
        <?php 
		if ( 'show' == $footer_column_mb->get_the_value( 'last_column' ) ) {  ?>
		<div class="clearfix"></div>	
		<?php } else {
		}
		?>
        <?php endwhile; ?>
    </div>
</div>
</div>
</div>
<?php } ?>
<?php 
    global $footer_mb;
    if ( 'hide' == $footer_mb->get_the_value( 'footer_bottom_hide' ) ) { 
	} else {
	?>

<div class="footer-container-bottom">
<div class="container">
	<div class="row">
    	<div class="po-column col-sm-12" data-delay="0" data-animation="fade-in" style="padding-top:0; padding-bottom:0;">
    	<div class="col-md-12 col-lg-4" style="padding:25px 0 15px;">
        	<p><span>&copy; <?php echo date('Y'); ?> <?php bloginfo(); ?>. <a href="http://pixelobject.com/themes/nibiru/">Nibiru Theme</a> by <a href="http://pixelobject.com">Pixel Object</a></span></p>
        </div>
        <div class="col-lg-8 visible-lg" style="padding:25px 0 0px;">
        	<nav class="navbar po-navbar-footer" role="navigation" style="margin:0px;">
		  <!-- Mobile display -->
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			  <span class="sr-only">Toggle navigation</span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			</button>
		  </div>
		 
		  <!-- Collect the nav links for toggling -->
		  <?php // Loading WordPress Custom Menu
		  if (has_nav_menu('footer-menu')) {
			 wp_nav_menu( array(
				'theme_location'  => 'footer-menu',
				'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
				'menu_class'      => 'nav navbar-nav',
				'walker'          => new po_bootstrap_walker_menu()
			) );
		  }
		  ?>
		</nav>
        <div class="clear-float"></div>
        </div>
        </div>
    </div>
</div>
</div>
</div>
<?php } ?>
<?php wp_footer(); ?>

</body>
</html>