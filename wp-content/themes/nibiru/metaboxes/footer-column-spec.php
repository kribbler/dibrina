<?php

$footer_column_mb = new WPAlchemy_MetaBox(array
(
	'id' => 'po_footer_column_meta',
	'title' => 'Footer Column Meta',
	'template' => get_template_directory() . '/metaboxes/footer-column-meta.php',
	'types' => array('footer_column'),
));

/* eof */