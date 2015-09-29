<?php 

class Clockworks_Hooks {

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


$GLOBALS['Clockworks_Hooks'] = new Clockworks_Hooks;
