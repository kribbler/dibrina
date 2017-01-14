<?php

$page_mb = new WPAlchemy_MetaBox(array
(
	'id' => 'po_page_meta',
	'title' => 'Page Options',
	'template' => get_template_directory() . '/metaboxes/page-meta.php',
	'types' => array('page', 'portfolio','team'),
));

/* eof */