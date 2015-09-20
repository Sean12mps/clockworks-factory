<?php 
if ( ! defined( 'SYSTEM_URL' ) ) exit; // Exit if accessed directly

class Clockworks_Statics {

	public function __construct () {

	}

	public function build ( $cmd ) {

		if ( $cmd != null ) {

			call_user_func( 'Clockworks_Statics::'. $cmd .'' );
		}
	}







/*--------------------------------------------------------------------*/ 
	public function head () {

		$metas = clock_get_var( 'html_metas' );

		$scripts_head = clock_get_var( 'html_scripts_head' );

		$scripts_head = parse_scripts( $scripts_head );

		echo open_element( '!DOCTYPE html' );

		enter();
		echo open_element( 'head' );
		enter();

		layer(1);
		echo open_element( 'meta', array( 'charset'=>'utf-8' ) );

		layer(1);
		echo open_element( 'meta', array( 'http-equiv'=>'X-UA-Compatible', 'content'=>'IE=edge' ) );

		enter();
		layer(1);
		echo open_element( 'title');
		echo $metas['title'];
		echo close_element( 'title');
		enter();

		layer(1);
		echo open_element( 'meta', array( 'name'=>"description", 'content'=>$metas['description'] ) );

		layer(1);
		echo open_element( 'meta', array( 'name'=>"viewport", 'content'=>'width=device-width, initial-scale=1' ) );

		layer(1);
		echo $scripts_head;

		enter();
		echo close_element( 'head' );
		enter();
	}








/*--------------------------------------------------------------------*/ 
	public function content () {

		$body_class = clock_get_var( 'html_body_class' );

		$class = implode( ' ', $body_class );

		$html = '';

		$html .= '
<body class="'. $class .'">
';

		echo $html;
	}








/*--------------------------------------------------------------------*/ 
	public function panel () {

		$scripts_foot = clock_get_var( 'html_scripts_foot' );

		$scripts_foot = parse_scripts( $scripts_foot );

		$html = '';

		$html .= '
	'. $scripts_foot .'
</body>
';
		
		echo $html;
	}








}