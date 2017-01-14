<?php
/**
 * Template for displaying the search form with no slider.
 */
?>

<form role="search" method="get" class="search-sidebar" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<i class="fa fa-search search-icon-form-sidebar"></i>
	<input type="search" class="search-field-sidebar" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" >	
</form>