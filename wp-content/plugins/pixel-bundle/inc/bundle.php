<?php

/* PO-SLIDER SHORTCODES
------------------------------------------------------- */  

function po_slider_details( $atts , $content = null ) {
global $slider_mb;
$slider_mb->the_meta();
	extract( shortcode_atts(
		array(
			'animation' => 'fade-in',  
			'detailsdelay' => '1500', 
			'logo' => '', 
			'logodelay' => '200', 
			'logoanimation' => '', 
		), $atts )
	);

	$output="";
	
	if ( 'hide' == $slider_mb->get_the_value( 'slider_logo' ) ) {
	
		$output .= '<div class="po-slider-details" data-details-animation="po-'.$animation.'" data-details-delay="'.$detailsdelay.'">';
		$output .= '<div class="container po-slider-buttons">';
		$output .= '<div class="row">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
	
	}
	
	else {
		
		
		$output .= '<div class="po-slider-logo" data-logo-delay="'.$logodelay.'">';
		$output .= '<a href="'.get_theme_mod( 'logo_url').'"><img class="logo center-block" src="'.$logo.'" alt="'.__('Logo', 'pixelobject').'"></a>';
		$output .= '</div>';
		$output .= '<div class="po-slider-details" data-details-animation="po-'.$animation.'" data-details-delay="'.$detailsdelay.'">';
		$output .= '<div class="container po-slider-buttons">';
		$output .= '<div class="row">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
	
		
	}
	
	return $output;

}
add_shortcode( 'slider_details', 'po_slider_details' );

function po_slider_details_nologo( $atts , $content = null ) {

	extract( shortcode_atts(
		array(
			'animation' => 'fade-in',  
			'detailsdelay' => '1500', 
			'logo' => '', 
			'logoDelay' => '1500', 
			'logoanimation' => '', 
		), $atts )
	);

	$output="";
	$output .= '<div class="po-slider-details" data-details-animation="po-'.$animation.'" data-details-delay="'.$detailsdelay.'">';
	$output .= '<div class="container po-slider-buttons">';
	$output .= '<div class="row">';
	$output .= do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	
	return $output;

}
add_shortcode( 'slider_details_nologo', 'po_slider_details_nologo' );

function po_slider_column( $atts, $content = null ) {
	
	extract(shortcode_atts(
		array(
			'width' => '3',  
			'offset' => '',
		), $atts )
	);
	
	$output="";
	
	$output .= '<div class="col-md-'.$width.' col-sm-offset-'.$offset.'">';
	$output .= do_shortcode($content);
	$output .= '</div>';
	
	return $output;
	
}
add_shortcode('slider_column', 'po_slider_column');

function po_slider_button( $atts, $content = null ) {
	
	extract(shortcode_atts(
		array(
			'type' => '',
			'style' => 'outline',
			'color' => 'white',
			'size' => 'lg',
			'link' => '#',
		), $atts )
	);
	
	$output="";
	
	if ($type == "anchor") {
		
		$output .= '<button type="button" id="learn-more-button" class="slider-btn po-slider-anchor btn '.$style.'-button '.$color.' btn-'.$size.' btn-block btn-icon-ani center-block">';
		$output .= do_shortcode($content);
		$output .= '</button>';
	
	} 
	
	else if ($type == "anchor-video") {
		
		$output .= '<button type="button" id="learn-more-button" class="po-slider-anchor btn '.$style.'-button '.$color.' btn-'.$size.' btn-block btn-icon-ani center-block" style="width:100%">';
		$output .= do_shortcode($content);
		$output .= '</button>';
	
	} 
	
	else if ($type == "video") {
		
		$output .= '<button class="slider-btn-video btn '.$style.'-button '.$color.' btn-'.$size.' btn-block btn-icon-ani center-block" data-toggle="modal" data-target="#myModal">';
		$output .= do_shortcode($content);
		$output .= '</button>';
	
	}
	
	else if ($type == "video-noanchor") {
		
		$output .= '<button class="slider-btn-video-noanchor btn '.$style.'-button '.$color.' btn-'.$size.' btn-block btn-icon-ani center-block" data-toggle="modal" data-target="#myModal">';
		$output .= do_shortcode($content);
		$output .= '</button>';
	
	}
	
	else {
		$output = '<a href="'.$link.'" type="button" class="btn '.$style.'-button '.$color.' btn-'.$size.' btn-block">';
		$output .= do_shortcode($content);
		$output .= '</a>';
	}
	
	return $output;
	
}
add_shortcode('slider_button', 'po_slider_button');

function po_slider_text( $atts, $content = null ) {
	
	extract(shortcode_atts(
		array(
			'delay' => '2500',
			'animation' => 'fade-in',
			'type' => '',
		), $atts )
	);
	
	$output="";
	
	if ($type=="static"){
		$output .= '<div class="po-slider-text-container-static" data-text-delay="'.$delay.'">';
		$output .= '<div class="po-slider-text-static center-block" data-text-animation="po-'.$animation.'">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		$output .= '</div>';
	}
	else {
		$output .= '<div class="po-slider-text-container" data-text-delay="'.$delay.'">';
		$output .= '<div class="po-slider-text center-block" data-text-animation="po-'.$animation.'">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		$output .= '</div>';
	}
	
	return $output;
	
}
add_shortcode('slider_text', 'po_slider_text');


function po_slider_title($atts) {
	
	ob_start();
	
	extract(shortcode_atts( 
		array (
			'category' => '',
			'columnwidth' => '2',
			'number' => '6',
			'order' => 'DESC',
			'orderby' => 'date',
		), $atts ) 
	);
	
	$args = array( 'post_type' => 'slider_titles', 'slider_title_categories' => $category, 'posts_per_page' => $number, 'order' => $order, 'orderby' => $orderby );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post(); 
	global $post;
	$terms = wp_get_object_terms( $post->ID, 'slider_title_categories');
	?>
    
    <h1 class="po-slider-header text-center"><?php __(the_title()); ?></h1>
                     
	<?php endwhile; ?>
    <?php wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	
}
add_shortcode('slider_titles', 'po_slider_title');

function po_slider_gallery( $atts, $content = null ) {
	
	extract(shortcode_atts(
		array(
			'shade' => 'green',
			'type' => '',
			'overlay' => '',
		), $atts )
	);
	
	$output="";
	
	if ($type == 'static') {
		$output .= '<div class="po-slider">';
		$output .= '<div class="po-slider-load" id="po-slider-load"></div>';
		$output .= '<div class="load-block"></div>';
		$output .= '<div class="background-greyscale '.$shade.'"></div>';
		$output .= '<ul class="po-slider-loop">';
		$output .= do_shortcode($content);
		$output .= '</ul>';
		$output .= '</div>';
	}
	else
	{
		$output .= '<div class="po-slider">';
		$output .= '<div class="po-slider-load" id="po-slider-load"></div>';
		$output .= '<div class="load-block"></div>';
		
		if( $overlay == 'show') { 
			$output .= '<div class="background-greyscale '.$shade.'"></div>';
		}
		
		$output .= '<ul class="po-slider-loop">';
		$output .= do_shortcode($content);
		$output .= '</ul>';
		$output .= '</div>';
	}
	
	return $output;
	
}
add_shortcode('slider_gallery', 'po_slider_gallery');

function po_slider_gallery_no_controls( $atts, $content = null ) {
	
	extract(shortcode_atts(
		array(
			'shade' => 'green',
		), $atts )
	);
	
	$output="";
	
	$output .= '<div class="po-slider">';
	$output .= '<div class="po-slider-load" id="po-slider-load"></div>';
	$output .= '<div class="load-block"></div>';
	$output .= '<div class="background-greyscale '.$shade.'"></div>';
	$output .= '<ul class="po-slider-loop-no-control">';
	$output .= do_shortcode($content);
	$output .= '</ul>';
	$output .= '</div>';
	
	return $output;
	
}
add_shortcode('slider_gallery_no_controls', 'po_slider_gallery_no_controls');

function po_slider_images($atts) {
	
	ob_start();
	
	extract(shortcode_atts( 
		array (
			'number' => '10',
			'category' => '',
			'order' => 'DESC',
			'orderby' => 'date',
		), $atts ) 
	);
	
	$args = array( 'post_type' => 'gallery', 'gallery_categories' => $category, 'posts_per_page' => $number, 'order' => $order, 'orderby' => $orderby );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<li><?php the_post_thumbnail('full'); ?></li>
    <?php endwhile;
	
	wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	
}
add_shortcode('slider_images', 'po_slider_images');

function po_nav_bar($atts) {
	
	
	extract(shortcode_atts( 
		array (
			'slider' => 'display',
		), $atts ) 
	);
    
    if( get_theme_mod( 'nav_text_custom' ) == '1') { 
			
    ob_start();
	?>
    
	<div class="to-top"></div>
	<div class="po-slider-<?php echo $slider; ?> po-nav po-nav-slide">
    	
		<nav class="navbar po-navbar custom-color-nav-text po-navbar-slide" role="navigation" style="margin:0px;">
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
		  if (has_nav_menu('header-menu')) {
			 wp_nav_menu( array(
				'theme_location'  => 'header-menu',
				'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
				'menu_class'      => 'nav navbar-nav',
				'walker'          => new po_bootstrap_walker_menu()
			) );
		  }
		  ?>
		</nav><?php
	
	wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	} else {
	
	ob_start();
	?>
    
	<div class="to-top"></div>
	<div class="po-slider-<?php echo $slider; ?> po-nav po-nav-slide">
    	
		<nav class="navbar po-navbar po-navbar-slide" role="navigation" style="margin:0px;">
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
		  if (has_nav_menu('header-menu')) {
			 wp_nav_menu( array(
				'theme_location'  => 'header-menu',
				'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
				'menu_class'      => 'nav navbar-nav',
				'walker'          => new po_bootstrap_walker_menu()
			) );
		  }
		  ?>
		</nav><?php
	
	wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	
	}
}
add_shortcode('nav_bar', 'po_nav_bar');


function po_nav_bar_noslide($atts) {
	
	
	
	extract(shortcode_atts( 
		array (
			'slider' => 'display',
		), $atts ) 
	);
    
    if( get_theme_mod( 'nav_text_custom' ) == '1') { 
    
    
    ob_start();
	?>
    
	<div class="to-top"></div>
	<div class="po-nav nav-fixed-padding">
    
    	
		<nav class="navbar po-navbar custom-color-nav-text navbar-fixed-top" role="navigation" style="margin:0px;">
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
		  if (has_nav_menu('header-menu')) {
			 wp_nav_menu( array(
				'theme_location'  => 'header-menu',
				'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
				'menu_class'      => 'nav navbar-nav',
				'walker'          => new po_bootstrap_walker_menu()
			) );
		  }
		  ?>
		</nav><?php
	
	wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	} else {
	
		 ob_start();
	?>
    
	<div class="to-top"></div>
	<div class="po-nav nav-fixed-padding">
    
    	
		<nav class="navbar po-navbar navbar-fixed-top" role="navigation" style="margin:0px;">
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
		  if (has_nav_menu('header-menu')) {
			 wp_nav_menu( array(
				'theme_location'  => 'header-menu',
				'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
				'menu_class'      => 'nav navbar-nav',
				'walker'          => new po_bootstrap_walker_menu()
			) );
		  }
		  ?>
		</nav><?php
	
	wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	
	}
}
add_shortcode('nav_bar_noslide', 'po_nav_bar_noslide');



/* SECTION SHORTCODE
------------------------------------------------------- */

