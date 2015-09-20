<?php 
if ( ! defined( 'SYSTEM_URL' ) ) exit; // Exit if accessed directly

class Clockworks_Config {

	public function __construct () {
		
		$this->default_configurations();
	}

	public function default_configurations () {

		clock_set_var( 'javascript_points', array(
			'jquery' 			=> TITAN_SCRIPTS .'js/jquery.min.js',
			'bootstrap' 		=> TITAN_SCRIPTS .'vendors/bootstrap/js/bootstrap.min.js',
			'bootstrap-dialog' 	=> TITAN_SCRIPTS .'vendors/bootstrap-dialog/js/bootstrap-dialog.js',
			'jquery-ui' 		=> TITAN_SCRIPTS .'vendors/jquery-ui/jquery-ui.min.js',
		) );

		clock_set_var( 'css_points', array(
			'bootstrap' 		=> TITAN_SCRIPTS .'vendors/bootstrap/css/bootstrap.min.css',
			'bootstrap-dialog' 	=> TITAN_SCRIPTS .'vendors/bootstrap-dialog/css/bootstrap-dialog.css',
			'jquery-ui' 		=> TITAN_SCRIPTS .'vendors/jquery-ui/jquery-ui.min.css',
			'animate' 			=> TITAN_SCRIPTS .'css/animate.css',
		) );
	}

	public function get_configuration ( $part_url ) {

		$name = '';

		if ( isset( $_GET['part'] ) ) {
			
			$name = $_GET['part'];
		} else {
			
			$name = 'default';
		}


		$valid = Clockworks_Config::validate( $name, $part_url );

		if ( $valid ) {
			
			clock_set_var( 'working_dir_name', $name );

			Clockworks_Config::mount( $name, $part_url );
		}
	}

	private function validate ( $name, $url_check ) {

		$files = scandir( $url_check );
		$files = array_diff( $files, array( '.', '..' ) );
		$files = array_values($files);

		foreach ( $files as $key => $value ) {

			$files[$key] = str_replace( '.php', '', $value );
		}

		$valid = false;

		foreach ( $files as $key => $value ) {
			
			if ( $value == $name ) {

				$valid = true;
			}
		}

		return $valid;
	}

	public function mount ( $name = '', $part_url = '' ) {

		if ( func_num_args() == 0 ) {

			$dir_name = clock_get_var( 'working_dir_name' );

			include( 'part/'. $dir_name .'/index.php' );

		} else {

			include_once( ''. $part_url .'/'. $name .'.php' );
		}
	}
}

