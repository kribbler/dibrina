<?php

$wpalchemy_media_access = new WPAlchemy_MediaAccess();

$team_mb = new WPAlchemy_MetaBox(array
(
    'id' => 'po_team_meta',
    'title' => 'Team Options',
    'template' => get_template_directory() . '/metaboxes/team-meta.php',
	'types' => array('team'),
));

/* eof */