function po_section( $atts, $content = null ) {
	
	extract( shortcode_atts(
		array(
			'width' => '',
			'background' => 'white',
			'backgroundcolor' => '',
			'paddingtop' => '',
			'paddingbottom' => '',
			'border' => '',
			'imageurl' => '',
			'webmurl' => '',
			'mp4url' => '',
			'oggurl' => '',
			'videoimage' => '',
			'overlay' => '',
			'overlaycolor' => '',
			'ratio' => '0.5',
			'id' => '',
			'toparrowcolor' => '',
			'bottomarrowcolor' => '',
		), $atts )
	);
	
	$output="";
	
	if ($width == "full") {
		if ($background == "image-parallax") {
			if ($overlaycolor == "") {
				if ($id == "") {
					$output .= '<div class="po-section section-image section-background-image-parallax section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.');">';
				}else{
					$output .= '<div id="'.$id.'" class="po-section section-image section-background-image-parallax section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.');" data-center="background-position: 50% 0px;"
        data-bottom-top="background-position: 50% 150px;"
        data-top-bottom="background-position: 50% -150px;"
        data-anchor-target="#'.$id.'">';
				}
			$output .= '<div class="ss-style-triangles" style="background-color:'.$toparrowcolor.';"></div>';
			$output .= '<div class="row po-full-width">';
			$output .= do_shortcode($content);
			$output .= '</div>';
			$output .= '<div class="transparent-triangle-container">';
			$output .= '<table>';
			$output .= '<tr>';
			$output .= '<td class="transparent-triangle-left-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '<td class="transparent-triangle-left-triangle-container">';
			$output .= '<div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent '.$bottomarrowcolor.';"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-triangle-container">';
			$output .= '<div class="transparent-triangle-right-triangle" style="border-color: transparent '.$bottomarrowcolor.' transparent transparent;"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '</tr>';
			$output .= '</table>';
			$output .= ' <div class="transparent-triangle-container-bottom-white"></div>';
			$output .= '</div></div>';
			}
			else {
			if ($id == "") {
			$output .= '<div class="po-section section-image section-background-image-parallax section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.'); -webkit-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; -moz-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.';">';
			}else{
			$output .= '<div id="'.$id.'" class="po-section section-image section-background-image-parallax section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.'); -webkit-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; -moz-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.';" data-center="background-position: 50% 0px;"
        data-bottom-top="background-position: 50% 150px;"
        data-top-bottom="background-position: 50% -150px;"
        data-anchor-target="#'.$id.'">';
			}
			$output .= '<div class="ss-style-triangles" style="background-color:'.$toparrowcolor.';"></div>';
			$output .= '<div class="row po-full-width">';
			$output .= do_shortcode($content);
			$output .= '</div>';
			$output .= '<div class="transparent-triangle-container">';
			$output .= '<table>';
			$output .= '<tr>';
			$output .= '<td class="transparent-triangle-left-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '<td class="transparent-triangle-left-triangle-container">';
			$output .= '<div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent '.$bottomarrowcolor.';"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-triangle-container">';
			$output .= '<div class="transparent-triangle-right-triangle" style="border-color: transparent '.$bottomarrowcolor.' transparent transparent;"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '</tr>';
			$output .= '</table>';
			$output .= ' <div class="transparent-triangle-container-bottom-white"></div>';
			$output .= '</div></div>';
			}
		} 
		
		else if ($background == "image-fixed") {
			if ($overlaycolor == "") {
			if ($id == "") {
				$output .= '<div class="po-section section-image section-background-image-fixed section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.');">';
			}else{
				$output .= '<div id="'.$id.'" class="po-section section-image section-background-image-fixed section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.');">';
			}
			$output .= '<div class="ss-style-triangles" style="background-color:'.$toparrowcolor.';"></div>';
			$output .= '<div class="row po-full-width">';
			$output .= do_shortcode($content);
			$output .= '</div>';
			$output .= '<div class="transparent-triangle-container">';
			$output .= '<table>';
			$output .= '<tr>';
			$output .= '<td class="transparent-triangle-left-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '<td class="transparent-triangle-left-triangle-container">';
			$output .= '<div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent '.$bottomarrowcolor.';"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-triangle-container">';
			$output .= '<div class="transparent-triangle-right-triangle" style="border-color: transparent '.$bottomarrowcolor.' transparent transparent;"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '</tr>';
			$output .= '</table>';
			$output .= ' <div class="transparent-triangle-container-bottom-white"></div>';
			$output .= '</div></div>';
			}
			else {
			if ($id == "") {
			$output .= '<div class="po-section section-image section-background-image-fixed section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.'); -webkit-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; -moz-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.';">';
			}else{
			$output .= '<div id="'.$id.'" class="po-section section-image section-background-image-fixed section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.'); -webkit-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; -moz-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.';">';
			}
			$output .= '<div class="ss-style-triangles" style="background-color:'.$toparrowcolor.';"></div>';
			$output .= '<div class="row po-full-width">';
			$output .= do_shortcode($content);
			$output .= '</div>';
			$output .= '<div class="transparent-triangle-container">';
			$output .= '<table>';
			$output .= '<tr>';
			$output .= '<td class="transparent-triangle-left-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '<td class="transparent-triangle-left-triangle-container">';
			$output .= '<div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent '.$bottomarrowcolor.';"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-triangle-container">';
			$output .= '<div class="transparent-triangle-right-triangle" style="border-color: transparent '.$bottomarrowcolor.' transparent transparent;"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '</tr>';
			$output .= '</table>';
			$output .= ' <div class="transparent-triangle-container-bottom-white"></div>';
			$output .= '</div></div>';
			}
		}
		
		else if ($background == "image") {
			if ($overlaycolor == "") {
			if ($id == "") {
			$output .= '<div class="po-section section-image section-background-image section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.'); background-size:cover;">';
			}else{
			$output .= '<div id="'.$id.'" class="po-section section-image section-background-image section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.'); background-size:cover;">';
			}
			$output .= '<div class="ss-style-triangles" style="background-color:'.$toparrowcolor.';"></div>';
			$output .= '<div class="row po-full-width">';
			$output .= do_shortcode($content);
			$output .= '</div>';
			$output .= '<div class="transparent-triangle-container">';
			$output .= '<table>';
			$output .= '<tr>';
			$output .= '<td class="transparent-triangle-left-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '<td class="transparent-triangle-left-triangle-container">';
			$output .= '<div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent '.$bottomarrowcolor.';"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-triangle-container">';
			$output .= '<div class="transparent-triangle-right-triangle" style="border-color: transparent '.$bottomarrowcolor.' transparent transparent;"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '</tr>';
			$output .= '</table>';
			$output .= ' <div class="transparent-triangle-container-bottom-white"></div>';
			$output .= '</div></div>';
			}
			else {
			if ($id == "") {
			$output .= '<div class="po-section section-image section-background-image section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.'); background-size:cover; -webkit-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; -moz-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.';">';
			}else{
			$output .= '<div id="'.$id.'" class="po-section section-image section-background-image section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.'); background-size:cover; -webkit-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; -moz-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.';">';
			}
			$output .= '<div class="ss-style-triangles" style="background-color:'.$toparrowcolor.';"></div>';
			$output .= '<div class="row po-full-width">';
			$output .= do_shortcode($content);
			$output .= '</div>';
			$output .= '<div class="transparent-triangle-container">';
			$output .= '<table>';
			$output .= '<tr>';
			$output .= '<td class="transparent-triangle-left-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '<td class="transparent-triangle-left-triangle-container">';
			$output .= '<div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent '.$bottomarrowcolor.';"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-triangle-container">';
			$output .= '<div class="transparent-triangle-right-triangle" style="border-color: transparent '.$bottomarrowcolor.' transparent transparent;"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '</tr>';
			$output .= '</table>';
			$output .= ' <div class="transparent-triangle-container-bottom-white"></div>';
			$output .= '</div></div>';
			}
		}
		
		else if ($background == "video") {
			if ($id == "") {
			$output .= '<div class="po-section section-video" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; -webkit-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; -moz-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.';">';
			}else{
			$output .= '<div id="'.$id.'" class="po-section section-video" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; -webkit-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; -moz-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.';">';
			}
			$output .= '<div class="ss-style-triangles" style="background-color:'.$toparrowcolor.';"></div>';
			$output .= '<div class="section-video-content"> ';
			$output .= '<div class="row po-full-width">';
			$output .= do_shortcode($content);
			$output .= '</div></div>';
			$output .= '<video autoplay loop class="po-background-video">';
			$output .= '<source src="'.$webmurl.'" type="video/webm">';
			$output .= '<source src="'.$mp4url.'" type="video/mp4">';
			$output .= '<source src="'.$oggurl.'" type="video/ogg">';
			$output .= '<img class="video-image" src="'.$videoimage.'" title="Your browser does not support the <video> tag" alt="video">';
			$output .= '</video>';
			$output .= '<div class="transparent-triangle-container">';
			$output .= '<table>';
			$output .= '<tr>';
			$output .= '<td class="transparent-triangle-left-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '<td class="transparent-triangle-left-triangle-container">';
			$output .= '<div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent '.$bottomarrowcolor.';"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-triangle-container">';
			$output .= '<div class="transparent-triangle-right-triangle" style="border-color: transparent '.$bottomarrowcolor.' transparent transparent;"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '</tr>';
			$output .= '</table>';
			$output .= ' <div class="transparent-triangle-container-bottom-white"></div>';
			$output .= '</div></div>';
			
		}
		
		else {
			if ($id == "") {
			$output .= '<div class="po-section section-background-'.$background.' section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background-color:'.$backgroundcolor.';">';
			}else{
			$output .= '<div id="'.$id.'" class="po-section section-background-'.$background.' section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background-color:'.$backgroundcolor.';">';
			}
			$output .= '<div class="ss-style-triangles" style="background-color:'.$toparrowcolor.';"></div>';
			$output .= '<div class="row po-full-width">';
			$output .= do_shortcode($content);
			$output .= '</div></div>';
		}
	} 
	else {
		if ($background == "image-parallax") {
			if ($overlaycolor == "") {
			if ($id == "") {
			$output .= '<div class="po-section section-image section-background-image-parallax section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.');">';
			}else{
			$output .= '<div id="'.$id.'" class="po-section section-image section-background-image-parallax section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.');" data-center="background-position: 50% 0px;"
        data-bottom-top="background-position: 50% 150px;"
        data-top-bottom="background-position: 50% -150px;"
        data-anchor-target="#'.$id.'">';
			}
			$output .= '<!--[if IE 8]><img class="section-bg-ie" src="'.$imageurl.'" alt="background"><![endif]-->';
			$output .= '<div class="ss-style-triangles" style="background-color:'.$toparrowcolor.';"></div>';
			$output .= '<div class="container">';
			$output .= '<div class="row">';
			$output .= do_shortcode($content);
			$output .= '</div></div>';
			$output .= '<div class="transparent-triangle-container">';
			$output .= '<table>';
			$output .= '<tr>';
			$output .= '<td class="transparent-triangle-left-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '<td class="transparent-triangle-left-triangle-container">';
			$output .= '<div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent '.$bottomarrowcolor.';"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-triangle-container">';
			$output .= '<div class="transparent-triangle-right-triangle" style="border-color: transparent '.$bottomarrowcolor.' transparent transparent;"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '</tr>';
			$output .= '</table>';
			$output .= ' <div class="transparent-triangle-container-bottom-white"></div>';
			$output .= '</div></div>';
			}
			else {
				if ($id == "") {
					$output .= '<div class="po-section section-image section-background-image-parallax section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.'); -webkit-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; -moz-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.';">';
				}else{
			$output .= '<div id="'.$id.'" class="po-section section-image section-background-image-parallax section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.'); -webkit-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; -moz-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.';" data-center="background-position: 50% 0px;"
        data-bottom-top="background-position: 50% 150px;"
        data-top-bottom="background-position: 50% -150px;"
        data-anchor-target="#'.$id.'">';
				}
			$output .= '<div class="container">';
			$output .= '<div class="row">';
			$output .= do_shortcode($content);
			$output .= '</div></div>';
			$output .= '<div class="transparent-triangle-container">';
			$output .= '<table>';
			$output .= '<tr>';
			$output .= '<td class="transparent-triangle-left-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '<td class="transparent-triangle-left-triangle-container">';
			$output .= '<div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent '.$bottomarrowcolor.';"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-triangle-container">';
			$output .= '<div class="transparent-triangle-right-triangle" style="border-color: transparent '.$bottomarrowcolor.' transparent transparent;"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '</tr>';
			$output .= '</table>';
			$output .= ' <div class="transparent-triangle-container-bottom-white"></div>';
			$output .= '</div></div>';
			}
		} 
		
		else if ($background == "image-fixed") {
			if ($overlaycolor == "") {
				if ($id == "") {
				$output .= '<div class="po-section section-image section-background-image-fixed section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.');">';
				}else{
			$output .= '<div id="'.$id.'" class="po-section section-image section-background-image-fixed section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.');">';
				}
			$output .= '<!--[if IE 8]><img class="section-bg-ie" src="'.$imageurl.'" alt="background"><![endif]-->';
			$output .= '<div class="ss-style-triangles" style="background-color:'.$toparrowcolor.';"></div>';
			$output .= '<div class="container">';
			$output .= '<div class="row">';
			$output .= do_shortcode($content);
			$output .= '</div></div>';
			$output .= '<div class="transparent-triangle-container">';
			$output .= '<table>';
			$output .= '<tr>';
			$output .= '<td class="transparent-triangle-left-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '<td class="transparent-triangle-left-triangle-container">';
			$output .= '<div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent '.$bottomarrowcolor.';"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-triangle-container">';
			$output .= '<div class="transparent-triangle-right-triangle" style="border-color: transparent '.$bottomarrowcolor.' transparent transparent;"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '</tr>';
			$output .= '</table>';
			$output .= ' <div class="transparent-triangle-container-bottom-white"></div>';
			$output .= '</div></div>';
			}
			else {
			if ($id == "") {
			$output .= '<div class="po-section section-image section-background-image-fixed section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.'); -webkit-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; -moz-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.';">';
			}else{
			$output .= '<div id="'.$id.'" class="po-section section-image section-background-image-fixed section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.'); -webkit-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; -moz-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.';">';
			}
			$output .= '<!--[if IE 8]><img class="section-bg-ie" src="'.$imageurl.'" alt="background"><![endif]-->';
			$output .= '<div class="container">';
			$output .= '<div class="row">';
			$output .= do_shortcode($content);
			$output .= '</div></div>';
			$output .= '<div class="transparent-triangle-container">';
			$output .= '<table>';
			$output .= '<tr>';
			$output .= '<td class="transparent-triangle-left-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '<td class="transparent-triangle-left-triangle-container">';
			$output .= '<div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent '.$bottomarrowcolor.';"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-triangle-container">';
			$output .= '<div class="transparent-triangle-right-triangle" style="border-color: transparent '.$bottomarrowcolor.' transparent transparent;"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '</tr>';
			$output .= '</table>';
			$output .= ' <div class="transparent-triangle-container-bottom-white"></div>';
			$output .= '</div></div>';
			}
		}
		
		else if ($background == "image") {
			if ($overlaycolor == "") {
			if ($id == "") {
			$output .= '<div class="po-section section-image section-background-image section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.');">';
			}else{
			$output .= '<div id="'.$id.'" class="po-section section-image section-background-image section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.');">';
			}
			$output .= '<!--[if IE 8]><img class="section-bg-ie" src="'.$imageurl.'" alt="background"><![endif]-->';
			$output .= '<div class="container">';
			$output .= '<div class="ss-style-triangles" style="background-color:'.$toparrowcolor.';"></div>';
			$output .= '<div class="row">';
			$output .= do_shortcode($content);
			$output .= '</div></div>';
			$output .= '<div class="transparent-triangle-container">';
			$output .= '<table>';
			$output .= '<tr>';
			$output .= '<td class="transparent-triangle-left-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '<td class="transparent-triangle-left-triangle-container">';
			$output .= '<div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent '.$bottomarrowcolor.';"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-triangle-container">';
			$output .= '<div class="transparent-triangle-right-triangle" style="border-color: transparent '.$bottomarrowcolor.' transparent transparent;"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '</tr>';
			$output .= '</table>';
			$output .= ' <div class="transparent-triangle-container-bottom-white"></div>';
			$output .= '</div></div>';
			}
			else {
			if ($id == "") {
			$output .= '<div class="po-section section-image section-background-image section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.'); background-size:cover; -webkit-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; -moz-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.';">';
			}else{
			$output .= '<div id="'.$id.'" class="po-section section-image section-background-image section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:url('.$imageurl.'); background-size:cover; -webkit-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; -moz-box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.'; box-shadow: inset 0px 0px 1000px 500px '.$overlaycolor.';">';
			}
			$output .= '<!--[if IE 8]><img class="section-bg-ie" src="'.$imageurl.'" alt="background"><![endif]-->';
			$output .= '<div class="container">';
			$output .= '<div class="row">';
			$output .= do_shortcode($content);
			$output .= '</div></div>';
			$output .= '<div class="transparent-triangle-container">';
			$output .= '<table>';
			$output .= '<tr>';
			$output .= '<td class="transparent-triangle-left-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '<td class="transparent-triangle-left-triangle-container">';
			$output .= '<div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent '.$bottomarrowcolor.';"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-triangle-container">';
			$output .= '<div class="transparent-triangle-right-triangle" style="border-color: transparent '.$bottomarrowcolor.' transparent transparent;"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '</tr>';
			$output .= '</table>';
			$output .= ' <div class="transparent-triangle-container-bottom-white"></div>';
			$output .= '</div></div>';
			}
		}
		
		else if ($background == "video") {
			if ($id == "") {
			$output .= '<div class="po-section section-video section-background-video" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:'.$backgroundcolor.';">';
			}else{
			$output .= '<div id="'.$id.'" class="po-section section-video section-background-video" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background:'.$backgroundcolor.';">';
			}
			$output .= '<div class="ss-style-triangles" style="background-color:'.$toparrowcolor.';"></div>';
			$output .= '<div class="section-video-content"> ';
			$output .= '<div class="container">';
			$output .= '<div class="row">';
			$output .= do_shortcode($content);
			$output .= '</div></div></div>';
			$output .= '<video autoplay loop class="po-background-video">';
			$output .= '<source src="'.$webmurl.'" type="video/webm">';
			$output .= '<source src="'.$mp4url.'" type="video/mp4">';
			$output .= '<source src="'.$oggurl.'" type="video/ogg">';
			$output .= '<img class="video-image" src="'.$videoimage.'" title="Your browser does not support the <video> tag" alt="video">';
			$output .= '</video>';
			$output .= '<div class="transparent-triangle-container">';
			$output .= '<table>';
			$output .= '<tr>';
			$output .= '<td class="transparent-triangle-left-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '<td class="transparent-triangle-left-triangle-container">';
			$output .= '<div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent '.$bottomarrowcolor.';"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-triangle-container">';
			$output .= '<div class="transparent-triangle-right-triangle" style="border-color: transparent '.$bottomarrowcolor.' transparent transparent;"></div>';
			$output .= '</td>';
			$output .= '<td class="transparent-triangle-right-white" style="background-color:'.$bottomarrowcolor.';"></td>';
			$output .= '</tr>';
			$output .= '</table>';
			$output .= ' <div class="transparent-triangle-container-bottom-white"></div>';
			$output .= '</div></div>';
		}
		
		else {
			if ($id == "") {
			$output .= '<div class="po-section section-background-'.$background.' section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background-color:'.$backgroundcolor.';">';
			}else{
			$output .= '<div id="'.$id.'" class="po-section section-background-'.$background.' section-'.$border.'" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px; background-color:'.$backgroundcolor.';">';
			}
			$output .= '<div class="ss-style-triangles" style="background-color:'.$toparrowcolor.';"></div>';
			$output .= '<div class="container">';
			$output .= '<div class="row">';
			$output .= do_shortcode($content);
			$output .= '</div></div></div>';
		}
		
	}
	
	return $output;
	
}
add_shortcode('section', 'po_section');

/* SECTION NEST LEVEL 1, 2, 3 SHORTCODES
------------------------------------------------------- */

add_shortcode('section1', 'po_section');
add_shortcode('section2', 'po_section');


/* SEPARATOR SHORTCODE
------------------------------------------------------- */  

function po_sep( $atts ) {
	
	extract( shortcode_atts(
		array(  
			'type' => '', 
			'color' => '#fff',
		), $atts )
	);
	
	$output="";
	
	if ($type == "top") {
		$output .= '<div class="ss-style-triangles" style="background-color:'.$color.';"></div>';
	} else {
		$output .= '<div class="transparent-triangle-container">';
		$output .= '<table class="">';
		$output .= '<tr>';
		$output .= '<td class="transparent-triangle-left-white" style="background-color:#000;"></td>';
		$output .= '<td class="transparent-triangle-left-triangle-container">';
		$output .= '<div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent #000;"></div>';
		
		$output .= '</td>';
		$output .= '<td class="transparent-triangle-right-triangle-container">';
		$output .= '<div class="transparent-triangle-right-triangle" style="border-color: transparent #000 transparent transparent;"></div>';
		
		$output .= '</td>';
		$output .= '<td class="transparent-triangle-right-white" style="background-color:#000;"></td>';
		$output .= '</tr>';
		$output .= '</table>';
		$output .= '<div class="transparent-triangle-container-bottom-white"></div>';
		$output .= '</div>';
	}
	
	return $output;

}
add_shortcode( 'sep', 'po_sep' );


/* COLUMN SHORTCODE
------------------------------------------------------- */  

function po_column( $atts , $content = null ) {
	
	extract( shortcode_atts(
		array(  
			'width' => '4', 
			'type' => 'sm', 
			'offset' => '0', 
			'paddingtop' => '', 
			'paddingbottom' => '', 
			'paddingside' => '',
			'delay' => '', 
			'animation' => 'fade-in', 
		), $atts )
	);
	
	$output="";
	
	$output .= '<div class="po-column col-'.$type.'-'.$width.' col-'.$type.'-offset-'.$offset.'" style="padding-top:'.$paddingtop.'px; padding-left:'.$paddingside.'px; padding-right:'.$paddingside.'px; padding-bottom:'.$paddingbottom.'px;" data-delay="'.$delay.'" data-animation="'.$animation.'">';
	$output .= do_shortcode($content);
	$output .= '</div>';
	
	return $output;

}
add_shortcode( 'column', 'po_column' );


/* NESTED COLUMNS
------------------------------------------------------- */  

function po_column_nested( $atts , $content = null ) {
	
	extract( shortcode_atts(
		array(  
			'width' => '4', 
			'offset' => '0', 
			'paddingtop' => '', 
			'paddingbottom' => '', 
			'paddingside' => '',
			'delay' => '', 
			'animation' => 'fade-in', 
		), $atts )
	);
	
	$output="";
	
	$output .= '<div class="po-column col-md-'.$width.' col-md-offset-'.$offset.'" style="padding-top:'.$paddingtop.'px; padding-left:'.$paddingside.'px; padding-right:'.$paddingside.'px; padding-bottom:'.$paddingbottom.'px;" data-delay="'.$delay.'" data-animation="'.$animation.'">';
	$output .= do_shortcode($content);
	$output .= '</div>';
	
	return $output;

}
add_shortcode( 'column1', 'po_column_nested' );
add_shortcode( 'column2', 'po_column_nested' );


/*  ROW SEPARATOR
------------------------------------------------------- */  

function po_row_separate( $atts ) {
	
	extract( shortcode_atts(
		array(  
			'width' => '4'
		), $atts )
	);
	
	$output="";
	
	$output .= '<div class="clearfix hidden-xs"></div>';
	
	return $output;

}
add_shortcode( 'newrow', 'po_row_separate' );


/* HEADER SHORTCODE
------------------------------------------------------- */  

function po_header( $atts, $content = null ) {
	
	extract( shortcode_atts(
		array(
			'type' => '',
			'icon' => '',
			'title' => '',
		    'size' => '',
			'font' => get_theme_mod( 'header_font','"Source Sans Pro", sans-serif;'),
			'color' => '',
			'weight' => '',
			'lineheight' => '',
			'paddingtop' => '',
			'paddingbottom' => '',
			'paddingbottom' => '',
		), $atts )
	);
	
	$output="";
	
	if ($type == "icon") {
		$output .= '<div class="po-column po-header col-sm-12" data-delay="0" data-animation="pull-up">';
		$output .= '<div class="icon-boxless icon-boxless-green"><i class="fa '.$icon.' fa-4x"></i></div>';
		$output .= '</div>';
		$output .= '<div class="po-column po-header col-sm-12" data-delay="0" data-animation="fade-in">  ';
		$output .= '<h1 class="text-center standard-header">'.$title.'</h1>';
		$output .= '</div>';
		$output .= '<div class="po-column po-header-small col-sm-6 col-md-offset-3" style="margin-bottom:'.$paddingbottom.'px;" data-delay="800" data-animation="fade-in">';
		$output .= '<h3 class="text-center standard-header" style="font-size: '.$size.'px; font-weight: '.$weight.'; font-family:'.$font.'; color:'.$color.'; line-height:'.$lineheight.';">';
		$output .= do_shortcode($content);
		$output .= '</h3>';
		$output .= '<div class="header-line" style="margin-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px;"></div></div>';
		$output .= '<div class="clearfix"></div>';
	} 
	
	else if ($type == "left") {
		$output .= '<div class="po-column po-header-top col-sm-12" data-delay="0" data-animation="fade-in" style="padding:0;">';
		$output .= '<h3 class="standard-header" style="font-size: '.$size.'px; font-weight: '.$weight.'; font-family:'.$font.'; color:'.$color.'; line-height:'.$lineheight.';">';
		$output .= do_shortcode($content);
		$output .= '</h3>';
		$output .= '<div class="header-line-left" style="margin-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px;"></div>';
		$output .= '</div>';
		$output .= '<div class="clearfix"></div>';
	}
	
	else if ($type == "line-small") {
		$output .= '<div class="po-column po-header col-sm-12" data-delay="0" data-animation="fade-in">';
		$output .= '<h4 style="font-size: '.$size.'px; font-weight: '.$weight.'; font-family:'.$font.'; color:'.$color.'; line-height:'.$lineheight.';">';
		$output .= do_shortcode($content);
		$output .= '</h4></div>';
		$output .= '<div class="po-column po-header-line-thin col-sm-12 col-md-offset-0" style="margin-bottom:'.$paddingbottom.'px;" data-delay="0" data-animation="fade-in">';
		$output .= '<div style="width:100%; border-top:2px solid #0C9;"></div>';
		$output .= '</div>';
		$output .= '<div class="clearfix"></div>';
	}
	
	else if ($type == "large") {
		$output .= '<div class="po-column po-header-top col-sm-12" data-delay="0" data-animation="fade-in" style="padding:0;">';
		$output .= '<h1 class="header-large text-center" style="font-size: '.$size.'px; font-weight: '.$weight.'; font-family:'.$font.'; color:'.$color.'; line-height:'.$lineheight.';">';
		$output .= do_shortcode($content);
		$output .= '</h1>';
		$output .= '<div class="header-line" style="margin-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px;"></div>';
		$output .= '</div>';
		$output .= '<div class="clearfix"></div>';
	}
	
	else if ($type == "small") {
		$output .= '<div class="po-column po-header-top header-small-padding col-sm-12" style="padding:'.$paddingtop.'px 0 '.$paddingbottom.'px;" data-delay="0" data-animation="fade-in">';
		$output .= '<h6 class="header-small text-center" style="font-size: '.$size.'px; font-weight: '.$weight.'; color:'.$color.'; line-height:'.$lineheight.';">';
		$output .= do_shortcode($content);
		$output .= '</h6>';
		$output .= '</div>';
		$output .= '<div class="clearfix"></div>';
	}
	
	else if ($type == "small-left") {
		$output .= '<div class="po-column po-header-top col-sm-12" style="padding:0;" data-delay="0" data-animation="fade-in">';
		$output .= '<div class="header-small-padding" style="padding-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px;">';
		$output .= '<h6 class="header-small" style="font-size: '.$size.'px; font-weight: '.$weight.'; font-family:'.$font.'; color:'.$color.'; line-height:'.$lineheight.';">';
		$output .= do_shortcode($content);
		$output .= '</h6>';
		$output .= '</div></div>';
		$output .= '<div class="clearfix"></div>';
	}
	
	else {
		$output .= '<div class="po-column po-header-top col-sm-12" data-delay="0" data-animation="fade-in" style="padding:0;">';
		$output .= '<h3 class="text-center standard-header" style="font-size: '.$size.'px; font-weight: '.$weight.'; font-family:'.$font.'; color:'.$color.'; line-height:'.$lineheight.';">';
		$output .= do_shortcode($content);
		$output .= '</h3>';
		$output .= '<div class="header-line" style="margin-top:'.$paddingtop.'px; padding-bottom:'.$paddingbottom.'px;"></div>';
		$output .= '</div>';
		$output .= '<div class="clearfix"></div>';
		
	}
	
	return $output;
	
}
add_shortcode('header', 'po_header');


