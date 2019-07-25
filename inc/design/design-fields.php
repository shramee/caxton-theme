<?php
/**
 *
 */
$fields = array(
	'General' => array(
	),
	'Header'  => array(

		'header-bg-color' => array(
			'label'       => 'Background color',
			'type'        => 'color',
			'description' => 'Header background color',
			'section'     => array( '0' => 'header_image', '1' => 'Header layout' ),
			'user'        => 'business',
			'output'      => '.site-header{backround-color:%s;}',
		),
		'header-border'   => array(
			'label'       => 'Border',
			'type'        => 'all-border',
			'description' => 'Set border of header',
			'section'     => 'existing_header_image',
			'user'        => 'creative',
			'output'      => '.site-header{border:%s;}',
		),

		'heading-social-icons' => array(
			'label'       => 'Navigation Social Icons',
			'description' => 'Display appropriate icons in menu linking to the URL specified.',
			'type'        => 'heading',
			'section'     => 'Social icons',
			'user'        => 'business',
			'priority'    => '40',
		),
		'social[facebook]'     => array(
			'label'    => 'Facebook Page URL',
			'type'     => 'text',
			'section'  => 'Social icons',
			'user'     => 'business',
			'priority' => '45',
		),
		'social[twitter]'      => array(
			'label'    => 'Twitter Page URL',
			'type'     => 'text',
			'section'  => 'Social icons',
			'user'     => 'business',
			'priority' => '50',
		),
		'social[google]'       => array(
			'label'    => 'Google+ Page URL',
			'type'     => 'text',
			'section'  => 'Social icons',
			'user'     => 'business',
			'priority' => '55',
		),
		'social[youtube]'      => array(
			'label'    => 'Youtube Channel URL',
			'type'     => 'text',
			'section'  => 'Social icons',
			'user'     => 'business',
			'priority' => '60',
		),
		'social[github]'       => array(
			'label'    => 'Github Page URL',
			'type'     => 'text',
			'section'  => 'Social icons',
			'user'     => 'business',
			'priority' => '65',
		),
		'social[linkedin]'     => array(
			'label'    => 'LinkedIn Profile URL',
			'type'     => 'text',
			'section'  => 'Social icons',
			'user'     => 'business',
			'priority' => '70',
		),
		'social[instagram]'    => array(
			'label'    => 'InstaGram Page URL',
			'type'     => 'text',
			'section'  => 'Social icons',
			'user'     => 'business',
			'priority' => '65',
		),
		'social[vkontacte]'    => array(
			'label'    => 'V Kontacte Page URL',
			'type'     => 'text',
			'section'  => 'Social icons',
			'user'     => 'business',
			'priority' => '70',
		),
	),

	'Primary Menu' => array(
		'primary-menu-item-gap'              => array(
			'label'       => 'Gap Between Menu Items',
			'type'        => 'slider',
			'description' => 'Distance between adjacent menu items.',
			'section'     => 'Menu Items',
			'user'        => 'creative',
			'output'      => '.main-navigation > ul > li:not(:first-child){margin-left:%spx;}',
			'priority'    => '25',
		),

		'primary-menu-it-bg-color'        => array(
			'label'       => 'Background color',
			'type'        => 'color',
			'description' => 'Text color for active menu item',
			'section'     => 'Menu Items',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li > a{background-color:%s;}',
			'priority'    => '5',
		),
		'primary-menu-it-text-color'      => array(
			'label'       => 'Text color',
			'type'        => 'color',
			'description' => 'Background color for active menu item',
			'section'     => 'Menu Items',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li > a{color:%s;}',
			'priority'    => '10',
		),

		'primary-menu-it-ho-bg-color'        => array(
			'label'       => 'Hover Background color',
			'type'        => 'color',
			'description' => 'Text color for active menu item',
			'section'     => 'Menu Item Hover',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li > a:hover{background-color:%s;}',
			'priority'    => '5',
		),
		'primary-menu-it-ho-text-color'      => array(
			'label'       => 'Hover Text color',
			'type'        => 'color',
			'description' => 'Background color for active menu item',
			'section'     => 'Menu Item Hover',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li > a:hover{color:%s;}',
			'priority'    => '10',
		),

		'primary-menu-it-ac-bg-color'        => array(
			'label'       => 'Active menu item Background color',
			'type'        => 'color',
			'description' => 'Text color for active menu item',
			'section'     => 'Menu Active Item',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li.current-menu-item > a,.main-navigation > ul > li.current-menu-ancestor > a{background-color:%s;}',
			'priority'    => '5',
		),
		'primary-menu-it-ac-text-color'      => array(
			'label'       => 'Text color',
			'type'        => 'color',
			'description' => 'Background color for active menu item',
			'section'     => 'Menu Active Item',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li.current-menu-item > a,.main-navigation > ul > li.current-menu-ancestor > a{color:%s;}',
			'priority'    => '10',
		),

		'sub-menu'                           => array(
			'label'    => 'Sub Menu',
			'type'     => 'all-custo',
			'section'  => 'Submenu',
			'user'     => 'business',
			'output'   => '.main-navigation li ul{%s}',
			'priority' => '5',
		),
		'su-it-padding'                      => array(
			'label'       => 'Padding',
			'type'        => 'spacing',
			'description' => 'Padding',
			'section'     => 'Submenu Items',
			'user'        => 'designer',
			'output'      => '.main-navigation li ul a{padding:%s;}',
			'priority'    => '15',
		),

		'primary-menu-sub-it-bg-color'        => array(
			'label'       => 'Background color',
			'type'        => 'color',
			'description' => 'Text color for active menu item',
			'section'     => 'Submenu Items',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li ul a{background-color:%s;}',
			'priority'    => '5',
		),
		'primary-menu-sub-it-text-color'      => array(
			'label'       => 'Text color',
			'type'        => 'color',
			'description' => 'Background color for active menu item',
			'section'     => 'Submenu Items',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li ul a{color:%s;}',
			'priority'    => '10',
		),

		'primary-menu-sub-it-ho-bg-color'        => array(
			'label'       => 'Hover Background color',
			'type'        => 'color',
			'description' => 'Text color for active menu item',
			'section'     => 'Submenu Item Hover',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li ul a:hover{background-color:%s;}',
			'priority'    => '5',
		),
		'primary-menu-sub-it-ho-text-color'      => array(
			'label'       => 'Hover Text color',
			'type'        => 'color',
			'description' => 'Background color for active menu item',
			'section'     => 'Submenu Item Hover',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li > a:hover{color:%s;}',
			'priority'    => '10',
		),

		'primary-menu-sub-it-ac-bg-color'        => array(
			'label'       => 'Active menu item Background color',
			'type'        => 'color',
			'description' => 'Text color for active menu item',
			'section'     => 'Submenu Active Item',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li ul .current-menu-item > a{background-color:%s;}',
			'priority'    => '5',
		),
		'primary-menu-sub-it-ac-text-color'      => array(
			'label'       => 'Text color',
			'type'        => 'color',
			'description' => 'Background color for active menu item',
			'section'     => 'Submenu Active Item',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li ul .current-menu-item > a{color:%s;}',
			'priority'    => '10',
		),

	),
	'Content'      => array(
		'text-font'       => array(
			'label'       => 'Body text',
			'type'        => 'typography',
			'description' => 'Specify default font styling of your site',
			'user'        => 'business',
			'output'      => 'body{%s}',
			'priority'    => '65',
		),
		'heading-font'            => array(
			'label'       => 'Heading Font',
			'type'        => 'typography',
			'description' => 'Specify font styling of all h1s on your site',
			'user'        => 'business',
			'output'      => 'h1,h2,h3,h4,h5,h6{%s}',
			'priority'    => '5',
		),
		'active-link-color'  => array(
			'label'       => 'Active Link color',
			'type'        => 'color',
			'description' => 'Set Active link color',
			'user'        => 'creative',
			'output'      => 'a{color:%s;}',
			'priority'    => '70',
		),
		'visited-link-color' => array(
			'label'       => 'Visited Link color',
			'type'        => 'color',
			'description' => 'Set visited link color',
			'user'        => 'creative',
			'output'      => 'a:visited{color:%s;}',
			'priority'    => '75',
		),
	),
	'Footer'       => array(
		'bg-color'            => array(
			'label'    => 'BG color',
			'type'     => 'color',
			'user'     => 'business',
			'output'   => 'footer{background-color:%s;}',
			'priority' => '5',
		),
		'bottom-bar-bg-color' => array(
			'label'    => 'Bottom Bar BG color',
			'type'     => 'color',
			'user'     => 'business',
			'output'   => 'bot-bar{background-color:%s;}',
			'priority' => '10',
		),
		'bottom-bar-shadow'   => array(
			'label'       => 'Bottom Bar shadow',
			'type'        => 'shadow',
			'description' => 'Set shadow of the bottom bar',
			'output'      => 'bot-bar{%s}',
			'priority'    => '15',
		),
		'widgets-bg-color'    => array(
			'label'       => 'Widgets BG color',
			'type'        => 'color',
			'description' => 'Set Widgets Background Color',
			'user'        => 'creative',
			'output'      => 'wid-area{background-color:%s;}',
			'priority'    => '20',
		),
		'custom-text'         => array(
			'label'       => 'Custom Text',
			'type'        => 'text',
			'description' => 'Put any custom text like Copyright info or any other Website Information',
			'user'        => 'business',
			'priority'    => '25',
		),
		'widgets-layout'      => array(
			'label'       => 'Widgets Layout',
			'type'        => 'radio',
			'description' => 'Select the kind of layout for for widgets you want',
			'user'        => 'business',
			'choices'     => array(
				'1'           => '1',
				'2'           => '2',
				'3'           => '3',
				'4'           => '4',
				'3_4-1_4'     => '3/4 + 1/4',
				'1_4-3_4'     => '1/4 + 3/4',
				'1_2-1_4-1_4' => '1/2 + 1/4 + 1/4',
				'1_4-1_2-1_4' => '1/4 + 1/2 + 1/4',
				'1_4-1_4-1_2' => '1/4 + 1/4 + 1/2'
			),
			'priority'    => '30',
		),
		'widgets-padding'     => array(
			'label'       => 'Widgets Padding',
			'type'        => 'spacing',
			'description' => 'Distance from widget content to invisible border',
			'user'        => 'designer',
			'choices'     => array(
				'top'    => 'Top',
				'bottom' => 'Bottom',
				'left'   => 'Left',
				'right'  => 'Right'
			),
			'output'      => 'widget{padding:%spx;}',
			'priority'    => '35',
		),
	),
);

