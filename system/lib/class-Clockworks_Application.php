<?php 

class Clockworks_Application {


	private $memory = array();

	// 	@param : $arr
	// 	- type 			: string
	// 	- attr 			: string/array
	// 	- auto_close 	: boolean
	public function open_multiple_elements ( $arr ) {

		foreach ( $arr as $key => $value ) {
			// 	TODO
		}
	}


	public function open_attr ( $arr = array() ) {

		$output = '';

		$space = ' ';

		$counter = 1;

		foreach ( $arr as $key => $value ) {

			$output .= $key;

			$output .= '=';

			$val = $value;

			if ( $counter == count( $arr ) ) {

				$space = '';
			}

			if ( is_array( $val ) ) {

				$temp_val = '';

				$temp_space = ' ';

				for( $i = 0; $i < count( $val ); $i++ ) {

					if ( $i == ( count( $val ) - 1 ) ) {

						$temp_space = '';
					}

					$temp_val .= $val[$i] . $temp_space;

				}

				$val = $temp_val;
			}

			$output .= '"'. $val .'"'. $space .'';

			$counter ++;
		}

		if ( count( $arr ) == 0 ) {

			$output = '';
		}

		return $output;
	}


	public function open ( $type = '', $attr = array(), $auto_close = false ) {

		if ( is_array( $type ) ) {

			$this->open_multiple_elements( $type );
		} else {


			if ( count( $attr ) == 0 ) {

				$output = '<'. $type .'';
			} else {

				$output = '<'. $type .' ';
			}

			$output .= $this->open_attr( $attr );

			$output .= '>';

			if ( $auto_close ) {

				$output .= $this->close( $type );
			}

			return $output;
		}
	}


	public function close ( $type = '' ) {

		$output = '</'. $type .'>';

		return $output;
	}


	public function indent ( $times = 1 ) {

		$output = '';

		for ( $i = 0; $i < $times; $i++ ) {
			$output .= '	';
		}

		echo $output;
	}


	public function enter ( $times = 1 ) {

		$output = '';

		for ( $i = 0; $i < $times; $i++ ) {
			$output .= '
';
		}

		echo $output;
	}


	public function layer ( $times = 1 ) {

		$this->enter();

		for ( $i = 0; $i < $times; $i++ ) {

			$this->indent();
		}
	}

};