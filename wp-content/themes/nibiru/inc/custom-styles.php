<?php

/* CUSTOM STYLES
------------------------------------------------------- */  

if ( ! function_exists( 'po_custom_styles' ) ) {
function po_custom_styles() {
		wp_enqueue_style(
			'custom-style',
			get_template_directory_uri() . '/css/custom-style.css'
		);
		
		$nav_text = get_theme_mod( 'nav_text','#5B5E5F');
		$nav_text_hover = get_theme_mod( 'nav_text_hover','#FFFFFF');
		$nav_background = get_theme_mod( 'nav_background','#15191B');
		$search_background = get_theme_mod( 'search_background','#20C596');
		
		$logo_height = get_theme_mod( 'logo_height','100');
		$logo_height_mobile = get_theme_mod( 'logo_height_mobile','100');
		$blog_logo_height = get_theme_mod( 'blog_logo_height','100');
		$blog_logo_height_mobile = get_theme_mod( 'blog_logo_height_mobile','100');
		
		$blog_image_overlay = get_theme_mod( 'blog_image_overlay','#FFFFFF' );
		$portfolio_opacity = get_theme_mod( 'portfolio_opacity','9');
		
		$slider_overlay = get_theme_mod( 'slider_overlay','#20C596' );
		$slider_title = get_theme_mod( 'slider_title','#ffffff');
		$slider_button = get_theme_mod( 'slider_button','#20C596' );
		$slider_button_text = get_theme_mod( 'slider_button_text','#ffffff' );
		$accent = get_theme_mod( 'accent','#20C596' );
		$secondary_accent = get_theme_mod( 'secondary_accent','#ffffff' );
		$social_icons = get_theme_mod( 'social_icons','#B9BABB' );
		
		$header_font = get_theme_mod( 'header_font',"'Source Sans Pro', sans-serif;" );
		$body_font = get_theme_mod( 'body_font',"'Source Sans Pro', sans-serif;" );
		
		$form_borders = get_theme_mod( 'form_borders','#ddd' );
		
        $footer_background = get_theme_mod( 'footer_background','#15191B' );
		$footer_headers = get_theme_mod( 'footer_headers','#97999A' );
		$footer_text = get_theme_mod( 'footer_text','#6B6E6F' );
		$footer_links = get_theme_mod( 'footer_links','#999B9C' );
		$footer_links_hover = get_theme_mod( 'footer_links_hover','#E1E1E1' );
		$portfolio_hover = get_theme_mod( 'portfolio_hover' );
		$footer_social = get_theme_mod( 'footer_social' );
		$footer_twitter_username = get_theme_mod( 'footer_twitter_username','#3D4142' );
		$footer_twitter_username_hover = get_theme_mod( 'footer_twitter_username_hover','#797B7C' );
		$footer_bottom_background = get_theme_mod( 'footer_bottom_background','#1B2022' );
		$footer_bottom_text = get_theme_mod( 'footer_bottom_text','#636768' );
		$footer_bottom_links = get_theme_mod( 'footer_bottom_links','#818485' );
		$footer_bottom_links_hover = get_theme_mod( 'footer_bottom_links_hover','#D9D9DA' );
		$footer_button_color = get_theme_mod( 'footer_button_color','#2A3236' );
		
        $footer_css = "
			
			@media(max-width:767px){
				.logo{
					max-height:{$logo_height_mobile}px;
				}
			}
			
			@media(min-width:768px){
				.logo{
					max-height:{$logo_height}px;
				}
			}
			
			@media(max-width:767px){
				.logo-blog{
					max-height:{$blog_logo_height_mobile}px;
				}
			}
			
			@media(min-width:768px){
				.logo-blog{
					max-height:{$blog_logo_height}px;
				}
			}
			
			.po-slider-text h1,
			.po-slider-text-static h1
			{
				color:{$slider_title};
			}
			
			.background-greyscale.green {
				background-color: {$slider_overlay};
			}
			
			.navbar-fixed-top
			{
				background-color:{$nav_background};
			}
			
			.search-form,
			.search-form-noslide,
			.search-field
			{
			
				background-color:{$search_background};
			}
			
			.slider-btn.outline-button.white-green:hover
			{
				color: {$slider_button_text};
				border:1px solid {$slider_button};
				background-color:{$slider_button};
			}
			
			a {
				color:{$accent};	
			}
			
			.blog-header .entry-title a:hover,
			.search-header h1 a:hover
			
			{
				color:{$accent};
				
			}
			
			.more-link
			{
				color:{$accent};
				
			}
			
			.post-meta a:hover,
			.edit-link a:hover
			{
				color:{$accent};
			}
			
			.reply a:hover
			{
				color:{$accent};
			}
			
			.blog-form input[type='text']:focus,
			.blog-form input[type='email']:focus,
			.blog-form textarea:focus
			{
			
				border:1px solid {$accent};
			}
			
			input[type='submit']#blog-form:hover
			{
			
				color: {$secondary_accent};
				border:1px solid {$accent};
				background-color:{$accent};
			
			}
			
			.link-thumb:hover
			{
				background-color:{$accent};
			}
			
			#crumbs a:hover
			{
				color:{$accent};
			}
			
			.outline-button.white:hover
			{
				color: {$secondary_accent};
				border:1px solid {$accent};
				background-color:{$accent};
			}
			
			.outline-button.light:hover
			{
				color: {$secondary_accent};
				border:1px solid {$accent};
				background-color:{$accent};
			}
			
			.outline-button.dark:hover
			{
				color: {$secondary_accent};
				border:1px solid {$accent};
				background-color:{$accent};
			}
			
			.banner-button.white:hover
			{	
				color: {$secondary_accent};
				background-color:{$accent};
			}
			
			.banner-button.light:hover
			{	
				color: {$secondary_accent};
				background-color:{$accent};
			}
			
			.banner-button.dark:hover
			{	
				color: {$secondary_accent};
				background-color:{$accent};
			}
			
			.banner-button.custom
			{	
				color: {$secondary_accent};
				background-color:{$footer_button_color};
			}
			
			.banner-button.custom:hover
			{	
				color: {$secondary_accent};
				background-color:{$accent};
			}
			
			.button-icon-left span {
				color:{$secondary_accent};
			}
			
			.button-icon-left-manual span {
				color:{$secondary_accent};
			}
			
			.btn-icon-ani {
				
				color: {$secondary_accent};
			}
			
			@media(min-width:768px){
			.po-column .hover-ani:hover .icon-box-line,
			.po-column .hover-ani:hover .count-line,
			.po-column .hover-ani:hover .circular-line
			{
				border-top:1px solid {$accent};
			
			}
			}
			
			.po-column .po-icon-box .icon-green,
			.po-column .po-icon-float .icon-green,
			.po-column .po-icon-boxless .icon-green,
			.po-column .po-icon-box-left .icon-green
			{
				color:{$accent};
				border:1px solid {$accent};
			}
			
			@media(min-width:768px){
			.po-column .po-icon-box:hover .icon-green,
			.po-column .po-icon-float:hover .icon-green,
			.po-column .po-icon-boxless:hover .icon-green,
			.po-column .po-icon-box-left:hover .icon-green
			{
				color:{$secondary_accent};
				border:none;
				background-color: {$accent};
			}
			}
			
			.po-column .icon-boxless-green
			{
				color:{$accent};
			}
			
			.po-column .icon-float-green
			{
				color:{$secondary_accent};
				border:2px solid {$accent};
				background-color: {$accent};
			}
			
			.po-column po-icon-box.icon-green,
			.po-column po-icon-float.icon-green,
			.po-column po-icon-boxless.icon-green,
			.po-column po-icon-box-left.icon-green
			{
				color:{$accent};
			}
			
			@media(min-width:768px){
			.icon-green:hover h4, 
			.icon-green:hover h4
			{
				color:{$accent};
			}
			}
			
			@media(min-width:768px){
				.portfolio-item a .portfolio-details.portfolio-opacity {
					opacity:0.{$portfolio_opacity};
				}
			}
			
			
			@media(min-width:768px){
				.portfolio-item a:hover .portfolio-details {
					background-color: {$accent};
				}
				
				.portfolio-item a:hover .item-title, .portfolio-item a:hover .subtitle { color: {$secondary_accent}; }
				
			}
			
			.portfolio-nav .prev.green:hover,
			.portfolio-nav .index.green:hover,
			.portfolio-nav .next.green:hover
			{
				border:2px solid {$accent};
				background-color:{$accent};
			}
			
			.share-links .love.green:hover,
			.share-links .prev.green:hover,
			.share-links .index.green:hover,
			.share-links .next.green:hover
			{
				border:1px solid {$accent};
				background-color:{$accent};
			}
			
			.banner
			{
				background: {$accent};
			}
				
			.banner2
			{
				background: {$accent};
			}
			
			.portfolio-cat li a:hover,
			.portfolio-link li a:hover {
				color:{$accent};
			}
			
			.filter-button:hover
			{
				color: #fff;
				border:1px solid {$accent};
				background-color:{$accent};
			
			}
			
			.filter-button.active:hover {
				background-color: {$accent};
				border:1px solid {$accent};
			}
			
			.pagination li a:hover
			{
				color: #fff;
				border:1px solid {$accent};
				background-color:{$accent};
			
			}
			
			.pagination li.active a:hover {
				background-color: {$accent};
				border:1px solid {$accent};
			}
			
			.client-image .client-container .client-details {
				background-color: {$accent};
			}
			
			.search-page-field:focus
			{
				border:1px solid {$accent};
			}
			
			.wpcf7 input[type='text'],
			.wpcf7 input[type='email'],
			.wpcf7 textarea,
			.search-field-sidebar
			{
				border:1px solid {$form_borders};
			}
			
			.wpcf7 input[type='text']:focus,
			.wpcf7 input[type='email']:focus,
			.wpcf7 textarea:focus,
			.search-field-sidebar:focus
			{
			
				border:1px solid {$accent};
			}
			
			.wpcf7 input[type='submit']
			{
			
				color: {$form_borders};
				border:1px solid {$form_borders};
			
			}

			
			.wpcf7 input[type='submit']:hover
			{
			
				color: {$secondary_accent};
				border:1px solid {$accent};
				background-color:{$accent};
			
			}

			
			.footer-links .index.green:hover
			{
				color:#fff;
				border:1px solid {$accent};
				background-color:{$accent};
			}
			
			.social-links .index.green:hover
			{
				color:#fff;
				border:1px solid {$accent};
				background-color:{$accent};
			}
			
			.po-carouseled .bx-wrapper .bx-prev:hover {
				background: url(images/slide-arrow-left.png) no-repeat 60px 8px {$accent};
				border:1px solid {$accent};
			}
			
			.po-carouseled .bx-wrapper .bx-next:hover {
				background: url(images/slide-arrow-right.png) no-repeat 23px 8px {$accent};
				border:1px solid {$accent};
			}
			
			.po-carouseled .bx-wrapper .bx-prev:hover {
				border:1px solid {$accent};
			}
			
			.po-carouseled .bx-wrapper .bx-next:hover {
				border:1px solid {$accent};
			}
			
			.po-carouseleds .bx-wrapper .bx-prev:hover {
				background-color: {$accent};
				border:1px solid {$accent};
				border-left:none;
			}
			
			.po-carouseleds .bx-wrapper .bx-next:hover {
				background-color: {$accent};
				border:1px solid {$accent};
				border-right:none;
			}
			
			.po-testimonials .bx-wrapper .bx-prev:hover {		
				background-color: {$accent};
				border:1px solid {$accent};
				border-left:none;
			}
			
			.po-testimonials .bx-wrapper .bx-next:hover {
				background-color: {$accent};
				border:1px solid {$accent};
				border-right:none;
			}
			
			.grid figcaption {
				background: {$accent};
			}
			
			.grid figcaption a {
				background: {$accent};
			}
			
			.progress-value
			{
				color: {$accent};
				
			}
			
			.non-immediate-parent-container-b figcaption {
				background-color:{$blog_image_overlay};
			}
			
			h1, h2, h3, h4, h5, h6 {
	
				font-family: {$header_font};
			}
			
			body, p, button, input, .outline-button {
	
				font-family: {$body_font};
			}
			
			.footer-container{
				background-color: {$footer_background};
			}
			
			.footer-container h6 {
				color:{$footer_headers};
			}
			
			.footer-container p {
				color:{$footer_text};
			}
			
			.recent-tweets li
			{
				color:{$footer_text};
			}
			
			.recent-tweets li a
			{
				color:{$footer_links};
			}
			
			.recent-tweets li a:hover
			{
				color:{$footer_links_hover};
			}
			
			.recent-posts li a
			{
				color:{$footer_links};
			}
			
			.recent-posts li a:hover
			{
				color:{$footer_links_hover};
			}
			
			.portfolio-item-footer a:hover .portfolio-details {
				background-color: {$accent};
			}
			
			.footer-links li a
			{
				color:{$footer_social};
			}
			
			.social-links li a
			{
				color:{$social_icons};
			}
			
			.recent-tweets a
			{
				color:{$footer_twitter_username};
			}
			
			.recent-tweets a:hover
			{
				color:{$footer_twitter_username_hover};
			}
			
			.footer-container-bottom {
				background-color:{$footer_bottom_background};
			}
			
			.footer-container-bottom p span{
				color:{$footer_bottom_text};
			}
			
			.footer-container-bottom p a {
				color:{$footer_bottom_links};
			}
			
			.footer-container-bottom p a:hover {
				color:{$footer_bottom_links_hover};
			}
			
			.po-navbar-footer .nav li a {
				color:{$footer_bottom_links};
			}
			
			.po-navbar-footer .nav li a:hover {
				color:{$footer_bottom_links_hover};
			}
			
			.widget ul li a:hover
			{
				color:{$accent};
			}
			
			.tagcloud a:hover
			{
				color:#fff;
				background-color:{$accent};
				border:1px solid {$accent};
			}
			
			.po-navbar.custom-color-nav-text li a {
				color:{$nav_text};
			}
			
			.po-navbar.custom-color-nav-text li a:hover {
				color:{$nav_text_hover};
				
			}

			
			
		";
        wp_add_inline_style( 'custom-style', $footer_css );
}
}
add_action( 'wp_enqueue_scripts', 'po_custom_styles' );

?>