/* TEXT BLOCK SHORTCODE
------------------------------------------------------- */  

function po_text( $atts, $content = null ) {
	
	extract( shortcode_atts(
		array(
			'align' => 'left',
			'type' => '',
			'size' => '',
			'font' => '',
			'color' => '',
			'weight' => '',
			'lineheight' => '',
			'paddingtop' => '0',
			'paddingbottom' => '0',
			'paddingside' => '0',
		), $atts )
	);
	
	$output="";
	
	if ($type == "large") {
	
		if ($align == "left") {
			$output .= '<p class="textblock large-text" style="text-align:'.$align.'; padding-top:'.$paddingtop.'px; padding-right:10px; padding-bottom:'.$paddingbottom.'px; font-size: '.$size.'px; font-weight: '.$weight.'; font-family:'.$font.'; color:'.$color.'; line-height:'.$lineheight.';">';
			$output .= do_shortcode($content);
			$output .= '</p>';
		} 
		else if ($align == "right"){
			$output .= '<p class="textblock large-text" style="text-align:'.$align.'; padding-top:'.$paddingtop.'px; padding-left:10px; padding-bottom:'.$paddingbottom.'px; font-size: '.$size.'px; font-weight: '.$weight.'; font-family:'.$font.'; color:'.$color.'; line-height:'.$lineheight.';">';
			$output .= do_shortcode($content);
			$output .= '</p>';
		} 
		else {
			$output .= '<p class="textblock large-text" style="text-align:'.$align.'; padding-top:'.$paddingtop.'px; padding-left:5px; padding-right:5px; padding-bottom:'.$paddingbottom.'px; font-size: '.$size.'px; font-weight: '.$weight.'; font-family:'.$font.'; color:'.$color.'; line-height:'.$lineheight.';">';
			$output .= do_shortcode($content);
			$output .= '</p>';
		}
		
	}
	else {
	
		if ($align == "left") {
			$output .= '<p class="textblock" style="text-align:'.$align.'; padding-top:'.$paddingtop.'px; padding-right:10px; padding-bottom:'.$paddingbottom.'px; font-size: '.$size.'px; font-weight: '.$weight.'; font-family:'.$font.'; color:'.$color.'; line-height:'.$lineheight.';">';
			$output .= do_shortcode($content);
			$output .= '</p>';
		} 
		else if ($align == "right"){
			$output .= '<p class="textblock" style="text-align:'.$align.'; padding-top:'.$paddingtop.'px; padding-left:10px; padding-bottom:'.$paddingbottom.'px; font-size: '.$size.'px; font-weight: '.$weight.'; font-family:'.$font.'; color:'.$color.'; line-height:'.$lineheight.';">';
			$output .= do_shortcode($content);
			$output .= '</p>';
		} 
		else {
			$output .= '<p class="textblock" style="text-align:'.$align.'; padding-top:'.$paddingtop.'px; padding-left:5px; padding-right:5px; padding-bottom:'.$paddingbottom.'px; font-size: '.$size.'px; font-weight: '.$weight.'; font-family:'.$font.'; color:'.$color.'; line-height:'.$lineheight.';">';
			$output .= do_shortcode($content);
			$output .= '</p>';
		}
	
	}
	
	
	return $output;
	
}
add_shortcode('text', 'po_text');


/* MEDIA SHORTCODE
------------------------------------------------------- */  

function po_media( $atts ) {
	
	extract( shortcode_atts(
		array(
			'thumburl' => '',   
			'imageurl' => '',  
			'type' => '',
			'height' => '200',
			'group' => '',
			'imagealt' => '',
		), $atts )
	);
	
	$output="";
	
	if (wp_get_theme() == 'Nibiru' || wp_get_theme() == 'Nibiru Child Theme' ) {
		
		if ($type == "image") {
		if ($thumburl == ''){
			$output .= '<div class="po-column col-sm-12" data-delay="0" data-animation="fade-in" style="padding:0;" >';
			$output .= '<div class="grid cs-style-2 media-container" style="height:'.$height.'px;">';
			$output .= '<a class="view" href="'.$imageurl.'" rel="'.$group.'">';
			$output .= '<figure>';
			$output .= '<img class="img-responsive" src="'.$imageurl.'" alt="'.$imagealt.'" />';
			$output .= '<figcaption style="height:'.$height.'px;"></figcaption>';
			$output .= '</figure>';
			$output .= '</a>';
			$output .= '</div></div>';
			$output .= '<div class="clearfix"></div>';
		} else {
			$output .= '<div class="po-column col-sm-12" data-delay="0" data-animation="fade-in" style="padding:0;" >';
			$output .= '<div class="grid cs-style-2 media-container" style="height:'.$height.'px;">';
			$output .= '<a class="view" href="'.$imageurl.'" rel="'.$group.'">';
			$output .= '<figure>';
			$output .= '<img class="img-responsive" src="'.$thumburl.'" alt="'.$imagealt.'" />';
			$output .= '<figcaption style="height:'.$height.'px;"></figcaption>';
			$output .= '</figure>';
			$output .= '</a>';
			$output .= '</div></div>';
			$output .= '<div class="clearfix"></div>';
		}
	} 
	else if ($type == "video"){
		$output .= '</p>';
	} 
	else {
		$output .= '</p>';
	}	
	
	} else {
	
	if ($type == "image") {
		if ($thumburl == ''){
			$output .= '<div class="po-column col-sm-12 portfolio-item-effect" data-delay="0" data-animation="fade-in" style="padding:0;" >';
			$output .= '<div class="grid cs-style-3 media-container" style="height:'.$height.'px;">';
			$output .= '<a class="view" href="'.$imageurl.'" rel="'.$group.'">';
			$output .= '<figure>';
			$output .= '<img class="img-responsive" src="'.$imageurl.'" alt="'.$imagealt.'" />';
			$output .= '<figcaption style="height:'.$height.'px;"></figcaption>';
			$output .= '</figure>';
			$output .= '</a>';
			$output .= '</div></div>';
			$output .= '<div class="clearfix"></div>';
		} else {
			$output .= '<div class="po-column col-sm-12 portfolio-item-effect" data-delay="0" data-animation="fade-in" style="padding:0;" >';
			$output .= '<div class="grid cs-style-3 media-container" style="height:'.$height.'px;">';
			$output .= '<a class="view" href="'.$imageurl.'" rel="'.$group.'">';
			$output .= '<figure>';
			$output .= '<img class="img-responsive" src="'.$thumburl.'" alt="'.$imagealt.'" />';
			$output .= '<figcaption style="height:'.$height.'px;"></figcaption>';
			$output .= '</figure>';
			$output .= '</a>';
			$output .= '</div></div>';
			$output .= '<div class="clearfix"></div>';
		}
	} 
	else if ($type == "video"){
		$output .= '</p>';
	} 
	else {
		$output .= '</p>';
	}
	
	}
	
	
	return $output;
	
}
add_shortcode('media', 'po_media');


/* BUTTON SHORTCODES
------------------------------------------------------- */  

function po_button( $atts, $content = null ) {
	
	extract(shortcode_atts(
		array(
			'type' => '',
			'style' => '',
			'width' => '',
			'color' => 'light',
			'icon' => 'fa-check',
			'size' => 'lg',
			'link' => '#',
			'position' => '',
			'animation' => '',
			'id' => '',
		), $atts )
	);
	
	$output="";
	
		if ($style == "banner") {
			if ($type == "anchor") {
				if ($animation == "true") {
					$output .= '<div style="padding:0">';
					$output .= '<div class="row po-full-width">';
					$output .= '<div class="po-column col-sm-12" style="padding:0;" data-delay="0" data-animation="fade-in">';
					$output .= '<div class="banner-button '.$color.' btn-'.$size.' btn-block btn-icon-ani scroll-arrow" data-scroll="'.$id.'" style="width:'.$width.'px; margin:0 auto;">';
					$output .= '<div class="btn-icon"><i class="fa '.$icon.' fa-lg"></i></div>';
					$output .= '<span>';
					$output .= do_shortcode($content);
					$output .= '</span>';
					$output .= '</a>';
					$output .= '</div></div></div>';
				} else {
						$output .= '<div style="padding:0;">';
					$output .= '<div class="row po-full-width">';
					$output .= '<div class="po-column col-sm-12" style="padding:0;" data-delay="0" data-animation="fade-in">';
					$output .= '<div class="banner-button '.$color.' btn-'.$size.' btn-block btn-icon-ani scroll-arrow" data-scroll="'.$id.'">';
					$output .= do_shortcode($content);
					$output .= '</div>';
					$output .= '</div></div></div>';
				}
			}	
			else {
				if ($animation == "true") {
					$output .= '<div style="padding:0">';
					$output .= '<div class="row po-full-width">';
					$output .= '<div class="po-column col-sm-12" style="padding:0;" data-delay="0" data-animation="fade-in">';
					$output .= '<a href="'.$link.'" class="banner-button '.$color.' btn-'.$size.' btn-block btn-icon-ani" style="width:'.$width.'px; margin:0 auto;">';
					$output .= '<div class="btn-icon"><i class="fa '.$icon.' fa-lg"></i></div>';
					$output .= '<span>';
					$output .= do_shortcode($content);
					$output .= '</span>';
					$output .= '</a>';
					$output .= '</div></div></div>';
			
				} else {
					$output .= '<div style="padding:0;">';
					$output .= '<div class="row po-full-width">';
					$output .= '<div class="po-column col-sm-12" style="padding:0;" data-delay="0" data-animation="fade-in">';
					$output .= '<a href="'.$link.'" class="banner-button '.$color.' btn-'.$size.' btn-block btn-icon-ani">';
					$output .= do_shortcode($content);
					$output .= '</a>';
					$output .= '</div></div></div>';
				}
			}
		} else if ($style == "top") {
			if ($position == "left") {
				if ($type == "anchor") {
					$output .= '<div style="padding:0">';
					$output .= '<div class="row po-full-width">';
					$output .= '<div class="po-column col-sm-12" style="padding:0;" data-delay="0" data-animation="fade-in">';
					$output .= '<div class="btn outline-button '.$color.' btn-'.$size.' btn-block btn-icon-ani scroll-arrow" style="width:'.$width.'px;" data-scroll="'.$id.'">';
					$output .= '<div class="btn-icon"><i class="fa '.$icon.'"></i></div>';
					$output .= '<span>';
					$output .= do_shortcode($content);
					$output .= '</span>';
					$output .= '</div>';
					$output .= '</div></div></div>';
				}
				else {
					$output .= '<div style="padding:0">';
					$output .= '<div class="row po-full-width">';
					$output .= '<div class="po-column col-sm-12" style="padding:0;" data-delay="0" data-animation="fade-in">';
					$output .= '<a href="'.$link.'" class="btn outline-button '.$color.' btn-'.$size.' btn-block btn-icon-ani" style="width:'.$width.'px;">';
					$output .= '<div class="btn-icon"><i class="fa '.$icon.'"></i></div>';
					$output .= '<span>';
					$output .= do_shortcode($content);
					$output .= '</span>';
					$output .= '</a>';
					$output .= '</div></div></div>';
				}
			}
			else 
			{
				if ($type == "anchor") {
					$output .= '<div style="padding:0">';
					$output .= '<div class="row po-full-width">';
					$output .= '<div class="po-column col-sm-12" style="padding:0;" data-delay="0" data-animation="fade-in">';
					$output .= '<div class="btn outline-button '.$color.' btn-'.$size.' btn-block btn-icon-ani scroll-arrow" style="width:'.$width.'px; margin:0 auto;" data-scroll="'.$id.'">';
					$output .= '<div class="btn-icon"><i class="fa '.$icon.'"></i></div>';
					$output .= '<span>';
					$output .= do_shortcode($content);
					$output .= '</span>';
					$output .= '</div>';
					$output .= '</div></div></div>';
				}
				else {
					$output .= '<div style="padding:0">';
					$output .= '<div class="row po-full-width">';
					$output .= '<div class="po-column col-sm-12" style="padding:0;" data-delay="0" data-animation="fade-in">';
					$output .= '<a href="'.$link.'" class="btn outline-button '.$color.' btn-'.$size.' btn-block btn-icon-ani" style="width:'.$width.'px; margin:0 auto;">';
					$output .= '<div class="btn-icon"><i class="fa '.$icon.'"></i></div>';
					$output .= '<span>';
					$output .= do_shortcode($content);
					$output .= '</span>';
					$output .= '</a>';
					$output .= '</div></div></div>';

				}
			}
		} else if ($style == "left") {
			if ($position == "left") {
				if ($type == "anchor") {
					$output .= '<div style="padding:0">';
					$output .= '<div class="row po-full-width">';
					$output .= '<div class="po-column col-sm-12" style="padding:0;" data-delay="0" data-animation="fade-in">';
					$output .= '<div class="btn outline-button button-icon-left-manual '.$color.' btn-lg btn-block scroll-arrow" style="width:'.$width.'px;">';
					$output .= '<span class="btn-icon-left"><i class="fa '.$icon.'"></i></span>';
					$output .= do_shortcode($content);
					$output .= '</div>';
					$output .= '</div></div></div>';
				}
				else {
					$output .= '<div style="padding:0">';
					$output .= '<div class="row po-full-width">';
					$output .= '<div class="po-column col-sm-12" style="padding:0;" data-delay="0" data-animation="fade-in">';
					$output .= '<a href="'.$link.'" class="btn outline-button button-icon-left-manual '.$color.' btn-lg btn-block" style="width:'.$width.'px;">';
					$output .= '<span class="btn-icon-left"><i class="fa '.$icon.'"></i></span>';
					$output .= do_shortcode($content);
					$output .= '</a>';
					$output .= '</div></div></div>';
				}
				
			}
			else 
			{
				if ($type == "anchor") {
					
					$output .= '<div style="padding:0">';
					$output .= '<div class="row po-full-width">';
					$output .= '<div class="po-column col-sm-12" style="padding:0;" data-delay="0" data-animation="fade-in">';
					$output .= '<div class="btn outline-button button-icon-left-manual '.$color.' btn-lg btn-block scroll-arrow" style="width:'.$width.'px; margin:0 auto;">';
					$output .= '<span class="btn-icon-left"><i class="fa '.$icon.'"></i></span>';
					$output .= do_shortcode($content);
					$output .= '</div>';
					$output .= '</div></div></div>';
				}
				else {
					$output .= '<div style="padding:0">';
					$output .= '<div class="row po-full-width">';
					$output .= '<div class="po-column col-sm-12" style="padding:0;" data-delay="0" data-animation="fade-in">';
					$output .= '<a href="'.$link.'" class="btn outline-button button-icon-left-manual '.$color.' btn-lg btn-block" style="width:'.$width.'px; margin:0 auto;">';
					$output .= '<span class="btn-icon-left"><i class="fa '.$icon.'"></i></span>';
					$output .= do_shortcode($content);
					$output .= '</a>';
					$output .= '</div></div></div>';
				}
				
				
			}
				
		} else {
			if ($position == "left") {
				if ($type == "anchor") {
					$output .= '<div style="padding:0">';
					$output .= '<div class="row po-full-width">';
					$output .= '<div class="po-column col-sm-12" style="padding:0;" data-delay="0" data-animation="fade-in">';
					$output .= '<div class="btn outline-button '.$color.' btn-'.$size.' btn-block btn-icon-ani scroll-arrow" style="width:'.$width.'px;" data-scroll="'.$id.'">';
					$output .= do_shortcode($content);
					$output .= '</div>';
					$output .= '</div></div></div>';
				}
				else {
					$output .= '<div style="padding:0">';
					$output .= '<div class="row po-full-width">';
					$output .= '<div class="po-column col-sm-12" style="padding:0;" data-delay="0" data-animation="fade-in">';
					$output .= '<a href="'.$link.'" class="btn outline-button '.$color.' btn-'.$size.' btn-block btn-icon-ani" style="width:'.$width.'px;">';
					$output .= do_shortcode($content);
					$output .= '</a>';
					$output .= '</div></div></div>';	
				}
			}
			else 
			{
				if ($type == "anchor") {
					$output .= '<div style="padding:0">';
					$output .= '<div class="row po-full-width">';
					$output .= '<div class="po-column col-sm-12" style="padding:0;" data-delay="0" data-animation="fade-in">';
					$output .= '<div class="btn outline-button '.$color.' btn-'.$size.' btn-block scroll-arrow" style="width:'.$width.'px; margin:0 auto;" data-scroll="'.$id.'">';
					$output .= do_shortcode($content);
					$output .= '</div>';
					$output .= '</div></div></div>';
				} else {
					$output .= '<div style="padding:0">';
					$output .= '<div class="row po-full-width">';
					$output .= '<div class="po-column col-sm-12" style="padding:0;" data-delay="0" data-animation="fade-in">';
					$output .= '<a href="'.$link.'"  class="btn outline-button '.$color.' btn-'.$size.' btn-block" style="width:'.$width.'px; margin:0 auto;">';
					$output .= do_shortcode($content);
					$output .= '</a>';
					$output .= '</div></div></div>';
				}
			}
			
		}
	
	return $output;
	
}
add_shortcode('button', 'po_button');



/* ICON BOX SHORTCODES
------------------------------------------------------- */  

