<?php
$metas = array(
	'title' 		=> '',
	'description'	=> ''
);

$scripts_head = array(
	'javascript' => array(
		'jquery' => ''
	),
	'css' => array(
		'bootstrap' => ''
	)
);

$scripts_foot = array(
	'javascript' => array(
		'jquery' => ''
	),
	'css' => array(
		'bootstrap' => ''
	)
);


$args = array(
	'metas' 		=> $metas,
	'scripts_head' 	=> $scripts_head,
	'scripts_foot' 	=> $scripts_foot
);

config( $args );