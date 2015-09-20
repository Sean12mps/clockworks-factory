<?php 

$App = new Clockworks_Application();

function wrapper_attr_func ( $args ) {

	$args['class'] = 'my-new-class';

	return $args;
}

$App->add_filter( 'wrapper_attr', 'wrapper_attr_func' );

$App->add_filter( 'inner_attr', 'wrapper_attr_func' );

$App->run();

