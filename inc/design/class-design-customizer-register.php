<?php
require_once 'class-customizer-control.php';
require_once 'class-customizer-css-control.php';

/**
 * Class CxTh_Design_Customizer_Register
 * Initiate Makesite design
 */
class CxTh_Design_Customizer_Register {

	/** @var CxTh_Design_Customizer_Register Instance */
	protected static $instance;

	/** @var array  */
	protected $panel_args = array(
		'controls_classes' => array(
			'slider'      => 'CxTh_Customizer_CSS_Control',
			'shadow'      => 'CxTh_Customizer_CSS_Control',
			'border'      => 'CxTh_Customizer_CSS_Control',
			'all-border'  => 'CxTh_Customizer_CSS_Control',
			'font'        => 'CxTh_Customizer_CSS_Control',
			'typography'  => 'CxTh_Customizer_CSS_Control',
			'text_shadow' => 'CxTh_Customizer_CSS_Control',
			'spacing'     => 'CxTh_Customizer_CSS_Control',
		),
		'token'            => 'cxth',
		'priority'         => 25,
	);

	/**
	 * Returns instance of CxTh_Admin_Customizer
	 * @return CxTh_Design_Customizer_Register Instance
	 * @since 1.0.0
	 */
	public static function instance() {
		if ( empty( CxTh_Design_Customizer_Register::$instance ) ) {
			CxTh_Design_Customizer_Register::$instance = new CxTh_Design_Customizer_Register();
		}

		return CxTh_Design_Customizer_Register::$instance;
	}

	/**
	 * Magic constructor
	 * @since 1.0.0
	 */
	protected function __construct() {

		$custo_args = $this->panel_args;

		$cxth_fields = CxTh_Design::fields();

		require_once 'class-customizer-manager.php';

		foreach ( $cxth_fields as $title => $fields ) {

			$custo_args['title'] = $title;
			$custo_args['fields'] = $fields;
			$custo_args['priority']++;

			new CxTh_Customizer_Manager( $custo_args );

			$this->dev_dump( $title, $fields );
		}

	}

	/**
	 * Data dump for dev analysis
	 * @param $title string Panel title
	 * @param $fields array Panel args
	 * @todo Remove in v1.0.0
	 */
	protected function dev_dump( $title, $fields ) {
		if ( filter_input( INPUT_GET, 'dump_custo_fields' ) ) {

			foreach ( $fields as $id => $f )
				$idCount[ $id ][] = 1;

			echo '<table>';
			foreach ( $idCount as $id => $count ) {
				$count = count( $count );
				echo "<tr><td>$id</td><td>$count</td></tr>";
			}
			echo '</table>';
			die();
		}
	}

	/**
	 * Get fields data
	 * @return array Fields data
	 */
	static function fields() {
		return CxTh_Design::fields();
	}
}