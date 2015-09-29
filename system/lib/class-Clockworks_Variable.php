<?php 

class Clockworks_Variable {

	private $data = array();

	public function __get( $property ) {

        if ( isset( $this->data[$property] ) ) {

        	return $this->data[$property];
        }

        return false;
    }

    public function __set( $property, $value ) {

        $this->data[$property] = $value;
    }
}


$GLOBALS['Clockworks_Variable'] = new Clockworks_Variable;


// 	Get Variables
if ( ! function_exists( 'clock_get_var' ) ) {

	function clock_get_var ( $key ) {

		$obj = $GLOBALS['Clockworks_Variable'];
		
		$output = $obj->__get( $key );

		return $output;
	}
}


// 	Set Variables
if ( ! function_exists( 'clock_set_var' ) ) {

	function clock_set_var ( $key, $value ) {

		$obj = $GLOBALS['Clockworks_Variable'];

		$obj->__set( $key, $value );
	}
}