<?php


function child_theme_widgets_init(){
    register_sidebar( array(
        'name' => 'Footer Text' ,
        'id' => 'footer-text',
    ) );

    register_sidebar( array(
        'name' => 'Header Text' ,
        'id' => 'header-text',
    ) );
}

add_action( 'widgets_init', 'child_theme_widgets_init' );

add_action( 'wp_enqueue_scripts', 'po_child_theme_styles', PHP_INT_MAX);
function po_child_theme_styles() {
	global $wp_styles;
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
	wp_enqueue_style( 'parent-style-ie', get_template_directory_uri().'/css/ie.css', array( 'parent-style' ) );
	$wp_styles->add_data( 'parent-style-ie', 'conditional', 'lte IE 9' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('parent-style')  );

    wp_dequeue_script('po-main-script');
    wp_enqueue_script('child_po-main-script', get_stylesheet_directory_uri().'/scripts/script.js', array(), true);
    //wp_enqueue_script('kenburn', get_stylesheet_directory_uri().'/scripts/kenburns.js', array(), true);
    wp_enqueue_script('vegas', get_stylesheet_directory_uri().'/scripts/vegas.js', array(), true);
}

add_action('wp_footer', 'add_googleanalytics');

function add_googleanalytics() { ?>
	<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-51502489-1', 'auto');
ga('send', 'pageview');
</script>
<?php }

add_filter('rwmb_meta_boxes', 'dd_register_meta_boxes');

function dd_register_meta_boxes($meta_boxes) {
    $post_id = isset($_GET['post']) && $_GET['post'] ? $_GET['post'] : (isset($_POST['post_ID']) ? $_POST['post_ID'] : false);

    $post_data    = get_post($post_id, ARRAY_A);
    $slug       = $post_data['post_name'];

    /*
    * To show a metabox on whatever page is called the Home Page
    */
    if ($post_id && get_option('show_on_front') == 'page' && get_option('page_on_front') == $post_id) {
        $meta_boxes[] = array(
            'title'    => 'Extra Content',
            'context'    => 'normal',
            'priority'    => '',
            'pages'    => array('page'),
            'fields'    => array(
                array(
                    'name'      => 'HomeBox 1 - Title',
                    'id'        => 'dd_homebox_title_1',
                    'type'      => 'text',
                    'desc'    => 'Title of Home Box 1'
                ),
                array(
                    'name'      => 'HomeBox 1 - Description',
                    'id'        => 'dd_homebox_description_1',
                    'type'      => 'text',
                    'desc'    => 'Description of Home Box 1'
                ),
                array(
                    'name'      => 'HomeBox 1 - Link',
                    'id'        => 'dd_homebox_link_1',
                    'type'      => 'text',
                    'desc'    => 'Link of Home Box 1'
                ),

                array(
                    'name'      => 'HomeBox 2 - Title',
                    'id'        => 'dd_homebox_title_2',
                    'type'      => 'text',
                    'desc'    => 'Title of Home Box 2'
                ),
                array(
                    'name'      => 'HomeBox 2 - Description',
                    'id'        => 'dd_homebox_description_2',
                    'type'      => 'text',
                    'desc'    => 'Description of Home Box 2'
                ),
                array(
                    'name'      => 'HomeBox 2 - Link',
                    'id'        => 'dd_homebox_link_2',
                    'type'      => 'text',
                    'desc'    => 'Link of Home Box 2'
                ),

                array(
                    'name'      => 'HomeBox 3 - Title',
                    'id'        => 'dd_homebox_title_3',
                    'type'      => 'text',
                    'desc'    => 'Title of Home Box 3'
                ),
                array(
                    'name'      => 'HomeBox 3 - Description',
                    'id'        => 'dd_homebox_description_3',
                    'type'      => 'text',
                    'desc'    => 'Description of Home Box 3'
                ),
                array(
                    'name'      => 'HomeBox 3 - Link',
                    'id'        => 'dd_homebox_link_3',
                    'type'      => 'text',
                    'desc'    => 'Link of Home Box 3'
                ),

                array(
                    'name'      => 'HomeBox 4 - Title',
                    'id'        => 'dd_homebox_title_4',
                    'type'      => 'text',
                    'desc'    => 'Title of Home Box 4'
                ),
                array(
                    'name'      => 'HomeBox 4 - Description',
                    'id'        => 'dd_homebox_description_4',
                    'type'      => 'text',
                    'desc'    => 'Description of Home Box 4'
                ),
                array(
                    'name'      => 'HomeBox 4 - Link',
                    'id'        => 'dd_homebox_link_4',
                    'type'      => 'text',
                    'desc'    => 'Link of Home Box 4'
                ),
                
                
            ),
        );
    }

    return $meta_boxes;
}



add_shortcode('gallery', 'dd_carousel_gallery_shortcode');


