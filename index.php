<?php 

class Clockworks_Factory {


	// 	Options
	private $name 		= 'Clockworks-Factory';
	private $version 	= '1.0b';


	public function __construct () {

		//	Loads all dependencies
		$this->load_dependencies();

		//	Define Constants
		$this->define_constants();

		//	Core Works
		$this->load_core();

		// 	Loads page assets
		$this->load_assets();

		// 	Define controls
		$this->control();

		// 	Render Page
		$this->render();
	}


	public function load_dependencies () {

		// 	Helper functions
		include_once( 'system/functions.php' );

		// 	Temporary memory
		include_once( 'system/lib/class-Clockworks_Variable.php' );

		// 	Element builder
		include_once( 'system/lib/class-Clockworks_Application.php' );

		// 	Hooks system
		include_once( 'system/lib/class-Clockworks_Hooks.php' );

		// 	Filter system
		// include_once( 'system/lib/class-Clockworks_Filters.php' );
	}


	public function define_constants () {

		$constants = array(
		// 	name 				value
			'URL_INCLUDES' 	=> 	dirname( __FILE__ ) .'/system/includes/',
			'URL_LIBRARY' 	=> 	dirname( __FILE__ ) .'/system/lib/',
			'APP_NAME' 		=> 	$this->name,
			'APP_VERSION' 	=> 	$this->version,
		);

		define_constants( $constants );
	}


	public function load_core () {

		// 	Static Elements
		include_once( URL_INCLUDES . 'class-Clockworks_Statics.php' );

		// 	Get any settings before statics is printed
		do_action( 'init' );

		// 	Initializing Classes
		$this->statics = new Clockworks_Statics;
	}


	public function load_assets () {
	}


	public function control () {
	}


	public function render () {

		do_action( 'header' );

		do_action( 'content' );

		do_action( 'footer' );
	}

}

new Clockworks_Factory;