function po_iconbox( $atts, $content = null ) {
	
	extract(shortcode_atts(
		array(
			'type' => '',
			'character' => '',
			'icon' => '',
			'title' => '',
			'paddingtop' => '',
			'paddingbottom' => '',
			'titlesize' => '',
			'titleweight' => '',
			'size' => '',
			'weight' => '',
		), $atts )
	);
	
	$output="";
	
	if ($type == "icon-float") {
		if ($character != "") {
			$output .= '<div class="po-icon-float icon-green hover-ani">';
			$output .= '<div class="icon-float icon-float-green"><div class="icon-char">'.$character.'</div></div>';
			$output .= '<div class="icon-bg">';
			$output .= '<div class="float-header text-center" style="margin-top:'.$paddingtop.'px; margin-bottom:'.$paddingbottom.'px; font-size:'.$titlesize.'px; font-weight:'.$titleweight.';">'.$title.'</div>';
			$output .= '<div class="text-center float-text" style="font-size:'.$size.'px; font-weight:'.$weight.';">'.do_shortcode($content).'</div>';
			$output .= '</div></div>';
		} else {
			$output .= '<div class="po-icon-float icon-green hover-ani">';
			$output .= '<div class="icon-float icon-float-green"><i class="fa '.$icon.' fa-2x"></i></div>';
			$output .= '<div class="icon-bg">';
			$output .= '<div class="float-header text-center" style="margin-top:'.$paddingtop.'px; margin-bottom:'.$paddingbottom.'px; font-size:'.$titlesize.'px; font-weight:'.$titleweight.';">'.$title.'</div>';
			$output .= '<div class="text-center float-text" style="font-size:'.$size.'px; font-weight:'.$weight.';">'.do_shortcode($content).'</div>';
			$output .= '</div></div>';
		}
	}
	
	else if ($type == "icon-box-left") {
		if ($character != "") {
			$output .= '<div class="po-icon-box-left icon-green hover-ani">';
			$output .= '<div class="icon-section-left">';
			$output .= '<div class="icon-box-side icon-green">';
			$output .= '<div class="icon-char">'.$character.'</div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="details-section-right">';
			$output .= '<div class="column-content-left">';
			$output .= '<h4 style="margin-top:'.$paddingtop.'px; margin-bottom:'.$paddingbottom.'px; font-size:'.$titlesize.'px; font-weight:'.$titleweight.';">'.$title.'</h4>';
			$output .= '<p class="box-text" style="font-size:'.$size.'px; font-weight:'.$weight.';">'.do_shortcode($content).'</p>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
		} else {
			$output .= '<div class="po-icon-box-left icon-green hover-ani">';
			$output .= '<div class="icon-section-left">';
			$output .= '<div class="icon-box-side icon-green">';
			$output .= '<i class="fa '.$icon.' fa-2x"></i>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="details-section-right">';
			$output .= '<div class="column-content-left">';
			$output .= '<h4 style="margin-top:'.$paddingtop.'px; margin-bottom:'.$paddingbottom.'px; font-size:'.$titlesize.'px; font-weight:'.$titleweight.';">'.$title.'</h4>';
			$output .= '<p class="box-text" style="font-size:'.$size.'px; font-weight:'.$weight.';">'.do_shortcode($content).'</p>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
		}
	}
	
	else if ($type == "icon-top") {
		if ($character != "") {
			$output .= '<div class="po-icon-boxless icon-green hover-ani">';
			$output .= '<div class="icon-boxless icon-boxless-green"><div class="icon-char">'.$character.'</div></div>';
			$output .= '<h4 class="text-center" style="margin-top:'.$paddingtop.'px; margin-bottom:'.$paddingbottom.'px; font-size:'.$titlesize.'px; font-weight:'.$titleweight.';">'.$title.'</h4>';
			$output .= '<p class="text-center box-text" style="font-size:'.$size.'px; font-weight:'.$weight.';">'.do_shortcode($content).'</p>';
			$output .= '</div>';
		} else {
			$output .= '<div class="po-icon-boxless icon-green hover-ani">';
			$output .= '<div class="icon-boxless icon-boxless-green"><i class="fa '.$icon.' fa-4x"></i></div>';
			$output .= '<h4 class="text-center" style="margin-top:'.$paddingtop.'px; margin-bottom:'.$paddingbottom.'px; font-size:'.$titlesize.'px; font-weight:'.$titleweight.';">'.$title.'</h4>';
			$output .= '<p class="text-center box-text" style="font-size:'.$size.'px; font-weight:'.$weight.';">'.do_shortcode($content).'</p>';
			$output .= '</div>';
		}
	}
	
	else if ($type == "icon-title") {
		if ($character != "") {
			$output .= '<div class="po-icon-small icon-green hover-ani">';
			$output .= '<div class="icon-section-left-small">';
			$output .= '<div class="po-icon-title icon-boxless-green"><div class="icon-char">'.$character.'</div></div>';
			$output .= '</div>';
			$output .= '<div class="details-section-right">';
			$output .= '<h4 style="margin-top:'.$paddingtop.'px; margin-bottom:'.$paddingbottom.'px; font-size:'.$titlesize.'px; font-weight:'.$titleweight.';">'.$title.'</h4>';
			$output .= '</div>';
			$output .= '<p class="box-text" style="font-size:'.$size.'px; font-weight:'.$weight.';">'.do_shortcode($content).'</p>';
			$output .= '</div>';
		} else {
			$output .= '<div class="po-icon-small icon-green hover-ani">';
			$output .= '<div class="icon-section-left-small">';
			$output .= '<div class="po-icon-title icon-boxless-green"><i class="fa '.$icon.' fa-2x"></i></div>';
			$output .= '</div>';
			$output .= '<div class="details-section-right">';
			$output .= '<h4 style="margin-top:'.$paddingtop.'px; margin-bottom:'.$paddingbottom.'px; font-size:'.$titlesize.'px; font-weight:'.$titleweight.';">'.$title.'</h4>';
			$output .= '</div>';
			$output .= '<p class="box-text" style="font-size:'.$size.'px; font-weight:'.$weight.';">'.do_shortcode($content).'</p>';
			$output .= '</div>';
		}
	}
	
	else if ($type == "icon-left") {
		if ($character != "") {
			$output .= '<div class="po-icon-left icon-green hover-ani">';
			$output .= '<table><tbody><tr><td class="icon-td">';
			$output .= '<div class="po-icon icon-boxless-green"><div class="icon-char">'.$character.'</div></div>';
			$output .= '</td><td>';
			$output .= '<h4 style="margin-top:'.$paddingtop.'px; margin-bottom:'.$paddingbottom.'px; font-size:'.$titlesize.'px; font-weight:'.$titleweight.';">'.$title.'</h4>';
			$output .= '<p class="box-text" style="font-size:'.$size.'px; font-weight:'.$weight.';">'.do_shortcode($content).'</p>';
			$output .= '</td></tr></tbody></table></div>';
		} else {
			$output .= '<div class="po-icon-left icon-green hover-ani">';
			$output .= '<table><tbody><tr><td class="icon-td">';
			$output .= '<div class="po-icon icon-boxless-green"><i class="fa '.$icon.' fa-2x"></i></div>';
			$output .= '</td><td>';
			$output .= '<h4 style="margin-top:'.$paddingtop.'px; margin-bottom:'.$paddingbottom.'px; font-size:'.$titlesize.'px; font-weight:'.$titleweight.';">'.$title.'</h4>';
			$output .= '<p class="box-text" style="font-size:'.$size.'px; font-weight:'.$weight.';">'.do_shortcode($content).'</p>';
			$output .= '</td></tr></tbody></table></div>';
		}
	}
	
	else if ($type == "icon-top-left") {
		if ($character != "") {
			$output .= '<div class="po-icon-boxless icon-green hover-ani">';
			$output .= '<div class="icon-boxless-top icon-boxless-green"><div class="icon-char">'.$character.'</div></div>';
			$output .= '<h4 style="margin-top:'.$paddingtop.'px; margin-bottom:'.$paddingbottom.'px; font-size:'.$titlesize.'px; font-weight:'.$titleweight.';">'.$title.'</h4>';
			$output .= '<div class="row">';
			$output .= '<div class="col-sm-6 col-sm-offset-3">';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<p class="box-text" style="font-size:'.$size.'px; font-weight:'.$weight.';">'.do_shortcode($content).'</p>';
			$output .= '</div>';
		} else {
			$output = '<div class="po-icon-boxless icon-green hover-ani">';
			$output .= '<div class="icon-boxless-top"><span aria-hidden="true" class="linecons-icon fa '.$icon.'" style="font-size:30px;"></span></div>';
			$output .= '<h4 style="margin-top:'.$paddingtop.'px; margin-bottom:'.$paddingbottom.'px; font-size:'.$titlesize.'px; font-weight:'.$titleweight.';">'.$title.'</h4>';
			$output .= '<div class="row">';
			$output .= '<div class="col-sm-6 col-sm-offset-3">';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<p class="box-text" style="font-size:'.$size.'px; font-weight:'.$weight.';">'.do_shortcode($content).'</p>';
			$output .= '</div>';
		} 
	}
	
	else {
		if ($character != "") {
			$output .= '<div class="po-icon-box icon-green hover-ani">';
			$output .= '<div class="icon-box-container"><div class="icon-box icon-green"><div class="icon-char">'.$character.'</div></div></div>';
			$output .= '<div class="column-content">';
			$output .= '<h4 class="text-center" style="margin-top:'.$paddingtop.'px; margin-bottom:'.$paddingbottom.'px; font-size:'.$titlesize.'px; font-weight:'.$titleweight.';">'.$title.'</h4>';
			$output .= '<div class="row">';
			$output .= '<div class="col-sm-6 col-sm-offset-3">';
			$output .= '<div class="icon-box-line"></div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<p class="text-center box-text" style="font-size:'.$size.'px; font-weight:'.$weight.';">'.do_shortcode($content).'</p>';
			$output .= '</div>';
			$output .= '</div>';
		} else {
			$output = '<div class="po-icon-box icon-green hover-ani">';
			$output .= '<div class="icon-box-container"><div class="icon-box icon-green"><i class="fa '.$icon.' fa-2x"></i></div></div>';
			$output .= '<div class="column-content">';
			$output .= '<h4 class="text-center" style="margin-top:'.$paddingtop.'px; margin-bottom:'.$paddingbottom.'px; font-size:'.$titlesize.'px; font-weight:'.$titleweight.';">'.$title.'</h4>';
			$output .= '<div class="row">';
			$output .= '<div class="col-sm-6 col-sm-offset-3">';
			$output .= '<div class="icon-box-line"></div>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '<p class="text-center box-text" style="font-size:'.$size.'px; font-weight:'.$weight.';">'.do_shortcode($content).'</p>';
			$output .= '</div>';
			$output .= '</div>';
		}
	}
	
	return $output;
	
}
add_shortcode('iconbox', 'po_iconbox');

/* COUNT SHORTCODE
------------------------------------------------------- */  

function po_count( $atts , $content = null ) {
	
	extract( shortcode_atts(
		array(  
			'from' => '',
			'to' => '',
			'speed' => '3000',  
			'icon' => '',
			'icondelay' => '',
			'iconanimation' => '',
			'textanimation' => '', 
		), $atts )
	);
	if (wp_get_theme() == 'Nibiru' || wp_get_theme() == 'Nibiru Child Theme' ) {
		
		$output="";
	
		$output .= '<div class="po-count hover-ani"> ';
		$output .= '<div class="po-column count-icon col-sm-12" data-delay="'.$icondelay.'" data-animation="'.$iconanimation.'">';
		$output .= '<div class="icon-boxless icon-boxless-green"><i class="fa '.$icon.' fa-2x"></i></div>';
		$output .= '</div>';
		$output .= '<h1 class="po-number text-center" data-from="'.$from.'" data-to="'.$to.'" data-speed="'.$speed.'" data-refresh-interval="10"></h1>';
		$output .= '<div class="row">';
		$output .= '<div class="col-sm-6 col-sm-offset-3">';
		$output .= '<div class="count-line"></div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '<div class="po-column po-column-mobile po-header-small col-sm-12" data-delay="'.$speed.'" data-animation="'.$textanimation.'">';
		$output .= '<h6 class="count-text text-center">';
		$output .= do_shortcode($content);
		$output .= '</h6>';
		$output .= '</div></div>';
	
	} else {
	
		$output="";
		
		$output .= '<div class="po-count"> ';
		$output .= '<div class="po-column count-icon col-sm-12" data-delay="'.$icondelay.'" data-animation="'.$iconanimation.'">';
		$output .= '<div class="icon-boxless icon-boxless-green"><i class="fa '.$icon.' fa-2x"></i></div>';
		$output .= '</div>';
		$output .= '<div class="po-number text-center" data-from="'.$from.'" data-to="'.$to.'" data-speed="'.$speed.'" data-refresh-interval="10"></div>';
		$output .= '<div class="po-column po-column-mobile po-header-small col-sm-12" data-delay="'.$speed.'" data-animation="'.$textanimation.'">';
		$output .= '<h6 class="count-text text-center">';
		$output .= do_shortcode($content);
		$output .= '</h6>';
		$output .= '</div></div>';
	
	}
	
	return $output;

}
add_shortcode( 'count', 'po_count' );


/* PROGRESS BAR SHORTCODE
------------------------------------------------------- */  

function po_progress_bar( $atts ) {
	
	extract( shortcode_atts(
		array(  
			'type' => '',
			'title' => '',
			'icons' => '',
			'icon' => '',
			'value' => '0',
			'color' => get_theme_mod( 'accent','#20C596'),
			'valuedelay' => '',
			'icondelay' => '',
			'iconanimation' => '',
			'textdelay' => '', 
			'textanimation' => '', 
		), $atts )
	);
	
	$output="";
	
	if (wp_get_theme() == 'Nibiru' || wp_get_theme() == 'Nibiru Child Theme' ) {
	
		if ($type == "circular") {
			$output .= '<div class="po-column-mobile-ani" data-delay="0" data-animation="fade-in">';
			$output .= '<div class="hover-ani">';
			$output .= '<div class="circular-cont center-block">';
			$output .= '<div style="position:absolute;">';
			$output .= '<div class="icon-circular"><i class="fa '.$icon.' fa-2x po-column-mobile-ani" data-delay="0" data-animation="fade-in"></i></div>';
			$output .= '</div>';
			$output .= '<input type="text" value="0" class="dial po-column-mobile-ani" data-width="150" data-thickness=.01 data-displayInput=false data-fgColor="'.get_theme_mod( 'accent','#20C596').'" data-bgColor="#ddd" data-linecap=round data-readOnly=true data-delay="0" data-animation="fade-in" data-value="'.$value.'">';
			$output .= '</div>';
			$output .= '<div class="po-column po-header-line col-sm-6 col-sm-offset-3" data-delay="0" data-animation="fade-in">';
			$output .= '<div class="circular-line"></div>';
			$output .= '</div>';
			$output .= '<div class="po-column po-column-mobile-ani po-header-small col-sm-12" data-delay="900" data-animation="pull-up">';
			$output .= '<h4 class="circular-text text-center">'.$title.'</h4></div></div></div>';
		} 
		else {
			$output .= '<div class="parent">';
			$output .= '<div class="row">';
			$output .= '<div class="col-xs-6">';
			$output .= '<h6 class="progress-title">'.$title.'</h6>';
			$output .= '</div>';
			$output .= '<div class="col-xs-6">';
			$output .= '<div class="progress-value text-right">'.$value.'%</div>';
			$output .= '</div></div>';
			$output .= '<div class="progress">';
			$output .= '<div class="progress-bar" role="progressbar" style="background-color:'.get_theme_mod( 'accent','#20C596').';" data-progress="'.$value.'"></div>';
			$output .= '</div></div>';
		}
	
	} else {
	
		if ($type == "circular") {
			$output .= '<div>';
			$output .= '<div class="hover-ani">';
			$output .= '<div class="circular-cont center-block">';
			$output .= '<div style="position:absolute;">';
			$output .= '<div class="icon-circular"><i class="fa '.$icon.' fa-2x po-column po-column-mobile-ani" data-delay="'.$icondelay.'" data-animation="'.$iconanimation.'"></i></div>';
			$output .= '</div>';
			$output .= '<input type="text" value="0" class="dial po-column po-column-mobile-ani" data-width="150" data-thickness=.02 data-displayInput=false data-fgColor="'.$color.'" data-bgColor="transparent" data-linecap=round data-readOnly=true data-delay="0" data-animation="fade-in" data-value="'.$value.'" data-valuedelay="'.$valuedelay.'">';
			$output .= '</div>';
			$output .= '<div class="po-column po-header-line col-sm-6 col-sm-offset-3" data-delay="0" data-animation="fade-in">';
			$output .= '<div class="circular-line"></div>';
			$output .= '</div>';
			$output .= '<div class="po-column po-column-mobile-ani po-header-small col-sm-12" data-delay="'.$textdelay.'" data-animation="'.$textanimation.'">';
			$output .= '<h4 class="circular-text text-center">'.$title.'</h4></div></div></div>';
		} else {
			$output .= '<div class="parent">';
			$output .= '<div class="row">';
			$output .= '<div class="col-xs-10">';
			if ( $icon == "" ) {
			$output .= '<h6 class="progress-title" style="float:left; letter-spacing:2px;">'.$title.'</h6><div class="clear-float"></div>';
			} else {
			$output .= '<i class="fa '.$icon.'" style="float:left; margin-top:1px; margin-right:10px; font-size:18px;"></i><h6 class="progress-title" style="float:left; letter-spacing:2px;">'.$title.'</h6><div class="clear-float"></div>';
			}
			$output .= '</div>';
			$output .= '<div class="col-xs-2">';
			$output .= '<div class="progress-value text-right" style="letter-spacing:1px; font-size:12px; margin-top:2px; color:'.$color.';">'.$value.'%</div>';
			$output .= '</div></div>';
			$output .= '<div class="progress">';
			$output .= '<div class="progress-bar" role="progressbar" style="background-color:'.$color.';" data-progress="'.$value.'"></div>';
			$output .= '</div></div>';
		}
	
	}
	return $output;

}
add_shortcode( 'progress_bar', 'po_progress_bar' );


/* PORTFOLIO SHOWCASE SHORTCODE
------------------------------------------------------- */  