function dd_carousel_gallery_shortcode( $attr ) {
	if(!is_front_page())
		return '';
	$post = get_post();
	$output = "";
	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) ) {
			$attr['orderby'] = 'post__in';
		}
		$attr['include'] = $attr['ids'];
	}

	$html5 = current_theme_supports( 'html5', 'gallery' );
	$atts = shortcode_atts( array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => $html5 ? 'figure'     : 'dl',
		'icontag'    => $html5 ? 'div'        : 'dt',
		'captiontag' => $html5 ? 'figcaption' : 'dd',
		'columns'    => 3,
		'size'       => 'full',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr, 'gallery' );

	$id = intval( $atts['id'] );

	if ( ! empty( $atts['include'] ) ) {
		$_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( ! empty( $atts['exclude'] ) ) {
		$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	} else {
		$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	}

	if ( empty( $attachments ) ) {
		return '';
	}

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment ) {
			$output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
		}
		return $output;
	}

	$itemtag = tag_escape( $atts['itemtag'] );
	$captiontag = tag_escape( $atts['captiontag'] );
	$icontag = tag_escape( $atts['icontag'] );
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) ) {
		$itemtag = 'dl';
	}
	if ( ! isset( $valid_tags[ $captiontag ] ) ) {
		$captiontag = 'dd';
	}
	if ( ! isset( $valid_tags[ $icontag ] ) ) {
		$icontag = 'dt';
	}

	$columns = intval( $atts['columns'] );
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = '';

	$size_class = sanitize_html_class( $atts['size'] );
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";

	$i = 0;
/*
    $output .= '<div id="kenburns-slideshow"></div>';

    $output .= '
    <script type="text/javascript">
    
    $(document).ready(function() {
        $("#kenburns-slideshow").Kenburns({
            images: [';

        $images = array();
    foreach ( $attachments as $id => $attachment ) {
        $attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';

        $image_output = wp_get_attachment_image_src( $id, $atts['size'] );
        
        $images[] = '"' . $image_output[0] . '"';
    }

    $output .= implode(",", $images);
    $output .= '],
            scale:0.8,
            duration:18000,
            fadeSpeed:2200,
            ease3d:"cubic-bezier(0.445, 0.050, 0.550, 0.950)",

            
        });
    });
    </script>';

*/

    $output .= '<div id="slideshowWrapper">';
    $output .= '<div id="background">';

    $output .= '</div>';
    $output .= '</div>';

    $output .= '<script type="text/javascript">      
jQuery(document).ready(function() {
    jQuery("#background").vegas({
        slides: [';

        $images = array();
    foreach ( $attachments as $id => $attachment ) {
        $attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';

        $image_output = wp_get_attachment_image_src( $id, $atts['size'] );
        
        $images[] = '{src: \'' . $image_output[0] . '\' }';
    }

    $output .= implode(",", $images);

//{ src: '/getmedia/2ceaa043-e3cd-4f2c-a771-3c478bd2011a/home-new-york.jpg?width=1217&height=776&ext=.jpg&maxsidesize=1600' },{ src: '/getmedia/a0b5dda9-c326-49e8-bbbf-8cd61de22063/home-chicago2.jpg?width=1320&height=665&ext=.jpg&maxsidesize=1600' },{ src: '/getmedia/0b075bae-3c0b-4408-9c35-f74e89679695/home-ferry-point2.jpg?width=1320&height=665&ext=.jpg&maxsidesize=1600' },{ src: '/getmedia/48ee8b5a-bd91-4c2c-b1e4-37878b9adc16/home-old-post-office.jpg?width=1320&height=665&ext=.jpg&maxsidesize=1600' },{ src: '/getmedia/4a1ef991-3607-40cb-8052-88e1680bd02b/home-doonbeg-ireland.jpg?width=1320&height=665&ext=.jpg&maxsidesize=1600' },{ src: '/getmedia/ff055d0f-fbe8-4992-be05-06f6b9370198/home-las-vegas.jpg?width=1217&height=776&ext=.jpg&maxsidesize=1600' },{ src: '/getmedia/b246d322-7b27-44ee-9d0f-3de9832eedff/home-doral.jpg?width=1320&height=665&ext=.jpg&maxsidesize=1600' },{ src: '/getmedia/a514a94e-0e6e-4dd4-8e1f-c67f9ae66ad4/vancouver-update.jpg?width=1600&height=800&ext=.jpg&maxsidesize=1600' },{ src: '/getmedia/b485bbd4-f614-4723-ae3d-edc1c254a0a6/turnberry-2.jpg?width=1217&height=776&ext=.jpg&maxsidesize=1600' }
    $output .= '],
        timer: false,
        transition: "fade2",
        transitionDuration: 500,
        animation: "random",
        animationDuration:5000,
        overlay:false
    });
});
</script>';
    /*
    $output .= '<div id="slideshow">';
	foreach ( $attachments as $id => $attachment ) {

		$image_output = wp_get_attachment_image( $id, $atts['size'], false, $attr );

		$orientation = '';
		if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
			$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
		}

		$output .= "$image_output";
		if ( ! $html5 && $columns > 0 && ++$i % $columns == 0 ) {
			//$output .= '<br style="clear: both" />';
		}
	}

    $output .= '</div>';
    */

	//$output .= "
	//	</div>\n";

	return $output;
}