$panels = apply_filters( 'cxth_design_fields', $fields );

if ( ! $panels ) {
	return array();
}

foreach ( $panels as $panel => &$fields ) {
	$ids = array_keys( $fields );
	foreach ( $fields as $id => $f ) {
		if ( 'all-custo' == $f['type'] ) {

			$i                = array_search( $id, $ids );
			$all_custo_fields = array();

			unset( $panels[ $panel ][ $id ] );

			$label     = $f['label'];
			$id_format = $id . '-%s';

			//Padding
			$id                                = sprintf( $id_format, 'padding' );
			$f['type']                         = 'spacing';
			$f['label']                        = $label . ' Padding';
			$all_custo_fields[ $id ]           = $f;
			$all_custo_fields[ $id ]['output'] = sprintf( $f['output'], 'padding:%s' );

			//BG Color
			$id                                = sprintf( $id_format, 'bg-color' );
			$f['type']                         = 'alpha-color';
			$f['label']                        = $label . ' Background Color';
			$all_custo_fields[ $id ]           = $f;
			$all_custo_fields[ $id ]['output'] = sprintf( $f['output'], 'background-color:%s' );

			//Border
			$id                      = sprintf( $id_format, 'border' );
			$f['type']               = 'all-border';
			$f['label']              = $label . ' Border';
			$all_custo_fields[ $id ] = $f;

			//Rounded corners
			$id                                = sprintf( $id_format, 'border-radius' );
			$f['type']                         = 'slider';
			$f['label']                        = $label . ' Rounded Corners';
			$all_custo_fields[ $id ]           = $f;
			$all_custo_fields[ $id ]['output'] = sprintf( $f['output'], 'border-radius:%spx' );

			//Shadow
			$id                      = sprintf( $id_format, 'shadow' );
			$f['type']               = 'shadow';
			$f['label']              = $label . ' Shadow';
			$all_custo_fields[ $id ] = $f;

			$fields = array_merge(
				array_slice( $fields, 0, $i ),
				$all_custo_fields,
				array_slice( $fields, $i, null )
			);
		}
	}
}


return apply_filters( 'cxth_design_fields', $panels );