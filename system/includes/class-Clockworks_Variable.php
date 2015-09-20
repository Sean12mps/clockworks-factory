<?php 
if ( ! defined( 'SYSTEM_URL' ) ) exit; // Exit if accessed directly

class Clockworks_Variable {

	private $data = array();

	public function __construct () {
	}

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