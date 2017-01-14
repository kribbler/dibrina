<?php

$format_mb = new WPAlchemy_MetaBox(array
(
	'id' => 'po_format_meta',
	'title' => 'Post Format Meta',
	'template' => get_template_directory() . '/metaboxes/format-meta.php',
	'types' => array('post'),
));

/* eof */