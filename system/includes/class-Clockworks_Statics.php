<?php 

class Clockworks_Statics {


	public function __construct () {

		add_action( 'header', array( $this, 'print_head' ) );
		add_action( 'content', array( $this, 'print_content_head' ) );
		add_action( 'footer', array( $this, 'print_footer' ) );
	}


	public function print_head () {

		$element = new Clockworks_Application;

		echo $element->open( '!DOCTYPE html' );

		$element->layer(0);
		echo $element->open( 'html' );

		$element->layer( 1 );
		echo $element->open( 'head' );

		$element->layer( 2 );
		echo $element->open( 'meta', array( 'charset'=>'utf-8' ) );

		$element->layer( 2 );
		echo $element->open( 'meta', array( 'http-equiv'=>'X-UA-Compatible', 'content'=>'IE=edge' ) );

		$element->layer( 2 );
		echo $element->open( 'meta', array( 'name'=>"viewport", 'content'=>'width=device-width, initial-scale=1' ) );

		$element->layer( 2 );
		echo $element->open( 'title' );
		echo apply_filters( 'project_title', APP_NAME );
		echo apply_filters( 'project_version', ' - V' . APP_VERSION );
		echo $element->close( 'title' );

		$element->layer( 2 );
		do_action( 'scripts_head' );

		$element->layer( 1 );
		echo $element->close( 'head' );

		$element->enter();
	}


	public function print_content_head () {

		$element = new Clockworks_Application;

		$element->layer(1);
		echo $element->open( 
			'body', 
			array(
				'id' 	=> apply_filters( 'body_id', 'default-body-id' ),
				'class'	=> apply_filters( 'body_class', 'default-body-class' )
			)
		);

		$element->layer(3);
		do_action( 'content_header' );
		
		$element->layer(3);
		do_action( 'content_body' );
	}


	public function print_footer () {

		$element = new Clockworks_Application;


		$element->layer(3);
		do_action( 'content_footer' );

		$element->layer(3);
		do_action( 'scripts_footer' );

		$element->layer(1);
		echo $element->close( 'body' );

		$element->layer(0);
		echo $element->close( 'html' );
	}
}

