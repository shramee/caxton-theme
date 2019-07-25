<?php

require_once 'functions.php';
require_once 'fonts.php';
require_once 'class-design-fields-css.php';

/**
 * Class CxTh_Design
 * Initiate Makesite design
 * @property-read string $css Site CSS
 * @property-read string $body_class Classes to apply to body
 * @property-read string $gf_url URL to call in google fonts used
 */
class CxTh_Design extends CxTh_Design_Fields_Css {

	/** @var CxTh_Design Instance */
	protected static $instance;

	/**
	 * Get design fields data
	 * @return array Design fields data
	 */
	public static function fields() {
		return ( include 'design-fields.php' );
	}

	/** @var CxTh_Design_Customizer_Register Instance */
	protected $admin;

	/**
	 * Magic __get to access protected properties
	 * @param string $name Property
	 * @return mixed Property $name of $this or false
	 */
	public function __get( $name ) {
		if ( isset( $this->$name ) )
			return $this->$name;

		return false;
	}

	/**
	 * Returns instance of CxTh_Admin_Customizer
	 * @return CxTh_Design Instance
	 * @since 1.0.0
	 */
	public static function instance() {
		if ( empty( CxTh_Design::$instance ) ) {
			CxTh_Design::$instance = new CxTh_Design();
		}

		return CxTh_Design::$instance;
	}

	public static function live_settings() {
		return self::instance()->_live_settings();
	}

	/**
	 * Magic constructor
	 * @since 1.0.0
	 */
	protected function __construct() {
		global $wp_customize;

		if ( $wp_customize instanceof WP_Customize_Manager ) {
			require_once 'class-design-customizer-register.php';
			$this->admin = CxTh_Design_Customizer_Register::instance();
		}

		$this->gf_data = cxth_get_fonts( 'data' );
		$this->set_properties();

		add_action( 'customize_save_after', array( $this, 'save_settings' ) );
		if ( is_customize_preview() ) {
			add_action( 'wp', array( $this, 'set_live_properties' ) );
		}
	}

	/**
	 * Sets CxTh_Design properties
	 * @uses CxTh_Design::$styles
	 * @since 1.0.0
	 */
	public function set_live_properties() {
		$setting = $this->_live_settings();

		foreach ( $setting as $id => $set ) {
			$this->$id = $set;
		}
	}

	/**
	 * Sets CxTh_Design properties
	 * @uses CxTh_Design::$styles
	 * @since 1.0.0
	 */
	public function set_properties() {
		$setting = get_option( 'cxth_setting', array() );

		foreach ( $setting as $id => $set ) {
			$this->$id = $set;
		}
	}

	/**
	 * Outputs CSS from CSS data
	 * @action wp_head
	 * @uses CxTh_Design::$styles
	 * @since 1.0.0
	 */
	protected function _live_settings() {
		$this->process_settings();

		return apply_filters( 'cxth_design_components', array(
			'body_class' => $this->body_class,
			'css' => $this->css,
			'gf_url' => $this->generate_gf_url(),
		) );
	}

	/**
	 * Generates CSS data from settings
	 * @action wp
	 * @uses CxTh_Design::$styles, CxTh_Design::$gf_load
	 * @since 1.0.0
	 */
	protected function process_settings() {
		$styles = '';

		$cxth_fields = CxTh_Design::fields();
		foreach ( $cxth_fields as $settings_group => $options ) {
			foreach( $options as $id => $f ) {
				$styles .= $this->process_setting( $id, $f );
			}
		}
		$this->css = $styles;
	}

	/**
	 * Generates google font from gf_data
	 * @return string google font url
	 * @since 1.0.0
	 */
	public function generate_gf_url() {
		$this->process_google_fonts();

		$load_fonts = array();

		foreach( $this->gf_load as $font => $weight )
			if ( ! empty( $font ) ) {
				$load_fonts[] = $font . ':' . implode( ',', $weight );
			}

		if ( $load_fonts )
			return '//fonts.googleapis.com/css?family=' . join( '|', $load_fonts );

		return '';
	}

	/**
	 * Processes gf_data
	 * @since 1.0.0
	 */
	public function process_google_fonts() {
		foreach( $this->gf_load as $font => &$weight ) {
			if ( 'Open Sans Condensed' == $font ) {
				$this->gf_load[ $font ] = array( '300' => 1 );
			} elseif ( strpos( $font, ' Light' ) ) {
				$this->gf_load[ str_replace( ' Light', '', $font ) ]['300'] = 1;
			}

			$this->gf_load[ $font ] = array_keys( $this->gf_load[ $font ] );
		}
		$this->gf_load = apply_filters( 'cxth_google_fonts', $this->gf_load );
	}
}

new WP_Widget_Search();