<?php

$wpalchemy_media_access = new WPAlchemy_MediaAccess();

$portfolio_mb = new WPAlchemy_MetaBox(array
(
    'id' => 'po_portfolio_meta',
    'title' => 'Portfolio Options',
    'template' => get_template_directory() . '/metaboxes/portfolio-meta.php',
	'types' => array('portfolio'),
));

/* eof */