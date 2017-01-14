<?php
 /**
 * class po_bootstrap_walker_menu()
 * Extending Walker_Nav_Menu Class
 **/
 
  class po_bootstrap_walker_menu extends Walker_Nav_Menu {
 	
    function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
      // check, whether there are children for the given ID and append it to the element with a (new) ID
      $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
 
      return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
 	
	
    // CHANGE .sub-menu INTO .dropdown-menu
	
    function start_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }
 
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
      $item_html = '';
      parent::start_el($item_html, $item, $depth, $args);
 
      if (($item->hasChildren) && ($depth === 0)) {
        $item_html = str_replace('<a', '<a class="dropdown-toggle" data-toggle="dropdown" data-target="#"', $item_html);
        $item_html = str_replace('</a>', ' <b class="caret"></b></a>', $item_html);
      }
 
      $output .= $item_html;
    }
 
  }
 
  if ( ! function_exists( 'po_bootstrap_menu_class' ) ) {
  function po_bootstrap_menu_class($classes, $item) {
    // CHANGE .current-menu-item .current-menu-parent .current-menu-ancestor INTO .active
    $classes = preg_replace('/(current(-menu-|[-_]page[-_])(item|parent|ancestor))/', 'active', $classes);
 
    // Add the .dropdown class to the list items that have children
    if ($item->hasChildren) {
      $classes[] = 'dropdown';
    }
 
    return $classes;
  }
  }
  add_filter('nav_menu_css_class', 'po_bootstrap_menu_class', 10, 2);
 
if ( ! function_exists( 'po_remove_parent_classes' ) ) {
function po_remove_parent_classes($class)
{
  // check for current page classes, return false if they exist.
	return ($class == 'active') ? FALSE : TRUE;
}
}

if ( ! function_exists( 'po_add_class_to_wp_nav_menu' ) ) {
function po_add_class_to_wp_nav_menu($classes)
{
     switch (get_post_type())
     {
     	case 'portfolio':
     		// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
     		$classes = array_filter($classes, "po_remove_parent_classes");

     		// add the current page class to a specific menu item (replace ###).
     		if (in_array('portfolio', $classes))
     		{
     		   $classes[] = 'active';
         }
     		break;
		
		case 'team':
     		// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
     		$classes = array_filter($classes, "po_remove_parent_classes");

     		// add the current page class to a specific menu item (replace ###).
     		if (in_array('team', $classes))
     		{
     		   $classes[] = 'active';
               }
     		break;

      // add more cases if necessary and/or a default
     }
	return $classes;
}
}
add_filter('nav_menu_css_class', 'po_add_class_to_wp_nav_menu');