function po_portfolio_showcase($atts) {
	
	extract(shortcode_atts( 
		array (
			'type' => get_theme_mod( 'portfolio_type' ),
			'category' => '',
			'columnwidth' => '4',
			'number' => '6',
			'order' => 'DESC',
			'orderby' => 'date',
			'archive' => '',
			'archivetext' => 'View all projects',
			'archiveicon' => 'fa-folder-open-o',
			'archivewidth' => '200',
			'filter' => '',
			
		), $atts ) 
	);
	
	if (wp_get_theme() == 'Nibiru' || wp_get_theme() == 'Nibiru Child Theme' ) {
		if ($filter == "show") {
		
		ob_start(); ?>
		
		<!--[if !IE]><!-->
        <div class="po-page-portfolio-filter">
        <div class="container">
        <div class="row">
        <div class="col-lg-12" style="text-align: center;">

	    <?php   
					
			
			// Setup the arguments to pass in
			$args = array(
					'order'        => 'ASC',
					'orderby'      => 'menu_order'
			);
								
								
			$terms = get_terms("portfolio_categories", $args );
			$count = count($terms);
			if ( $count > 0 ){
			echo "<div id='filters' class='button-group btn-group' data-toggle='buttons'><span class='btn btn-default filter-button active' style='margin-left: -1px;' data-filter-value='*'><input type='radio' name='options'>All</span>";
				foreach ( $terms as $term ) {
					echo "<span class='btn btn-default filter-button' data-filter-value='." . $term->name . "'><input type='radio' name='options'>" . $term->name . " </span>";
				 }
			echo "</div>";
			} ?>
         
         </div>
         </div>
         </div>
         </div>
         
         <div id="container" class="row po-full-width"><!--<![endif]-->
        <!--[if IE]><div id="" class="row po-full-width"><![endif]-->
	
   		<?php 
		$args = array( 'post_type' => 'portfolio', 'portfolio_categories' => $category, 'posts_per_page' => $number, 'order' => $order, 'orderby' => $orderby );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); 
		global $post, $portfolio_mb;
		$portfolio_mb->the_meta();
		$terms = get_the_term_list( $post->ID, 'portfolio_categories', '', ' <span class="cat-sep"></span> ', '' );
		
		?>
			<div class="portfolio-item filter-item column-4 item <?php echo strip_tags($terms); ?>">
			<a href="<?php the_permalink(); ?>">
			<div class="portfolio-details <?php echo get_theme_mod( 'portfolio_overlay' ); ?>">
						<div class="item-description">
						<div class="description-cell">
							<h5 class="item-title"><?php the_title(); ?></h5>
							<div class="subtitle"><?php echo strip_tags($terms, '<span>'); ?></div>
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
			<?php endwhile; ?>
			<div class="clear-float"></div>
            </div>
            </div>
            
            <?php if ( $archive == "show" ) { ?>
				
						<div style="width:8%; margin:30px auto 30px; border-top:1px solid #e1e1e1;"></div>
				  
						
						 <?php    
		echo do_shortcode("
		
		[button style='top' color='light' link='".get_post_type_archive_link( 'portfolio' )."' icon='fa-folder-open-o' width='". $archivewidth ."']". $archivetext ."[/button]
	
	"); ?>
						
					 
			
		<?php } 
		wp_reset_postdata();
		$output = ob_get_clean();
		return $output;	
		
		} else {
		
		ob_start();
		
		
	
		$args = array( 'post_type' => 'portfolio', 'portfolio_categories' => $category, 'posts_per_page' => $number, 'order' => $order, 'orderby' => $orderby );
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); 
		global $post, $portfolio_mb;
		$portfolio_mb->the_meta();
		$terms = get_the_term_list( $post->ID, 'portfolio_categories', '', ' <span class="cat-sep"></span> ', '' );
		
		?>
			<div class="portfolio-item col-sm-<?php echo $columnwidth; ?> column-<?php echo $columnwidth; ?>">
			<a href="<?php the_permalink(); ?>">
			<div class="portfolio-details <?php echo get_theme_mod( 'portfolio_overlay' ); ?>">
						<div class="item-description">
						<div class="description-cell">
							<h5 class="item-title"><?php the_title(); ?></h5>
							<div class="subtitle"><?php echo strip_tags($terms, '<span>'); ?></div>
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
			<?php endwhile; ?>
			<div class="clear-float"></div>
            
            <?php if ( $archive == "show" ) { ?>	
				
						<div style="width:8%; margin:30px auto 30px; border-top:1px solid #e1e1e1;"></div>
				  
						
						 <?php    
		echo do_shortcode("
		
		[button style='top' color='light' link='".get_post_type_archive_link( 'portfolio' )."' icon='fa-folder-open-o' width='". $archivewidth ."']". $archivetext ."[/button]
	
	"); ?>
						
					 
			
		<?php } wp_reset_postdata();
		$output = ob_get_clean();
		return $output;	
		
		}
	
	} else { 
		if ($filter == "show") { 
        	ob_start(); ?>
            
        <div class="po-page-portfolio-filter2">
        <div class="container">
        <div class="row">
        <div class="col-lg-12" style="text-align: center;">

	    <?php   
					
			
			// Setup the arguments to pass in
			$args = array(
					'order'        => 'ASC',
					'orderby'      => 'menu_order'
			);
								
								
			$terms = get_terms("portfolio_categories", $args );
			$count = count($terms);
			if ( $count > 0 ){
			echo "<div id='filters' class='button-group btn-group' data-toggle='buttons'><span class='btn btn-default filter-button active' style='margin-left: -1px;' data-filter-value='*'><input type='radio' name='options'>All</span>";
				foreach ( $terms as $term ) {
					echo "<span class='btn btn-default filter-button' data-filter-value='." . $term->name . "'><input type='radio' name='options'>" . $term->name . " </span>";
				 }
			echo "</div>";
			} ?>
         
         </div>
         </div>
         </div>
         </div>
         
         <div id="container" class="row po-full-width portfolio-item-effect-2">
        <?php
        
		$args = array( 'post_type' => 'portfolio', 'portfolio_categories' => $category, 'posts_per_page' => $number, 'order' => $order, 'orderby' => $orderby );
        $loop = new WP_Query( $args );
        
        while ( $loop->have_posts() ) : $loop->the_post();
        global $post, $portfolio_mb;
        $portfolio_mb->the_meta();
        $terms = get_the_term_list( $post->ID, 'portfolio_categories', '', ' <span class="cat-sep"></span> ', '' );
		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
        ?>
                                
                                <a class="filter-item item <?php echo strip_tags($terms); ?>" href="<?php the_permalink(); ?>" data-delay="<?php echo $portfolio_mb->get_the_value('delay'); ?>" data-animation="fade-in-port">
                	<!--[if !IE 8]><!-->
                    	<figure class="effect-chico">
                    <!--<![endif]-->
                    <!--[if IE 8]>
                    	<div class="figure-ie effect-chico">
                    <![endif]-->
                            
						<div class="port-img" style="width:100%; height:300px; background:
                        	 
							<?php if ( '' == $portfolio_mb->get_the_value('image') ) { ?>
								url(<?php echo $url ?>);
							<?php  } else { ?>
                            	url(<?php echo $portfolio_mb->get_the_value('image'); ?>);
							<?php } ?>	
                            
                            background-size:cover; background-position:center;"></div>
						
                        
                        <!--[if !IE 8]><!-->
                         	<figcaption>
                         <!--<![endif]-->
                        <!--[if IE 8]>
                            <div class="figcaption-ie">
                        <![endif]-->
                            <h2><?php the_title(); ?></h2>
                         <!--[if !IE 8]><!-->  
                         </figcaption>
                          <!--<![endif]-->
                        <!--[if IE 8]>
                            </div>
                        <![endif]-->
                         
                    <!--[if !IE 8]><!-->
                    	</figure>
                    <!--<![endif]-->
                    <!--[if IE 8]>
                    	</div>
                    <![endif]-->
                 </a>
           
        <?php endwhile; ?>
         </div>
        <div class="clearfix"></div>
        
        <?php if ( $archive == "show" ) { ?>	
        
        <div class="po-column archive-btn" style="text-align:center; margin-top:40px;" data-delay="400" data-animation="move-up-short">
        <a href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>" class="btn outline-button white" style="padding:10px 90px; text-align:center; cursor:pointer;">
            <i class="fa <?php echo $archiveicon; ?>" style="color:#fff; font-size:18px;"></i>
        </a>
        </div> 
        
        <?php } 
		
	
	wp_reset_postdata();
	$output = ob_get_clean();
	return $output; 
        
                } else {
				ob_start(); ?>
    
    <div class="row po-full-width portfolio-item-effect-2">
        <?php
        
		$args = array( 'post_type' => 'portfolio', 'portfolio_categories' => $category, 'posts_per_page' => $number, 'order' => $order, 'orderby' => $orderby );
        $loop = new WP_Query( $args );
        
        while ( $loop->have_posts() ) : $loop->the_post();
        global $post, $portfolio_mb;
        $portfolio_mb->the_meta();
        $terms = get_the_term_list( $post->ID, 'portfolio_categories', '', ' <span class="cat-sep"></span> ', '' );
		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
        ?>
                                
                                <a href="<?php the_permalink(); ?>" class="po-column col-sm-4 port-cont no-padding-port" data-delay="<?php echo $portfolio_mb->get_the_value('delay'); ?>" data-animation="fade-in-port">
                	<!--[if !IE 8]><!-->
                    	<figure class="effect-chico">
                    <!--<![endif]-->
                    <!--[if IE 8]>
                    	<div class="figure-ie effect-chico">
                    <![endif]-->
                            
						<div class="port-img" style="width:100%; height:300px; background:
                        	 
							<?php if ( '' == $portfolio_mb->get_the_value('image') ) { ?>
								url(<?php echo $url ?>);
							<?php  } else { ?>
                            	url(<?php echo $portfolio_mb->get_the_value('image'); ?>);
							<?php } ?>	
                            
                            background-size:cover; background-position:center;"></div>
						
                        
                        <!--[if !IE 8]><!-->
                         	<figcaption>
                         <!--<![endif]-->
                        <!--[if IE 8]>
                            <div class="figcaption-ie">
                        <![endif]-->
                            <h2><?php the_title(); ?></h2>
                         <!--[if !IE 8]><!-->  
                         </figcaption>
                          <!--<![endif]-->
                        <!--[if IE 8]>
                            </div>
                        <![endif]-->
                         
                    <!--[if !IE 8]><!-->
                    	</figure>
                    <!--<![endif]-->
                    <!--[if IE 8]>
                    	</div>
                    <![endif]-->
                 </a>
           
        <?php endwhile; ?>
         </div>
        <div class="clearfix"></div>
        
        <?php if ( $archive == "show" ) { ?>	
        
        <div class="po-column archive-btn" style="text-align:center; margin-top:40px;" data-delay="400" data-animation="move-up-short">
        <a href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>" class="btn outline-button white" style="padding:10px 90px; text-align:center; cursor:pointer;">
            <i class="fa <?php echo $archiveicon; ?>" style="color:#fff; font-size:18px;"></i>
        </a>
        </div> 
        
        <?php } 
		
	
	wp_reset_postdata();
	$output = ob_get_clean();
	return $output; 
	
		}
		
		}
     
}
add_shortcode('portfolio_showcase', 'po_portfolio_showcase');


/* PORTFOLIO SHOWCASE ARCHIVE SHORTCODE
------------------------------------------------------- */  

function po_portfolio_showcase_archive($atts) {
	
	ob_start();
	
	extract(shortcode_atts( 
		array (
			'category' => '',
			'columnwidth' => '4',
			'number' => '6',
			'order' => 'DESC',
			'orderby' => 'date',
		), $atts ) 
	);
	
	?>
    
    
	
						<div style="width:100%; margin:0;">   
                        	    
                            <div class="home-items">
                            
                            
                            	<div class="po-nav"> 
                                    
                                    <button id="footer-show" class="po-footer-button footer-show"></button>
                    <div id="filter-toggle-port" class="po-filter-portfolio"></div>
                    <div class="po-page-portfolio-filter-port">
					<?php   
						$args = array(
								'order'        => 'ASC',
								'orderby'      => 'menu_order'
						);
											
						$count_posts = wp_count_posts( 'portfolio' )->publish;					
						$terms = get_terms("portfolio_categories", $args );
						$count = count($terms);
						$countpost = count($posts);
						if ( $count > 0 ){
						echo "<div id='filters' class='button-group btn-group' data-toggle='buttons'><span class='btn btn-default filter-button active' style='margin-left: -1px;' data-filter-value='*'><input type='radio' name='options'>All <span class='filter-button-count'>" . $count_posts . "</span></span>";
							foreach ( $terms as $term ) {
								echo "<span class='btn btn-default filter-button' data-filter-value='." . $term->name . "'><input type='radio' name='options'>" . $term->name . " <span class='filter-button-count'>" . $term->count . "</span></span>";
							 }
						echo "</div>";
						} 
					?>       
				</div>  
                                    <div id="container">
                                        <?php
                                        $args = array(
                                        'post_type' => 'portfolio',
                                        'portfolio_categories' =>"",
                                        'orderby' => 'date', 
                                        'order' => 'ASC'
                                        );
                                        $loop = new WP_Query( $args );
                                        
                                        while ( $loop->have_posts() ) : $loop->the_post();
                                        global $post, $portfolio_mb;
                                        $portfolio_mb->the_meta();
                                        $terms = get_the_term_list( $post->ID, 'portfolio_categories', '', ' <span class="cat-sep"></span> ', '' );
                                        ?>
                                            <div class="portfolio-item filter-item item <?php echo strip_tags($terms); ?>">
                                                <a class="po-tooltip" href="<?php the_permalink(); ?>" data-toggle="tooltip" data-placement="bottom" data-delay="300" title="<?php the_title(); ?>">
                                                    <?php 
                                                        if ( '' == $portfolio_mb->get_the_value('image') ) {
                                                        the_post_thumbnail('full img-responsive no-padding'); 
                                                    } else { ?>
                                                        <img class="img-responsive no-padding" src="<?php echo $portfolio_mb->get_the_value('image'); ?>" alt="<?php the_title(); ?>"/>
                                                    <?php } ?>	
                                                 </a>
                                            </div>
                                        <?php endwhile; ?>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                          </div> 
                    
                 
		
	<?php wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	
}
add_shortcode('portfolio_showcase_archive', 'po_portfolio_showcase_archive');


/* PORTFOLIO FOOTER SHORTCODE
------------------------------------------------------- */  

function po_portfolio_footer($atts) {
	
	
	extract(shortcode_atts( 
		array (
			'type' => '',
			'category' => '',
			'columnwidth' => '4',
			'number' => '6',
			'order' => 'DESC',
			'orderby' => 'date',
		), $atts ) 
	);
	
	if (wp_get_theme() == 'Nibiru' || wp_get_theme() == 'Nibiru Child Theme' ) {
	
	ob_start();
    
	$args = array( 'post_type' => 'portfolio', 'portfolio_categories' => $category, 'posts_per_page' => $number, 'order' => $order, 'orderby' => $orderby );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post(); 
	global $post, $portfolio_mb;
	$portfolio_mb->the_meta();
	$terms = get_the_term_list( $post->ID, 'portfolio_categories', '', ' <span class"cat-sep"></span> ', '' );
	
	?>
    	<div class="portfolio-item-footer col-sm-<?php echo $columnwidth; ?> column-<?php echo $columnwidth; ?>">
        <a class="po-tooltip" href="<?php the_permalink(); ?>" data-toggle="tooltip" data-placement="top" title="<?php the_title(); ?>">
        <div class="portfolio-details">
                	<div class="item-description">
                    
                    </div>
                </div>
                <div class="liquid-container-footer">
            		<?php 
					if ( '' == $portfolio_mb->get_the_value('image') ) {
						the_post_thumbnail('full'); 
                    } else { ?>
					<img class="img-responsive" src="<?php echo $portfolio_mb->get_the_value('image'); ?>" alt="<?php the_title(); ?>" />
					<?php }
					?>	
                </div>
            </a>
        </div>
		<?php endwhile; ?>
		<div class="clear-float"></div>
		
	<?php wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	
	} else {
	
	ob_start(); ?>
		
	<div class="portfolio-item-effect">
    <?php
	$args = array( 'post_type' => 'portfolio', 'portfolio_categories' => $category, 'posts_per_page' => $number, 'order' => $order, 'orderby' => $orderby );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post(); 
	global $post, $portfolio_mb;
	$portfolio_mb->the_meta();
	$terms = get_the_term_list( $post->ID, 'portfolio_categories', '', ' <span class"cat-sep"></span> ', '' );
	
	?>
    	<div class="portfolio-item-footer col-sm-<?php echo $columnwidth; ?> column-<?php echo $columnwidth; ?>">
        <a class="po-tooltip" href="<?php the_permalink(); ?>" data-toggle="tooltip" data-placement="bottom" data-delay="100" title="<?php the_title(); ?>">
                <div class="liquid-container-footer">
                	<!--[if !IE 8]><!-->
                	<div class="grid cs-style-3 media-container" style="height:87px;">
                        <figure>
                        </figure>
                     </div>
                     <!--<![endif]-->
            		<?php 
					if ( '' == $portfolio_mb->get_the_value('image') ) {
						the_post_thumbnail('full'); 
                    } else { ?>
					<img class="img-responsive" src="<?php echo $portfolio_mb->get_the_value('image'); ?>" alt="<?php the_title(); ?>" />
					<?php }
					?>	
                </div>
            </a>
        </div>
		<?php endwhile; ?>
		<div class="clear-float"></div>
        </div>
	
	
		
	<?php wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	
	}
	
}
add_shortcode('portfolio_footer', 'po_portfolio_footer');


/* PORTFOLIO DETAILS SHORTCODE
------------------------------------------------------- */  

function po_portfolio_details($atts) {
	
	
	
	extract(shortcode_atts( 
		array (
			'displaylink' => '',
			'link' => '',
			'linktext' => 'Visit Website',
		), $atts ) 
	);
	
	if (wp_get_theme() == 'Nibiru' || wp_get_theme() == 'Nibiru Child Theme' ) {
	ob_start();
	global $post;
	$terms = get_the_term_list( $post->ID, 'portfolio_categories', '', ' <span class"cat-sep"></span> ', '' );
	
	?>
    	
            <div class="portfolio-link">
            <ul>
            <li style="display:<?php echo $displaylink; ?>;"><a href="<?php echo $link; ?>" target="_blank"><?php echo $linktext; ?></a></li>
            </ul>
            </div>
            <div class="portfolio-cat">
            	<ul>
        		<?php the_terms( $post->ID, 'portfolio_categories', '<li>', '</li><li>', '</li>' ); ?>
                </ul>
             </div>
        
		
	<?php wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	
	} else {
	
	ob_start();
	global $post;
	$terms = get_the_term_list( $post->ID, 'portfolio_categories', '', ' <span class"cat-sep"></span> ', '' );
	
	?>
    	
        	<div class="portfolio-date">
            	<ul>
                <li><?php the_time('F j, Y', '', ''); ?></li>
                </ul>
             </div>
           
            <div class="portfolio-cat">
            	<ul>
        		<?php the_terms( $post->ID, 'portfolio_categories', '<li>', '</li><li>', '</li>' ); ?>
                </ul>
             </div>
              <div class="portfolio-link">
            <ul>
            <li style="display:<?php echo $displaylink; ?>;"><a href="<?php echo $link; ?>" target="_blank"><?php echo $linktext; ?></a></li>
            </ul>
            </div>
        
		
	<?php wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	
	}
	
}
add_shortcode('portfolio_details', 'po_portfolio_details');


/* TWEETS SHORTCODE
------------------------------------------------------- */  

function po_tweets($atts) {
	
	ob_start();
	
	extract(shortcode_atts( 
		array (
			'number' => '2',
		), $atts ) 
	);
	
	global $post;
	
	?>
    	
            <div class="recent-tweets">
                <ul>
                <?php
                if (function_exists( 'getTweets' )) {
                $tweets = getTweets(get_theme_mod( 'twitter_username' ), $number, array('exclude_replies' => true, 'include_rts' => false, 'include_entities' => true));
                    foreach($tweets as $tweet){
					$date_from_twitter = strtotime($tweet['created_at']);
                    $tweet_text = $tweet["text"];
                    $tweet_text = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="http://$1" target="_blank">http://$1</a>', $tweet_text); //replace links
                    $tweet_text = preg_replace('/@([a-z0-9_]+)/i', '<a href="http://twitter.com/$1" target="_blank">@$1</a>', $tweet_text); //replace users
                    echo '<li>'.$tweet_text.'<br>';
					if (wp_get_theme() == 'Giza' || wp_get_theme() == 'Giza Child Theme' ) {
					echo '<div class="tweet-date">'.date('j M, Y', $date_from_twitter).'</div></li>';
					}
                    }
                }
                ?>
                </ul>
                <div class="tweet-name">
            		<a href="http://twitter.com/<?php echo get_theme_mod( 'twitter_username'); ?>">@<?php echo get_theme_mod( 'twitter_username'); ?></a>
                </div>
        	</div>
            
            
        
		
	<?php wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	
}
add_shortcode('tweets', 'po_tweets');


/* RECENT POSTS FOOTER SHORTCODE
------------------------------------------------------- */  

function po_recentposts_footer($atts) {
	
	ob_start();
	
	extract(shortcode_atts( 
		array (
			'number' => '4',
		), $atts ) 
	);
	
	global $post;
	
	?>
    	
            <div class="recent-posts"> 
                <ul> 	
                    <?php 
                    
                        $args = array( 'numberposts' => $number );
                        $recent_posts = wp_get_recent_posts( $args );
                        foreach( $recent_posts as $recent ){
                            echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
                        }
                    
                    ?>
                 </ul>
            </div> 
        
		
	<?php wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	
}
add_shortcode('recentposts_footer', 'po_recentposts_footer');



/* CAROUSEL SHORTCODE
------------------------------------------------------- */  

function po_carousel_sc($atts) {
	
	ob_start();
	
	extract(shortcode_atts( 
		array (
			'category' => '',
			'columnwidth' => '4',
			'number' => '3',
		), $atts ) 
	);
	
	?> 
    <div class="po-column col-sm-12" data-delay="0" data-animation="fade-in" style="padding-top:0; padding-bottom:0;" >
    <div class="po-carouseleds">
    	<!--[if !IE]><!--><ul class="po-carousel grid cs-style-1"> <!--<![endif]-->
<!--[if IE]><ul class="po-carousel-ie grid cs-style-1"> <![endif]--> <?php
        $args = array( 'post_type' => 'carousel', 'carousel_groups' => $category, 'posts_per_page' => 24, 'order' => 'DESC', 'orderby' => 'date' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); 
        global $post, $carousel_mb;
		$carousel_mb->the_meta();
        $terms = get_the_term_list( $post->ID, 'carousel_groups', '', ' ', '' ); 
        $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
        ?>
            <li>
                
                    <a class="view" href="<?php echo $url ?>" rel="<?php echo strip_tags($terms, '<span>'); ?>">
                    <!--[if !IE 8]><!-->
                    	<figure>
                    <!--<![endif]-->
                    <!--[if IE 8]>
                    	<div class="figure-ie">
                    <![endif]-->
                    	<?php 
						if ( '' == $carousel_mb->get_the_value('image') ) {
							?> <img class="img-responsive" src="<?php echo $url ?>" alt="<?php the_title(); ?>" /> <?php
						} else { ?>
						<img class="img-responsive" src="<?php echo $carousel_mb->get_the_value('image'); ?>" alt="<?php the_title(); ?>" />
						<?php }
						?>	
                        
                        <!--[if !IE 8]><!-->
                         	<figcaption>
                         <!--<![endif]-->
                        <!--[if IE 8]>
                            <div class="figcaption-ie">
                        <![endif]-->
                            <h6><?php the_title(); ?></h6>
                        <!--[if !IE 8]><!-->  
                         </figcaption>
                          <!--<![endif]-->
                        <!--[if IE 8]>
                            </div>
                        <![endif]-->
                        
                    <!--[if !IE 8]><!-->
                    	</figure>
                    <!--<![endif]-->
                    <!--[if IE 8]>
                    	</div>
                    <![endif]-->
                     
                    </a>
                    
               
            </li>
        <?php endwhile; ?>
        </ul>
   	</div>
    </div>
	<div class="clearfix"></div>	
	<?php wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	
}
add_shortcode('carousel', 'po_carousel_sc');



/* GOOGLE MAPS SHORTCODE
------------------------------------------------------- */  

