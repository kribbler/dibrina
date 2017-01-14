<?php

$slider_mb = new WPAlchemy_MetaBox(array
(
	'id' => 'po_slider_meta',
	'title' => 'Slider Options',
	'template' => get_template_directory() . '/metaboxes/slider-meta.php',
	'types' => array('page'),
));

/* eof */