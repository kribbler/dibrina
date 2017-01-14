<?php

$wpalchemy_media_access = new WPAlchemy_MediaAccess();

$carousel_mb = new WPAlchemy_MetaBox(array
(
    'id' => 'po_carousel_meta',
    'title' => 'Carousel Options',
    'template' => get_template_directory() . '/metaboxes/carousel-meta.php',
	'types' => array('carousel'),
));

/* eof */