function po_googlemap($atts) 
{
    extract(shortcode_atts(
		array(
			"id" => 'myMap', 
			"type" => 'road', 
			"latitude" => '51.501364', 
			"longitude" => '-0.141890', 
			"zoom" => '14',
			"marker" => '', 
			"message" => 'We are here!', 
			"height" => '250',
			"color" => '',
		), $atts)
	);
     
    $mapType = '';
    if($type == "satellite") 
        $mapType = "SATELLITE";
    else if($type == "terrain")
        $mapType = "TERRAIN";  
    else if($type == "hybrid")
        $mapType = "HYBRID";
    else
        $mapType = "ROADMAP";  
         
    echo '<!-- Google Map -->
        <script type="text/javascript">  
        $(document).ready(function() {
          function initializeGoogleMap() {
			  
			  var styles = [
				{
				  stylers: [
					{ hue: "'.$color.'" },
					{ saturation: -20 }
				  ]
				},{
				  featureType: "road",
				  elementType: "geometry",
				  stylers: [
					{ lightness: 100 },
					{ visibility: "simplified" }
				  ]
				},{
				  featureType: "road",
				  elementType: "labels",
				  stylers: [
					{ visibility: "simplified" }
				  ]
				}
			  ];
			  
			  var styledMap = new google.maps.StyledMapType(styles,
				{name: "Styled Map"});
			  
              var myLatlng = new google.maps.LatLng('.$latitude.','.$longitude.');
              var myOptions = {
                center: myLatlng,  
                zoom: '.$zoom.',
				scrollwheel: false,
				navigationControl: false,
				mapTypeControl: false,
				scaleControl: false,
				draggable: false,
                mapTypeId: google.maps.MapTypeId.SATELLITE
              };
              var map = new google.maps.Map(document.getElementById("'.$id.'"), myOptions);
     
              var contentString = "'.$message.'";
              var infowindow = new google.maps.InfoWindow({
                  content: contentString
              });
               
              var marker = new google.maps.Marker({
                  position: myLatlng,
				  animation:google.maps.Animation.DROP,
				  icon:"'.$marker.'"
              });
               
              google.maps.event.addListener(marker, "click", function() {
                  infowindow.open(map,marker);
              });
               
              marker.setMap(map);
			  
			  map.mapTypes.set("'.$id.'", styledMap);
 			  map.setMapTypeId("'.$id.'");
             
          }
          initializeGoogleMap();
     
        });
        </script>';
     
        return '<div id="'.$id.'" style="width:100%; height:'.$height.'px;" class="googleMap"></div>';
} 

add_shortcode('po_googlemaps','po_googlemap');



/* TEAM SHORTCODE
------------------------------------------------------- */  

function po_team_sc($atts) {
	
	
	
	extract(shortcode_atts( 
		array (
			'category' => '',
			'number' => '20',
			'columnwidth' => '3',
			'order' => 'DESC',
			'orderby' => 'date',
			'type' => '',
		), $atts ) 
	);
	
	if (wp_get_theme() == 'Nibiru' || wp_get_theme() == 'Nibiru Child Theme' ) {
		
		ob_start();
		
		$args = array( 'post_type' => 'team', 'team_categories' => $category, 'posts_per_page' => $number, 'order' => $order, 'orderby' => $orderby );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post(); 
	global $post, $team_mb;
	$team_mb->the_meta();
	$terms = wp_get_object_terms( $post->ID, 'team_categories');
	
	?>
    	<div class="po-column portfolio-item col-sm-<?php echo $columnwidth; ?> column-<?php echo $columnwidth; ?>" data-delay="0" data-animation="fade-in">
        <a href="<?php the_permalink(); ?>">
        <div class="portfolio-details">
                	<div class="item-description">
                    <div class="description-cell">
                        <h5 class="item-title"><?php the_title(); ?></h5>
                        <div class="subtitle"><?php echo $terms[0]->name; ?></div>
                    </div>
                    </div>
                </div>
                <div class="liquid-container">
            		<?php 
					if ( '' == $team_mb->get_the_value('image') ) {
						the_post_thumbnail('full'); 
                    } else { ?>
					<img class="img-responsive" src="<?php echo $team_mb->get_the_value('image'); ?>" alt="<?php the_title(); ?>"/>
					<?php }
					?>	
                </div>
            </a>
        </div>
		<?php endwhile; ?>
		<div class="clear-float"></div>
        
		
	<?php wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
		
	} else {
	
	ob_start();
	
	$args = array( 'post_type' => 'team', 'team_categories' => $category, 'posts_per_page' => $number, 'order' => $order, 'orderby' => $orderby );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post(); 
	global $post, $team_mb;
	$team_mb->the_meta();
	$terms = get_the_term_list( $post->ID, 'team_categories', '', ' <span class="cat-sep"></span> ', '' );
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
	
	?>
    	<div class="po-column team-item col-sm-<?php echo $columnwidth; ?> col-sm-offset-<?php echo $team_mb->get_the_value('offset'); ?> column-<?php echo $columnwidth; ?> portfolio-item-effect-3" data-delay="<?php echo $team_mb->get_the_value('delay'); ?>" data-animation="move-up-short">
        
        	<a class="no-padding grid" href="<?php the_permalink(); ?>">
                    <!--[if !IE 8]><!-->
                    	<figure class="effect-chico">
                    <!--<![endif]-->
                    <!--[if IE 8]>
                    	<div class="figure-ie effect-chico">
                    <![endif]-->
                            
						<div class="port-img" style="width:100%; height:230px; background:
                        	 
							<?php if ( '' == $team_mb->get_the_value('image') ) { ?>
								url(<?php echo $url ?>);
							<?php  } else { ?>
                            	url(<?php echo $team_mb->get_the_value('image'); ?>);
							<?php } ?>	
                            
                            background-size:cover; background-position:center;"></div>
							
                         <!--[if !IE 8]><!-->
                         	<figcaption>
                         <!--<![endif]-->
                        <!--[if IE 8]>
                            <div class="figcaption-ie">
                        <![endif]-->
                            <h2><?php echo strip_tags($terms, '<span>'); ?></h2>
                         <!--[if !IE 8]><!-->  
                         </figcaption>
                          <!--<![endif]-->
                        <!--[if IE 8]>
                            </div>
                        <![endif]-->
                    <!--[if !IE 8]><!-->
                    	</figure>
                    <!--<![endif]-->
                    <!--[if IE 8]>
                    	</div>
                    <![endif]-->
                 </a>
                  <div class="ss-style-triangles-2"></div>
                <div class="team-details">
               		<div class="team-details-inner">
                        <h5 class="team-title"><?php the_title(); ?></h5>
                        <div class="team-social">
                            <?php echo do_shortcode( $team_mb->get_the_value('social_links')); ?>
                        </div>
                    </div>
                    
                </div>
                
          
        </div>
		<?php endwhile; ?>
		<div class="clear-float"></div>
        
		
	<?php wp_reset_postdata();
	$output = ob_get_clean();
	
	}
	
	
	return $output;
	
}
add_shortcode('team', 'po_team_sc');


/* CLIENTS SHORTCODE
------------------------------------------------------- */  

function po_clients($atts) {
	
	extract(shortcode_atts( 
		array (
			'category' => '',
			'number' => '20',
			'columnwidth' => '2',
			'order' => 'DESC',
			'orderby' => 'date',
		), $atts ) 
	);
	
	if (wp_get_theme() == 'Nibiru' || wp_get_theme() == 'Nibiru Child Theme' ) {
		
		ob_start();
	
	extract(shortcode_atts( 
		array (
			'category' => '',
			'number' => '20',
			'columnwidth' => '3',
			'order' => 'DESC',
			'orderby' => 'date',
		), $atts ) 
	);
	
	?> 
    
    <div class="col-sm-10 col-sm-offset-1">
	
    <?php
	
	$args = array( 'post_type' => 'clients', 'client_categories' => $category, 'posts_per_page' => $number, 'order' => $order, 'orderby' => $orderby );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post(); 
	global $post;
	$terms = get_the_term_list( $post->ID, 'client_categories', '', ' <span class"cat-sep"></span> ', '' );
	
	?>
    	
    	<div class="po-column client-image col-sm-<?php echo $columnwidth; ?> column-<?php echo $columnwidth; ?>" data-delay="0" data-animation="fade-in">
        <div class="client-container" data-toggle="tooltip" data-placement="top" title="<?php the_title(); ?>">
        <div class="client-details">
                	<div class="item-description">
                    
                    </div>
                </div>
                <div class="liquid-container-clients">
            		<?php the_post_thumbnail('full'); ?>
                </div>
            </div>
        </div>
		<?php endwhile; ?>
		<div class="clear-float"></div>
        </div>
		
	<?php wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
		
	} else {
	
	ob_start();
	?> 
    
    <div class="client-item">
	
    <?php
	
	$args = array( 'post_type' => 'clients', 'client_categories' => $category, 'posts_per_page' => $number, 'order' => $order, 'orderby' => $orderby );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post(); 
	global $post, $client_mb;
	$client_mb->the_meta();
	$terms = get_the_term_list( $post->ID, 'client_categories', '', ' <span class"cat-sep"></span> ', '' );
	
	?>
    	
    	<div class="po-column client-image col-sm-<?php echo $columnwidth; ?> column-<?php echo $columnwidth; ?>" data-delay="<?php echo $client_mb->get_the_value('delay'); ?>" data-animation="move-up-short">
        <div class="client-container">
       
                
            		<?php the_post_thumbnail('full'); ?>
            
        </div>
        </div>
		<?php endwhile; ?>
        
		<div class="clear-float"></div>
     </div>
		
	<?php wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	
	}
	
}
add_shortcode('clients', 'po_clients');


/* TESTIMONIALS SHORTCODE
------------------------------------------------------- */  

function po_test( $atts ) {
	
	extract( shortcode_atts(
		array(
			'category' => '',
			'background' => '',
			'imageurl' => '',
			'backgroundcolor' => '#f5f5f5',
			'textcolor' => '#333',
			'paddingtop' => '100',
			'paddingbottom' => '80',
			'header' => '',
			'width' => '',
			'id' => 'testimonials',
			'toparrowcolor' => '',
			'bottomarrowcolor' => '',
			'delay' => '400',
			'animation' => 'fade-in',
			
		), $atts )
	);
	
	if (wp_get_theme() == 'Nibiru' || wp_get_theme() == 'Nibiru Child Theme' ) {
		
		if ($header == "") {
		ob_start();
		?> 	
			<div class="test-container" style="padding-top:<?php echo $paddingtop; ?>px; padding-bottom:<?php echo $paddingbottom; ?>px; background-color:<?php echo $backgroundcolor; ?>; color:<?php echo $textcolor; ?>;">
			<div class="row po-full-width">
			<div class="col-sm-12" style="padding:0;">
			<div class="po-testimonials">
			<ul class="po-test-slide" style="padding:0;">
				 <?php  $args = array( 'post_type' => 'testimonials', 'testimonial_categories' => $category, 'posts_per_page' => '20', 'order' => 'DESC', 'orderby' => 'date' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); 
					global $post;
					?>
				  <li style="color:<?php echo $textcolor; ?>;"><div class="test-text text-center"><?php the_content(); ?></div><div class="test-person text-center"><?php the_title(); ?></div></li>
				  <?php endwhile; ?>
				</ul>
			</div>
			<div class="clear-float"></div>
			</div>
			</div>
			</div>
		
		<?php wp_reset_postdata();
		$output = ob_get_clean();
		
	}
	
	else {
		
		ob_start();
		?> 
			
			<div class="test-container" style="padding-top:<?php echo $paddingtop; ?>px; padding-bottom:<?php echo $paddingbottom; ?>px; background-color:<?php echo $backgroundcolor; ?>; color:<?php echo $textcolor; ?>;">
			<div class="row po-full-width">
			<h3 class="text-center"><?php echo $header; ?></h3>
			<div class="header-line" style="padding:0; margin:40px auto 30px;"></div>
			
			<div class="col-sm-12" style="padding:0;">
			<div class="po-testimonials">
			<ul class="po-test-slide" style="padding:0;">
				 <?php  $args = array( 'post_type' => 'testimonials', 'testimonial_categories' => $category, 'posts_per_page' => '20', 'order' => 'DESC', 'orderby' => 'date' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); 
					global $post;
					?>
				  <li><div class="test-text text-center"><?php the_content(); ?></div><p class="test-person text-center"><?php the_title(); ?></p></li>
				  <?php endwhile; ?>
				</ul>
			</div>
			<div class="clear-float"></div>
			</div>
			</div>
			</div>
			
		
		<?php wp_reset_postdata();
		$output = ob_get_clean();
		
	}	
		
	} else {
		
	
	
	if ($header == "") {
		if ($background == "image-parallax") {
			
			ob_start();
		?> 
			<div id="<?php echo $id; ?>" class="po-section test-container section-background-image-parallax" style="padding-top:<?php echo $paddingtop; ?>px; padding-bottom:<?php echo $paddingbottom; ?>px; background:url(<?php echo $imageurl; ?>); -webkit-box-shadow: inset 0px 0px 1000px 500px rgba(0,0,0,0.2); -moz-box-shadow: inset 0px 0px 1000px 500px rgba(0,0,0,0.2); box-shadow: inset 0px 0px 1000px 500px rgba(0,0,0,0.2); color:<?php echo $textcolor; ?>;"
            data-center="background-position: 50% 0px;"
        data-bottom-top="background-position: 50% 150px;"
        data-top-bottom="background-position: 50% -150px;"
        data-anchor-target="#<?php echo $id; ?>">
        	<!--[if IE 8]><img class="section-bg-ie" src="<?php echo $imageurl; ?>" alt="background"><![endif]-->
            <div class="ss-style-triangles" style="background-color:<?php echo $toparrowcolor; ?>;"></div>	
			<div class="row po-full-width">
            
            <div class="po-column col-sm-12" data-delay="<?php echo $delay; ?>" data-animation="<?php echo $animation; ?>" style="padding:0;">
			<div class="po-testimonials">
			<ul class="po-test-slide" style="padding:0;">
				 <?php  $args = array( 'post_type' => 'testimonials', 'testimonial_categories' => $category, 'posts_per_page' => '20', 'order' => 'DESC', 'orderby' => 'date' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); 
					global $post;
					?>
				  <li><div class="test-text text-center"><?php the_content(); ?></div><p class="test-person text-center"><?php the_title(); ?></p></li>
				  <?php endwhile; ?>
				</ul>
			</div>
			<div class="clear-float"></div>
			</div>
			</div>
			<div class="transparent-triangle-container">
                <table class="">
                    <tr>
                        <td class="transparent-triangle-left-white" style="background-color:<?php echo $bottomarrowcolor; ?>;"></td>
                        <td class="transparent-triangle-left-triangle-container">
                            <div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent <?php echo $bottomarrowcolor; ?>;"></div>
                        </td>
                        <td class="transparent-triangle-right-triangle-container">
                            <div class="transparent-triangle-right-triangle" style="border-color: transparent <?php echo $bottomarrowcolor; ?> transparent transparent;"></div>
                        </td>
                        <td class="transparent-triangle-right-white" style="background-color:<?php echo $bottomarrowcolor; ?>;"></td>
                    </tr>
                </table>
                <div class="transparent-triangle-container-bottom-white"></div>
            </div>
			</div>
			
		
		<?php wp_reset_postdata();
		$output = ob_get_clean();
		
		}
		else {
		ob_start();
		?> 	
			<div id="<?php echo $id; ?>" class="test-container" style="padding-top:<?php echo $paddingtop; ?>px; padding-bottom:<?php echo $paddingbottom; ?>px; background-color:<?php echo $backgroundcolor; ?>; color:<?php echo $textcolor; ?>;">
            <!--[if IE 8]><img class="section-bg-ie" src="<?php echo $imageurl; ?>" alt="background"><![endif]-->
            <div class="ss-style-triangles" style="background-color:<?php echo $toparrowcolor; ?>;"></div>
			<div class="row po-full-width">
			<div class="po-column col-sm-12" data-delay="<?php echo $delay; ?>" data-animation="<?php echo $animation; ?>" style="padding:0;">
			<div class="po-testimonials">
			<ul class="po-test-slide" style="padding:0;">
				 <?php  $args = array( 'post_type' => 'testimonials', 'testimonial_categories' => $category, 'posts_per_page' => '20', 'order' => 'DESC', 'orderby' => 'date' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); 
					global $post;
					?>
				  <li style="color:<?php echo $textcolor; ?>;"><div class="test-text text-center"><?php the_content(); ?></div><div class="test-person text-center"><?php the_title(); ?></div></li>
				  <?php endwhile; ?>
				</ul>
			</div>
			<div class="clear-float"></div>
			</div>
			</div>
            <div class="transparent-triangle-container">
                <table class="">
                    <tr>
                        <td class="transparent-triangle-left-white" style="background-color:<?php echo $bottomarrowcolor; ?>;"></td>
                        <td class="transparent-triangle-left-triangle-container">
                            <div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent <?php echo $bottomarrowcolor; ?>;"></div>
                        </td>
                        <td class="transparent-triangle-right-triangle-container">
                            <div class="transparent-triangle-right-triangle" style="border-color: transparent <?php echo $bottomarrowcolor; ?> transparent transparent;"></div>
                        </td>
                        <td class="transparent-triangle-right-white" style="background-color:<?php echo $bottomarrowcolor; ?>;"></td>
                    </tr>
                </table>
                <div class="transparent-triangle-container-bottom-white"></div>
            </div>
			</div>
		
		<?php wp_reset_postdata();
		$output = ob_get_clean();	
		
		}
	}
	
	else {
		if ($background == "image-parallax") { 
		
		ob_start();
		?> 
			<div id="<?php echo $id; ?>" class="po-section test-container section-background-image-parallax" style="padding-top:<?php echo $paddingtop; ?>px; padding-bottom:<?php echo $paddingbottom; ?>px; background:url(<?php echo $imageurl; ?>); -webkit-box-shadow: inset 0px 0px 1000px 500px rgba(0,0,0,0.2); -moz-box-shadow: inset 0px 0px 1000px 500px rgba(0,0,0,0.2); box-shadow: inset 0px 0px 1000px 500px rgba(0,0,0,0.2); color:<?php echo $textcolor; ?>;"
            data-center="background-position: 50% 0px;"
        data-bottom-top="background-position: 50% 150px;"
        data-top-bottom="background-position: 50% -150px;"
        data-anchor-target="#<?php echo $id; ?>">
        	<!--[if IE 8]><img class="section-bg-ie" src="<?php echo $imageurl; ?>" alt="background"><![endif]-->
            <div class="ss-style-triangles" style="background-color:<?php echo $toparrowcolor; ?>;"></div>	
			<div class="row po-full-width">
            
            <div class="po-column col-sm-12" data-delay="<?php echo $delay; ?>" data-animation="<?php echo $animation; ?>" style="padding:0;">
                <h3 class="text-center standard-header"><?php echo $header; ?></h3>
                <div class="header-line"></div>
			<div class="po-testimonials">
			<ul class="po-test-slide" style="padding:0;">
				 <?php  $args = array( 'post_type' => 'testimonials', 'testimonial_categories' => $category, 'posts_per_page' => '20', 'order' => 'DESC', 'orderby' => 'date' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); 
					global $post;
					?>
				  <li><div class="test-text text-center"><?php the_content(); ?></div><p class="test-person text-center"><?php the_title(); ?></p></li>
				  <?php endwhile; ?>
				</ul>
			</div>
			<div class="clear-float"></div>
			</div>
			</div>
			<div class="transparent-triangle-container">
                <table class="">
                    <tr>
                        <td class="transparent-triangle-left-white" style="background-color:<?php echo $bottomarrowcolor; ?>;"></td>
                        <td class="transparent-triangle-left-triangle-container">
                            <div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent <?php echo $bottomarrowcolor; ?>;"></div>
                        </td>
                        <td class="transparent-triangle-right-triangle-container">
                            <div class="transparent-triangle-right-triangle" style="border-color: transparent <?php echo $bottomarrowcolor; ?> transparent transparent;"></div>
                        </td>
                        <td class="transparent-triangle-right-white" style="background-color:<?php echo $bottomarrowcolor; ?>;"></td>
                    </tr>
                </table>
                <div class="transparent-triangle-container-bottom-white"></div>
            </div>
			</div>
			
		
		<?php wp_reset_postdata();
		$output = ob_get_clean();
		
		}
		else {
		ob_start();
		?> 
			
			<div id="<?php echo $id; ?>" class="test-container" style="padding-top:<?php echo $paddingtop; ?>px; padding-bottom:<?php echo $paddingbottom; ?>px; background-color:<?php echo $backgroundcolor; ?>; color:<?php echo $textcolor; ?>;">
            <!--[if IE 8]><img class="section-bg-ie" src="<?php echo $imageurl; ?>" alt="background"><![endif]-->
            <div class="ss-style-triangles" style="background-color:<?php echo $toparrowcolor; ?>;"></div>
			<div class="row po-full-width">
            <div class="po-column col-sm-12" data-delay="<?php echo $delay; ?>" data-animation="<?php echo $animation; ?>" style="padding:0;">
                <h3 class="text-center"><?php echo $header; ?></h3>
                <div class="header-line" style="padding:0; margin:40px auto 30px;"></div>
			<div class="po-testimonials">
			<ul class="po-test-slide" style="padding:0;">
				 <?php  $args = array( 'post_type' => 'testimonials', 'testimonial_categories' => $category, 'posts_per_page' => '20', 'order' => 'DESC', 'orderby' => 'date' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); 
					global $post;
					?>
				  <li><div class="test-text text-center"><?php the_content(); ?></div><p class="test-person text-center"><?php the_title(); ?></p></li>
				  <?php endwhile; ?>
				</ul>
			</div>
			<div class="clear-float"></div>
			</div>
			</div>
            <div class="transparent-triangle-container">
                <table class="">
                    <tr>
                        <td class="transparent-triangle-left-white" style="background-color:<?php echo $bottomarrowcolor; ?>;"></td>
                        <td class="transparent-triangle-left-triangle-container">
                            <div class="transparent-triangle-left-triangle" style="border-color: transparent transparent transparent <?php echo $bottomarrowcolor; ?>;"></div>
                        </td>
                        <td class="transparent-triangle-right-triangle-container">
                            <div class="transparent-triangle-right-triangle" style="border-color: transparent <?php echo $bottomarrowcolor; ?> transparent transparent;"></div>
                        </td>
                        <td class="transparent-triangle-right-white" style="background-color:<?php echo $bottomarrowcolor; ?>;"></td>
                    </tr>
                </table>
                <div class="transparent-triangle-container-bottom-white"></div>
            </div>
			</div>
			
		
		<?php wp_reset_postdata();
		$output = ob_get_clean();
		
		}
	}
	
	}
	
	return $output;

}
add_shortcode( 'testimonials', 'po_test' );


