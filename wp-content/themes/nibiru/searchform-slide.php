<?php
/**
 * Template for displaying the search form.
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<i class="fa fa-search search-icon-form"></i>
	<input type="search" class="search-field" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" autofocus >	
</form>
<div class="search-icon"></div>
<a href="<?php echo home_url(); ?>/search"><div class="search-icon-mobile visible-xs visible-sm"></div></a>
