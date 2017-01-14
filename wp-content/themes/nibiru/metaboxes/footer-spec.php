<?php

$footer_mb = new WPAlchemy_MetaBox(array
(
	'id' => 'po_footer_meta',
	'title' => 'Footer Options',
	'template' => get_template_directory() . '/metaboxes/footer-meta.php',
	'types' => array('post','page', 'portfolio', 'team'),
));

/* eof */