/* SOCIAL SHORTCODE
------------------------------------------------------- */  

function po_social( $atts ) {
	
	extract( shortcode_atts(
		array(  
			'type' => '',
			'align' => '',
		), $atts )
	);
	
	$email = get_theme_mod( 'email_address' );
	$twitter = get_theme_mod( 'twitter_username' );
	$facebook = get_theme_mod( 'facebook_url' );
	$googleplus = get_theme_mod( 'googleplus_url' );
	$pinterest = get_theme_mod( 'pinterest_username' );
	$youtube = get_theme_mod( 'youtube_url' );
	$vimeo = get_theme_mod( 'vimeo_username' );
	$linkedin = get_theme_mod( 'linkedin_url' );
	$github = get_theme_mod( 'github_url' );
	$foursquare = get_theme_mod( 'foursquare_url' );
	$instagram = get_theme_mod( 'instagram_username' );
	$flickr = get_theme_mod( 'flickr_url' );
	$rss = get_theme_mod( 'rss_url' );
	
	$social="";
	
	if ($type == '') {
		if ($email) {
			$social .= '<li><a href="mailto:'.$email.'"><span class="index green"><i class="fa fa-envelope-o"></i></span></a></li>'."\n";
		} 
		if ($twitter) {
			$social .= '<li><a href="http://www.twitter.com/'.$twitter.'"><span class="index twit"><i class="fa fa-twitter"></i></span></a></li>'."\n";
		} 
		if ($facebook) {
			$social .= '<li><a href="'.$facebook.'"><span class="index fb"><i class="fa fa-facebook"></i></span></a></li>'."\n";
		} 
		if ($googleplus) {
			$social .= '<li><a href="'.$googleplus.'"><span class="index goog"><i class="fa fa-google-plus"></i></span></a></li>'."\n";
		} 
		if ($pinterest) {
			$social .= '<li><a href="http://www.pinterest.com/'.$pinterest.'"><span class="index pint"><i class="fa fa-pinterest"></i></span></a></li>'."\n";
		} 
		if ($youtube) {
			$social .= '<li><a href="'.$youtube.'"><span class="index yt"><i class="fa fa-youtube"></i></span></a></li>'."\n";
		} 
		if ($vimeo) {
			$social .= '<li><a href="http://www.vimeo.com/'.$vimeo.'"><span class="index vimeo"><i class="fa fa-vimeo-square"></i></span></a></li>'."\n";
		}
		if ($linkedin) {
			$social .= '<li><a href="'.$linkedin.'"><span class="index linked"><i class="fa fa-linkedin"></i></span></a></li>'."\n";
		} 
		if ($github) {
			$social .= '<li><a href="'.$github.'"><span class="index git"><i class="fa fa-github"></i></span></a></li>'."\n";
		} 
		if ($foursquare) {
			$social .= '<li><a href="'.$foursquare.'"><span class="index fours"><i class="fa fa-foursquare"></i></span></a></li>'."\n";
		} 
		if ($instagram) {
			$social .= '<li><a href="http://instagram.com/'.$instagram.'"><span class="index insta"><i class="fa fa-instagram"></i></span></a></li>'."\n";
		} 
		if ($flickr) {
			$social .= '<li><a href="'.$flickr.'"><span class="index flickr"><i class="fa fa-flickr"></i></span></a></li>'."\n";
		} 
		if ($rss) {
			$social .= '<li><a href="'.$rss.'"><span class="index rss"><i class="fa fa-rss"></i></span></a></li>'."\n";
		} 
	} else {
		
			$social_list = explode(', ', $type);
			foreach ($social_list as $list) {
				
				if ($list == "email") {
					$social .= '<li><a href="mailto:'.$email.'"><span class="index green"><i class="fa fa-envelope-o"></i></span></a></li>'."\n";
				} 
				if ($list == "twitter") {
					$social .= '<li><a href="http://www.twitter.com/'.$twitter.'"><span class="index twit"><i class="fa fa-twitter"></i></span></a></li>'."\n";
				} 
				if ($list == "facebook") {
					$social .= '<li><a href="'.$facebook.'"><span class="index fb"><i class="fa fa-facebook"></i></span></a></li>'."\n";
				} 
				if ($list == "googleplus") {
					$social .= '<li><a href="'.$googleplus.'"><span class="index goog"><i class="fa fa-google-plus"></i></span></a></li>'."\n";
				} 
				if ($list == "pinterest") {
					$social .= '<li><a href="http://www.pinterest.com/'.$pinterest.'"><span class="index pint"><i class="fa fa-pinterest"></i></span></a></li>'."\n";
				} 
				if ($list == "youtube") {
					$social .= '<li><a href="'.$youtube.'"><span class="index yt"><i class="fa fa-youtube"></i></span></a></li>'."\n";
				} 
				if ($list == "vimeo") {
					$social .= '<li><a href="http://www.vimeo.com/'.$vimeo.'"><span class="index vimeo"><i class="fa fa-vimeo-square"></i></span></a></li>'."\n";
				}
				if ($list == "linkedin") {
					$social .= '<li><a href="'.$linkedin.'"><span class="index linked"><i class="fa fa-linkedin"></i></span></a></li>'."\n";
				} 
				if ($list == "github") {
					$social .= '<li><a href="'.$github.'"><span class="index git"><i class="fa fa-github"></i></span></a></li>'."\n";
				} 
				if ($list == "foursquare") {
					$social .= '<li><a href="'.$foursquare.'"><span class="index fours"><i class="fa fa-foursquare"></i></span></a></li>'."\n";
				} 
				if ($list == "instagram") {
					$social .= '<li><a href="http://instagram.com/'.$instagram.'"><span class="index insta"><i class="fa fa-instagram"></i></span></a></li>'."\n";
				} 
				if ($list == "flickr") {
					$social .= '<li><a href="'.$flickr.'"><span class="index flickr"><i class="fa fa-flickr"></i></span></a></li>'."\n";
				} 
				if ($list == "rss") {
					$social .= '<li><a href="'.$rss.'"><span class="index rss"><i class="fa fa-rss"></i></span></a></li>'."\n";
				} 
			
			}
	}
	
	if ($align == "center") {
		$output = '';
		$output .= '<ul class="social-links-center">'."\n";
		$output .= $social;
		$output .= '</ul><div class="clear-float"></div>'."\n";
	}
	else {
		$output = '';
		$output .= '<ul class="social-links">'."\n";
		$output .= $social;
		$output .= '</ul><div class="clear-float"></div>';
	}
	return $output;

}
add_shortcode( 'social', 'po_social' );


/* SOCIAL PERSON SHORTCODE
------------------------------------------------------- */  

function po_social_person( $atts ) {
	
	extract( shortcode_atts(
		array(  
			'align' => '',
			'type' => '',
			'emailaddress' => '',
			'twitterusername' => '',
			'facebookurl' => '',
			'googleplusurl' => '',
			'pinterestusername' => '',
			'youtubeurl' => '',
			'vimeousername' => '',
			'linkedinurl' => '',
			'githuburl' => '',
			'foursquareurl' => '',
			'instagramusername' => '',
			'flickrurl' => '',
		), $atts )
	);
	
	
	$social="";
	
	if ($type == '') {
		if ( $emailaddress) {
			$social .= '<li><a href="mailto:'.$emailaddress.'"><span class="index green"><i class="fa fa-envelope-o"></i></span></a></li>'."\n";
		} 
		if ($twitterusername) {
			$social .= '<li><a href="http://www.twitter.com/'.$twitterusername.'"><span class="index twit"><i class="fa fa-twitter"></i></span></a></li>'."\n";
		} 
		if ($facebookurl) {
			$social .= '<li><a href="'.$facebookurl.'"><span class="index fb"><i class="fa fa-facebook"></i></span></a></li>'."\n";
		} 
		if ($googleplusurl) {
			$social .= '<li><a href="'.$googleplusurl.'"><span class="index goog"><i class="fa fa-google-plus"></i></span></a></li>'."\n";
		} 
		if ($pinterestusername) {
			$social .= '<li><a href="http://www.pinterest.com/'.$pinterestusername.'"><span class="index pint"><i class="fa fa-pinterest"></i></span></a></li>'."\n";
		} 
		if ($youtubeurl) {
			$social .= '<li><a href="'.$youtubeurl.'"><span class="index yt"><i class="fa fa-youtube"></i></span></a></li>'."\n";
		} 
		if ($vimeousername) {
			$social .= '<li><a href="http://www.vimeo.com/'.$vimeousername.'"><span class="index vimeo"><i class="fa fa-vimeo-square"></i></span></a></li>'."\n";
		}
		if ($linkedinurl) {
			$social .= '<li><a href="'.$linkedinurl.'"><span class="index linked"><i class="fa fa-linkedin"></i></span></a></li>'."\n";
		} 
		if ($githuburl) {
			$social .= '<li><a href="'.$githuburl.'"><span class="index git"><i class="fa fa-github"></i></span></a></li>'."\n";
		} 
		if ($foursquareurl) {
			$social .= '<li><a href="'.$foursquareurl.'"><span class="index fours"><i class="fa fa-foursquare"></i></span></a></li>'."\n";
		} 
		if ($instagramusername) {
			$social .= '<li><a href="http://instagram.com/'.$instagramusername.'"><span class="index insta"><i class="fa fa-instagram"></i></span></a></li>'."\n";
		} 
		if ($flickrurl) {
			$social .= '<li><a href="'.$flickrurl.'"><span class="index flickr"><i class="fa fa-flickr"></i></span></a></li>'."\n";
		} 
	} else {
		
			$sociallist = explode(', ', $type);
			foreach ($sociallist as $list) {
				
				if ($list == "email") {
					$social .= '<li><a href="mailto:'.$emailaddress.'"><span class="index green"><i class="fa fa-envelope-o"></i></span></a></li>'."\n";
				} 
				if ($list == "twitter") {
					$social .= '<li><a href="http://www.twitter.com/'.$twitterusername.'"><span class="index twit"><i class="fa fa-twitter"></i></span></a></li>'."\n";
				} 
				if ($list == "facebook") {
					$social .= '<li><a href="'.$facebookurl.'"><span class="index fb"><i class="fa fa-facebook"></i></span></a></li>'."\n";
				} 
				if ($list == "googleplus") {
					$social .= '<li><a href="'.$googleplusurl.'"><span class="index goog"><i class="fa fa-google-plus"></i></span></a></li>'."\n";
				} 
				if ($list == "pinterest") {
					$social .= '<li><a href="http://www.pinterest.com/'.$pinterestusername.'"><span class="index pint"><i class="fa fa-pinterest"></i></span></a></li>'."\n";
				} 
				if ($list == "youtube") {
					$social .= '<li><a href="'.$youtubeurl.'"><span class="index yt"><i class="fa fa-youtube"></i></span></a></li>'."\n";
				} 
				if ($list == "vimeo") {
					$social .= '<li><a href="http://www.vimeo.com/'.$vimeousername.'"><span class="index vimeo"><i class="fa fa-vimeo-square"></i></span></a></li>'."\n";
				}
				if ($list == "linkedin") {
					$social .= '<li><a href="'.$linkedinurl.'"><span class="index linked"><i class="fa fa-linkedin"></i></span></a></li>'."\n";
				} 
				if ($list == "github") {
					$social .= '<li><a href="'.$githuburl.'"><span class="index git"><i class="fa fa-github"></i></span></a></li>'."\n";
				} 
				if ($list == "foursquare") {
					$social .= '<li><a href="'.$foursquareurl.'"><span class="index fours"><i class="fa fa-foursquare"></i></span></a></li>'."\n";
				} 
				if ($list == "instagram") {
					$social .= '<li><a href="http://instagram.com/'.$instagramusername.'"><span class="index insta"><i class="fa fa-instagram"></i></span></a></li>'."\n";
				} 
				if ($list == "flickr") {
					$social .= '<li><a href="'.$flickrurl.'"><span class="index flickr"><i class="fa fa-flickr"></i></span></a></li>'."\n";
				} 
			
			}
	}
	
	if ($align == "center") {
		$output = '';
		$output .= '<ul class="social-links-center">'."\n";
		$output .= $social;
		$output .= '</ul><div class="clear-float"></div>'."\n";
	}
	else {
		$output = '';
		$output .= '<ul class="social-links">'."\n";
		$output .= $social;
		$output .= '</ul><div class="clear-float"></div>';

	}
	
	return $output;

}
add_shortcode( 'social_person', 'po_social_person' );


/* SOCIAL PERSON TEMPLATE SHORTCODE
------------------------------------------------------- */  

function po_social_person_template( $atts ) {
	
	extract( shortcode_atts(
		array(  
			'align' => '',
			'type' => '',
			'emailaddress' => '',
			'twitterusername' => '',
			'facebookurl' => '',
			'googleplusurl' => '',
			'pinterestusername' => '',
			'youtubeurl' => '',
			'vimeousername' => '',
			'linkedinurl' => '',
			'githuburl' => '',
			'foursquareurl' => '',
			'instagramusername' => '',
			'flickrurl' => '',
		), $atts )
	);
	
	
	$social="";
	
	if ($type == '') {
		if ( $emailaddress) {
			$social .= '<li><a href="mailto:'.$emailaddress.'"><span class="index green"><i class="fa fa-envelope-o"></i></span></a></li>'."\n";
		} 
		if ($twitterusername) {
			$social .= '<li><a href="http://www.twitter.com/'.$twitterusername.'"><span class="index twit"><i class="fa fa-twitter"></i></span></a></li>'."\n";
		} 
		if ($facebookurl) {
			$social .= '<li><a href="'.$facebookurl.'"><span class="index fb"><i class="fa fa-facebook"></i></span></a></li>'."\n";
		} 
		if ($googleplusurl) {
			$social .= '<li><a href="'.$googleplusurl.'"><span class="index goog"><i class="fa fa-google-plus"></i></span></a></li>'."\n";
		} 
		if ($pinterestusername) {
			$social .= '<li><a href="http://www.pinterest.com/'.$pinterestusername.'"><span class="index pint"><i class="fa fa-pinterest"></i></span></a></li>'."\n";
		} 
		if ($youtubeurl) {
			$social .= '<li><a href="'.$youtubeurl.'"><span class="index yt"><i class="fa fa-youtube"></i></span></a></li>'."\n";
		} 
		if ($vimeousername) {
			$social .= '<li><a href="http://www.vimeo.com/'.$vimeousername.'"><span class="index vimeo"><i class="fa fa-vimeo-square"></i></span></a></li>'."\n";
		}
		if ($linkedinurl) {
			$social .= '<li><a href="'.$linkedinurl.'"><span class="index linked"><i class="fa fa-linkedin"></i></span></a></li>'."\n";
		} 
		if ($githuburl) {
			$social .= '<li><a href="'.$githuburl.'"><span class="index git"><i class="fa fa-github"></i></span></a></li>'."\n";
		} 
		if ($foursquareurl) {
			$social .= '<li><a href="'.$foursquareurl.'"><span class="index fours"><i class="fa fa-foursquare"></i></span></a></li>'."\n";
		} 
		if ($instagramusername) {
			$social .= '<li><a href="http://instagram.com/'.$instagramusername.'"><span class="index insta"><i class="fa fa-instagram"></i></span></a></li>'."\n";
		} 
		if ($flickrurl) {
			$social .= '<li><a href="'.$flickrurl.'"><span class="index flickr"><i class="fa fa-flickr"></i></span></a></li>'."\n";
		} 
	} else {
		
			$sociallist = explode(', ', $type);
			foreach ($sociallist as $list) {
				
				if ($list == "email") {
					$social .= '<li><a href="mailto:'.$emailaddress.'"><span class="index green"><i class="fa fa-envelope-o"></i></span></a></li>'."\n";
				} 
				if ($list == "twitter") {
					$social .= '<li><a href="http://www.twitter.com/'.$twitterusername.'"><span class="index twit"><i class="fa fa-twitter"></i></span></a></li>'."\n";
				} 
				if ($list == "facebook") {
					$social .= '<li><a href="'.$facebookurl.'"><span class="index fb"><i class="fa fa-facebook"></i></span></a></li>'."\n";
				} 
				if ($list == "googleplus") {
					$social .= '<li><a href="'.$googleplusurl.'"><span class="index goog"><i class="fa fa-google-plus"></i></span></a></li>'."\n";
				} 
				if ($list == "pinterest") {
					$social .= '<li><a href="http://www.pinterest.com/'.$pinterestusername.'"><span class="index pint"><i class="fa fa-pinterest"></i></span></a></li>'."\n";
				} 
				if ($list == "youtube") {
					$social .= '<li><a href="'.$youtubeurl.'"><span class="index yt"><i class="fa fa-youtube"></i></span></a></li>'."\n";
				} 
				if ($list == "vimeo") {
					$social .= '<li><a href="http://www.vimeo.com/'.$vimeousername.'"><span class="index vimeo"><i class="fa fa-vimeo-square"></i></span></a></li>'."\n";
				}
				if ($list == "linkedin") {
					$social .= '<li><a href="'.$linkedinurl.'"><span class="index linked"><i class="fa fa-linkedin"></i></span></a></li>'."\n";
				} 
				if ($list == "github") {
					$social .= '<li><a href="'.$githuburl.'"><span class="index git"><i class="fa fa-github"></i></span></a></li>'."\n";
				} 
				if ($list == "foursquare") {
					$social .= '<li><a href="'.$foursquareurl.'"><span class="index fours"><i class="fa fa-foursquare"></i></span></a></li>'."\n";
				} 
				if ($list == "instagram") {
					$social .= '<li><a href="http://instagram.com/'.$instagramusername.'"><span class="index insta"><i class="fa fa-instagram"></i></span></a></li>'."\n";
				} 
				if ($list == "flickr") {
					$social .= '<li><a href="'.$flickrurl.'"><span class="index flickr"><i class="fa fa-flickr"></i></span></a></li>'."\n";
				} 
			
			}
	}
	
	$output = '';
	$output .= '<ul class="share-links-standard">'."\n";
	$output .= $social;
	$output .= '</ul><div class="clear-float"></div>';

	
	
	return $output;

}
add_shortcode( 'social_person_template', 'po_social_person_template' );


