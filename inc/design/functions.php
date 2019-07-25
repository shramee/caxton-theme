<?php

/** Prioritizing an array */
if ( ! function_exists( 'cxth_prioritize_array' ) ) {
	/**
	 * Compares priority
	 *
	 * @param array $a
	 * @param array $b
	 *
	 * @return bool
	 */
	function cxth_priority_cmp( $a, $b ) {
		return $a['priority'] > $b['priority'];
	}

	/**
	 * Compares priority
	 *
	 * @param array $arr
	 *
	 * @uses cxth_priority_cmp
	 * @return bool
	 */
	function cxth_prioritize_array( &$arr ) {
		$i = 0;
		foreach ( $arr as $k => $v ) {
			if ( empty( $arr[ $k ]['priority'] ) ) {
				$arr[ $k ]['priority'] = 10 + ( 0.0001 * $i ++ );
			}
			$arr[ $k ]['id'] = $k;
		}
		uasort( $arr, 'cxth_priority_cmp' );
	}
}


if ( ! function_exists( 'cxth_stringify_prop_val' ) ) {
	/**
	 * Converts attributes array into html attributes string
	 *
	 * @param array $data Associative ( multidimensional ) array attributes
	 * @param array $args {
	 *     Arguments for output
	 *
	 * @type string $before Added before all property value pairs, Default '',
	 * @type string $after Added after all property value pairs, Default '',
	 * @type string $before_prop Prefixed to property, Default '',
	 * @type string $before_value Between property and value, Default '="',
	 * @type string $after_value After the value, Default '" ',
	 * @type string $value_glue Implodes the array values, Default ' ',
	 * @type string $prop_glue Implodes all property value pairs, Default ' ',
	 * }
	 * @return string HTML attributes
	 */
	function cxth_stringify_prop_val( $data, $args = array() ) {

		if ( empty( $data ) ) {
			return '';
		}

		$args = wp_parse_args(
			$args,
			array(
				'before'       => '',
				'after'        => '',
				'prop_glue'    => ' ',
			)
		);

		return
			$args['before'] .
			implode( $args['prop_glue'], cxth_prop_val_array_format( $data, $args ) ) .
			$args['after'];
	}
	/**
	 * Converts attributes array into html attributes string
	 *
	 * @param array $data Associative ( multidimensional ) array attributes
	 * @param array $args {
	 *     Arguments for output
	 *
	 * @type string $before_prop Prefixed to property, Default '',
	 * @type string $before_value Between property and value, Default '="',
	 * @type string $after_value After the value, Default '" ',
	 * @type string $value_glue Implodes the array values, Default ' ',
	 * }
	 * @return array HTML attributes
	 */
	function cxth_prop_val_array_format( $data, $args = array() ) {
		$args = wp_parse_args(
			$args,
			array(
				'before_prop'  => '',
				'before_value' => '="',
				'after_value'  => '"',
				'value_glue'   => ' ',
			)
		);
		$attr_data = array();
		foreach ( $data as $property => $value ) {
			if ( is_array( $value ) ) {
				$value = implode( $args['value_glue'], array_unique( $value ) );
			}
			$attr_data[] = $args['before_prop'] . $property . $args['before_value'] . $value . $args['after_value'];
		}
		return $attr_data;
	}
}

if ( ! function_exists( 'cxth_make_id' ) ) {
	/**
	 * Gets id form title replacing non alpha numeric chars into $sep
	 *
	 * @param string $title The text to convet into id
	 * @param string $sep Word separator defaults '-'
	 *
	 * @return string
	 */
	function cxth_make_id( $title, $sep = '-' ) {
		$title = strtolower( $title );

		return (string) preg_replace( '/[^A-z0-9]/', $sep, $title );
	}
}

if ( ! function_exists( 'cxth_minify' ) ) {

	/**
	 * Minify HTML
	 * @param string $html HTML to minify
	 * @return string Minified HTML
	 * @since 1.0.0
	 */
	function cxth_minify( $html ) {
		$html = str_replace( array( "\n", "\t", ), '', $html );
		return $html;
	}
}

if ( ! function_exists( 'cxth_array_val' ) ) {
	/**
	 * Returns value from from array if key exists
	 *
	 * @param array $array The text to convert into id
	 * @param string $key Key of the value
	 * @param mixed $default returned if key doesn't exist
	 * @param string $format To return value in a format
	 *
	 * @return mixed Value or Formatted value if string
	 */
	function cxth_array_value( $array, $key, $default = null ) {

		if ( ! empty( $array[ $key ] ) ) {
			return $array[ $key ];
		}

		return $default;
	}
}

if ( ! function_exists( 'cxth_sprintf_array_val' ) ) {
	/**
	 * Returns value from from array if key exists
	 *
	 * @param array $array The text to convert into id
	 * @param string $key Key of the value
	 * @param mixed $default returned if key doesn't exist
	 * @param string $format To return value in a format
	 *
	 * @return mixed Value or Formatted value if string
	 */
	function cxth_sprintf_array_val( $format = '%s', $array, $key, $default = null ) {

		$value = ! empty( $array[ $key ] ) ? $array[ $key ] : $default;

		if ( ! empty( $value ) ) {
			return sprintf( $format, $value );
		}

		return null;
	}
}

if ( ! function_exists( 'cxth_get_option' ) ) {
	/**
	 * @param string $option_group Menu slug to get options from
	 * @param string $option The key of the field
	 * @param mixed $default Default if not set
	 *
	 * @return mixed Setting or $default
	 */
	function cxth_get_option( $option_group, $option, $default = null ) {
		$options = get_option( $option_group, array() );

		if ( ! isset( $options[ $option ] ) ) {
			$options[ $option ] = $default;
		}

		/** This filter is documented in wp-includes/theme.php */
		return apply_filters( "cxth_get_option{$option_group}", $options[ $option ], $option );
	}
}

if ( ! function_exists( 'cxth_is_assoc' ) ) {
	/**
	 * Checks if an array is associative array
	 * @param array $arr Array to check
	 * @return bool
	 */
	function cxth_is_assoc( $arr ) {
		return array_keys( $arr ) !== range( 0, count( $arr ) - 1 );
	}
}