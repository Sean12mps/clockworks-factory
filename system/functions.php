<?php 

// 	Defining Constants
function clock_define ( $name, $value = null ) {

	if ( is_array( $name ) && $value == null ) {

		foreach ( $name as $key => $value ) {

			if ( ! defined( $key ) ) {

				define( $key, $value ); 
			}
		}

	} else {

		if ( ! defined( $name ) ) {

			define( $name, $value ); 
		}
	}
};


// 	Get Variables
function clock_get_var ( $key ) {

	$obj = $GLOBALS['Clockworks_Variable'];
	
	$output = $obj->__get( $key );

	return $output;
}


// 	Set Variables
function clock_set_var ( $key, $value ) {

	$obj = $GLOBALS['Clockworks_Variable'];

	$obj->__set( $key, $value );
}


// 	Javascript Values
function script_javascript () {

}


// 	Set Configurations
function config ( $args ) {

	foreach ( $args as $key => $value ) {

		clock_set_var( $key, $value );
	}
}


// 	Deliver scripts html
function parse_scripts ( $args ) {

	$html = '';

	$js_points = clock_get_var( 'javascript_points' );

	$css_points = clock_get_var( 'css_points' );

	foreach ( $args as $key => $value ) {

		switch ( $key ) {

			case 'javascript':

				$html .= '
    	<!-- javascripts -->';

				foreach ( $value as $key => $val ) {

					if ( array_key_exists( $key, $js_points ) ) {

						$html .= '
    	<script type="text/javascript" src="'. $js_points[$key] .'" class="js-'. $key .'" ></script>
';
					} else {
						
						$html .= '
    	<script type="text/javascript" src="'. $value[$key] .'" class="js-'. $key .'" ></script>
';
					}
				}
				break;


			case 'css':

				$html .= '
    	<!-- css -->';

				foreach ( $value as $key => $val ) {

					if ( array_key_exists( $key, $css_points ) ) {

						$html .= '
    	<link rel="stylesheet" href="'. $css_points[$key] .'" class="css-'. $key .'">
';
					} else {
						
						$html .= '
    	<link rel="stylesheet" href="'. $value[$key] .'" class="css-'. $key .'">
';
					}
				}
				break;
		}
	}

	return $html;
}


// 	Create Element
function open_element ( $type, $attr = array() ) {

	return Clockworks_Application::open_element( $type, $attr );
}

// 	Close Element
function close_element ( $type, $attr = array() ) {

	return Clockworks_Application::close_element( $type );
}

// 	Do indent
function indent ( $times = 1 ) {
	Clockworks_Application::indent( $times );
}

// 	Do enter
function enter ( $times = 1 ) {
	Clockworks_Application::enter( $times );
}

// 	Do layer
function layer ( $times = 1 ) {
	Clockworks_Application::layer( $times );
}