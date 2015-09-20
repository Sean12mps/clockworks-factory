<?php 
if ( ! defined( 'SYSTEM_URL' ) ) exit; // Exit if accessed directly

class Clockworks_Application {

	private $html = '';

	public function __construct () {

		clock_set_var( 'filters', array() );

		clock_set_var( 'wrapper_attr', array(
			'id'	=>'wrapper',
			'class'	=>'wrapper',
		) );

		clock_set_var( 'inner_attr', array(
			'id'	=>'inner',
			'class'	=>'inner',
		) );


		clock_set_var( 'nodes', array(
			// 	Layer 1
			'do_open_wrapper' 	=> array( $this, 'open_wrapper' ),

				// 	Layer 2
				'do_open_inner' 	=> array( $this, 'open_inner' ),
				'do_close_inner' 	=> array( $this, 'close_inner' ),

			'do_close_wrapper' 	=> array( $this, 'close_wrapper' ),
		) );
	}


	public function run () {

		$nodes = clock_get_var( 'nodes' );

		if ( $nodes ) {

			foreach ( $nodes as $key => $value ) {

				call_user_func( $value );
			}
		}

		echo $this->html;
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

		Clockworks_Application::enter();

		for ( $i = 0; $i < $times; $i++ ) {
			Clockworks_Application::indent();
		}
	}

	public function open_element ( $type = '', $attr = array() ) {

		if ( count( $attr ) == 0 ) {

			$output = '<'. $type .'';
		} else {

			$output = '<'. $type .' ';
		}


		$output .= Clockworks_Application::open_attr( $attr );

		$output .= '>';

		return $output;
	}

	public function close_element ( $type = '' ) {

		$output = '</'. $type .'>';

		return $output;
	}

	public function open_attr ( $arr = array() ) {

		$output = '';

		foreach ( $arr as $key => $value ) {
			$output .= $key;
			$output .= '=';
			$output .= '"'. $value .'" ';
		}

		if ( count( $arr ) == 0 ) {

			$output = '';
		}

		return $output;
	}

	public function apply_filters ( $tag, $default ) {

		$filters = clock_get_var( 'filters' );

		if ( isset( $filters[$tag] ) ) {

			$output = call_user_func( $filters[$tag], $default );

			return $output;
		}

		return $default;
	}

	public function add_filter ( $tag, $value ) {

		$filters = clock_get_var( 'filters' );

		$filters[$tag] = $value;

		clock_set_var( 'filters', $filters );
	}




	private function open_wrapper () {

		$attr = $this->apply_filters( 'wrapper_attr', clock_get_var( 'wrapper_attr' ) );

		$this->layer(1);
		echo $this->open_element( 'div', $attr );
	}

	private function close_wrapper () {
		$this->layer(1);
		echo $this->close_element( 'div' );
	}

	private function open_inner () {

		$attr = $this->apply_filters( 'inner_attr', clock_get_var( 'inner_attr' ) );
		
		$this->enter();
		$this->layer(2);
		echo $this->open_element( 'div', $attr );
	}

	private function close_inner () {
		$this->layer(2);
		echo $this->close_element( 'div' );
	}

};