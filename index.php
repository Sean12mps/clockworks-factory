<?php 

include_once( 'system/memory/vars.php' );

class Clockworks {

	private $name = 'parts';

	public function __construct () {

		// 	Load helpers
		include_once( 'system/functions.php' );
		$this->define_constants();

		// 	Load Includes
		include_once( 'system/includes/class-Clockworks_Variable.php' );
		include_once( 'system/includes/class-Clockworks_Application.php' );
		include_once( 'system/includes/class-Clockworks_Config.php' );
		include_once( 'system/includes/class-Clockworks_Statics.php' );

		// 	Clockworking
		$this->define_config();
		$this->build();
	}

	public function define_constants () {

		$arr = array(
			'SYSTEM_URL' 	=> dirname( __FILE__ ) .'/system',
			'PART_URL' 		=> dirname( __FILE__ ) .'/part/',
			'TITAN_SCRIPTS' => '/'. $this->name .'/assets/',
		);

		clock_define( $arr );
	}

	public function define_config () {

		new Clockworks_Config();

		Clockworks_Config::get_configuration( PART_URL );
	}

	public function build () {

		Clockworks_Statics::build( 'head' );

		Clockworks_Statics::build( 'content' );

		Clockworks_Config::mount();

		Clockworks_Statics::build( 'panel' );
	}
}

new Clockworks();