<?php
/**
 * Template for displaying the search form with no slider.
 */
?>

<form role="search" method="get" class="search-form-noslide" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<i class="fa fa-search search-icon-form-noslide"></i>
	<input type="search" class="search-field" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" autofocus >	
</form>
<div class="search-icon-noslide"></div>
<a href="<?php echo home_url(); ?>/search"><div class="search-icon-mobile visible-xs visible-sm"></div></a>