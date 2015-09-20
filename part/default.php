<?php
$metas = array(
	'title' 		=> 'Clockworks',
	'description'	=> 'A set of tools for prototyping your application',
);

$scripts_head = array(
	'javascript' => array(
		'jquery' 			=> '',
		'jquery-ui' 		=> '',
		'bootstrap' 		=> '',
		'bootstrap-dialog' 	=> '',
	),
	'css' => array(
		'bootstrap' 		=> '',
		'bootstrap-dialog' 	=> '',
		'jquery-ui' 		=> '',
		'animate' 			=> '',
	)
);

$scripts_foot = array(
);

$body_class = array(
	'default',
	'clockworks-main',
);


$args = array(
	'html_metas' 		=> $metas,
	'html_scripts_head' => $scripts_head,
	'html_scripts_foot' => $scripts_foot,
	'html_body_class'	=> $body_class,
);

config( $args );