<?php 


// 	Defining Constants
if ( ! function_exists( 'define_constants' ) ) {

	function define_constants ( $name, $value = null ) {

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
}


// 	Doing actions
if ( ! function_exists( 'do_action' ) ) {

	function do_action ( $tag, $args = null ) {

		$obj = $GLOBALS['Clockworks_Hooks'];

		$functions = $obj->__get( $tag );

		if ( $functions ) {

			foreach ( $functions as $function => $function_args ) {

				if ( is_null( $args ) ) {

					$args = array();
				} else {

					$temp_args = array();

					for ( $i = 0; $i < $function_args; $i++ ) {
						
						array_push( $temp_args, $args[$i] );
					}

					$args = array_values( $temp_args );
				}

				call_user_func_array( $function, $args );
			}
		}
	}
}


// 	Adding Hooks
if ( ! function_exists( 'add_action' ) ) {

	function add_action ( $tag, $function_name, $param = null ) {
		
		$obj = $GLOBALS['Clockworks_Hooks'];

		$action = $obj->__get( $tag );

		$hooks = array();

		if ( $action ) {

			if ( is_array( $function_name ) ) {

				$temp_name = get_class( $function_name[0] );

				$temp_name .= '::' . $function_name[1];

				$function_name = $temp_name;
			}

			if ( array_key_exists( $function_name, $action ) ) {

				return false;

			} else {

				foreach ( $action as $key => $value ) {

					$hooks[$key] = $value;
				}

				$hooks[$function_name] = $param;
			}

		} else {

			if ( is_array( $function_name ) ) {

				$temp_name = get_class( $function_name[0] );

				$temp_name .= '::' . $function_name[1];

				$hooks[$temp_name] = $param;
			} else {

				$hooks[$function_name] = $param;
			}
		}

		$obj->__set( $tag, $hooks );
	}
}


// 	Search for filters and print default if not found
if ( ! function_exists( 'apply_filters' ) ) {

	function apply_filters ( $tag, $default ) {

		$filters = clock_get_var( 'filters' );

		if ( isset( $filters[$tag] ) ) {

			$output = call_user_func( $filters[$tag], $default );

			return $output;
		}

		return $default;
	}
}


// 	Overides default value of filters
if ( ! function_exists( 'add_filter' ) ) {

	function add_filter ( $tag, $value ) {

		$filters = clock_get_var( 'filters' );

		$filters[$tag] = $value;

		clock_set_var( 'filters', $filters );
	}
}