/* SOCIAL FOOTER SHORTCODE
------------------------------------------------------- */  

function po_social_footer( $atts ) {
	
	extract( shortcode_atts(
		array(  
			'type' => '',
		), $atts )
	);
	
	$email = get_theme_mod( 'email_address' );
	$twitter = get_theme_mod( 'twitter_username' );
	$facebook = get_theme_mod( 'facebook_url' );
	$googleplus = get_theme_mod( 'googleplus_url' );
	$pinterest = get_theme_mod( 'pinterest_username' );
	$youtube = get_theme_mod( 'youtube_url' );
	$vimeo = get_theme_mod( 'vimeo_username' );
	$linkedin = get_theme_mod( 'linkedin_url' );
	$github = get_theme_mod( 'github_url' );
	$foursquare = get_theme_mod( 'foursquare_url' );
	$instagram = get_theme_mod( 'instagram_username' );
	$flickr = get_theme_mod( 'flickr_url' );
	
	$social="";
	
	if ($type == '') {
		if ($email) {
			$social .= '<li><a href="mailto:'.$email.'"><span class="index green"><i class="fa fa-envelope-o"></i></span></a></li>'."\n";
		} 
		if ($twitter) {
			$social .= '<li><a href="http://www.twitter.com/'.$twitter.'"><span class="index twit"><i class="fa fa-twitter"></i></span></a></li>'."\n";
		} 
		if ($facebook) {
			$social .= '<li><a href="'.$facebook.'"><span class="index fb"><i class="fa fa-facebook"></i></span></a></li>'."\n";
		} 
		if ($googleplus) {
			$social .= '<li><a href="'.$googleplus.'"><span class="index goog"><i class="fa fa-google-plus"></i></span></a></li>'."\n";
		} 
		if ($pinterest) {
			$social .= '<li><a href="http://www.pinterest.com/'.$pinterest.'"><span class="index pint"><i class="fa fa-pinterest"></i></span></a></li>'."\n";
		} 
		if ($youtube) {
			$social .= '<li><a href="'.$youtube.'"><span class="index yt"><i class="fa fa-youtube"></i></span></a></li>'."\n";
		} 
		if ($vimeo) {
			$social .= '<li><a href="http://www.vimeo.com/'.$vimeo.'"><span class="index vimeo"><i class="fa fa-vimeo-square"></i></span></a></li>'."\n";
		}
		if ($linkedin) {
			$social .= '<li><a href="'.$linkedin.'"><span class="index linked"><i class="fa fa-linkedin"></i></span></a></li>'."\n";
		} 
		if ($github) {
			$social .= '<li><a href="'.$github.'"><span class="index git"><i class="fa fa-github"></i></span></a></li>'."\n";
		} 
		if ($foursquare) {
			$social .= '<li><a href="'.$foursquare.'"><span class="index fours"><i class="fa fa-foursquare"></i></span></a></li>'."\n";
		} 
		if ($instagram) {
			$social .= '<li><a href="http://instagram.com/'.$instagram.'"><span class="index insta"><i class="fa fa-instagram"></i></span></a></li>'."\n";
		} 
		if ($flickr) {
			$social .= '<li><a href="'.$flickr.'"><span class="index flickr"><i class="fa fa-flickr"></i></span></a></li>'."\n";
		} 
	} else {
		
			$social_list = explode(', ', $type);
			foreach ($social_list as $list) {
				
				if ($list == "email") {
					$social .= '<li><a href="mailto:'.$email.'"><span class="index green"><i class="fa fa-envelope-o"></i></span></a></li>'."\n";
				} 
				if ($list == "twitter") {
					$social .= '<li><a href="http://www.twitter.com/'.$twitter.'"><span class="index twit"><i class="fa fa-twitter"></i></span></a></li>'."\n";
				} 
				if ($list == "facebook") {
					$social .= '<li><a href="'.$facebook.'"><span class="index fb"><i class="fa fa-facebook"></i></span></a></li>'."\n";
				} 
				if ($list == "googleplus") {
					$social .= '<li><a href="'.$googleplus.'"><span class="index goog"><i class="fa fa-google-plus"></i></span></a></li>'."\n";
				} 
				if ($list == "pinterest") {
					$social .= '<li><a href="http://www.pinterest.com/'.$pinterest.'"><span class="index pint"><i class="fa fa-pinterest"></i></span></a></li>'."\n";
				} 
				if ($list == "youtube") {
					$social .= '<li><a href="'.$youtube.'"><span class="index yt"><i class="fa fa-youtube"></i></span></a></li>'."\n";
				} 
				if ($list == "vimeo") {
					$social .= '<li><a href="http://www.vimeo.com/'.$vimeo.'"><span class="index vimeo"><i class="fa fa-vimeo-square"></i></span></a></li>'."\n";
				}
				if ($list == "linkedin") {
					$social .= '<li><a href="'.$linkedin.'"><span class="index linked"><i class="fa fa-linkedin"></i></span></a></li>'."\n";
				} 
				if ($list == "github") {
					$social .= '<li><a href="'.$github.'"><span class="index git"><i class="fa fa-github"></i></span></a></li>'."\n";
				} 
				if ($list == "foursquare") {
					$social .= '<li><a href="'.$foursquare.'"><span class="index fours"><i class="fa fa-foursquare"></i></span></a></li>'."\n";
				} 
				if ($list == "instagram") {
					$social .= '<li><a href="http://instagram.com/'.$instagram.'"><span class="index insta"><i class="fa fa-instagram"></i></span></a></li>'."\n";
				} 
				if ($list == "flickr") {
					$social .= '<li><a href="'.$flickr.'"><span class="index flickr"><i class="fa fa-flickr"></i></span></a></li>'."\n";
				} 
			
			}
	}
	
	$output = '';
	$output .= '<ul class="footer-links">'."\n";
	$output .= $social;
	$output .= '</ul><div class="clear-float"></div>';
	
	return $output;

}
add_shortcode( 'social_footer', 'po_social_footer' );


/* PAGE SLIDER SHORTCODE
------------------------------------------------------- */  

function po_page_slider($atts) {
	
	ob_start();
	
	extract(shortcode_atts( 
		array (
			'category' => '',
			'number' => '20',
			'columnwidth' => '2',
			'order' => 'DESC',
			'orderby' => 'date',
		), $atts ) 
	);
	
	?>
	
	<div class="po-portfolio-slider po-page-slider">
        <ul class="po-page-slider-loop">
        <?php
            $args = array( 'post_type' => 'carousel', 'carousel_groups' => $category, 'posts_per_page' => $number );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); 
            global $post, $portfolio_mb;
            $portfolio_mb->the_meta();
            $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
        ?>
            <li class="swswswswddfd" style="height:550px;">
                <div class="home-slider-image" style="background:url(<?php echo $url ?>);" 
                data-center="background-position: 50% 0px;"
                data-bottom-top="background-position: 50% 150px;"
                data-top-bottom="background-position: 50% -150px;"
                data-anchor-target=".swswswswddfd">
                
                </div>
            </li>	
            <?php endwhile; ?>
        </ul>
	</div>
        
		
	<?php wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	
}
add_shortcode('page_slider', 'po_page_slider');


/* RECENT POSTS SHORTCODE
------------------------------------------------------- */  

function po_recentposts($atts) {
	
	ob_start();
	
	extract(shortcode_atts( 
		array (
			'category' => '',
			'number' => '3',
			'columnwidth' => '4',
			'order' => 'DESC',
			'orderby' => 'date',
			'archive' => '',
		), $atts ) 
	);
	?>
    
    
    
    <div class="po-blog">
    	<?php $args = array( 'category' => $category, 'showposts' => $number, 'order' => $order, 'orderby' => $orderby );?>
		<?php $the_query = new WP_Query( $args ); ?>
        <?php while ( $the_query -> have_posts() ) : $the_query -> the_post(); 
		global $format_mb;
		$format_mb->the_meta();
		?>
            <div <?php if (wp_get_theme() == 'Giza' || wp_get_theme() == 'Giza Child Theme' ) {?>class="po-column col-sm-6 col-lg-4 blog-item-standard" style="margin-bottom:80px;"<?php } else { ?> class="po-column col-sm-<?php echo $columnwidth; ?> blog-item " style="padding:0;"<?php } ?> data-delay="<?php echo $format_mb->get_the_value('delay'); ?>" data-animation="move-up-short">
            <?php
                get_template_part( 'content', get_post_format() );
            ?>
            </div>
            
    
        <?php endwhile; ?>
        
        <?php if ( $archive == "show" ) { ?>
        
        <div class="clearfix"></div>
			<?php if (wp_get_theme() == 'Giza' || wp_get_theme() == 'Giza Child Theme' ) {?>
                <div class="po-column recent-post-button" style="text-align:center;" data-delay="400" data-animation="move-up-short">
                <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn outline-button lighter" style="padding:10px 20px; text-align:center; cursor:pointer;">View more
                </a>
                </div>
            <?php } else { ?>
            	<div class="po-column" style="text-align:center; margin-top:40px;" data-delay="400" data-animation="move-up-short">
                <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn outline-button lighter" style="padding:10px 90px; text-align:center; cursor:pointer;">
                    <i class="fa fa-folder-open-o" style="font-size:18px;"></i>
                </a>
                </div>
            <?php } ?>
        
        <?php } ?>
    </div>
        
     
		
	<?php wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	
}
add_shortcode('recentposts', 'po_recentposts');


/* GO TO SHORTCODE
------------------------------------------------------- */  

function po_goto($atts) {
	
	ob_start();
	
	extract(shortcode_atts( 
		array (
			'id' => '',
			'color' => '',
			'paddingtop' => '',
			'paddingbottom' => '',
		), $atts ) 
	);
	
	?>
		<div class="col-sm-2 col-sm-offset-5" style="padding-top:<?php echo $paddingtop; ?>px; padding-bottom:<?php echo $paddingbottom; ?>px;">
            <div class="scroll-arrow goto-arrow" data-scroll="<?php echo $id; ?>">
                <i class="fa fa-angle-down" style="color:<?php echo $color; ?>;"></i>
            </div>
        </div>
        
       
        
		
	<?php wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	
}
add_shortcode('goto', 'po_goto');

/* ODOMETER SHORTCODE
------------------------------------------------------- */  

function po_odometer($atts) {
	
	ob_start();
	
	extract(shortcode_atts( 
		array (
			'value' => '',
		), $atts ) 
	);
	
	?>
		<span class="odometer" data-value="<?php echo $value; ?>"></span>
        
       
        
		
	<?php wp_reset_postdata();
	$output = ob_get_clean();
	return $output;
	
}
add_shortcode('odometer', 'po_odometer');



/* PORTFOLIO SLIDE SECTION SHORTCODE
------------------------------------------------------- */

function po_section_port( $atts, $content = null ) {
	
	extract( shortcode_atts(
		array(
			'type' => 'standard',
			'id' => 'section',
			'icon' => '',
			'header' => '',
			'imageurl' => '',
			'imageurl2' => '',
			'imageurl3' => '',
			'embed' => '',
			'details' => '',
			'category' => '',
			'number' => '6',
			'order' => 'DESC',
			'orderby' => 'date',
			'sidecolor' => '#000',
		), $atts )
	);
	
	if ($type == "standard") {
		ob_start();
		?> 	
			<div data-fptooltip="<?php echo $id; ?>" class="section section-slides-port" style="background:url(<?php echo $imageurl ?>); background-position:center; background-size: cover; overflow:hidden;">
            	<?php if ($details == "hide") { 
                } else { ?>
            	<div class="section-details">
            		<?php if ($icon == "") { 
                    } else { ?>
                    <i class="fa <?php echo $icon; ?>" style="font-size:30px; margin-bottom:25px;"></i>
                    <?php } ?>
                    
                    <?php if ($header == "") {
					} else { ?>
                    <h3 class="standard-header" style="padding:0; margin:0;">
                        <?php echo $header; ?>
                    </h3>
                    <div style="margin-top:20px; padding-bottom:20px; border-top:2px solid #000; width:20px;"></div>
                    
                    <?php } ?>
                    <div class="clearfix"></div>
                    <span style="font-family: 'Playfair Display', serif; font-size:15px; color:#000;">
                    	<?php echo do_shortcode($content); ?>
                    </span>
                </div>
                <div class="slider-bottom">
                    <div class="video-icon-container video-icon-container-slide">
                        
                        <div class="slider-video-icon">
                            <div class="image-info">
                            <i class="fa fa-search"></i>
                            </div>
                        </div>   
                    </div>
                </div>
                <?php } ?> 
                <!--[if IE 8]><img class="fullbackground-slide2" src="<?php echo $imageurl ?>" /><![endif]-->
            </div>
		
		<?php wp_reset_postdata();
		$output = ob_get_clean();	
	}
	
	else if ($type == "video") {
		ob_start();
		?> 	
			<section data-fptooltip="<?php echo $id; ?>" class="section section-slides-port section-slides-port-video" data-embed='<?php echo $embed; ?>'>
            <div class="container video-height-container">         
                <div class="row po-full-width video-height">  
                <div class="video-shade"></div>
                    <div class="slider-video-portfolio">
                        
                    </div>
                    <div class="col-sm-7 col-md-8 video-side" style="background-image:url(<?php echo $imageurl; ?>); background-size:cover; background-position:center;"> 
                        <div class="play-hover">
                        <i class="fa fa-play play-icon"></i>
                        </div>
                        
                        <div class="video-shade-portfolio-image">
                            
                        </div>
                    </div>
                    <div class="col-sm-5 col-md-4 video-details-side" style="background:<?php echo $sidecolor ?>;"> 		
                        <div style="padding:50px;">
                            <i class="li_video" style="font-size:30px; margin-bottom:25px;"></i>
                            <h2 class="standard-header" style="color:#fff;"><?php echo $header; ?></h2>
                            <div style="border-top:2px solid #fff; width:20px; margin:20px 0 18px;"></div>
                            <span style="font-family: 'Playfair Display', serif; font-size:15px; height:300p">
                            
                            <?php echo do_shortcode($content); ?>
                            
                            </span>
                        </div>
                        
                    </div>
                </div>
            </div>
            </section>
		
		<?php wp_reset_postdata();
		$output = ob_get_clean();	
	}
	
	else if ($type == "split") {
		ob_start();
		?> 	
			<div data-fptooltip="<?php echo $id; ?>" class="section section-slides-port">

                <?php if ($details == "hide") { 
                } else { ?>
            	<div class="section-details hidden-xs">
            		<?php if ($icon == "") { 
                    } else { ?>
                    <i class="fa <?php echo $icon; ?>" style="font-size:30px; margin-bottom:25px;"></i>
                    <?php } ?>
                    
                    <?php if ($header == "") {
					} else { ?>
                    <h3 class="standard-header" style="padding:0; margin:0;">
                        <?php echo $header; ?>
                    </h3>
                    <div style="margin-top:20px; padding-bottom:20px; border-top:2px solid #000; width:20px;"></div>
                    
                    <?php } ?>
                    <div class="clearfix"></div>
                    <span style="font-family: 'Playfair Display', serif; font-size:15px; color:#000;">
                    	<?php echo do_shortcode($content); ?>
                    </span>
                </div>
                <div class="slider-bottom">
                    <div class="video-icon-container video-icon-container-slide">
                        
                        <div class="slider-video-icon">
                            <div class="image-info">
                            <i class="fa fa-search"></i>
                            </div>
                        </div>   
                    </div>
                </div>
                <?php } ?> 
            
                <div class="container" style="margin:-1px; padding:0; width:100%;">         
                    <div class="row po-full-width">  
                        <div class="col-sm-7 col-md-8" style="padding:0; margin:0;">
                            <div class="liquid-container-portfolio">
                                <img src="<?php echo $imageurl; ?>" />
                            </div>
                        </div>
                        <div class="col-sm-5 col-md-4" style="padding:0; margin:0;"> 		
                            <div class="liquid-container-portfolio-2">
                                <img width="100%" src="<?php echo $imageurl2; ?>" />
                            </div>
                            <div class="liquid-container-portfolio-2">
                            	<?php if ($details == "hide") { 
                } else { ?>
            	<div class="section-details hidden-md hidden-lg">
            		<?php if ($icon == "") { 
                    } else { ?>
                    <i class="fa <?php echo $icon; ?>" style="font-size:30px; margin-bottom:25px;"></i>
                    <?php } ?>
                    
                    <?php if ($header == "") {
					} else { ?>
                    <h3 class="standard-header" style="padding:0; margin:0;">
                        <?php echo $header; ?>
                    </h3>
                    <div style="margin-top:20px; padding-bottom:20px; border-top:2px solid #000; width:20px;"></div>
                    
                    <?php } ?>
                    <div class="clearfix"></div>
                    <span style="font-family: 'Playfair Display', serif; font-size:15px; color:#000;">
                    	<?php echo do_shortcode($content); ?>
                    </span>
                </div>
                <?php } ?> 
                                <img width="100%" src="<?php echo $imageurl3; ?>" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		
		<?php wp_reset_postdata();
		$output = ob_get_clean();	
	}
	
	else if ($type == "slide") {
		ob_start();
		?> 	
			<section data-fptooltip="<?php echo $id; ?>" class="section section-slides">

                <?php if ($details == "hide") { 
                } else { ?>
            	<div class="section-details">
            		<?php if ($icon == "") { 
                    } else { ?>
                    <i class="fa <?php echo $icon; ?>" style="font-size:30px; margin-bottom:25px;"></i>
                    <?php } ?>
                    
                    <?php if ($header == "") {
					} else { ?>
                    <h3 class="standard-header" style="padding:0; margin:0;">
                        <?php echo $header; ?>
                    </h3>
                    <div style="margin-top:20px; padding-bottom:20px; border-top:2px solid #000; width:20px;"></div>
                    
                    <?php } ?>
                    <div class="clearfix"></div>
                    <span style="font-family: 'Playfair Display', serif; font-size:15px; color:#000;">
                    	<?php echo do_shortcode($content); ?>
                    </span>
                </div>
                <div class="slider-bottom">
                    <div class="video-icon-container video-icon-container-slide">
                        
                        <div class="slider-video-icon">
                            <div class="image-info">
                            <i class="fa fa-search"></i>
                            </div>
                        </div>   
                    </div>
                </div>
                <?php } ?> 
            <div class="po-portfolio-slider2">
            <ul class="po-portfolio-slider-loop">
            
            <?php
			
				$args = array( 'post_type' => 'gallery', 'gallery_categories' => $category, 'posts_per_page' => $number, 'order' => $order, 'orderby' => $orderby );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
				global $post, $portfolio_mb;
				$portfolio_mb->the_meta();
				$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
				?>
            <li style="background:url(<?php echo $url ?>); background-size:cover; background-position:center; position:absolute; z-index:-2;">
            </li>
            
            <?php endwhile; ?>
            
            </ul>
            </div>
            </section>
		
		<?php wp_reset_postdata();
		$output = ob_get_clean();	
	}
	
	return $output;

}
add_shortcode('section_port', 'po_section_port');

/* ABOUT SHORTCODE
------------------------------------------------------- */  

function po_about_footer($atts , $content = null) {
	
	ob_start();
	
	extract(shortcode_atts( 
		array (
			'imageurl' => '',
			'imagealt' => '',
			'group' => ''
		), $atts ) 
	);
	
	$output = '';
   
  	$output .= '<div class="po-column" data-animation="fade-in">';
	$output .= '<a class="view" href="'.$imageurl.'" rel="'.$group.'">';
    $output .= '<div class="about-image"><img class="img-responsive" data-src="'.$imageurl.'" alt="'.$imagealt.'"/></div>';
	$output .= '</a>';
	$output .= '<div class="about-text">';
    $output .= do_shortcode($content);
	$output .= '</div></div>';
        
       
        
		
	return $output;
	
}
add_shortcode('about_footer', 'po_about_footer');


?>