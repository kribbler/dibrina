<?php

$wpalchemy_media_access = new WPAlchemy_MediaAccess();

$client_mb = new WPAlchemy_MetaBox(array
(
    'id' => 'po_client_meta',
    'title' => 'Client Options',
    'template' => get_template_directory() . '/metaboxes/client-meta.php',
	'types' => array('clients'),
));

/* eof */